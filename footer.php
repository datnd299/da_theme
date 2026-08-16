<?php
/**
 * Site footer — register band, ink footer with link columns, legal bar.
 */

defined('ABSPATH') || exit;

$dawp_footer_columns = dawp_footer_columns();
$dawp_store_address  = function_exists('dawp_get_woocommerce_store_address') ? dawp_get_woocommerce_store_address() : '';
$dawp_support_email  = dawp_brand('support_email');
?>
</div><!-- /#content -->

<!-- Register -->
<section class="border-t border-border bg-surface-alt" aria-labelledby="register-title">
    <div class="container grid gap-10 py-16 lg:grid-cols-2 lg:items-center lg:gap-24 lg:py-24">
        <div>
            <span class="c-rule" aria-hidden="true"></span>
            <h2 id="register-title" class="font-heading text-h2 text-foreground"><?php esc_html_e('The register', 'dawp'); ?></h2>
            <p class="mt-4 max-w-md text-body-sm text-foreground-muted"><?php esc_html_e('New references, limited series, and news from the atelier. Nothing more often than that.', 'dawp'); ?></p>
        </div>
        <form id="footer-newsletter-form" class="w-full">
            <label class="c-label" for="footer-newsletter-email"><?php esc_html_e('Email address', 'dawp'); ?></label>
            <div class="flex flex-col gap-3 sm:flex-row">
                <input id="footer-newsletter-email" class="c-field flex-1" type="email" name="email" required autocomplete="email" placeholder="<?php esc_attr_e('you@example.com', 'dawp'); ?>">
                <button class="c-btn shrink-0" type="submit"><?php esc_html_e('Register', 'dawp'); ?></button>
            </div>
            <p id="footer-newsletter-msg" class="mt-3 hidden text-caption" role="status" aria-live="polite"></p>
            <p class="mt-3 text-caption text-muted"><?php esc_html_e('We never share your address. Unsubscribe at any time.', 'dawp'); ?></p>
        </form>
    </div>
</section>

<footer class="bg-ink text-on-ink-muted">
    <div class="container py-16 lg:py-24">

        <div class="grid gap-12 lg:grid-cols-[320px_1fr] lg:gap-24">

            <div>
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name') ?: 'CHRONEL'); ?>">
                    <img src="<?php echo esc_url(dawp_asset_uri('assets/img/logo-chronel-light.svg')); ?>" alt="<?php esc_attr_e('CHRONEL', 'dawp'); ?>" width="280" height="52" class="h-11 w-auto" loading="lazy" decoding="async">
                </a>
                <p class="mt-6 max-w-xs text-body-sm text-on-ink-muted"><?php esc_html_e('An independent atelier. Every watch assembled and regulated by hand, powered by a Japanese automatic movement.', 'dawp'); ?></p>

                <dl class="mt-8 space-y-4 text-caption">
                    <div>
                        <dt class="text-eyebrow uppercase tracking-wide text-accent"><?php esc_html_e('Client care', 'dawp'); ?></dt>
                        <dd class="m-0 mt-1"><a class="text-on-ink transition-colors duration-400 ease-fluid hover:text-accent" href="mailto:<?php echo esc_attr($dawp_support_email); ?>"><?php echo esc_html($dawp_support_email); ?></a></dd>
                    </div>
                    <div>
                        <dt class="text-eyebrow uppercase tracking-wide text-accent"><?php esc_html_e('Hours', 'dawp'); ?></dt>
                        <dd class="m-0 mt-1"><?php echo esc_html(dawp_brand('hours')); ?></dd>
                    </div>
                    <?php if ($dawp_store_address) : ?>
                        <div>
                            <dt class="text-eyebrow uppercase tracking-wide text-accent"><?php esc_html_e('Atelier', 'dawp'); ?></dt>
                            <dd class="m-0 mt-1"><?php echo esc_html($dawp_store_address); ?></dd>
                        </div>
                    <?php endif; ?>
                </dl>
            </div>

            <div class="grid gap-0 sm:grid-cols-2 sm:gap-10 lg:grid-cols-4">
                <?php foreach ($dawp_footer_columns as $column) : ?>
                    <details class="footer-accordion border-b border-border-ink sm:border-0" open>
                        <summary class="flex min-h-[52px] items-center justify-between py-2 sm:py-0">
                            <span class="text-eyebrow font-medium uppercase tracking-wide text-on-ink"><?php echo esc_html($column['title']); ?></span>
                            <svg class="footer-accordion-icon h-4 w-4 text-on-ink-muted transition-transform duration-400 ease-fluid sm:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                        </summary>
                        <ul class="footer-accordion-panel m-0 list-none space-y-3 p-0 pb-5 sm:mt-5 sm:pb-0">
                            <?php foreach ($column['links'] as $link) : ?>
                                <li>
                                    <a class="text-caption text-on-ink-muted transition-colors duration-400 ease-fluid hover:text-accent" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="mt-16 flex flex-col gap-6 border-t border-border-ink pt-8 sm:flex-row sm:items-center sm:justify-between">
            <p class="m-0 text-caption text-on-ink-muted">
                &copy; <?php echo esc_html(date_i18n('Y')); ?> <?php echo esc_html(get_bloginfo('name') ?: 'CHRONEL'); ?>. <?php esc_html_e('All rights reserved.', 'dawp'); ?>
            </p>
            <p class="m-0 text-eyebrow uppercase tracking-wide text-on-ink-muted">
                <?php esc_html_e('Visa', 'dawp'); ?>
                <span class="mx-2 text-accent" aria-hidden="true">&middot;</span><?php esc_html_e('Mastercard', 'dawp'); ?>
                <span class="mx-2 text-accent" aria-hidden="true">&middot;</span><?php esc_html_e('American Express', 'dawp'); ?>
                <span class="mx-2 text-accent" aria-hidden="true">&middot;</span><?php esc_html_e('PayPal', 'dawp'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
