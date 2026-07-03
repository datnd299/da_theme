<?php
/**
 * Theme footer.
 */

$footer_columns = function_exists('dawp_footer_columns') ? dawp_footer_columns() : [];
$footer_contact = [
    'email' => 'support@rubyinstar.com',
    'address' => __('United States', 'dawp'),
    'hours' => __('Monday - Friday, 9:00 AM - 5:00 PM, GMT-08:00 Pacific Standard Time', 'dawp'),
];
?>

<footer class="site-shell ruby-footer">
    <style>
        .ruby-footer {
            background: #07182e;
            color: #fff;
            overflow: hidden;
        }

        .ruby-footer-trust {
            border-bottom: 1px solid rgba(255, 255, 255, .1);
            background: #0b1f3a;
        }

        .ruby-footer-trust-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1px;
            padding-top: 0;
            padding-bottom: 0;
        }

        .ruby-trust-card {
            display: flex;
            min-height: 94px;
            align-items: center;
            gap: 12px;
            border-left: 1px solid rgba(255, 255, 255, .1);
            background: transparent;
            padding: 18px 20px;
        }

        .ruby-trust-icon {
            display: inline-flex;
            width: 40px;
            height: 40px;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: rgba(249, 115, 22, .15);
            color: #FDBA74;
        }

        .ruby-trust-card strong {
            display: block;
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            line-height: 1.2;
        }

        .ruby-trust-card > span:not(.ruby-trust-icon) {
            display: block;
        }

        .ruby-trust-card > span:not(.ruby-trust-icon) span {
            display: block;
            margin-top: 3px;
            color: rgba(255, 255, 255, .68);
            font-size: 12px;
            font-weight: 600;
        }

        .ruby-footer-main {
            display: grid;
            grid-template-columns: 1fr;
            gap: 34px;
            padding-top: 56px;
            padding-bottom: 42px;
        }

        .ruby-footer-info {
            max-width: 390px;
        }

        .ruby-footer-brand {
            display: inline-flex;
            align-items: center;
        }

        .ruby-footer-brand .ruby-brand-logo {
            display: block;
            width: min(230px, 72vw);
            height: auto;
        }

        .ruby-footer-brand .ruby-brand-name {
            font-size: 28px;
        }

        .ruby-footer-contact {
            display: grid;
            gap: 12px;
            max-width: 520px;
            margin: 24px 0 0;
            padding: 0;
            list-style: none;
        }

        .ruby-footer-contact a {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .ruby-footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .ruby-footer-contact a {
            color: inherit;
        }

        .ruby-footer-contact-icon {
            display: inline-flex;
            width: 32px;
            height: 32px;
            flex: 0 0 auto;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: rgba(255, 255, 255, .08);
            color: #FDBA74;
        }

        .ruby-footer-contact-icon svg {
            display: block;
            width: 18px;
            height: 18px;
        }

        .ruby-footer-contact-body {
            min-width: 0;
            padding-top: 1px;
        }

        .ruby-footer-contact strong {
            display: block;
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
            font-weight: 800;
            line-height: 1.25;
        }

        .ruby-footer-contact-value,
        .ruby-footer-contact address {
            display: block;
            margin: 3px 0 0;
            color: rgba(255, 255, 255, .66);
            font-size: 14px;
            font-style: normal;
            font-weight: 600;
            line-height: 1.55;
        }

        .ruby-footer-contact a:hover .ruby-footer-contact-value {
            color: #FDBA74;
        }

        .ruby-footer-column h2 {
            margin: 0;
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            font-weight: 800;
            letter-spacing: .04em;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .ruby-footer-column ul {
            display: grid;
            gap: 12px;
            margin: 18px 0 0;
            padding: 0;
            list-style: none;
        }

        .ruby-footer-column a {
            color: rgba(255, 255, 255, .72);
            font-size: 14px;
            font-weight: 600;
            transition: color .15s ease;
        }

        .ruby-footer-column a:hover {
            color: #FDBA74;
        }

        .ruby-footer-newsletter-card {
            display: grid;
            align-content: start;
            gap: 18px;
            border: 1px solid rgba(255, 255, 255, .12);
            border-radius: 8px;
            background: rgba(255, 255, 255, .06);
            padding: 22px;
        }

        .ruby-footer-newsletter-card h2 {
            margin: 0;
            color: #fff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
            line-height: 1.25;
        }

        .ruby-footer-newsletter-card p {
            margin: 8px 0 0;
            color: rgba(255, 255, 255, .68);
            font-size: 14px;
            line-height: 1.6;
        }

        .ruby-footer-form {
            display: flex;
            width: 100%;
            gap: 10px;
        }

        .ruby-footer-form input {
            min-width: 0;
            width: 100%;
            height: 46px;
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 8px;
            background: #fff;
            color: var(--ruby-text);
            padding: 0 16px;
            outline: none;
        }

        .ruby-footer-form button {
            height: 46px;
            border: 0;
            border-radius: 8px;
            background: var(--ruby-orange);
            color: #fff;
            padding: 0 18px;
            font-weight: 800;
            cursor: pointer;
        }

        .ruby-footer-form button:hover {
            background: var(--ruby-orange-dark);
        }

        .ruby-footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .1);
            background: rgba(0, 0, 0, .12);
        }

        .ruby-footer-bottom-inner {
            display: flex;
            flex-direction: column;
            gap: 14px;
            padding-top: 20px;
            padding-bottom: 20px;
            color: rgba(255, 255, 255, .62);
            font-size: 13px;
            font-weight: 600;
        }

        .ruby-footer-payments {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .ruby-footer-payment-icon {
            display: block;
            height: 28px;
            width: auto;
            border-radius: 4px;
            background: #fff;
        }

        @media (min-width: 760px) {
            .ruby-footer-trust-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .ruby-footer-bottom-inner {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        @media (min-width: 1024px) {
            .ruby-footer-main {
                grid-template-columns: minmax(300px, 1.35fr) repeat(3, minmax(140px, .72fr)) minmax(280px, .95fr);
                align-items: start;
                gap: clamp(28px, 4vw, 52px);
            }

            .ruby-footer-column {
                padding-top: 2px;
            }
        }

        @media (max-width: 1120px) and (min-width: 760px) {
            .ruby-footer-main {
                grid-template-columns: minmax(280px, 1.2fr) repeat(2, minmax(160px, 1fr));
            }

            .ruby-footer-newsletter-card {
                grid-column: 1 / -1;
                grid-template-columns: 1fr minmax(320px, 460px);
                align-items: center;
            }
        }

        @media (max-width: 560px) {
            .ruby-footer-trust-grid {
                grid-template-columns: 1fr;
            }

            .ruby-trust-card {
                min-height: 78px;
                border-left: 0;
                border-top: 1px solid rgba(255, 255, 255, .1);
                padding-right: 0;
                padding-left: 0;
            }

            .ruby-footer-form {
                flex-direction: column;
            }
        }
    </style>

    <section class="ruby-footer-trust" aria-label="<?php esc_attr_e('Store benefits', 'dawp'); ?>">
        <div class="ruby-container ruby-footer-trust-grid">
            <?php
            $trust_items = [
                ['title' => __('Secure Checkout', 'dawp'), 'text' => __('Protected payments', 'dawp'), 'icon' => 'card'],
                ['title' => __('Fast Shipping', 'dawp'), 'text' => __('Delivery updates included', 'dawp'), 'icon' => 'truck'],
                ['title' => __('Order Tracking', 'dawp'), 'text' => __('Follow every step', 'dawp'), 'icon' => 'pin'],
                ['title' => __('Easy Returns', 'dawp'), 'text' => __('Simple return support', 'dawp'), 'icon' => 'return'],
            ];

            foreach ($trust_items as $item) :
            ?>
                <div class="ruby-trust-card">
                    <span class="ruby-trust-icon" aria-hidden="true">
                        <?php if ('truck' === $item['icon']) : ?>
                            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 7h11v9H3z"/><path d="M14 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/></svg>
                        <?php elseif ('pin' === $item['icon']) : ?>
                            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-5.2 7-12A7 7 0 0 0 5 9c0 6.8 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <?php elseif ('return' === $item['icon']) : ?>
                            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 14 4 9l5-5"/><path d="M4 9h11a5 5 0 0 1 0 10h-4"/></svg>
                        <?php else : ?>
                            <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg>
                        <?php endif; ?>
                    </span>
                    <span>
                        <strong><?php echo esc_html($item['title']); ?></strong>
                        <span><?php echo esc_html($item['text']); ?></span>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="ruby-container ruby-footer-main">
        <div class="ruby-footer-info">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="ruby-footer-brand">
                <img class="ruby-brand-logo" src="<?php echo esc_url(get_theme_file_uri('/assets/img/rubyinstar-logo.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>
            <ul class="ruby-footer-contact" aria-label="<?php esc_attr_e('Business contact information', 'dawp'); ?>">
                <li>
                    <a href="<?php echo esc_url('mailto:' . $footer_contact['email']); ?>">
                        <span class="ruby-footer-contact-icon" aria-hidden="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>
                        </span>
                        <span class="ruby-footer-contact-body">
                            <strong><?php esc_html_e('Email', 'dawp'); ?></strong>
                            <span class="ruby-footer-contact-value"><?php echo esc_html($footer_contact['email']); ?></span>
                        </span>
                    </a>
                </li>
                <li>
                    <span class="ruby-footer-contact-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s7-5.2 7-12A7 7 0 0 0 5 9c0 6.8 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
                    </span>
                    <span class="ruby-footer-contact-body">
                        <strong><?php esc_html_e('Address', 'dawp'); ?></strong>
                        <address><?php echo esc_html($footer_contact['address']); ?></address>
                    </span>
                </li>
                <li>
                    <span class="ruby-footer-contact-icon" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                    </span>
                    <span class="ruby-footer-contact-body">
                        <strong><?php esc_html_e('Hours', 'dawp'); ?></strong>
                        <span class="ruby-footer-contact-value"><?php echo esc_html($footer_contact['hours']); ?></span>
                    </span>
                </li>
            </ul>
        </div>

        <?php foreach ($footer_columns as $column) : ?>
            <?php if (!empty($column['groups'])) : ?>
                <?php foreach ($column['groups'] as $group) : ?>
                    <div class="ruby-footer-column">
                        <h2><?php echo esc_html($group['title']); ?></h2>
                        <ul>
                            <?php foreach ($group['links'] as $link) : ?>
                                <li>
                                    <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
                <?php continue; ?>
            <?php endif; ?>
            <div class="ruby-footer-column">
                <h2><?php echo esc_html($column['title']); ?></h2>
                <ul>
                    <?php foreach ($column['links'] as $link) : ?>
                        <li>
                            <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>

        <section class="ruby-footer-newsletter-card" aria-label="<?php esc_attr_e('Newsletter signup', 'dawp'); ?>">
            <div>
                <h2><?php esc_html_e('Get Tire Deals & Updates', 'dawp'); ?></h2>
                <p><?php esc_html_e('Receive offers, tire tips, and product updates straight to your inbox.', 'dawp'); ?></p>
            </div>
            <form class="ruby-footer-form" onsubmit="event.preventDefault(); this.reset(); alert('Thanks for subscribing!');">
                <label class="sr-only" for="ruby-footer-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
                <input id="ruby-footer-email" type="email" placeholder="<?php esc_attr_e('Enter your email', 'dawp'); ?>" required>
                <button type="submit"><?php esc_html_e('Subscribe', 'dawp'); ?></button>
            </form>
        </section>
    </div>

    <div class="ruby-footer-bottom">
        <div class="ruby-container ruby-footer-bottom-inner">
            <p>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?></p>
            <div class="ruby-footer-payments" aria-label="<?php esc_attr_e('Accepted payment methods', 'dawp'); ?>">
                <?php
                $footer_payment_methods = [
                    ['file' => 'visa.png', 'name' => 'Visa'],
                    ['file' => 'mastercard.png', 'name' => 'Mastercard'],
                    ['file' => 'paypal.png', 'name' => 'PayPal'],
                    ['file' => 'jcb.png', 'name' => 'JCB'],
                ];

                foreach ($footer_payment_methods as $method) :
                ?>
                    <img
                        class="ruby-footer-payment-icon"
                        src="<?php echo esc_url(get_theme_file_uri('/assets/img/gallery/Oneshopvibe/payment/' . $method['file'])); ?>"
                        alt="<?php echo esc_attr($method['name']); ?>"
                        loading="lazy"
                        decoding="async"
                    >
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
