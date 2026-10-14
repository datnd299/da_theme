<?php
/* Template Name: Contact */
get_header(); while (have_posts()) : the_post();
woocommerce_breadcrumb();
echo str_replace('{CONTACT_FORM}', hm_contact_form(), hm_tokens(get_the_content()));
endwhile; get_footer();
