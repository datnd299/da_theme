<?php
/**
 * Store identity helpers + shared renderer for legal / policy pages.
 *
 * The postal address is read from WooCommerce (WooCommerce > Settings > General >
 * Store Address) so the policy pages, footer and structured data stay in sync
 * with one source of truth.
 *
 * @package dawp
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dawp_store_name')) {
    function dawp_store_name() {
        return 'TimePiece Haven';
    }
}

if (!function_exists('dawp_store_email')) {
    /**
     * Customer-facing support address. Falls back to the WooCommerce
     * "from" address only if it is not an obvious placeholder.
     */
    function dawp_store_email() {
        $default = 'support@timepiecehaven.com';
        $wc      = get_option('woocommerce_email_from_address');

        if (is_string($wc) && is_email($wc) && !preg_match('/@(example|admin|test|localhost)\./i', $wc)) {
            return $wc;
        }

        return $default;
    }
}

if (!function_exists('dawp_store_address_parts')) {
    /**
     * Ordered address lines pulled from the WooCommerce store address.
     *
     * @return string[]
     */
    function dawp_store_address_parts() {
        $parts = [];

        if (function_exists('WC') && WC()->countries) {
            $countries = WC()->countries;
            $country_code = $countries->get_base_country();
            $state_code   = $countries->get_base_state();

            $line1 = trim((string) $countries->get_base_address());
            $line2 = trim((string) $countries->get_base_address_2());
            $city  = trim((string) $countries->get_base_city());
            $post  = trim((string) $countries->get_base_postcode());

            $country_name = ($country_code && isset($countries->countries[$country_code]))
                ? $countries->countries[$country_code]
                : $country_code;

            $state_name = $state_code;

            if ($country_code && $state_code) {
                $states = $countries->get_states($country_code);

                if (!empty($states[$state_code])) {
                    $state_name = $states[$state_code];
                }
            }

            foreach ([$line1, $line2, $city] as $segment) {
                if ($segment !== '') {
                    $parts[] = $segment;
                }
            }

            $region = trim(($state_name ? $state_name . ' ' : '') . $post);

            if ($region !== '') {
                $parts[] = $region;
            }

            if ($country_name) {
                $parts[] = $country_name;
            }
        }

        return array_values(array_filter(array_map('trim', $parts), 'strlen'));
    }
}

if (!function_exists('dawp_store_address')) {
    function dawp_store_address($separator = ', ') {
        return implode($separator, dawp_store_address_parts());
    }
}

if (!function_exists('dawp_store_governing_law')) {
    /**
     * Best-effort governing-law jurisdiction for the Terms of Service, derived
     * from the WooCommerce store address. Store owner should confirm this.
     */
    function dawp_store_governing_law() {
        if (function_exists('WC') && WC()->countries) {
            $countries    = WC()->countries;
            $country_code = $countries->get_base_country();
            $state_code   = $countries->get_base_state();

            $country_name = ($country_code && isset($countries->countries[$country_code]))
                ? $countries->countries[$country_code]
                : '';

            if ($country_code && $state_code) {
                $states = $countries->get_states($country_code);
                $state  = !empty($states[$state_code]) ? $states[$state_code] : $state_code;

                if ($state && $country_name) {
                    return sprintf('the State of %s, %s', $state, $country_name);
                }
            }

            if ($country_name) {
                return $country_name;
            }
        }

        return 'the United States';
    }
}

if (!function_exists('dawp_render_legal')) {
    /**
     * Render a policy / legal page with a shared layout.
     *
     * @param array $config {
     *   @type string $title    Page H1.
     *   @type string $updated  Human date, e.g. "August 29, 2026".
     *   @type string $intro    Lead paragraph (plain text).
     *   @type array  $sections List of ['heading' => string, 'body' => html].
     * }
     */
    function dawp_render_legal(array $config) {
        $title    = $config['title'] ?? '';
        $updated  = $config['updated'] ?? '';
        $intro    = $config['intro'] ?? '';
        $sections = $config['sections'] ?? [];
        $email    = dawp_store_email();
        $address  = dawp_store_address();
        $name     = dawp_store_name();
        ?>
        <div class="bg-background text-foreground">
            <section class="bg-primary text-white">
                <div class="mx-auto max-w-3xl px-4 py-14 sm:px-6 lg:px-8 lg:py-16">
                    <p class="font-heading text-xs font-semibold uppercase tracking-brand text-accent"><?php esc_html_e('Legal', 'dawp'); ?></p>
                    <h1 class="mt-4 font-heading text-3xl font-bold uppercase leading-tight sm:text-4xl"><?php echo esc_html($title); ?></h1>
                    <?php if ($updated) : ?>
                        <p class="mt-4 text-sm text-white/60">
                            <?php
                            /* translators: %s: date */
                            printf(esc_html__('Last updated: %s', 'dawp'), esc_html($updated));
                            ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($intro) : ?>
                        <p class="mt-5 text-base leading-8 text-white/80"><?php echo esc_html($intro); ?></p>
                    <?php endif; ?>
                </div>
            </section>

            <section class="py-14 sm:py-20">
                <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
                    <?php if (count($sections) > 1) : ?>
                        <nav class="rounded-xl border border-line bg-white p-6" aria-label="<?php esc_attr_e('On this page', 'dawp'); ?>">
                            <p class="font-heading text-xs font-semibold uppercase tracking-brand text-muted"><?php esc_html_e('On this page', 'dawp'); ?></p>
                            <ol class="mt-3 grid gap-2 text-sm">
                                <?php foreach ($sections as $i => $section) : ?>
                                    <li>
                                        <a class="font-medium text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="#<?php echo esc_attr(sanitize_title($section['heading'])); ?>">
                                            <?php echo esc_html(($i + 1) . '. ' . $section['heading']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
                        </nav>
                    <?php endif; ?>

                    <div class="legal-doc mt-10">
                        <?php foreach ($sections as $i => $section) : ?>
                            <section id="<?php echo esc_attr(sanitize_title($section['heading'])); ?>">
                                <h2><?php echo esc_html(($i + 1) . '. ' . $section['heading']); ?></h2>
                                <?php echo wp_kses_post($section['body']); ?>
                            </section>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-12 rounded-xl border border-line bg-white p-6">
                        <h2 class="font-heading text-base font-bold uppercase text-foreground"><?php esc_html_e('How to contact us', 'dawp'); ?></h2>
                        <p class="mt-3 text-sm leading-7 text-muted">
                            <?php
                            /* translators: %s: policy/store name */
                            printf(esc_html__('If you have any questions about this policy, please reach out and we will respond within one business day.', 'dawp'));
                            ?>
                        </p>
                        <ul class="mt-4 grid gap-2 text-sm text-foreground">
                            <li><span class="font-semibold"><?php esc_html_e('Store:', 'dawp'); ?></span> <?php echo esc_html($name); ?></li>
                            <li>
                                <span class="font-semibold"><?php esc_html_e('Email:', 'dawp'); ?></span>
                                <a class="text-primary underline decoration-accent decoration-2 underline-offset-4 transition hover:text-accent" href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            </li>
                            <?php if ($address) : ?>
                                <li><span class="font-semibold"><?php esc_html_e('Business address:', 'dawp'); ?></span> <?php echo esc_html($address); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <?php
    }
}
