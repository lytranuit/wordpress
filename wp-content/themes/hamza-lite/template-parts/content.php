<?php
/**
 * @package Hamza Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2><?php the_title(); ?></h2>

        <?php if ('post' == get_post_type()) : ?>
            <div class="entry-meta">
                <?php hamza_lite_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if (is_search()) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else : ?>
        <div class="entry-content">
            <?php if (has_post_thumbnail()) { ?>
                <div class="entry-thumbnail">
                    <?php the_post_thumbnail('hamza-lite-featured-thumbnail'); ?>
                </div>
            <?php } ?>
            <div class="entry-exrecpt <?php if (!has_post_thumbnail()) {
            echo "full-width";
        } ?>">
                <div class="short-content clearfix">
                    <?php
                    if (is_home()) {
                        the_excerpt();
                    } else {
                        echo hamza_lite_excerpt(get_the_content(), 380);
                    }
                    ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="bttn"><?php _e('More', 'hamza-lite') ?></a>
                <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'hamza-lite'),
                    'after' => '</div>',
                ));
                ?>
            </div>
        </div><!-- .entry-content -->
        <?php endif; ?>

    <footer class="entry-footer">
        <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
            <?php
            /* translators: used between list items, there is a space after the comma */
            $hamza_lite_categories_list = get_the_category_list(__(', ', 'hamza-lite'));
            if ($hamza_lite_categories_list && hamza_lite_categorized_blog()) :
                ?>
                <span class="cat-links">
                <?php printf(__('Posted in %1$s', 'hamza-lite'), $hamza_lite_categories_list); ?>
                </span>
            <?php endif; // End if categories ?>

            <?php
            /* translators: used between list items, there is a space after the comma */
            $hamza_lite_tags_list = get_the_tag_list('', __(', ', 'hamza-lite'));
            if ($hamza_lite_tags_list) :
                ?>
                <span class="tags-links">
                <?php printf(__('Tagged %1$s', 'hamza-lite'), $hamza_lite_tags_list); ?>
                </span>
    <?php endif; // End if $tags_list  ?>
<?php endif; // End if 'post' == get_post_type()  ?>

    </footer><!-- .entry-footer -->
</article><!-- #post-## -->