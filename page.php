<?php get_header(); ?>

<!-- Hero -->
<section id="hero-<?= uniqid(); ?>" class="hero hero-simple">
    <div class="container container-sm">
        <div class="breadcrumbs">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
        <h1><?= get_the_title(); ?></h1>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="container container-sm formatted">
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>