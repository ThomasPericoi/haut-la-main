</main>

<!-- Footer -->
<?php $locations = get_nav_menu_locations(); ?>
<footer id="footer">
    <!-- Main Footer -->
    <div id="main-footer">
        <div class="container">
            <div class="informations">
                <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?= esc_url(home_url('/')); ?>" class="sitename custom-logo-link"><?= bloginfo('name'); ?></a>
                <?php endif; ?>

                <?php if ($description = get_field('footer_description', 'options')) : ?>
                    <div class="description formatted">
                        <?= wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('footer_primary_cta_text', 'options') || get_field('footer_primary_cta_image', 'options')) : ?>
                    <div class="btn-wrapper">
                        <?php render_cta('footer_primary', 'options'); ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('footer_socials', 'options')) : ?>
                    <div class="socials">
                        <?php while (have_rows('footer_socials', 'options')) : the_row();
                            $icon = get_sub_field('icon');
                            $link = get_sub_field('link'); ?>
                            <a href="<?= esc_url($link); ?>" target="_blank" class="social">
                                <?php get_template_part('assets/medias/icons/socials/' . $icon . '.svg'); ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (has_nav_menu('footer-menu-1')) : ?>
                <div class="menu menu-footer">
                    <?php wp_nav_menu(array('theme_location' => 'footer-menu-1', 'container' => false, 'depth' => 1)); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('footer_addresses', 'options')): ?>
                <div class="addresses">
                    <?php while (have_rows('footer_addresses', 'options')): the_row(); ?>
                        <div class="address">
                            <h3 class="h6-size title"><?= esc_html(get_sub_field('title')); ?></h3>
                            <p><?= wp_kses_post(get_sub_field('content')); ?></p>
                            <a href="<?= esc_url(get_sub_field('url')); ?>" target="_blank"><?= esc_html(preg_replace('#^(https?://)?(www\.)?#', '', get_sub_field('url'))); ?></a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Sub Footer -->
    <div id="sub-footer">
        <div class="container container-lg">
            <?php if (has_nav_menu('footer-submenu')) : ?>
                <div class="menu menu-footer">
                    <?php wp_nav_menu(array('theme_location' => 'footer-submenu', 'container' => false, 'depth' => 1)); ?>
                </div>
            <?php endif; ?>
            <?php if (get_field('footer_open_dyslexic', 'options')) : ?>
                <!-- OpenDyslexic Toggle -->
                <div class="dyslexic-toggle">
                    <input type="checkbox" id="open-dyslexic" name="open-dyslexic" class="screen-reader-only" />
                    <label for="open-dyslexic"><?= get_field('footer_open_dyslexic_label', 'options') ?: __('Activer OpenDyslexic', 'haut-la-main'); ?></label>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>