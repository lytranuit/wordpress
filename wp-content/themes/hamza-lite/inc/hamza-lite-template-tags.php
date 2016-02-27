<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Hamza Lite
 */
if (!function_exists('hamza_lite_paging_nav')) :

    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @return void
     */
    function hamza_lite_paging_nav() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Posts navigation', 'hamza-lite'); ?></h1>
            <div class="nav-links clearfix">

                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'hamza-lite')); ?></div>
                <?php endif; ?>

                <?php if (get_previous_posts_link()) : ?>
                    <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'hamza-lite')); ?></div>
                <?php endif; ?>

            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <?php
    }

endif;

if (!function_exists('hamza_lite_num_nav')) :

    /**
     * Display navigation with page number along with next/previous set of posts when applicable.
     *
     * @return void
     */
    function hamza_lite_num_nav() {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }

        global $wp_query;
        $hamza_lite_big = 999999999; // need an unlikely integer
        $hamza_lite_links = paginate_links(array(
            'base' => str_replace($hamza_lite_big, '%#%', esc_url(get_pagenum_link($hamza_lite_big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'show_all' => true
                ));
        ?>


        <nav class="navigation paging-navigation" role="navigation">		
            <div class="num-nav-links clearfix">
        <?php echo $hamza_lite_links; ?>        
            </div>
            <div class="nav-links clearfix">

                <?php if (get_previous_posts_link()) : ?>
                    <div class="nav-previous"><?php previous_posts_link(__('<span class="meta-nav">&rarr;</span>', 'hamza-lite')); ?></div>
                <?php endif; ?>

                <?php if (get_next_posts_link()) : ?>
                    <div class="nav-next"><?php next_posts_link(__('<span class="meta-nav">&larr;</span>', 'hamza-lite')); ?></div>
        <?php endif; ?>

            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <?php
    }

endif;

if (!function_exists('hamza_lite_post_nav')) :

    /**
     * Display navigation to next/previous post when applicable.
     *
     * @return void
     */
    function hamza_lite_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $hamza_lite_previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $hamza_lite_next = get_adjacent_post(false, '', false);

        if (!$hamza_lite_next && !$hamza_lite_previous) {
            return;
        }
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e('Post navigation', 'hamza-lite'); ?></h1>
            <div class="nav-links">
        <?php
        previous_post_link('<div class="nav-previous">%link</div>', _x('<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'hamza-lite'));
        next_post_link('<div class="nav-next">%link</div>', _x('%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'hamza-lite'));
        ?>
            </div><!-- .nav-links -->
        </nav><!-- .navigation -->
        <?php
    }

endif;

if (!function_exists('hamza_lite_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function hamza_lite_posted_on() {
        $hamza_lite_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $hamza_lite_time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
        }

        $hamza_lite_time_string = sprintf($hamza_lite_time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );

        printf(__('<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'hamza-lite'), sprintf('<a href="%1$s" rel="bookmark">%2$s</a>', esc_url(get_permalink()), $hamza_lite_time_string
                ), sprintf('<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
                )
        );
    }

endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function hamza_lite_categorized_blog() {
    if (false === ( $hamza_lite_all_the_cool_cats = get_transient('all_the_cool_cats') )) {
        // Create an array of all the categories that are attached to posts.
        $hamza_lite_all_the_cool_cats = get_categories(array(
            'hide_empty' => 1,
                ));

        // Count the number of categories that are attached to the posts.
        $hamza_lite_all_the_cool_cats = count($hamza_lite_all_the_cool_cats);

        set_transient('all_the_cool_cats', $hamza_lite_all_the_cool_cats);
    }

    if ('1' != $hamza_lite_all_the_cool_cats) {
        // This blog has more than 1 category so hamza_lite_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so hamza_lite_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in hamza_lite_categorized_blog.
 */
function hamza_lite_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient('all_the_cool_cats');
}

add_action('edit_category', 'hamza_lite_category_transient_flusher');
add_action('save_post', 'hamza_lite_category_transient_flusher');
