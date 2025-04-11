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

                    <?php if (get_field('header_primary_cta_text', 'options') || get_field('header_primary_cta_image', 'options')['image']) : ?>
                        <div class="btn-wrapper">
                            <?php if (get_field('header_primary_cta_type', 'options') === 'text' && get_field('header_primary_cta_text', 'options')['title']) : ?>
                                <a class="btn btn-<?= esc_attr(get_field('header_primary_cta_color', 'options')); ?> btn-icon-<?= esc_attr(get_field("header_primary_cta_text_icon", "options")); ?>"
                                    href="<?= esc_url(get_field('header_primary_cta_text', 'options')['url']); ?>">
                                    <?= esc_html(get_field('header_primary_cta_text', 'options')['title']); ?>
                                </a>
                            <?php elseif (get_field('header_primary_cta_type', 'options') === 'image' && get_field('header_primary_cta_image', 'options')['image']) : ?>
                                <a class="btn btn-<?= esc_attr(get_field('header_primary_cta_color', 'options')); ?> btn-image"
                                    href="<?= esc_url(get_field('header_primary_cta_image', 'options')['url']); ?>"
                                    title="<?= esc_attr(get_field('header_primary_cta_image', 'options')['title']); ?>"
                                    aria-label="<?= esc_attr(get_field('header_primary_cta_image', 'options')['title']); ?>"
                                    target="<?= esc_attr(get_field('header_primary_cta_image', 'options')['target']); ?>">
                                    <img src="<?= esc_url(get_field('header_primary_cta_image', 'options')['image']); ?>"
                                        alt="<?= esc_attr(get_field('header_primary_cta_image', 'options')['title']); ?>" />
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="menu-toggle-col">
                    <div class="menu-toggle-wrapper">
                        <input id="menu-toggle" class="menu-toggle" type="checkbox" role="button" tabindex="0" aria-label="Ouvrir le menu" />
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