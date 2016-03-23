<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hamza Lite
 */
get_header();
?>
<section class="ak-container" id="ak-blog-post">
    <div id="primary" class="content-area">
        <main id="main-home" class="home-main" role="main">
            <div class="tinnoibat row" style="background: white;
                 padding: 10px;
                 margin-bottom: 30px;
                 box-shadow: #848484 0px 0px 10px -2px;
                 border-radius: 2px;">
                <h2 class="widget-title">Bất động sản nổi bật</h2>
                <?php
                $args = array(
                    'post_type' => 'dang-tin',
                    'tax_query' => array(//(array) - Lấy bài viết dựa theo taxonomy
                        array(
                            'taxonomy' => 'loai-tin',
                            'field' => 'slug',
                            'terms' => array('tin-noi-bat'),
                            'include_children' => false,
                            'operator' => 'IN'
                        )
                    )
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
                        ?>

                    <?php endwhile; ?>

                    <?php hamza_lite_paging_nav(); ?>

                <?php else : ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="tinmoi row" style="background: white;
                 padding: 10px;
                 margin-bottom: 10px;
                 box-shadow: #848484 0px 0px 10px -2px;">
                <h2 class="widget-title">Bất động sản mới</h2>
                <?php
                $args = array(
                    'post_type' => 'dang-tin'
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part('template-parts/content', get_post_format());
                        ?>

                    <?php endwhile; ?>

                    <?php hamza_lite_paging_nav(); ?>

                <?php else : ?>


                <?php endif; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar('right'); ?>
</section>
<script>
    jQuery(function ($) {
        $('.home article.hentry a.title-entry').dotdotdot({
            /*	The text to add as ellipsis. */
            ellipsis: '... ',
            /*	How to cut off the text/html: 'word'/'letter'/'children' */
            wrap: 'word',
            /*	Wrap-option fallback to 'letter' for long words */
            fallbackToLetter: true,
            /*	jQuery-selector for the element to keep and put after the ellipsis. */
            after: null,
            /*	Whether to update the ellipsis: true/'window' */
            watch: false,
            /*	Optionally set a max-height, can be a number or function.
             If null, the height will be measured. */
            height: 50,
            /*	Deviation for the height-option. */
            tolerance: 0
        });
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
        $(document).animateScroll();
    });
</script>
<?php get_footer(); ?>
