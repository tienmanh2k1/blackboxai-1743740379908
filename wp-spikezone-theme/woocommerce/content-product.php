<?php
/**
 * Product Card Template
 *
 * @package SpikeZone
 */

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<article <?php wc_product_class('bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300', $product); ?>>
    <div class="relative">
        <?php
        // Sale badge
        if ($product->is_on_sale()) {
            echo '<div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">' . esc_html__('Sale!', 'spikezone') . '</div>';
        }
        
        // Product image
        echo '<a href="' . esc_url(get_permalink()) . '">';
        woocommerce_template_loop_product_thumbnail();
        echo '</a>';
        ?>
    </div>

    <div class="p-4">
        <h3 class="font-bold text-lg mb-2">
            <a href="<?php the_permalink(); ?>" class="hover:text-orange-500">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <div class="flex justify-between items-center">
            <div>
                <?php woocommerce_template_loop_price(); ?>
                <?php woocommerce_template_loop_rating(); ?>
            </div>
            <div>
                <?php woocommerce_template_loop_add_to_cart([
                    'class' => 'text-orange-500 hover:text-orange-700'
                ]); ?>
            </div>
        </div>
    </div>
</article>