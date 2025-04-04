<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="font-bold text-xl mb-4"><?php bloginfo('name'); ?></h3>
                <p class="text-gray-400">Premium volleyball shoes for players at all levels.</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer',
                'container' => false,
                'items_wrap' => '<div><h4 class="font-bold mb-4">' . __('Shop', 'spikezone') . '</h4><ul class="space-y-2">%3$s</ul></div>',
                'fallback_cb' => false
            ));
            ?>
            <div>
                <h4 class="font-bold mb-4"><?php _e('Help', 'spikezone'); ?></h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white"><?php _e('FAQs', 'spikezone'); ?></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white"><?php _e('Shipping', 'spikezone'); ?></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white"><?php _e('Returns', 'spikezone'); ?></a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white"><?php _e('Size Guide', 'spikezone'); ?></a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4"><?php _e('Contact', 'spikezone'); ?></h4>
                <ul class="space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                        <span class="text-gray-400">123 Court Street, Sports City</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt mr-2 text-gray-400"></i>
                        <span class="text-gray-400">(555) 123-4567</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-2 text-gray-400"></i>
                        <span class="text-gray-400"><?php echo antispambot('info@spikezone.com'); ?></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'spikezone'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>