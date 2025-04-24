<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="inner-header">
                <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?= esc_url(home_url('/')); ?>" class="sitename custom-logo-link"><?= bloginfo('name'); ?></a>
                <?php endif; ?>
                <div class="nav-wrapper">
                    <?php wp_nav_menu(['theme_location' => 'header-menu', 'menu_class' => 'menu menu-header', 'container' => false]); ?>

                    <?php if (get_field('header_primary_cta_text', 'options')['title'] || get_field('header_primary_cta_image', 'options')) : ?>
                        <div class="btn-wrapper">
                            <?php render_cta('header_primary', 'options'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="menu-toggle-col">
                    <div class="menu-toggle-wrapper">
                        <input id="menu-toggle" class="menu-toggle" type="checkbox" role="button" tabindex="0" aria-label="<?= __('Ouvrir le menu', 'haut-la-main'); ?>" />
                        <div class="menu-toggle-open" aria-hidden="true">
                            <span aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <main aria-hidden="false">