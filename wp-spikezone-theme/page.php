<?php
/**
 * The template for displaying all pages
 *
 * @package SpikeZone
 */

get_header();
?>

<main class="container mx-auto px-6 py-8">
    <article <?php post_class('bg-white rounded-lg shadow-md p-6'); ?>>
        <header class="mb-6">
            <h1 class="text-3xl font-bold"><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <div class="mt-4 rounded-lg overflow-hidden">
                    <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="prose max-w-none">
            <?php the_content(); ?>
        </div>

        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </article>
</main>

<?php
get_footer();