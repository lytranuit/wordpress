<?php
/**
 * @package Hamza Lite
 */
?>
<?php
global $post;
$hamza_lite_cat_blog = get_theme_mod('hamza_lite_blog_category');
$hamza_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'hamza-lite-blog-image', false);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="entry-thumbnail">
            <img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
        </div>
    <?php } ?>

    <header class="entry-header clearfix">
        <?php if (has_category($hamza_lite_cat_blog) && !empty($hamza_lite_cat_blog)) { ?>
            <figure class="blog-author-img">
                <?php echo get_avatar(get_the_author_meta('ID'), 62); ?>
            </figure>
        <?php } ?>

        <div class="entry-meta">
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <?php if (has_category($hamza_lite_cat_blog) && !empty($hamza_lite_cat_blog)) { ?>

                <div class="blog-date">
                    <?php echo get_the_date('F n Y'); ?>
                </div>

                <div class="comment-count">
                    <?php printf(_nx('1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'hamza-lite'), number_format_i18n(get_comments_number())); ?> 
                </div>

                <?php
                /* translators: used between list items, there is a space after the comma */
                $hamza_lite_tags_list = get_the_tag_list('', __(', ', 'hamza-lite'));
                if ($hamza_lite_tags_list) :
                    ?>
                    <div class="tags-links">
                        <?php printf(__('%1$s', 'hamza-lite'), $hamza_lite_tags_list); ?>
                    </div>
                <?php endif; // End if $tags_list ?>

                <?php if (function_exists('echo_views')) { ?>
                    <div class="post-view-count">
                        <?php echo_views(get_the_ID()); ?>                
                        <?php echo __('Views', 'hamza-lite'); ?>
                    </div>
                <?php } ?>

                <div class="by-line">
                    <?php echo __('By ', 'hamza-lite');
                    the_author_posts_link();
                    ?>
                </div>

<?php } ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->


    <div class="entry-content">
<?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
<?php edit_post_link(__('Edit', 'hamza-lite'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
