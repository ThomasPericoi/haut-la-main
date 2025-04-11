<?php
/* CONTENT
--------------------------------------------------------------- */

// Add menus
function register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('En-tête', 'haut-la-main'),
            'footer-menu-1' => __('Pied de page 1', 'haut-la-main'),
            'footer-submenu' => __('Pied de page inférieur', 'haut-la-main'),
        )
    );
}
add_action('init', 'register_menus');

// Add options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => __('Options du thème', 'haut-la-main'),
        'menu_title'    => __('Thème Haut la main', 'haut-la-main'),
        'menu_slug'     => 'options',
        'capability'    => 'edit_pages',
        'redirect'      => true,
        'position'      => 2,
        'update_button' => __('Mettre à jour', 'haut-la-main'),
        'updated_message' => __('Tout est bon', 'haut-la-main'),
        'icon_url'      => 'dashicons-admin-settings'
    ));
}

// Add and delete roles
function manage_user_roles()
{
    remove_role('subscriber');
    // remove_role('editor');
    remove_role('contributor');
    remove_role('author');
}
add_action('init', 'manage_user_roles');
