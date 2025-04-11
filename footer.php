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

                <?php if (get_field('footer_primary_cta_text', 'options') || get_field('footer_primary_cta_image', 'options')['image']) : ?>
                    <div class="btn-wrapper">
                        <?php if (get_field('footer_primary_cta_type', 'options') === 'text' && get_field('footer_primary_cta_text', 'options')['title']) : ?>
                            <a class="btn btn-<?= esc_attr(get_field('footer_primary_cta_color', 'options')); ?> btn-icon-<?= esc_attr(get_field("footer_primary_cta_text_icon", "options")); ?>"
                                href="<?= esc_url(get_field('footer_primary_cta_text', 'options')['url']); ?>">
                                <?= esc_html(get_field('footer_primary_cta_text', 'options')['title']); ?>
                            </a>
                        <?php elseif (get_field('footer_primary_cta_type', 'options') === 'image' && get_field('footer_primary_cta_image', 'options')['image']) : ?>
                            <a class="btn btn-<?= esc_attr(get_field('footer_primary_cta_color', 'options')); ?> btn-image"
                                href="<?= esc_url(get_field('footer_primary_cta_image', 'options')['url']); ?>"
                                title="<?= esc_attr(get_field('footer_primary_cta_image', 'options')['title']); ?>"
                                aria-label="<?= esc_attr(get_field('footer_primary_cta_image', 'options')['title']); ?>"
                                target="<?= esc_attr(get_field('footer_primary_cta_image', 'options')['target']); ?>">
                                <img src="<?= esc_url(get_field('footer_primary_cta_image', 'options')['image']); ?>"
                                    alt="<?= esc_attr(get_field('footer_primary_cta_image', 'options')['title']); ?>" />
                            </a>
                        <?php endif; ?>
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
            <?php if (get_field('footer_open_dyslexic', 'option')) : ?>
                <!-- OpenDyslexic Toggle -->
                <div class="dyslexic-toggle">
                    <input type="checkbox" id="open-dyslexic" name="open-dyslexic" class="screen-reader-only" />
                    <label for="open-dyslexic"><?= get_field('footer_open_dyslexic_label', 'option') ?: __('Enable OpenDyslexic', 'usefool'); ?></label>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>