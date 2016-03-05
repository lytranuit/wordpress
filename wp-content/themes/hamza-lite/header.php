<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Hamza Lite
 */
?><!DOCTYPE html> 
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalabe=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
                <script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js"></script>
                <![endif]-->

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <div id="page" class="site">
            <header id="masthead" class="site-header" style="box-shadow: none;">
                <div id="top-header">
                    <div class="ak-container">

                        <div class="header-wrap clearfix <?php do_action('hamza_lite_logo_alignment'); ?>">
                            <div class="site-branding main-logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>">				
                                    <?php if (get_header_image()) { ?>
                                        <img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>">
                                    <?php } else { ?>
                                        <h1 class="site-title"><?php bloginfo('title'); ?></h1>
                                        <div class="tagline site-description"><?php bloginfo('description'); ?></div>
                                    <?php } ?>		
                                </a>		
                            </div><!-- .site-branding -->

                            <?php if ((get_theme_mod('hamza_lite_email') != '') || get_theme_mod('hamza_lite_phone') != '') { ?>
                                <div class="ed-email-phone">
                                    <?php if (get_theme_mod('hamza_lite_email') != '') { ?>
                                        <div class="ed-email">
                                            <a href="mailto:<?php echo sanitize_email(get_theme_mod('hamza_lite_email')); ?>"><?php echo sanitize_email(get_theme_mod('hamza_lite_email')); ?></a>
                                        </div>
                                    <?php }if (get_theme_mod('hamza_lite_phone') != '') { ?>
                                        <div class="ed-phone"><?php echo esc_attr(get_theme_mod('hamza_lite_phone')); ?></div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                            <div class="nav-search-wrapper clearfix">
                                <nav id="site-navigation" class="main-navigation<?php
                                if ((get_theme_mod('hamza_lite_social_link_header') == 1) && (get_theme_mod('hamza_lite_search_box_header') != 1)) {
                                    echo ' nav-without-social-search';
                                }
                                ?>">
                                    <h1 class="menu-toggle"><?php _e('', 'hamza-lite'); ?></h1>

                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'menu',
                                        'items_wrap' => '<ul class="clearfix" id="%1$s">%3$s</ul>',
                                    ));
                                    ?>

                                </nav><!-- #site-navigation -->

                                <?php if (get_theme_mod('hamza_lite_search_box_header', 'true') == 'true') { ?>
                                    <div class="ak-search">
                                        <?php get_search_form(); ?>
                                    </div>				    
                                <?php } ?>  
                                <?php if (!is_user_logged_in()) { ?>
                                    <nav id="user-area">
                                        <ul>
                                            <li id="login">
                                                <a id="login-trigger" href="login-4">
                                                    Đăng nhập
                                                </a>
                                            </li>
                                            <li id="signup">
                                                <a href="register-2">Đăng kí</a>
                                            </li>
                                        </ul>
                                    </nav>
                                <?php } else { ?>
                                    <?php
                                    global $current_user;
                                    get_currentuserinfo();
                                    ?>
                                    <div class="um-login-sidebar um-trigger-menu-on-click">
                                        <a href="#" class="um-profile-edit-a"><i class="um-faicon-user"></i> <?php echo $current_user->user_login; ?></a>
                                        <div class="um-dropdown" data-element="div.um-login-sidebar" data-position="bc" data-trigger="click" >
                                            <div class="um-dropdown-b">
                                                <div class="um-dropdown-arr"><i class=""></i></div>
                                                <ul>
                                                    <li><a href="<?php echo esc_url(home_url('/')); ?>dang-tin-moi" class="real_url"><i class="glyphicon glyphicon-pushpin"></i> Đăng tin mới</a></li>
                                                    <li><a href="<?php echo esc_url(home_url('/')); ?>account" class="real_url"><i class="um-faicon-user"></i> Thông tin cá nhân</a></li>
                                                    <li><a href="<?php echo esc_url(home_url('/')); ?>logout" class="real_url"><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>  
                            </div>

                        </div><!-- .header-wrap -->

                    </div><!-- .ak-container -->
                </div><!-- #top-header -->
            </header><!-- #masthead -->
            <?php if (is_home() || is_front_page()) { ?>
                <section id="slider-banner">
                    <div class="ak-container">
                        <div class="slider-wrap" style="display: inline-block;">
                            <?php do_action('hamza_lite_bxslider'); ?>
                        </div>
                        <div class="search-box" style="">
                            <?php get_template_part('searchform', 'advanced'); ?>
                        </div>
                    </div>
                </section><!-- #slider-banner -->

            <?php } ?>

            <?php
            if ((is_home() || is_front_page()) && 'page' == get_option('show_on_front')) {
                $hamza_lite_content_id = "content";
            } elseif (is_home() || is_front_page()) {
                $hamza_lite_content_id = "home-content";
            } else {
                $hamza_lite_content_id = "content";
            }
            ?>

            <div id="<?php echo $hamza_lite_content_id; ?>" class="site-content">
