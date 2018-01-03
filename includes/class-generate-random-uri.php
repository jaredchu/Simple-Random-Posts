<?php
/**
 * Created by PhpStorm.
 * User: jaredchu
 * Date: 03/01/2018
 * Time: 17:16
 */

class Generate_Random_URI
{
    const POST = 1;
    const TAG = 2;
    const CAT = 3;

    protected static $types = [
        'POST' => self::POST,
        'TAG' => self::TAG,
        'CAT' => self::CAT,
    ];

    public function generate()
    {
        $type_name = array_rand(self::$types);
        switch (self::$types[$type_name]) {
            case self::POST:
                return $this->generate_post_uri();
            case self::TAG:
                return $this->genereate_tag_uri();
            case self::CAT:
                return $this->generate_category_uri();
        }

        return '/';
    }

    protected function generate_post_uri()
    {
        $args = array(
            'post_type' => 'post',
            'orderby' => 'rand',
            'posts_per_page' => 1,
        );

        $the_query = new WP_Query($args);
        $post_uri = false;

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $post_uri = get_permalink();
            }
            wp_reset_postdata();
        }

        return $post_uri;
    }

    protected function genereate_tag_uri()
    {
        $tags = get_tags();
        $tag_num = array_rand($tags);
        return get_tag_link($tags[$tag_num]->term_id);
    }

    protected function generate_category_uri()
    {
        $categories = get_categories();
        $cat_num = array_rand($categories);
        return get_category_link($categories[$cat_num]->term_id);
    }
}