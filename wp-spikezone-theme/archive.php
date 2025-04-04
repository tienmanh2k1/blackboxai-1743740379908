<?php
/**
 * Archive template for categories, tags, etc.
 *
 * @package SpikeZone
 */

get_header();
?>

<main class="container mx-auto px-6 py-8">
    <header class="mb-8">
        <h1 class="text-3xl font-bold">
            <?php
            if (is_category()) {
                printf(__('Category: %s', 'spikezone'), single_cat_title('', false));
            } elseif (is_tag()) {
                printf(__('Tag: %s', 'spikezone'), single_tag_title('', false));
            } elseif (is_author()) {
                printf(__('Author: %s', 'spikezone'), get_the_author());
            } elseif (is_date()) {
                if (is_day()) {
                    printf(__('Day: %s', 'spikezone'), get_the_date());
                } elseif (is_month()) {
                    printf(__('Month: %s', 'spikezone'), get_the_date('F Y'));
                } elseif (is_year()) {
                    printf(__('Year: %s', 'spikezone'), get_the_date('Y'));
                }
            }
            ?>
        </h1>
        
        <?php
        if (is_category()) {
            $description = category_description();
            if ($description) {
                echo '<div class="prose max-w-none mt-4">' . $description . '</div>';
            }
        }
        ?>
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
                <p class="text-gray-700"><?php _e('No posts found in this archive.', 'spikezone'); ?></p>
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