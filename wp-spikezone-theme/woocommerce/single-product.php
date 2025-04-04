<?php
/**
 * Single Product Template
 *
 * @package SpikeZone
 */

get_header('shop');
?>

<main class="container mx-auto px-6 py-8">
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <?php wc_get_template_part('content', 'single-product'); ?>
    <?php endwhile; ?>
</main>

<?php
get_footer('shop');