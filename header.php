<?php
/**
 * Minimal theme header.
 *
 * @package dawp
 */

defined('ABSPATH') || exit;

$brand_name = 'CLIXFRAME';
$nav_items  = function_exists('dawp_main_menu_items') ? dawp_main_menu_items() : [
    ['title' => __('Services', 'dawp'), 'url' => home_url('/services/')],
    ['title' => __('How We Grow', 'dawp'), 'url' => home_url('/how-we-grow/')],
    ['title' => __('Work', 'dawp'), 'url' => home_url('/work/')],
    ['title' => __('About', 'dawp'), 'url' => home_url('/about-us/')],
];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('da-site'); ?>>
<?php wp_body_open(); ?>

<header class="da-site-header">
    <div class="da-site-header__inner">
        <a class="da-site-header__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Clixframe home', 'dawp'); ?>">
            <span>CLIX</span><span>FRAME</span>
        </a>

        <div class="da-site-header__right">
            <nav class="da-site-header__nav" aria-label="<?php esc_attr_e('Primary navigation', 'dawp'); ?>">
                <?php foreach ($nav_items as $item) : ?>
                    <a
                        href="<?php echo esc_url($item['url']); ?>"
                        <?php echo function_exists('dawp_is_current_url') && dawp_is_current_url($item['url']) ? 'aria-current="page"' : ''; ?>
                    >
                        <?php echo esc_html($item['title']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <a class="da-site-header__cta" href="<?php echo esc_url(home_url('/contact-us/')); ?>">
                <?php esc_html_e('Start Growing', 'dawp'); ?> &nearr;
            </a>
        </div>
    </div>
</header>

<div id="content" class="da-site-content">
