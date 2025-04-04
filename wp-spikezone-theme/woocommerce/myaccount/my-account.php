<?php
/**
 * My Account Template
 *
 * @package SpikeZone
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<main class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6"><?php esc_html_e('My Account', 'spikezone'); ?></h1>
    
    <?php
    do_action('woocommerce_before_account_navigation');
    ?>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <nav class="woocommerce-MyAccount-navigation bg-white p-4 rounded-lg shadow-md">
            <ul class="space-y-2">
                <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                    <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="hover:text-orange-500">
                            <?php echo esc_html($label); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="woocommerce-MyAccount-content md:col-span-3 bg-white p-6 rounded-lg shadow-md">
            <?php
            do_action('woocommerce_account_content');
            ?>
        </div>
    </div>
</main>

<?php
get_footer('shop');