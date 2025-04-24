<?php get_header(); ?>

<!-- Hero -->
<section id="hero-<?= uniqid(); ?>" class="hero hero-simple">
    <div class="container container-sm formatted">
        <div class="icon">
            <?php get_template_part('assets/medias/icons/' . get_field('icon',  get_the_category()[0]) . '.svg'); ?>
        </div>
        <div class="breadcrumbs">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
        <h1><?= get_the_title(); ?></h1>
        <?php if (has_excerpt()) : ?>
            <p class="description"><?= get_the_excerpt(); ?></p>
        <?php endif; ?>
        <?php if (has_post_thumbnail()) : ?>
            <figure>
                <?php the_post_thumbnail('full'); ?>
                <?php if (get_post(get_post_thumbnail_id())->post_excerpt) : ?>
                    <figcaption><?= get_post(get_post_thumbnail_id())->post_excerpt; ?></figcaption>
                <?php endif; ?>
            </figure>
        <?php endif; ?>
    </div>
</section>

<!-- Content -->
<section id="content-<?= uniqid(); ?>">
    <div class="container container-sm formatted">
        <?php the_content(); ?>
    </div>
</section>

<?php get_template_part('template-parts/latest', 'posts', array(
    'amount' => 2,
    'title' => __('Mes dernières publications', 'haut-la-main'),
)); ?>

<!-- Tags -->
<?php if (has_tag()) : ?>
    <section id="tags-<?= uniqid(); ?>" class="tags">
        <div class="container container-sm">
            <div class="tags-list">
                <?= __('Mots-clés', 'haut-la-main'); ?> :
                <?php foreach (get_tags() as $tag) : ?>
                    <a href="<?= get_tag_link($tag->term_id); ?>" class="tag"><?= $tag->name; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>