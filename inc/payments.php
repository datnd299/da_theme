<?php
/**
 * Manual payment gateways: Zelle + Crypto.
 *
 * Both gateways leave the order as Pending payment until an admin confirms the
 * transfer manually (pending orders are excluded from WC's unpaid auto-cancel),
 * show payment details at checkout / thank-you / emails, and can apply a
 * percentage discount when selected.
 *
 * Settings: WooCommerce → Settings → Payments → Zelle / Crypto.
 */

defined('ABSPATH') || exit;

add_action('after_setup_theme', 'dawp_payments_init', 20);

function dawp_payments_init() {
    if (!class_exists('WC_Payment_Gateway') || class_exists('DAWP_Manual_Gateway')) {
        return;
    }

    abstract class DAWP_Manual_Gateway extends WC_Payment_Gateway {

        /** Logo file in assets/img/, shown before the title at checkout. */
        protected $logo = '';

        public function __construct() {
            $this->has_fields = false;
            $this->supports   = ['products'];

            $this->init_form_fields();
            $this->init_settings();

            $this->title        = $this->get_option('title');
            $this->description  = $this->get_option('description');
            $this->instructions = $this->get_option('instructions');

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options']);
            add_action('woocommerce_thankyou_' . $this->id, [$this, 'thankyou_page']);
            add_action('woocommerce_email_before_order_table', [$this, 'email_instructions'], 10, 3);
        }

        /** Fields shared by both gateways; subclasses insert their own after 'description'. */
        protected function base_fields($label, $default_title, $default_desc, array $extra) {
            $fields = [
                'enabled' => [
                    'title'   => __('Enable/Disable', 'dawp'),
                    'type'    => 'checkbox',
                    'label'   => sprintf(__('Enable %s', 'dawp'), $label),
                    'default' => 'no',
                ],
                'title' => [
                    'title'   => __('Title', 'dawp'),
                    'type'    => 'text',
                    'default' => $default_title,
                ],
                'description' => [
                    'title'   => __('Description', 'dawp'),
                    'type'    => 'textarea',
                    'default' => $default_desc,
                ],
            ];
            $fields += $extra;
            $fields += [
                'discount' => [
                    'title'             => __('Discount (%)', 'dawp'),
                    'type'              => 'number',
                    'description'       => __('Percent off the order subtotal (after coupons, excluding shipping) when this method is selected. 0 = no discount.', 'dawp'),
                    'default'           => '0',
                    'custom_attributes' => ['min' => '0', 'max' => '100', 'step' => '0.01'],
                ],
                'instructions' => [
                    'title'       => __('Instructions', 'dawp'),
                    'type'        => 'textarea',
                    'description' => __('Shown on the thank-you page and in order emails.', 'dawp'),
                    'default'     => __('Please include your order number in the payment note. Your order stays as pending payment until our team verifies the transfer. We will confirm your payment with you by email, usually within 24 hours, and your order ships after that.', 'dawp'),
                ],
            ];
            return $fields;
        }

        public function get_discount_percent() {
            return max(0, min(100, (float) $this->get_option('discount', 0)));
        }

        public function get_icon() {
            $pct = $this->get_discount_percent();
            $html = $this->logo_html();
            if ($pct > 0) {
                $html .= '<span class="dawp-pay-badge">' . esc_html(sprintf(__('Discount %s%%', 'dawp'), wc_format_localized_decimal($pct))) . '</span>';
            }
            return apply_filters('woocommerce_gateway_icon', $html, $this->id);
        }

        /** Brand logo shown next to the gateway title at checkout. */
        protected function logo_html() {
            if (!$this->logo) {
                return '';
            }
            $src = get_template_directory_uri() . '/assets/img/' . $this->logo;
            return '<img class="dawp-pay-logo" src="' . esc_url($src) . '" alt="" width="28" height="28">';
        }

        public function payment_fields() {
            echo '<div class="dawp-pay">';
            if ($this->description) {
                echo wpautop(wptexturize(wp_kses_post($this->description)));
            }
            $this->render_details();
            echo '</div>';
        }

        /** Payment details (account, wallets…). $order is null at checkout. */
        abstract protected function render_details($order = null);

        public function thankyou_page($order_id) {
            $order = wc_get_order($order_id);
            if (!$order || !$order->has_status(['on-hold', 'pending'])) {
                return;
            }
            echo '<section class="dawp-pay dawp-pay--thankyou">';
            echo '<h2>' . esc_html(sprintf(__('Complete your %s payment', 'dawp'), $this->method_title)) . '</h2>';
            echo '<ul class="dawp-pay-summary">';
            echo '<li><span>' . esc_html__('Amount', 'dawp') . '</span><strong>' . wp_kses_post($order->get_formatted_order_total()) . '</strong></li>';
            echo '<li><span>' . esc_html__('Payment note', 'dawp') . '</span><strong>' . esc_html($order->get_order_number()) . '</strong>'
                . '<button type="button" class="dawp-copy" data-copy="' . esc_attr($order->get_order_number()) . '">' . esc_html__('Copy', 'dawp') . '</button></li>';
            echo '</ul>';
            $this->render_details($order);
            if ($this->instructions) {
                echo wpautop(wptexturize(wp_kses_post($this->instructions)));
            }
            echo '</section>';
        }

        public function email_instructions($order, $sent_to_admin, $plain_text = false) {
            if ($sent_to_admin || $order->get_payment_method() !== $this->id || !$order->has_status('pending')) {
                return;
            }
            $lines = $this->email_lines($order);
            if ($this->instructions) {
                $lines[] = $this->instructions;
            }
            if ($plain_text) {
                echo "\n" . wp_strip_all_tags(implode("\n", $lines)) . "\n\n";
                return;
            }
            echo '<h2>' . esc_html(sprintf(__('%s payment details', 'dawp'), $this->method_title)) . '</h2>';
            echo '<p>' . implode('<br>', array_map('wp_kses_post', $lines)) . '</p>';
        }

        protected function email_lines($order) {
            return [
                sprintf(__('Amount: %s', 'dawp'), wp_strip_all_tags($order->get_formatted_order_total())),
                sprintf(__('Payment note: order #%s', 'dawp'), $order->get_order_number()),
            ];
        }

        public function process_payment($order_id) {
            $order = wc_get_order($order_id);
            if ($order->get_total() > 0) {
                $order->update_status('pending', sprintf(__('Awaiting %s payment — confirm the transfer, then set the order to Processing.', 'dawp'), $this->method_title));
                wc_maybe_reduce_stock_levels($order_id);
                // WC sends no emails while an order stays pending, so send them here.
                $emails = WC()->mailer()->get_emails();
                $emails['WC_Email_New_Order']->trigger($order_id, $order);
                $emails['WC_Email_Customer_On_Hold_Order']->trigger($order_id, $order);
            } else {
                $order->payment_complete();
            }
            WC()->cart->empty_cart();

            return [
                'result'   => 'success',
                'redirect' => $this->get_return_url($order),
            ];
        }

        protected function copy_row($label, $value) {
            if ($value === '') {
                return;
            }
            echo '<li><span>' . esc_html($label) . '</span><strong>' . esc_html($value) . '</strong>'
                . '<button type="button" class="dawp-copy" data-copy="' . esc_attr($value) . '">' . esc_html__('Copy', 'dawp') . '</button></li>';
        }
    }

    class DAWP_Gateway_Zelle extends DAWP_Manual_Gateway {
        public function __construct() {
            $this->id                 = 'dawp_zelle';
            $this->logo               = 'zelle.svg';
            $this->method_title       = __('Zelle', 'dawp');
            $this->method_description = __('Customers send the order total via Zelle; the order stays Pending payment until you confirm it.', 'dawp');
            parent::__construct();
        }

        public function init_form_fields() {
            $this->form_fields = $this->base_fields(
                __('Zelle', 'dawp'),
                __('Zelle', 'dawp'),
                __('Send the order total with Zelle from your banking app. We will confirm your payment with you by email before your order ships.', 'dawp'),
                [
                    'account_name' => [
                        'title'       => __('Account name', 'dawp'),
                        'type'        => 'text',
                        'description' => __('Recipient name shown in Zelle, e.g. Jayden Pham.', 'dawp'),
                        'default'     => '',
                    ],
                    'account_id' => [
                        'title'       => __('Zelle phone / email', 'dawp'),
                        'type'        => 'text',
                        'description' => __('e.g. (657) 257-9219', 'dawp'),
                        'default'     => '',
                    ],
                    'qr_url' => [
                        'title'       => __('QR code image URL', 'dawp'),
                        'type'        => 'url',
                        'description' => __('Link to your Zelle QR code image (upload it to Media Library and paste the file URL).', 'dawp'),
                        'default'     => '',
                    ],
                ]
            );
        }

        /** Zelle details (recipient, phone, QR) are only revealed after the order is placed. */
        public function payment_fields() {
            echo '<div class="dawp-pay">';
            if ($this->description) {
                echo wpautop(wptexturize(wp_kses_post($this->description)));
            }
            echo '<p class="dawp-pay-note">' . esc_html__('Zelle payment details (recipient and QR code) will be shown after you place your order.', 'dawp') . '</p>';
            echo '</div>';
        }

        protected function render_details($order = null) {
            $name = trim($this->get_option('account_name'));
            $id   = trim($this->get_option('account_id'));
            $qr   = trim($this->get_option('qr_url'));

            echo '<div class="dawp-pay-zelle">';
            if ($qr) {
                echo '<img class="dawp-pay-qr" src="' . esc_url($qr) . '" alt="' . esc_attr__('Zelle QR code', 'dawp') . '" width="160" height="160" loading="lazy">';
            }
            echo '<ul class="dawp-pay-summary">';
            $this->copy_row(__('Recipient', 'dawp'), $name);
            $this->copy_row(__('Zelle phone', 'dawp'), $id);
            echo '</ul></div>';
        }

        protected function email_lines($order) {
            return array_merge([
                sprintf(__('Recipient: %s', 'dawp'), $this->get_option('account_name')),
                sprintf(__('Zelle phone: %s', 'dawp'), $this->get_option('account_id')),
            ], parent::email_lines($order));
        }
    }

    class DAWP_Gateway_Crypto extends DAWP_Manual_Gateway {
        public function __construct() {
            $this->id                 = 'dawp_crypto';
            $this->method_title       = __('Crypto', 'dawp');
            $this->method_description = __('Customers send the order total to one of your crypto wallets; the order stays Pending payment until you confirm it.', 'dawp');
            parent::__construct();
        }

        /** Accepted-coin strip shown after the title (files in assets/img/coins/). */
        protected function logo_html() {
            $coins = ['btc' => 'Bitcoin', 'eth' => 'Ethereum', 'usdt' => 'Tether', 'bnb' => 'BNB', 'sol' => 'Solana'];
            $dir   = get_template_directory_uri() . '/assets/img/coins/';
            $html  = '<span class="dawp-pay-coins">';
            foreach ($coins as $file => $name) {
                $html .= '<img src="' . esc_url($dir . $file . '.svg') . '" alt="' . esc_attr($name) . '" title="' . esc_attr($name) . '" width="20" height="20">';
            }
            return parent::logo_html() . $html . '</span>';
        }

        public function init_form_fields() {
            $this->form_fields = $this->base_fields(
                __('Crypto', 'dawp'),
                __('Cryptocurrency', 'dawp'),
                __('Pay with crypto. Send the exact order total in USD value to one of the wallets below. We will confirm your payment with you by email before your order ships.', 'dawp'),
                [
                    'wallets' => [
                        'title'       => __('Wallets', 'dawp'),
                        'type'        => 'textarea',
                        'description' => __('One wallet per line: <code>Coin | Network | Address | QR image URL (optional)</code><br>e.g. <code>USDT | TRC20 | TXyz... </code>', 'dawp'),
                        'default'     => '',
                        'css'         => 'min-height:140px;font-family:monospace;',
                    ],
                ]
            );
        }

        /** @return array<int, array{coin:string, network:string, address:string, qr:string}> */
        public function get_wallets() {
            $wallets = [];
            foreach (preg_split('/\r\n|\r|\n/', (string) $this->get_option('wallets')) as $line) {
                $parts = array_map('trim', explode('|', $line));
                if (count($parts) < 3 || $parts[2] === '') {
                    continue;
                }
                $wallets[] = [
                    'coin'    => $parts[0],
                    'network' => $parts[1],
                    'address' => $parts[2],
                    'qr'      => $parts[3] ?? '',
                ];
            }
            return $wallets;
        }

        public function is_available() {
            return parent::is_available() && $this->get_wallets();
        }

        protected function render_details($order = null) {
            echo '<ul class="dawp-pay-wallets">';
            foreach ($this->get_wallets() as $w) {
                echo '<li class="dawp-pay-wallet">';
                if ($w['qr']) {
                    echo '<img class="dawp-pay-qr" src="' . esc_url($w['qr']) . '" alt="' . esc_attr(sprintf(__('%s wallet QR code', 'dawp'), $w['coin'])) . '" width="120" height="120" loading="lazy">';
                }
                echo '<div class="dawp-pay-wallet__body">';
                echo '<p class="dawp-pay-wallet__coin"><strong>' . esc_html($w['coin']) . '</strong>';
                if ($w['network']) {
                    echo ' <span>' . esc_html($w['network']) . '</span>';
                }
                echo '</p>';
                echo '<p class="dawp-pay-wallet__addr"><code>' . esc_html($w['address']) . '</code>'
                    . '<button type="button" class="dawp-copy" data-copy="' . esc_attr($w['address']) . '">' . esc_html__('Copy', 'dawp') . '</button></p>';
                echo '</div></li>';
            }
            echo '</ul>';
            echo '<p class="dawp-pay-note">' . esc_html__('Only send on the network shown. Transfers on the wrong network cannot be recovered.', 'dawp') . '</p>';
        }

        protected function email_lines($order) {
            $lines = [];
            foreach ($this->get_wallets() as $w) {
                $lines[] = trim($w['coin'] . ' ' . ($w['network'] ? '(' . $w['network'] . ')' : '')) . ': ' . $w['address'];
            }
            return array_merge($lines, parent::email_lines($order));
        }
    }
}

add_filter('woocommerce_payment_gateways', function ($gateways) {
    if (class_exists('DAWP_Gateway_Zelle')) {
        $gateways[] = 'DAWP_Gateway_Zelle';
        $gateways[] = 'DAWP_Gateway_Crypto';
    }
    return $gateways;
});

/** Apply the selected gateway's discount as a negative fee. */
add_action('woocommerce_cart_calculate_fees', function ($cart) {
    if ((is_admin() && !wp_doing_ajax()) || !WC()->session) {
        return;
    }
    $chosen = WC()->session->get('chosen_payment_method');
    if (!in_array($chosen, ['dawp_zelle', 'dawp_crypto'], true)) {
        return;
    }
    $gateways = WC()->payment_gateways()->payment_gateways();
    $gateway  = $gateways[$chosen] ?? null;
    if (!$gateway || $gateway->enabled !== 'yes') {
        return;
    }
    $pct = $gateway->get_discount_percent();
    if ($pct <= 0) {
        return;
    }
    $base   = (float) $cart->get_subtotal() - (float) $cart->get_discount_total();
    $amount = round($base * $pct / 100, wc_get_price_decimals());
    if ($amount <= 0) {
        return;
    }
    $cart->add_fee(
        sprintf(__('%1$s discount (%2$s%%)', 'dawp'), $gateway->method_title, wc_format_localized_decimal($pct)),
        -$amount,
        false
    );
});

/** Classic checkout doesn't refresh totals when the payment method changes; make it. */
add_action('wp_enqueue_scripts', function () {
    if (!function_exists('is_checkout') || !is_checkout() || is_order_received_page()) {
        return;
    }
    wp_add_inline_script('wc-checkout', <<<'JS'
jQuery(function ($) {
    $('form.checkout').on('change', 'input[name="payment_method"]', function () {
        $(document.body).trigger('update_checkout');
    });
});
JS);
}, 20);

/**
 * CheckoutWC blocks every theme stylesheet/script (checkout.css, main.js) on its
 * checkout/thank-you templates, so the payment-detail styles + copy button are inlined here.
 */
add_action('cfw_wp_head', function () {
    ?>
<style id="dawp-pay-cfw">
.payment_method_icons:has(.dawp-pay-logo){display:inline-flex;flex-wrap:wrap;align-items:center;gap:.375rem;vertical-align:middle}
.payment_method_icons .dawp-pay-logo{width:24px;height:24px;margin:0;border-radius:6px}
.payment_method_icons .dawp-pay-coins{display:inline-flex;align-items:center;gap:.25rem}
.payment_method_icons .dawp-pay-coins img{width:20px;height:20px;margin:0}
.dawp-pay-badge{display:inline-block;padding:.125rem .5rem;border-radius:999px;background:var(--cfw-buttons-primary-background-color,#111);color:var(--cfw-buttons-primary-text-color,#fff);font-size:.72rem;font-weight:700;line-height:1.5}
.dawp-pay{font-size:.9rem;line-height:1.5}
.dawp-pay p{margin:0 0 .75rem}
.dawp-pay-zelle{display:flex;flex-wrap:wrap;align-items:center;gap:1rem}
.dawp-pay-qr{flex:none;width:160px;height:auto;padding:.375rem;border:1px solid #dedede;border-radius:6px;background:#fff}
.dawp-pay-summary,.dawp-pay-wallets{flex:1 1 14rem;display:grid;gap:.5rem;margin:0 0 .75rem;padding:0;list-style:none}
.dawp-pay-summary li{display:flex;align-items:center;gap:.5rem;margin:0;padding:.5rem .75rem;border:1px solid #dedede;border-radius:6px;background:#fff}
.dawp-pay-summary li::before{content:none}
.dawp-pay-summary li span{min-width:6.5rem;color:#6b6b6b;font-size:.82rem}
.dawp-pay-summary li strong{flex:1;min-width:0;color:var(--cfw-body-text-color,#111);overflow-wrap:anywhere}
.dawp-pay-wallet{display:flex;gap:.75rem;align-items:center;padding:.75rem;border:1px solid #dedede;border-radius:6px;background:#fff}
.dawp-pay-wallet .dawp-pay-qr{width:96px}
.dawp-pay-wallet__body{flex:1;min-width:0}
.dawp-pay .dawp-pay-wallet__coin{margin:0 0 .25rem}
.dawp-pay-wallet__coin span{margin-left:.25rem;padding:.05rem .4rem;border-radius:4px;background:#f3f3f3;color:#6b6b6b;font-size:.75rem;font-weight:600}
.dawp-pay .dawp-pay-wallet__addr{display:flex;align-items:center;gap:.5rem;margin:0}
.dawp-pay-wallet__addr code{flex:1;min-width:0;font-size:.8rem;overflow-wrap:anywhere;background:none}
.dawp-pay .dawp-pay-note{color:#6b6b6b;font-size:.8rem}
button.dawp-copy{flex:none;width:auto;min-height:0;margin:0;padding:.25rem .625rem;border:1px solid var(--cfw-buttons-primary-background-color,#111);border-radius:4px;background:#fff;color:var(--cfw-buttons-primary-background-color,#111);font-size:.75rem;font-weight:700;line-height:1.4;cursor:pointer}
button.dawp-copy:hover,button.dawp-copy.is-copied{background:var(--cfw-buttons-primary-background-color,#111);color:var(--cfw-buttons-primary-text-color,#fff)}
.dawp-pay--thankyou{margin:0 0 1.5rem;padding:1.25rem;border:1px solid #dedede;border-radius:8px;background:#fff}
.dawp-pay--thankyou h2{margin:0 0 1rem;font-size:1.15rem}
</style>
    <?php
});

add_action('cfw_wp_footer', function () {
    ?>
<script id="dawp-pay-cfw-js">
document.addEventListener('click', function (e) {
    var btn = e.target.closest('.dawp-copy');
    if (!btn) return;
    e.preventDefault();
    e.stopPropagation();
    var text = btn.dataset.copy || '';
    var done = function () {
        var label = btn.dataset.label || btn.textContent;
        btn.dataset.label = label;
        btn.textContent = 'Copied';
        btn.classList.add('is-copied');
        setTimeout(function () { btn.textContent = label; btn.classList.remove('is-copied'); }, 1500);
    };
    var fallback = function () {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        ta.remove();
        done();
    };
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(done, fallback);
    } else {
        fallback();
    }
}, true);
</script>
    <?php
});

/** Pending Zelle/Crypto orders wait for manual confirmation — don't let hold-stock auto-cancel them. */
add_filter('woocommerce_cancel_unpaid_order', function ($cancel, $order) {
    return in_array($order->get_payment_method(), ['dawp_zelle', 'dawp_crypto'], true) ? false : $cancel;
}, 10, 2);

/** Hide "Pay" in My Account for these orders so customers don't pay twice via another method. */
add_filter('woocommerce_my_account_my_orders_actions', function ($actions, $order) {
    if (in_array($order->get_payment_method(), ['dawp_zelle', 'dawp_crypto'], true)) {
        unset($actions['pay']);
    }
    return $actions;
}, 10, 2);
