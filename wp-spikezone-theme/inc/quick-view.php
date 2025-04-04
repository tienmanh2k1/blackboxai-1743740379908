<?php
/**
 * Quick View AJAX Handler
 *
 * @package SpikeZone
 */

defined('ABSPATH') || exit;

// Register AJAX actions
add_action('wp_ajax_spikezone_quick_view', 'spikezone_quick_view');
add_action('wp_ajax_nopriv_spikezone_quick_view', 'spikezone_quick_view');

function spikezone_quick_view() {
    // Verify nonce for security
    if (!check_ajax_referer('spikezone_nonce', 'security', false)) {
        wp_send_json_error('Invalid nonce');
        wp_die();
    }

    if (!isset($_POST['product_id'])) {
        wp_send_json_error('No product ID provided');
        wp_die();
    }

    $product_id = absint($_POST['product_id']);
    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error('Product not found');
        wp_die();
    }

    // Set up global product data
    global $post;
    $post = get_post($product_id);
    setup_postdata($post);

    ob_start();
    wc_get_template('content-quick-view.php');
    $html = ob_get_clean();

    wp_send_json_success($html);
    wp_die();
}

// Enqueue scripts and localize data
add_action('wp_enqueue_scripts', 'spikezone_quick_view_scripts');
function spikezone_quick_view_scripts() {
    wp_enqueue_script(
        'spikezone-quick-view', 
        get_template_directory_uri() . '/js/quick-view.js', 
        array('jquery', 'wc-add-to-cart-variation'), 
        filemtime(get_template_directory() . '/js/quick-view.js'), 
        true
    );

    wp_localize_script('spikezone-quick-view', 'spikezone_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('spikezone_nonce')
    ));
}

// Add quick view button to products
add_action('woocommerce_after_shop_loop_item', 'spikezone_add_quick_view_button', 15);
function spikezone_add_quick_view_button() {
    global $product;
    echo '<button class="quick-view-btn mt-2 text-sm text-orange-500 hover:text-orange-700 transition duration-300" 
                 data-product-id="' . esc_attr($product->get_id()) . '">
            <i class="fas fa-eye mr-1"></i> ' . esc_html__('Quick View', 'spikezone') . '
          </button>';
}

// Add quick view modal styles
add_action('wp_head', 'spikezone_quick_view_styles');
function spikezone_quick_view_styles() {
    echo '<style>
    .quick-view-modal {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        background-color: rgba(0,0,0,0.7);
    }
    .quick-view-container {
        max-width: 900px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
    }
    .quick-view-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        font-size: 1.5rem;
        cursor: pointer;
        color: #333;
    }
    </style>';
}