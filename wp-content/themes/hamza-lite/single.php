<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Hamza Lite
 */
get_header();
global $post;
//echo "<pre>";
//print_r(wp_get_object_terms($post->ID,'khu-vuc'));
$hamza_lite_post_class = get_post_meta($post->ID, 'hamza_lite_sidebar_layout', true);
?>

<div class="ak-container">
    <?php if ($hamza_lite_post_class == 'both-sidebar') { ?>
        <div id="primary-wrap" class="clearfix"> 
        <?php }
        ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/content', 'single'); ?>

                    <?php // hamza_lite_post_nav(); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || '0' != get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->
        </div><!-- #primary -->

        <?php
        get_sidebar('left');

        if ($hamza_lite_post_class == 'both-sidebar') {
            ?>
        </div> 
    <?php
    }

    get_sidebar('right');
    ?>
</div>

<?php get_footer(); ?>