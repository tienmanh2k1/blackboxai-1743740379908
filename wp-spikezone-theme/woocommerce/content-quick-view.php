<?php
/**
 * Product Quick View Template
 *
 * @package SpikeZone
 */

defined('ABSPATH') || exit;

global $product;

// Exit if the product doesn't exist
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<div class="quick-view-container bg-white p-6 rounded-lg shadow-xl max-w-4xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="quick-view-gallery">
            <?php
            // Display product images
            if ($product->get_image_id()) {
                echo '<div class="main-image mb-4">';
                echo wp_get_attachment_image($product->get_image_id(), 'large', false, ['class' => 'w-full h-auto rounded-lg']);
                echo '</div>';
            }
            
            // Display gallery images
            $gallery_ids = $product->get_gallery_image_ids();
            if ($gallery_ids) {
                echo '<div class="gallery-thumbs grid grid-cols-4 gap-2">';
                foreach ($gallery_ids as $gallery_id) {
                    echo wp_get_attachment_image($gallery_id, 'thumbnail', false, ['class' => 'w-full h-20 object-cover rounded cursor-pointer hover:border-orange-500 border-2 border-transparent']);
                }
                echo '</div>';
            }
            ?>
        </div>

        <div class="quick-view-details">
            <h2 class="text-2xl font-bold mb-2"><?php the_title(); ?></h2>
            
            <div class="price mb-4 text-xl font-bold text-orange-500">
                <?php echo $product->get_price_html(); ?>
            </div>
            
            <div class="rating mb-4">
                <?php woocommerce_template_loop_rating(); ?>
            </div>
            
            <div class="description mb-4 prose">
                <?php echo apply_filters('the_content', $product->get_short_description()); ?>
            </div>
            
            <div class="actions">
                <?php 
                woocommerce_template_loop_add_to_cart([
                    'class' => 'single_add_to_cart_button button alt bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg'
                ]); 
                ?>
                <a href="<?php the_permalink(); ?>" class="inline-block mt-4 text-orange-500 hover:underline">
                    <?php _e('View full details', 'spikezone'); ?>
                </a>
            </div>
        </div>
    </div>
</div>