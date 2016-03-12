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

                    <?php get_template_part('template-parts/content', 'dang-tin'); ?>

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
<script>
    jQuery(function ($) {
        $('.dtich span').autoNumeric("init", {
            aSep: ' ',
            aDec: ',',
            pSign: 's',
            vMin: '0.00',
            vMax: '9999999999.99',
            mDec: 0,
            aSign: ' m2'
        });
        $('.gia span').each(function () {
            var value = $(this).text();
            if (value != 0) {
                console.log(value);
                if (value < 1000) {
                    $(this).text(value + ' triệu');
                } else {
                    $(this).text(parseFloat(value) / 1000 + ' tỉ');
                }
            } else {
                $(this).text('0 triệu');
            }
        });
        $('.dtich span').each(function () {
            var value = $(this).text();
            $(this).text(value.substring(1, value.length));
        });
    });
</script>
<?php get_footer(); ?>