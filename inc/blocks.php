<?php
/* BLOCKS
--------------------------------------------------------------- */

// Register blocks
function register_acf_blocks()
{
    $blocks = [];

    foreach ($blocks as $block) {
        register_block_type(__DIR__ . '/blocks/' . $block);
    }
}
add_action('init', 'register_acf_blocks');

// Register custom block category
function register_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'haut-la-main-block',
                'title' => __('Haut la main', 'haut-la-main'),
            ),
        )
    );
}
add_filter('block_categories_all', 'register_block_category', 10, 2);