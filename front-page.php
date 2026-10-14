<?php
/**
 * Front page. Markup follows the design (index.html) but every story, tile and link
 * points at categories and products that exist in the catalog. Sections that would
 * reference a missing category are skipped.
 */
get_header();
$cat = function ($slug) { $t = get_term_by('slug', $slug, 'product_cat'); return ($t && !is_wp_error($t)) ? $t : null; };
$link = function ($slug, $hash = '') use ($cat) { $t = $cat($slug); return $t ? esc_url(get_term_link($t)) . $hash : ''; };
$home = $cat('home-furniture-appliances'); $smart = $cat('home-improvement-essentials'); $elec = $cat('electronics'); $patio = $cat('patio-garden');
?>
<div class="hm-wrap">
<section class="hm-hero">
<?php if ($patio) : ?><div class="hm-hero__main"><div><span class="hm-kicker">Patio &amp; garden living</span><h1>Grow a little green right outside your door.</h1>
<ul class="hm-ticks"><li>Cedar resists rot without chemical treatment, so planters and raised beds hold up outdoors</li><li>A 4x4 ft raised bed is easy to reach from all sides</li><li>Solar path lights need no wiring and charge in direct sun</li></ul>
<a class="hm-btn hm-btn--brick" href="<?php echo $link('patio-garden'); ?>">Explore Patio &amp; Garden</a> <a class="hm-btn hm-btn--ghost" style="color:#fff;border-color:#fff" href="<?php echo $link('patio-garden', '#guide'); ?>">How to choose</a></div><?php echo hm_pic('hero', 'hm-hero__pic', false); ?></div><?php endif; ?>
<div class="hm-hero__side">
<?php if ($smart) : ?><a class="hm-tile hm-tile--brick" href="<?php echo $link('home-improvement-essentials', '#guide'); ?>"><span class="hm-kicker" style="color:#FFE3A3">How to choose</span><h3>Smart plugs, bulbs or switches? Where to start with smart home</h3><span>Read the guide →</span></a><?php endif; ?>
<?php if ($home) : ?><a class="hm-tile" href="<?php echo $link('home-furniture-appliances', '#guide'); ?>"><span class="hm-kicker" style="color:var(--hm-brick)">Care &amp; maintenance</span><h3>Keep a vacuum running strong: brushes, filters and bins</h3><span>Learn how →</span></a><?php endif; ?>
</div></section>
<div class="hm-trust"><div><strong>Free shipping, always</strong>Every order, no minimum</div><div><strong>Arrives in 4-7 business days</strong>Monday–Friday, tracked to your door</div><div><strong>Free 30-day returns</strong>No return shipping or restocking fees</div><div><strong>Real people on the phone</strong><a href="tel:+19842580710">(984) 258-0710</a> · Monday–Friday 10 AM–5 PM</div></div>
<?php $deps = hm_departments(); if ($deps) : ?>
<section class="hm-sec"><div class="hm-sec__head"><h2>Shop by department</h2><a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">All departments →</a></div><div class="hm-depts">
<?php foreach (array_slice($deps, 0, 8) as $i => $t) { $tid = get_term_meta($t->term_id, 'thumbnail_id', true); $b = hm_dept_banner($t->slug); if ($b) { $img = hm_pic($b, 'hm-depts__pic'); } else { $src = $tid ? wp_get_attachment_image_url($tid, 'thumbnail') : hm_img('dept-' . ($i % 8) . '.svg'); $img = '<img src="' . esc_url($src) . '" alt="">'; } echo '<a href="' . esc_url(get_term_link($t)) . '">' . $img . esc_html($t->name) . '</a>'; } ?>
</div></section><?php endif; ?>
<?php if (hm_has_products()) : ?><section class="hm-sec"><div class="hm-sec__head"><h2>Built for everyday projects</h2><a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>">See all →</a></div><div class="hm-grid">
<?php foreach (wc_get_products(['status' => 'publish', 'limit' => 8, 'orderby' => 'date', 'order' => 'DESC', 'visibility' => 'catalog']) as $p) { $GLOBALS['product'] = $p; $GLOBALS['post'] = get_post($p->get_id()); setup_postdata($GLOBALS['post']); wc_get_template_part('content', 'product'); } wp_reset_postdata(); ?>
</div></section><?php else : ?><section class="hm-sec"><?php echo hm_coming_soon(); ?></section><?php endif; ?>
<?php $band = array_filter([
    $patio ? ['patio-garden', 'Patio &amp; Garden · How to choose', 'Solar or plug-in? Picking outdoor lighting for paths and patios', ''] : null,
    $elec ? ['electronics', 'Electronics · Features', 'What 4K UHD and HDR actually change on a TV screen', 'color:#FFE3A3'] : null,
    $home ? ['home-furniture-appliances', 'Home · Compare', 'Stick vacuum or robot vacuum: which suits your floors?', ''] : null,
]); if ($band) : ?>
<section class="hm-sec hm-band"><?php foreach ($band as $b) echo '<a class="hm-band__item" href="' . $link($b[0], '#guide') . '" style="text-decoration:none"><span class="hm-kicker" style="' . $b[3] . '">' . $b[1] . '</span><h3>' . $b[2] . '</h3></a>'; ?></section><?php endif; ?>
<?php if ($patio) : $items = array_filter(array_map('wc_get_product', [766, 761, 765]), function ($p) { return $p && $p->is_visible(); }); ?>
<section class="hm-sec"><div class="hm-proj"><?php echo hm_pic('guide-weekend-project', 'hm-proj__pic'); ?><div class="hm-proj__body"><span class="hm-kicker" style="color:var(--hm-brick)">Project idea</span><h2>Set up a backyard reading nook</h2><p>An afternoon job, no tools needed.</p>
<?php if ($items) : ?><ol><?php foreach ($items as $p) echo '<li><a href="' . esc_url($p->get_permalink()) . '">' . esc_html($p->get_name()) . '</a></li>'; ?></ol><?php endif; ?>
<a class="hm-btn" href="<?php echo $link('patio-garden'); ?>">Shop Patio &amp; Garden</a></div></div></section><?php endif; ?>
</div>
<?php get_footer();
