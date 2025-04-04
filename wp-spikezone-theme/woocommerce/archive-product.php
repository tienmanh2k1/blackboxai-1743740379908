<?php
/**
 * Product Archive Template
 *
 * @package SpikeZone
 */

get_header('shop');
?>

<main class="container mx-auto px-6 py-8">
    <header class="mb-8">
        <h1 class="text-3xl font-bold">
            <?php woocommerce_page_title(); ?>
        </h1>
        <?php woocommerce_taxonomy_archive_description(); ?>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
        if (woocommerce_product_loop()) {
            woocommerce_product_loop_start();
            
            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();
                    wc_get_template_part('content', 'product');
                }
            }
            
            woocommerce_product_loop_end();
            
            // Pagination
            woocommerce_pagination();
        } else {
            do_action('woocommerce_no_products_found');
        }
        ?>
    </div>
</main>

<?php
get_footer('shop');