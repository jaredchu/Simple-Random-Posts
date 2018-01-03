<?php
/**
 * Created by PhpStorm.
 * User: jaredchu
 * Date: 03/01/2018
 * Time: 17:16
 */

class Generate_Random_URI
{
    public function generate()
    {
        $args = array(
            'post_type' => 'post',
            'orderby' => 'rand',
            'posts_per_page' => 1,
        );

        $the_query = new WP_Query($args);
        $postUrl = false;

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $postUrl = get_permalink();
            }
            wp_reset_postdata();
        }

        if ($postUrl) {
            return $postUrl;
        }

        return '/';
    }
}