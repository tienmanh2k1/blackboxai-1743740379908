jQuery(document).ready(function($) {
    // Open quick view modal
    $(document).on('click', '.quick-view-btn', function(e) {
        e.preventDefault();
        var $button = $(this);
        $button.addClass('opacity-50 pointer-events-none');
        var product_id = $button.data('product-id');
        
        // Show loading overlay
        var $overlay = $('<div class="quick-view-overlay fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"><div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-orange-500"></div></div>');
        $('body').append($overlay);
        
        // AJAX request
        $.ajax({
            url: spikezone_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'spikezone_quick_view',
                product_id: product_id,
                security: spikezone_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    var $modal = $('<div class="quick-view-modal fixed inset-0 z-50 overflow-y-auto p-4">' + 
                                  '<div class="quick-view-container relative bg-white rounded-lg shadow-xl max-w-4xl mx-auto my-8">' +
                                  '<button class="quick-view-close absolute top-4 right-4 text-2xl text-gray-500 hover:text-orange-500 z-10">×</button>' +
                                  response.data + '</div></div>');
                    
                    $('body').append($modal);
                    
                    // Initialize product gallery
                    if (typeof $.fn.wc_product_gallery === 'function') {
                        $('.quick-view-gallery').wc_product_gallery();
                    }
                    
                    // Initialize variations if needed
                    if (typeof $.fn.wc_variation_form === 'function') {
                        $('.variations_form').wc_variation_form();
                    }
                    
                    // Prevent body scroll when modal is open
                    $('body').css('overflow', 'hidden');
                } else {
                    alert(response.data);
                }
            },
            error: function(xhr, status, error) {
                alert('Error: ' + error);
            },
            complete: function() {
                $overlay.remove();
                $button.removeClass('opacity-50 pointer-events-none');
            }
        });
    });
    
    // Close quick view modal
    $(document).on('click', '.quick-view-close, .quick-view-overlay', function(e) {
        e.preventDefault();
        closeQuickView();
    });
    
    // Close with ESC key
    $(document).keyup(function(e) {
        if (e.key === "Escape") {
            closeQuickView();
        }
    });
    
    // Prevent modal close when clicking inside
    $(document).on('click', '.quick-view-container', function(e) {
        e.stopPropagation();
    });
    
    function closeQuickView() {
        $('.quick-view-modal, .quick-view-overlay').remove();
        $('body').css('overflow', '');
    }
});