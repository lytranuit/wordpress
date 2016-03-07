<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Hamza Lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function hamza_lite_page_menu_args($hamza_lite_args) {
    $hamza_lite_args['show_home'] = true;
    return $hamza_lite_args;
}

add_filter('wp_page_menu_args', 'hamza_lite_page_menu_args');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hamza_lite_body_classes($hamza_lite_classes) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $hamza_lite_classes[] = 'group-blog';
    }

    return $hamza_lite_classes;
}

add_filter('body_class', 'hamza_lite_body_classes');

if (version_compare($GLOBALS['wp_version'], '4.1', '<')) :

    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function hamza_lite_wp_title($hamza_lite_title, $hamza_lite_sep) {
        if (is_feed()) {
            return $hamza_lite_title;
        }

        global $page, $paged;

        // Add the blog name.
        $hamza_lite_title .= get_bloginfo('name', 'display');

        // Add the blog description for the home/front page.
        $hamza_lite_site_description = get_bloginfo('description', 'display');
        if ($hamza_lite_site_description && ( is_home() || is_front_page() )) {
            $hamza_lite_title .= " $hamza_lite_sep $hamza_lite_site_description";
        }

        // Add a page number if necessary.
        if (( $paged >= 2 || $page >= 2 ) && !is_404()) {
            $hamza_lite_title .= " $sep " . sprintf(esc_html__('Page %s', 'hamza-lite'), max($paged, $page));
        }

        return $hamza_lite_title;
    }

    add_filter('wp_title', 'hamza_lite_wp_title', 10, 2);
endif;

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function hamza_lite_setup_author() {
    global $wp_query;

    if ($wp_query->is_author() && isset($wp_query->post)) {
        $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
    }
}

add_action('wp', 'hamza_lite_setup_author');

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function hamza_lite_widgets_init() {
    register_sidebar(array(
        'name' => __('Right Sidebar', 'hamza-lite'),
        'id' => 'right-sidebar',
        'description' => __('Display items in the Right Sidebar of the inner pages', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Left Sidebar', 'hamza-lite'),
        'id' => 'left-sidebar',
        'description' => __('Display items in the Left Sidebar of the inner pages', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Right Sidebar', 'hamza-lite'),
        'id' => 'right-sidebar',
        'description' => __('Display items in the Right Sidebar of the inner pages', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Shop Sidebar', 'hamza-lite'),
        'id' => 'shop-sidebar',
        'description' => __('Display items in the Right Sidebar of the inner pages for Woocommerce', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Footer One', 'hamza-lite'),
        'id' => 'footer-1',
        'description' => __('Display items in First Footer Area', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Footer Two', 'hamza-lite'),
        'id' => 'footer-2',
        'description' => __('Display items in Second Footer Area', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Footer Three', 'hamza-lite'),
        'id' => 'footer-3',
        'description' => __('Display items in Third Footer Area', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Footer Four', 'hamza-lite'),
        'id' => 'footer-4',
        'description' => __('Display items in Fourth Footer Area', 'hamza-lite'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'hamza_lite_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function hamza_lite_scripts() {
    // Add custom fonts, for typography
    wp_enqueue_style('bootstrap.css', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('hamza-lite-font', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('hamza-lite-google-fonts', "https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900");
    wp_enqueue_style('hamza-lite-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('hamza-lite-nivo-lightbox', get_template_directory_uri() . '/css/nivo-lightbox.css');
    wp_enqueue_style('hamza-lite-bxslider-style', get_template_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('selector_css', get_template_directory_uri() . '/css/bootstrap-select.min.css');
    wp_enqueue_style('hamza-lite-style', get_stylesheet_uri(), array(), '1.0');

    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.0.16', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '1.0.16', true);
    wp_enqueue_script('hamza-lite-bx-slider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '4.1', true);
    wp_enqueue_script('hamza-lite-nivo-lightbox', get_template_directory_uri() . '/js/nivo-lightbox.min.js', array('jquery'), '2.1', true);
    wp_enqueue_script('hamza-lite-jquery-actual', get_template_directory_uri() . '/js/jquery.actual.min.js', array('jquery'), '1.0.16', true);
    wp_enqueue_script('clamp', get_template_directory_uri() . '/js/clamp.js', array('jquery'), '1.0.16', true);
    wp_enqueue_script('hamza-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/animate-scroll-master/TweenMax.js', array(), '1.0.16', true);
    wp_enqueue_script('animate-scroll', get_template_directory_uri() . '/js/animate-scroll-master/animate-scroll.js', array(), '1.0.16', true);
    wp_enqueue_script('selector', get_template_directory_uri() . '/js/bootstrap-select.js', array('jquery', 'bootstrap'), '1.0.16', true);

    wp_enqueue_script('autonumeric', get_template_directory_uri() . '/js/autoNumeric-min.js', array('jquery'), '1.0', true);
    wp_register_script('hamza-lite-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.1', true);

    $hamza_lite_slider_control_option = get_theme_mod('hamza_lite_slider_control_option', 'true');
    $hamza_lite_slider_transition = get_theme_mod('hamza_lite_slider_transition', 'horizontal');
    $hamza_lite_slider_auto_transition = get_theme_mod('hamza_lite_slider_auto_transition', 'true');
    $hamza_lite_slider_speed = get_theme_mod('hamza_lite_slider_speed', '500');
    $hamza_lite_slider_pause = get_theme_mod('hamza_lite_slider_pause', '4000');
    empty($hamza_lite_slider_pause) ? ($e = '4000') : ($e = absint($hamza_lite_slider_pause));

    $hamza_lite_translation_array = array(
        'mode' => esc_attr($hamza_lite_slider_transition),
        'speed' => absint($hamza_lite_slider_speed),
        'option' => esc_attr($hamza_lite_slider_control_option),
        'auto' => esc_attr($hamza_lite_slider_auto_transition),
        'pause' => $e
    );

    wp_localize_script('hamza-lite-custom', 'hamza_lite_data', $hamza_lite_translation_array);

    wp_enqueue_script('hamza-lite-custom');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    /**
     * Loads up responsive css if it is not disabled
     */
    if (get_theme_mod('hamza_lite_disable_responsive_design') != 1) {
        wp_enqueue_style('hamza-lite-responsive', get_template_directory_uri() . '/css/responsive.css');
    }
}

add_action('wp_enqueue_scripts', 'hamza_lite_scripts');

function hamza_lite_social_cb() {
    $hamza_lite_facebook = get_theme_mod('hamza_lite_facebook');
    $hamza_lite_twitter = get_theme_mod('hamza_lite_twitter');
    $hamza_lite_google_plus = get_theme_mod('hamza_lite_google_plus');
    $hamza_lite_linkedin = get_theme_mod('hamza_lite_linkedin');
    $hamza_lite_youtube = get_theme_mod('hamza_lite_youtube');
    ?>
    <div class="socials">
        <?php if (!empty($hamza_lite_facebook)) { ?>
            <a href="<?php echo esc_url($hamza_lite_facebook); ?>" class="facebook" title="<?php _e('Facebook', 'hamza-lite'); ?>" target="_blank"><span class="font-icon-social-facebook"></span></a>
        <?php } ?>

        <?php if (!empty($hamza_lite_twitter)) { ?>
            <a href="<?php echo esc_url($hamza_lite_twitter); ?>" class="twitter" title="<?php _e('Twitter', 'hamza-lite'); ?>" target="_blank"><span class="font-icon-social-twitter"></span></a>
        <?php } ?>

        <?php if (!empty($hamza_lite_google_plus)) { ?>
            <a href="<?php echo esc_url($hamza_lite_google_plus); ?>" class="gplus" title="<?php _e('Google Plus', 'hamza-lite'); ?>" target="_blank"><span class="font-icon-social-google-plus"></span></a>
        <?php } ?>

        <?php if (!empty($hamza_lite_linkedin)) { ?>
            <a href="<?php echo esc_url($hamza_lite_linkedin); ?>" class="linkedin" title="<?php _e('Linkedin', 'hamza-lite'); ?>" target="_blank"><span class="font-icon-social-linkedin"></span></a>
        <?php } ?>

        <?php if (!empty($hamza_lite_youtube)) { ?>
            <a href="<?php echo esc_url($hamza_lite_youtube); ?>" class="youtube" title="<?php _e('Youtube', 'hamza-lite'); ?>" target="_blank"><span class="font-icon-social-youtube"></span></a>
        <?php } ?>

    </div>
    <?php
}

add_action('hamza_lite_social_links', 'hamza_lite_social_cb', 10);

function hamza_lite_logo_alignment_cb() {

    $hamza_lite_logo_alignment = get_theme_mod('hamza_lite_logo_alignment', 'left');
    if ($hamza_lite_logo_alignment == "left") {
        $hamza_lite_alignment_class = "logo-left";
    } elseif ($hamza_lite_logo_alignment == "center") {
        $hamza_lite_alignment_class = "logo-center";
    } else {
        $hamza_lite_alignment_class = "";
    }
    $hamza_lite_menu_alignment = get_theme_mod('hamza_lite_menu_alignment', 'left');
    if ($hamza_lite_menu_alignment == "right") {
        $hamza_lite_alignment_class.=" menu-right";
    } else {
        $hamza_lite_alignment_class.=" menu-left";
    }
    echo esc_attr($hamza_lite_alignment_class);
}

add_action('hamza_lite_logo_alignment', 'hamza_lite_logo_alignment_cb', 10);

function hamza_lite_excerpt($hamza_lite_content, $hamza_lite_letter_count) {
    $hamza_lite_striped_content = strip_shortcodes($hamza_lite_content);
    $hamza_lite_striped_content = strip_tags($hamza_lite_striped_content);
    $hamza_lite_excerpt = mb_substr($hamza_lite_striped_content, 0, $hamza_lite_letter_count);
    if ($hamza_lite_striped_content > $hamza_lite_excerpt) {
        $hamza_lite_excerpt .= "...";
    }
    return $hamza_lite_excerpt;
}

function hamza_lite_bxslidercb() {

    $hamza_lite_slider_type = get_theme_mod('hamza_lite_slider_type', 'single_post_slider');
    $hamza_lite_slider_one = get_theme_mod('hamza_lite_slider_one');
    $hamza_lite_slider_two = get_theme_mod('hamza_lite_slider_two');
    $hamza_lite_slider_three = get_theme_mod('hamza_lite_slider_three');
    $hamza_lite_slider_four = get_theme_mod('hamza_lite_slider_four');
    $hamza_lite_slider_category = get_theme_mod('hamza_lite_slider_category');
    $hamza_lite_slider_option = get_theme_mod('hamza_lite_slider_option', 'show');
    $hamza_lite_slider_captions = get_theme_mod('hamza_lite_slider_captions', 'show');

    if ($hamza_lite_slider_option == 'show') {
        if ((isset($hamza_lite_slider_one) && !empty($hamza_lite_slider_one)) || (isset($hamza_lite_slider_two) && !empty($hamza_lite_slider_two)) || (isset($hamza_lite_slider_three) && !empty($hamza_lite_slider_three)) || (isset($hamza_lite_slider_four) && !empty($hamza_lite_slider_four)) || (isset($hamza_lite_slider_category) && !empty($hamza_lite_slider_category))
        ) {
            if ($hamza_lite_slider_type == 'single_post_slider') {
                if (!empty($hamza_lite_slider_one) || !empty($hamza_lite_slider_two) || !empty($hamza_lite_slider_three) || !empty($hamza_lite_slider_four)) {
                    $hamza_lite_sliders = array($hamza_lite_slider_one, $hamza_lite_slider_two, $hamza_lite_slider_three, $hamza_lite_slider_four);
                    $hamza_lite_remove = array(0);
                    $hamza_lite_sliders = array_diff($hamza_lite_sliders, $hamza_lite_remove);
                    ?>
                    <div id="silder-main" class="flexslider">
                        <ul class="slides">
                            <?php
                            foreach ($hamza_lite_sliders as $hamza_lite_slider) {
                                $hamza_lite_args = array(
                                    'p' => $hamza_lite_slider,
                                    'post_type' => 'dang-tin'
                                );

                                $hamza_lite_loop = new WP_query($hamza_lite_args);
                                if ($hamza_lite_loop->have_posts()) {
                                    while ($hamza_lite_loop->have_posts()) : $hamza_lite_loop->the_post();
                                        $hamza_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'hamza-lite-slider-image', false);
                                        ?>

                                        <li data-thumb="<?php echo esc_url($hamza_lite_image[0]); ?>">
                                            <img src="<?php echo esc_url($hamza_lite_image[0]); ?>" />

                                            <?php if ($hamza_lite_slider_captions == 'show'): ?>
                                                <p class="flex-caption"><?php echo hamza_lite_get_title(); ?></p>
                                                <!--                                                <div class="slider-caption">
                                                                                                    <div class="ak-container">
                                                                                                        <div class="slider-caption-container">
                                                                                                            <p class="caption-title <?php echo hamza_lite_title_class(); ?>"><?php echo hamza_lite_get_title(); ?></p>
                                                                                                            <div class="caption-description"><?php the_content(); ?></div>
                                                                                                            <a href="<?php the_permalink(); ?>"><?php _e('Read More', 'hamza-lite'); ?></a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>-->
                                            <?php endif; ?>

                                        </li>
                                        <?php
                                    endwhile;
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
            }elseif ($hamza_lite_slider_type == 'cat_post_slider') {
                ?>
                <div class="bx-slider">
                    <?php
                    $hamza_lite_loop = new WP_Query(array(
                        'cat' => $hamza_lite_slider_category,
                        'posts_per_page' => -1
                    ));
                    if ($hamza_lite_loop->have_posts()) {
                        while ($hamza_lite_loop->have_posts()) : $hamza_lite_loop->the_post();
                            $hamza_lite_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'hamza-lite-slider-image', false);
                            ?>
                            <div class="slides">

                                <img src="<?php echo esc_url($hamza_lite_image[0]); ?>" />

                                <?php if ($hamza_lite_slider_captions == 'show'): ?>
                                    <div class="slider-caption">
                                        <div class="ak-container">
                                            <div class="slider-caption-container">
                                                <h1 class="caption-title <?php echo hamza_lite_title_class(); ?>"><?php echo hamza_lite_get_title(); ?></h1>
                                                <div class="caption-description"><?php the_content(); ?></div>
                                                <a href="<?php the_permalink(); ?>"><?php _e('Read More', 'hamza-lite'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <?php
                        endwhile;
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <?php
            }
        }
    }
}

add_action('hamza_lite_bxslider', 'hamza_lite_bxslidercb', 10);

function hamza_lite_layout_class($hamza_lite_classes) {
    global $post;
    if (is_404()) {
        $hamza_lite_classes[] = ' ';
    } elseif (is_singular()) {
        $hamza_lite_post_class = get_post_meta($post->ID, 'hamza_lite_sidebar_layout', true);
        $hamza_lite_classes[] = $hamza_lite_post_class;
    } else {
        $hamza_lite_classes[] = 'right-sidebar';
    }
    return $hamza_lite_classes;
}

add_filter('body_class', 'hamza_lite_layout_class');

function hamza_lite_web_layout($hamza_lite_classes) {
    $hamza_lite_weblayout = get_theme_mod('hamza_lite_webpage_layout_choose', 'fullwidth');
    if ($hamza_lite_weblayout == 'boxed') {
        $hamza_lite_classes[] = 'boxed-layout';
    }
    return $hamza_lite_classes;
}

add_filter('body_class', 'hamza_lite_web_layout');

function hamza_lite_custom_css() {
    $hamza_lite_custom_css = get_theme_mod('hamza_lite_custom_css', '');
    if (!empty($hamza_lite_custom_css)) {
        echo '<style type="text/css">';
        echo $hamza_lite_custom_css;
        echo '</style>';
    }
    $hamza_lite_custom_js = get_theme_mod('hamza_lite_custom_js');
    if (!empty($hamza_lite_custom_js)) {
        echo '<script type="text/javascript">';
        echo $hamza_lite_custom_js;
        echo '</script>';
    }
}

add_action('wp_head', 'hamza_lite_custom_css');

/** Function to list only blog category post in author archive */
function hamza_lite_exclude_cat_from_blog($hamza_lite_query) {

    $hamza_lite_blog_cat = get_theme_mod('hamza_lite_blog_category');

    if (!empty($hamza_lite_blog_cat)) {
        if (!is_admin() && $hamza_lite_query->is_main_query()) {
            if ($hamza_lite_query->is_author()) {
                $hamza_lite_query->set('category__in', array($hamza_lite_blog_cat));
            }
        }
        return $hamza_lite_query;
    }
}

add_filter('pre_get_posts', 'hamza_lite_exclude_cat_from_blog');

/** Function to add span in the title */
function hamza_lite_get_title() {
    $hamza_lite_title = get_the_title();
    $hamza_lite_e_title = '';
    $hamza_lite_arr = explode(' ', $hamza_lite_title);
    $hamza_lite_count = count($hamza_lite_arr);

    if ($hamza_lite_count > 1) {
        for ($hamza_lite_i = 0; $hamza_lite_i < $hamza_lite_count; $hamza_lite_i++) {
            if ($hamza_lite_i > 0) {
                $hamza_lite_e_title .= '<span class="st_' . $hamza_lite_i . '">';
            }
            $hamza_lite_e_title .= $hamza_lite_arr[$hamza_lite_i];
            if ($hamza_lite_i < $hamza_lite_count) {
                $hamza_lite_e_title .= ' ';
            }
            if ($hamza_lite_i > 0) {
                $hamza_lite_e_title .= '</span>';
            }
        }
        return $hamza_lite_e_title;
    } else {
        return $hamza_lite_title;
    }
}

function hamza_lite_title_class() {
    $hamza_lite_title = get_the_title();
    $hamza_lite_arr = explode(' ', $hamza_lite_title);
    $hamza_lite_count = count($hamza_lite_arr);
    if ($hamza_lite_count > 1) {
        for ($hamza_lite_i = 1; $hamza_lite_i <= $hamza_lite_count; $hamza_lite_i++) {
            $hamza_lite_return = 'title-' . $hamza_lite_i;
        }
        return $hamza_lite_return;
    }
}

//* Exclude Categories from Category Widget
function hamza_lite_custom_category_widget($hamza_lite_args) {
    $hamza_lite_cat_ids = get_theme_mod('hamza_lite_exclude_categories');
    //$exclude = "1,2"; // Category IDs to be excluded
    $hamza_lite_args["exclude"] = $hamza_lite_cat_ids;
    return $hamza_lite_args;
}

add_filter("widget_categories_args", "hamza_lite_custom_category_widget");
add_filter("widget_categories_dropdown_args", "hamza_lite_custom_category_widget");

/**
 * Truncates text without breaking HTML Code
 */
function hamza_lite_truncate($hamza_lite_text, $hamza_lite_length = 100, $hamza_lite_ending = '...', $hamza_lite_exact = true, $hamza_lite_considerHtml = false) {
    if ($hamza_lite_considerHtml) {
        // if the plain text is shorter than the maximum length, return the whole text
        if (strlen(preg_replace('/<.*?>/', '', $hamza_lite_text)) <= $hamza_lite_length) {
            return $hamza_lite_text;
        }

        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $hamza_lite_text, $hamza_lite_lines, PREG_SET_ORDER);

        $hamza_lite_total_length = strlen($hamza_lite_ending);
        $hamza_lite_open_tags = array();
        $hamza_lite_truncate = '';

        foreach ($hamza_lite_lines as $hamza_lite_line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($hamza_lite_line_matchings[1])) {
                // if it�s an �empty element� with or without xhtml-conform closing slash (f.e.)
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $hamza_lite_line_matchings[1])) {
                    // do nothing
                    // if tag is a closing tag (f.e.)
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $hamza_lite_line_matchings[1], $hamza_lite_tag_matchings)) {
                    // delete tag from $open_tags list
                    $hamza_lite_pos = array_search($hamza_lite_tag_matchings[1], $hamza_lite_open_tags);
                    if ($hamza_lite_pos !== false) {
                        unset($hamza_lite_open_tags[$hamza_lite_pos]);
                    }
                    // if tag is an opening tag (f.e. )
                } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $hamza_lite_line_matchings[1], $hamza_lite_tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($hamza_lite_open_tags, strtolower($hamza_lite_tag_matchings[1]));
                }
                // add html-tag to $truncate�d text
                $hamza_lite_truncate .= $hamza_lite_line_matchings[1];
            }

            // calculate the length of the plain text part of the line; handle entities as one character
            $hamza_lite_content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $hamza_lite_line_matchings[2]));
            if ($hamza_lite_total_length + $hamza_lite_content_length > $hamza_lite_length) {
                // the number of characters which are left
                $hamza_lite_left = $hamza_lite_length - $hamza_lite_total_length;
                $hamza_lite_entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $hamza_lite_line_matchings[2], $hamza_lite_entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($hamza_lite_entities[0] as $hamza_lite_entity) {
                        if ($hamza_lite_entity[1] + 1 - $hamza_lite_entities_length <= $hamza_lite_left) {
                            $hamza_lite_left--;
                            $hamza_lite_entities_length += strlen($hamza_lite_entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $hamza_lite_truncate .= substr($hamza_lite_line_matchings[2], 0, $hamza_lite_left + $hamza_lite_entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $hamza_lite_truncate .= $hamza_lite_line_matchings[2];
                $hamza_lite_total_length += $hamza_lite_content_length;
            }

            // if the maximum length is reached, get off the loop
            if ($hamza_lite_total_length >= $hamza_lite_length) {
                break;
            }
        }
    } else {
        if (strlen($hamza_lite_text) <= $hamza_lite_length) {
            return $hamza_lite_text;
        } else {
            $hamza_lite_truncate = substr($hamza_lite_text, 0, $hamza_lite_length - strlen($hamza_lite_ending));
        }
    }

    // if the words shouldn't be cut in the middle...
    if (!$hamza_lite_exact) {
        // ...search the last occurance of a space...
        $hamza_lite_spacepos = strrpos($hamza_lite_truncate, ' ');
        if (isset($hamza_lite_spacepos)) {
            // ...and cut the text in this position
            $hamza_lite_truncate = substr($hamza_lite_truncate, 0, $hamza_lite_spacepos);
        }
    }

    // add the defined ending to the text
    $hamza_lite_truncate .= $hamza_lite_ending;

    if ($hamza_lite_considerHtml) {
        // close all unclosed html-tags
        foreach ($hamza_lite_open_tags as $hamza_lite_tag) {
            $hamza_lite_truncate .= '';
        }
    }

    return $hamza_lite_truncate;
}

/* Add Typograpy and Google web fonts */

function hamza_lite_googlefont_cb() {
    
}

add_action('wp_head', 'hamza_lite_googlefont_cb');

/** Hook to remove default breadcrumbs of WooCommerce */
add_action('init', 'hamza_lite_remove_wc_breadcrumbs');

function hamza_lite_remove_wc_breadcrumbs() {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}

/**
 * Function for Custom Comment list
 */
function hamza_lite_theme_comment($hamza_lite_comment, $hamza_lite_args, $hamza_lite_depth) {
    $GLOBALS['comment'] = $hamza_lite_comment;
    extract($hamza_lite_args, EXTR_SKIP);

    if ('div' == $hamza_lite_args['style']) {
        $hamza_lite_tag = 'div';
        $hamza_lite_add_below = 'comment';
    } else {
        $hamza_lite_tag = 'li';
        $hamza_lite_add_below = 'div-comment';
    }
    ?>
    <<?php echo $hamza_lite_tag ?> <?php comment_class(empty($hamza_lite_args['has_children']) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ('div' != $hamza_lite_args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($hamza_lite_args['avatar_size'] != 0) echo get_avatar($hamza_lite_comment, $hamza_lite_args['avatar_size']); ?>
        </div>
        <?php if ($hamza_lite_comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'hamza-lite'); ?></em>
            <br />
        <?php endif; ?>
        <div class="coment-meta-wrap">
            <div class="author-name">
                <?php printf(__('<cite class="fn">%s</cite>', 'hamza-lite'), get_comment_author_link()); ?>
            </div>
            <div class="reply">
                <?php comment_reply_link(array_merge($hamza_lite_args, array('add_below' => $hamza_lite_add_below, 'depth' => $hamza_lite_depth, 'max_depth' => $hamza_lite_args['max_depth']))); ?>
            </div>
            <div class="comment-meta"><a href="<?php echo htmlspecialchars(get_comment_link($hamza_lite_comment->comment_ID)); ?>">
                    <?php
                    /* translators: 1: date, 2: time */
                    printf(__('%1$s %2$s', 'hamza-lite'), get_comment_date('M jS, Y'), get_comment_time());
                    ?></a><?php edit_comment_link(__('Edit', 'hamza-lite'), '  ', '');
                    ?>
            </div>    
            <?php comment_text(); ?>
        </div>



        <?php if ('div' != $hamza_lite_args['style']) : ?>
        </div>
    <?php endif; ?>
    <?php
}

/** Function to add class on comments */
function hamza_lite_comment_classes($hamza_lite_classes) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    $hamza_lite_classes[] = 'clearfix';
    return $hamza_lite_classes;
}

add_filter('comment_class', 'hamza_lite_comment_classes');

/** Function for sanitizing Hex color */
function hamza_lite_sanitize_hex_color($hamza_lite_color) {
    if ('' === $hamza_lite_color)
        return '';

    // 3 or 6 hex digits, or the empty string.
    if (preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $hamza_lite_color))
        return $hamza_lite_color;
}

/**
 * 8Degree More Themes
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Add stylesheet and JS for upsell page.
function hamza_lite_upsell_style() {
    wp_enqueue_style('upsell-style', get_template_directory_uri() . '/css/upsell.css');
}

// Add upsell page to the menu.
function hamza_lite_add_upsell() {
    $page = add_theme_page(
            __('More Themes', 'hamza-lite'), __('More Themes', 'hamza-lite'), 'administrator', 'hamza-lite-themes', 'hamza_lite_display_upsell'
    );

    add_action('admin_print_styles-' . $page, 'hamza_lite_upsell_style');
}

add_action('admin_menu', 'hamza_lite_add_upsell', 11);

// Define markup for the upsell page.
function hamza_lite_display_upsell() {

    // Set template directory uri
    $directory_uri = get_template_directory_uri();
    ?>
    <div class="wrap">
        <div class="container-fluid">
            <div id="upsell_container">  
                <div class="row">
                    <div id="upsell_header" class="col-md-12">
                        <h2>
                            <a href="http://8degreethemes.com/" target="_blank">
                                <img src="http://8degreethemes.com/wp-content/uploads/2015/05/logo.png"/>
                            </a>
                        </h2>

                        <h3><?php _e('Product of 8Degree Themes', 'hamza-lite'); ?></h3>
                    </div>
                </div>

                <div id="upsell_themes" class="row">
                    <?php
                    // Set the argument array with author name.
                    $args = array(
                        'author' => '8degreethemes',
                    );

                    // Set the $request array.
                    $request = array(
                        'body' => array(
                            'action' => 'query_themes',
                            'request' => serialize((object) $args)
                        )
                    );
                    $themes = hamza_lite_get_themes($request);
                    $active_theme = wp_get_theme()->get('Name');
                    $counter = 1;

                    // For currently active theme.
                    foreach ($themes->themes as $theme) {
                        if ($active_theme == $theme->name) {
                            ?>

                            <div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4">
                                <div class="image-container">
                                    <img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

                                    <div class="theme-description">
                                        <p><?php echo $theme->description; ?></p>
                                    </div>
                                </div>
                                <div class="theme-details active">
                                    <span class="theme-name"><?php echo $theme->name . ':' . __('Current theme', 'hamza-lite'); ?></span>
                                    <a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url() . '/wp-admin/customize.php' ?>">Customize</a>
                                </div>
                            </div>

                            <?php
                            $counter++;
                            break;
                        }
                    }

                    // For all other themes.
                    foreach ($themes->themes as $theme) {
                        if ($active_theme != $theme->name) {

                            // Set the argument array with author name.
                            $args = array(
                                'slug' => $theme->slug,
                            );

                            // Set the $request array.
                            $request = array(
                                'body' => array(
                                    'action' => 'theme_information',
                                    'request' => serialize((object) $args)
                                )
                            );

                            $theme_details = hamza_lite_get_themes($request);
                            ?>

                            <div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4 <?php echo $counter % 3 == 1 ? 'no-left-megin' : ""; ?>">
                                <div class="image-container">
                                    <img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>

                                    <div class="theme-description">
                                        <p><?php echo $theme->description; ?></p>
                                    </div>
                                </div>
                                <div class="theme-details">
                                    <span class="theme-name"><?php echo $theme->name; ?></span>

                                    <!-- Check if the theme is installed -->
                                    <?php if (wp_get_theme($theme->slug)->exists()) { ?>

                                        <!-- Show the tick image notifying the theme is already installed. -->
                                        <img data-toggle="tooltip" title="<?php _e('Already installed', 'hamza-lite'); ?>" data-placement="bottom" class="theme-exists" src="<?php echo $directory_uri ?>/images/8dt-right.png"/>

                                        <!-- Activate Button -->
                                        <a  class="button button-primary activate right"
                                            href="<?php echo wp_nonce_url(admin_url('themes.php?action=activate&amp;stylesheet=' . urlencode($theme->slug)), 'switch-theme_' . $theme->slug); ?>" >Activate</a>
                                            <?php
                                        } else {

                                            // Set the install url for the theme.
                                            $install_url = add_query_arg(array(
                                                'action' => 'install-theme',
                                                'theme' => $theme->slug,
                                                    ), self_admin_url('update.php'));
                                            ?>
                                        <!-- Install Button -->
                                        <a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format($theme_details->downloaded) . ' times'; ?>" class="button button-primary install right" href="<?php echo esc_url(wp_nonce_url($install_url, 'install-theme_' . $theme->slug)); ?>" ><?php _e('Install Now', 'hamza-lite'); ?></a>
                                    <?php } ?>

                                    <!-- Preview button -->
                                    <a class="button button-secondary preview right" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e('Live Preview', 'hamza-lite'); ?></a>
                                </div>
                            </div>
                            <?php
                            $counter++;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Get all 8Degree themes by using API.
function hamza_lite_get_themes($request) {

    // Generate a cache key that would hold the response for this request:
    $key = 'hamza-lite_' . md5(serialize($request));

    // Check transient. If it's there - use that, if not re fetch the theme
    if (false === ( $themes = get_transient($key) )) {

        // Transient expired/does not exist. Send request to the API.
        $response = wp_remote_post('http://api.wordpress.org/themes/info/1.0/', $request);

        // Check for the error.
        if (!is_wp_error($response)) {

            $themes = unserialize(wp_remote_retrieve_body($response));

            if (!is_object($themes) && !is_array($themes)) {

                // Response body does not contain an object/array
                return new WP_Error('theme_api_error', 'An unexpected error has occurred');
            }

            // Set transient for next time... keep it for 24 hours should be good
            set_transient($key, $themes, 60 * 60 * 24);
        } else {
            // Error object returned
            return $response;
        }
    }
    return $themes;
}

if (is_admin()) : // Load only if we are viewing an admin page

    function hamza_lite_admin_scripts() {
        wp_enqueue_media();
        wp_enqueue_script('hamzalite_custom_js', get_template_directory_uri() . '/inc/admin.js', array('jquery'), '', true);
        wp_enqueue_style('hamzalite_admin_style', get_template_directory_uri() . '/inc/admin.css', '1.0', 'screen');
    }

    add_action('admin_enqueue_scripts', 'hamza_lite_admin_scripts');
endif;