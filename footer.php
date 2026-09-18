<?php
/**
 * Minimal theme footer.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$current_year = date_i18n('Y');
$footer_links = [
    ['title' => __('Services', 'dawp'), 'url' => home_url('/services/')],
    ['title' => __('How We Grow', 'dawp'), 'url' => home_url('/how-we-grow/')],
    ['title' => __('Work', 'dawp'), 'url' => home_url('/work/')],
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
    ['title' => __('Contact', 'dawp'), 'url' => home_url('/contact-us/')],
];

$platforms = ['Meta', 'Google', 'TikTok', 'Instagram', 'YouTube'];
?>

</div><!-- #content -->

<footer class="da-site-footer">
    <div class="da-site-footer__inner">
        <div class="da-site-footer__top">
            <div>
                <p class="da-site-footer__eyebrow"><?php esc_html_e('Digital Growth & Operations Agency', 'dawp'); ?></p>
                <a class="da-site-footer__brand" href="<?php echo esc_url(home_url('/')); ?>">
                    CLIXFRAME
                </a>
            </div>

            <div class="da-site-footer__cta">
                <p><?php esc_html_e('Advertising is only the beginning. Build a connected digital growth system.', 'dawp'); ?></p>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">
                    <?php esc_html_e('Start Growing', 'dawp'); ?> &nearr;
                </a>
            </div>
        </div>

        <div class="da-site-footer__middle">
            <nav class="da-site-footer__nav" aria-label="<?php esc_attr_e('Footer navigation', 'dawp'); ?>">
                <span><?php esc_html_e('Site', 'dawp'); ?></span>
                <?php foreach ($footer_links as $link) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endforeach; ?>
            </nav>

            <div class="da-site-footer__platforms" aria-label="<?php esc_attr_e('Platforms', 'dawp'); ?>">
                <span><?php esc_html_e('Platforms', 'dawp'); ?></span>
                <?php foreach ($platforms as $platform) : ?>
                    <b><?php echo esc_html($platform); ?></b>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="da-site-footer__bottom">
            <p>&copy; <?php echo esc_html($current_year); ?> CLIXFRAME</p>
            <div>
                <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy', 'dawp'); ?></a>
                <a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>"><?php esc_html_e('Terms', 'dawp'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
