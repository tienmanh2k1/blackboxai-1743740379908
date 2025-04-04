<?php
/**
 * 404 Error Template
 *
 * @package SpikeZone
 */

get_header();
?>

<main class="container mx-auto px-6 py-16 text-center">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8 md:p-12">
        <div class="text-6xl font-bold text-orange-500 mb-4">404</div>
        <h1 class="text-3xl font-bold mb-4"><?php _e('Page Not Found', 'spikezone'); ?></h1>
        <p class="text-gray-700 mb-8">
            <?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'spikezone'); ?>
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>" 
               class="bg-orange-500 text-white px-6 py-3 rounded-lg font-bold hover:bg-orange-600 transition duration-300">
                <?php _e('Return Home', 'spikezone'); ?>
            </a>
            <a href="<?php echo esc_url(home_url('/shop')); ?>" 
               class="bg-gray-800 text-white px-6 py-3 rounded-lg font-bold hover:bg-gray-700 transition duration-300">
                <?php _e('Visit Shop', 'spikezone'); ?>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();