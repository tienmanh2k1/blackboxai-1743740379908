<?php
/**
 * The template for displaying single posts
 *
 * @package SpikeZone
 */

get_header();
?>

<main class="container mx-auto px-6 py-8">
    <article <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
        <?php if (has_post_thumbnail()) : ?>
            <div class="h-64 md:h-96 overflow-hidden">
                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
            </div>
        <?php endif; ?>

        <div class="p-6 md:p-8">
            <header class="mb-6">
                <h1 class="text-3xl font-bold"><?php the_title(); ?></h1>
                <div class="flex items-center text-sm text-gray-500 mt-2">
                    <span class="mr-4">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        <?php echo get_the_date(); ?>
                    </span>
                    <span>
                        <i class="fas fa-user mr-1"></i>
                        <?php the_author(); ?>
                    </span>
                </div>
            </header>

            <div class="prose max-w-none">
                <?php the_content(); ?>
            </div>

            <footer class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex flex-wrap gap-2 mb-4">
                    <?php
                    $categories = get_the_category();
                    if ($categories) {
                        foreach ($categories as $category) {
                            echo '<a href="' . get_category_link($category->term_id) . '" class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm hover:bg-orange-500 hover:text-white">' . $category->name . '</a>';
                        }
                    }
                    ?>
                </div>

                <?php
                // Post navigation
                the_post_navigation([
                    'prev_text' => '<span class="mr-2"><i class="fas fa-arrow-left"></i></span> <span class="hidden md:inline">' . __('Previous Post', 'spikezone') . '</span>',
                    'next_text' => '<span class="hidden md:inline">' . __('Next Post', 'spikezone') . '</span> <span class="ml-2"><i class="fas fa-arrow-right"></i></span>',
                ]);

                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </footer>
        </div>
    </article>
</main>

<?php
get_footer();