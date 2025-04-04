<?php
/**
 * WooCommerce Template
 *
 * @package SpikeZone
 */

get_header();
?>

<main class="container mx-auto px-6 py-8">
    <?php if (is_shop() || is_product_category() || is_product_tag()) : ?>
        <header class="mb-8">
            <h1 class="text-3xl font-bold">
                <?php woocommerce_page_title(); ?>
            </h1>
            <?php woocommerce_taxonomy_archive_description(); ?>
        </header>
    <?php endif; ?>

    <?php woocommerce_content(); ?>
</main>

<?php
get_footer();