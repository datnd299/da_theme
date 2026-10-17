<?php
/**
 * Shared page building blocks — MozTire.
 * Styles: .mz-hero / .mz-section-card / .mz-prose in assets/css/main.css.
 */

defined('ABSPATH') || exit;

/**
 * Banner hero used by static, policy and WooCommerce pages.
 *
 * @param array $args title, eyebrow, lead, image (theme-relative), crumb (current label), actions (html)
 */
function dawp_page_hero($args) {
    $args = wp_parse_args($args, [
        'title'   => '',
        'eyebrow' => '',
        'lead'    => '',
        'image'   => 'assets/img/hero/support-hero.jpg',
        'crumb'   => '',
        'actions' => '',
    ]);

    $style = sprintf(
        "--mz-hero-image:url('%s')",
        esc_url(dawp_theme_cdn_image_url($args['image'], 1600, 0))
    );
    ?>
    <section class="mz-hero" style="<?php echo esc_attr($style); ?>">
        <div class="mz-container mz-hero__inner">
            <nav class="mz-hero__crumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'dawp'); ?>">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span aria-hidden="true">/</span>
                <span aria-current="page"><?php echo esc_html($args['crumb'] ?: $args['title']); ?></span>
            </nav>
            <?php if ($args['eyebrow']) : ?>
                <p class="mz-hero__eyebrow"><?php echo esc_html($args['eyebrow']); ?></p>
            <?php endif; ?>
            <h1><?php echo esc_html($args['title']); ?></h1>
            <?php if ($args['lead']) : ?>
                <p class="mz-hero__lead"><?php echo wp_kses_post($args['lead']); ?></p>
            <?php endif; ?>
            <?php if ($args['actions']) : ?>
                <div class="mz-hero__actions"><?php echo wp_kses_post($args['actions']); ?></div>
            <?php endif; ?>
        </div>
    </section>
    <?php
}

/**
 * Policy / guide body: sticky table of contents + one card per section.
 *
 * @param array  $sections [ ['id' => '', 'title' => '', 'html' => ''], ... ]
 * @param string $updated  "Last updated" label.
 */
function dawp_policy_body($sections, $updated = '') {
    $facts = dawp_store_facts();
    ?>
    <div class="mz-policy">
        <div class="mz-container mz-policy__grid">
            <aside class="mz-policy__toc" aria-label="<?php esc_attr_e('On this page', 'dawp'); ?>">
                <p class="mz-policy__toc-title">On this page</p>
                <ol>
                    <?php foreach ($sections as $section) : ?>
                        <li><a href="#<?php echo esc_attr($section['id']); ?>"><?php echo esc_html($section['title']); ?></a></li>
                    <?php endforeach; ?>
                </ol>
                <div class="mz-policy__help">
                    <strong>Questions?</strong>
                    <a href="mailto:<?php echo esc_attr($facts['email']); ?>"><?php echo esc_html($facts['email']); ?></a>
                    <span><?php echo esc_html($facts['hours']); ?></span>
                </div>
            </aside>
            <div class="mz-policy__content">
                <?php if ($updated) : ?>
                    <p class="mz-policy__updated">Last updated: <?php echo esc_html($updated); ?></p>
                <?php endif; ?>
                <?php foreach ($sections as $section) : ?>
                    <section id="<?php echo esc_attr($section['id']); ?>" class="mz-section-card mz-prose">
                        <h2><?php echo esc_html($section['title']); ?></h2>
                        <?php echo wp_kses_post($section['html']); ?>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}
