<?php defined('ABSPATH') || exit; ?></main>
<?php /* Newsletter band removed (QA B3): no email service is connected. Re-add parts/footer-news.html once one is wired. */ ?>
<?php
$foot = hm_tokens(hm_part('footer.html'));
// Shop column: real top-level departments.
$li = '';
foreach (array_slice(hm_departments(), 0, 5) as $d) $li .= '<li><a href="' . esc_url(get_term_link($d)) . '">' . esc_html($d->name) . '</a></li>';
if ($li) $foot = preg_replace('#(<h4>Shop</h4><ul>).*?(</ul>)#s', '$1' . $li . '$2', $foot);
$foot = str_replace('href="#">Order status', 'href="' . esc_url(wc_get_account_endpoint_url('orders')) . '">Order status', $foot);
echo $foot;
wp_footer(); ?>
</body></html>
