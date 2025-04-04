<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="flex">
        <label class="sr-only"><?php _e('Search for:', 'spikezone'); ?></label>
        <input type="search" 
               class="flex-grow px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-orange-500" 
               placeholder="<?php esc_attr_e('Search...', 'spikezone'); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" />
        <button type="submit" 
                class="bg-orange-500 text-white px-4 py-2 rounded-r-lg hover:bg-orange-600 transition duration-300">
            <i class="fas fa-search"></i>
            <span class="sr-only"><?php esc_attr_e('Search', 'spikezone'); ?></span>
        </button>
    </div>
</form>