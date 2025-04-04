<?php
/**
 * The main template file
 *
 * @package SpikeZone
 */

get_header();
?>

<main class="container mx-auto px-6 py-8">
    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="h-48 overflow-hidden">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-orange-500">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="text-sm text-gray-500 mb-4">
                            <?php the_date(); ?> • <?php the_author(); ?>
                        </div>
                        <div class="text-gray-700 mb-4">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-orange-500 hover:underline">
                            <?php _e('Read More', 'spikezone'); ?>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-8">
            <?php the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => __('&larr; Previous', 'spikezone'),
                'next_text' => __('Next &rarr;', 'spikezone'),
            ]); ?>
        </div>
    <?php else : ?>
        <div class="bg-white p-8 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-bold mb-4"><?php _e('Nothing Found', 'spikezone'); ?></h2>
            <p class="text-gray-700"><?php _e('Sorry, but nothing matched your search terms.', 'spikezone'); ?></p>
        </div>
    <?php endif; ?>
</main>

<?php
get_footer();