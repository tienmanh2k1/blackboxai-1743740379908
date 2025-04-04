<?php
/**
 * Search Results Template
 *
 * @package SpikeZone
 */

get_header();
?>

<main class="container mx-auto px-6 py-8">
    <header class="mb-8">
        <h1 class="text-3xl font-bold">
            <?php
            printf(
                __('Search Results for: %s', 'spikezone'),
                '<span class="text-orange-500">' . get_search_query() . '</span>'
            );
            ?>
        </h1>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="h-48 overflow-hidden">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <h2 class="text-xl font-bold mb-2">
                            <a href="<?php the_permalink(); ?>" class="hover:text-orange-500">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="text-sm text-gray-500 mb-4">
                            <?php echo get_the_date(); ?> • <?php the_author(); ?>
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
        <?php else : ?>
            <div class="col-span-full bg-white p-8 rounded-lg shadow-md text-center">
                <p class="text-gray-700 mb-4"><?php _e('Sorry, but nothing matched your search terms.', 'spikezone'); ?></p>
                <p><?php _e('Please try again with some different keywords.', 'spikezone'); ?></p>
                <div class="mt-6 max-w-md mx-auto">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-8">
        <?php the_posts_pagination([
            'mid_size'  => 2,
            'prev_text' => __('&larr; Previous', 'spikezone'),
            'next_text' => __('Next &rarr;', 'spikezone'),
        ]); ?>
    </div>
</main>

<?php
get_footer();