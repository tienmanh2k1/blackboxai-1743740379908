<?php
/**
 * Checkout Template
 *
 * @package SpikeZone
 */

defined('ABSPATH') || exit;

get_header('shop');
?>

<main class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>
    
    <?php
    do_action('woocommerce_before_checkout_form', $checkout);

    // If checkout registration is disabled and not logged in, show notice
    if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
        echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'spikezone')));
        return;
    }
    ?>

    <form name="checkout" method="post" class="checkout woocommerce-checkout grid grid-cols-1 lg:grid-cols-2 gap-8" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

        <div class="bg-white p-6 rounded-lg shadow-md">
            <?php if ($checkout->get_checkout_fields()) : ?>
                <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                <div class="col2-set" id="customer_details">
                    <div class="col-1">
                        <?php do_action('woocommerce_checkout_billing'); ?>
                    </div>

                    <div class="col-2">
                        <?php do_action('woocommerce_checkout_shipping'); ?>
                    </div>
                </div>

                <?php do_action('woocommerce_checkout_after_customer_details'); ?>
            <?php endif; ?>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 id="order_review_heading" class="text-xl font-bold mb-4"><?php esc_html_e('Your order', 'spikezone'); ?></h3>

            <?php do_action('woocommerce_checkout_before_order_review'); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
                <?php do_action('woocommerce_checkout_order_review'); ?>
            </div>

            <?php do_action('woocommerce_checkout_after_order_review'); ?>
        </div>

    </form>

    <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
</main>

<?php
get_footer('shop');