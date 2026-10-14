<?php
/* Template Name: Policy page (hm-prose) */
get_header(); while (have_posts()) : the_post();
woocommerce_breadcrumb();
echo hm_tokens(get_the_content());
endwhile; get_footer();
