<?php
/* Template Name: About */
get_header(); while (have_posts()) : the_post();
woocommerce_breadcrumb();
echo hm_tokens(get_the_content());
endwhile; get_footer();
