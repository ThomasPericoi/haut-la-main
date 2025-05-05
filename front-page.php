<?php get_header(); ?>

<!-- Home Hero -->
<?php
$hero_classes = array('home-hero', get_field('home_hero_background_shadow') ? 'shadow' : false);
$hero_classes_attr = implode(' ', array_filter($hero_classes));
$hero_styles = array('background-image: url(' . get_field('home_hero_background') . ')');
$hero_styles_attr = implode('; ', $hero_styles);
?>
<section id="home-hero-<?= uniqid(); ?>" class="<?= esc_attr($hero_classes_attr); ?>" style="<?= esc_attr($hero_styles_attr); ?>">
    <div class="container">
        <?php if (get_field('home_hero_title')) : ?>
            <h1 class="hero-title"><?= get_field('home_hero_title'); ?></h1>
        <?php endif; ?>
        <?php if (get_field('home_hero_subtitle')) : ?>
            <p class="hero-subtitle"><?= esc_html(get_field('home_hero_subtitle')); ?></p>
        <?php endif; ?>
        <?php if (get_field('home_hero_primary_cta_text') || get_field('home_hero_primary_cta_image') || get_field('home_hero_secondary_cta_text') || get_field('home_hero_secondary_cta_image')) : ?>
            <div class="btn-wrapper">
                <?php render_cta('home_hero_primary'); ?>
                <?php render_cta('home_hero_secondary'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Home Portrait -->
<?php
$portrait_classes = array('home-portrait');
$portrait_classes_attr = implode(' ', array_filter($portrait_classes));
$portrait_styles = array();
$portrait_styles_attr = implode('; ', $portrait_styles);
?>
<section id="home-portrait-<?= uniqid(); ?>" class="<?= esc_attr($portrait_classes_attr); ?>" style="<?= esc_attr($portrait_styles_attr); ?>">
    <div class="container">
        <div class="cols-wrapper">
            <div class="col formatted">
                <?php if (get_field('home_portrait_title')) : ?>
                    <h2><?= get_field('home_portrait_title'); ?></h2>
                <?php endif; ?>
                <?php if (get_field('home_portrait_content')) : ?>
                    <div class="formatted"><?= wp_kses_post(get_field('home_portrait_content')); ?></div>
                <?php endif; ?>
            </div>
            <div class="col formatted">
                <?php if (get_field('home_portrait_image')) : ?>
                    <figure>
                        <img src="<?= esc_url(get_field('home_portrait_image')['url']); ?>" alt="<?= esc_attr(get_field('home_portrait_image')['title']); ?>" />
                        <figcaption><?= esc_html(get_field('home_portrait_image')['caption']); ?></figcaption>
                    </figure>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/latest', 'posts', array(
    'amount' => 2,
    'title' => __('Mes derniers articles et publications', 'haut-la-main'),
)); ?>

<?php get_footer(); ?>