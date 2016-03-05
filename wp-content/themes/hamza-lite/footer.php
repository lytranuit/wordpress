<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Hamza Lite
 */
$hamza_lite_social_link_footer = get_theme_mod('hamza_lite_social_link_footer');
$hamza_lite_footer_copyright = get_theme_mod('hamza_lite_footer_text', __('8Degree Themes', 'hamza-lite'));
$hamza_lite_google_map_iframe = get_theme_mod('hamza_lite_google_map_iframe');
$hamza_lite_contact_address = get_theme_mod('hamza_lite_contact_address');
$hamza_lite_contact_form = get_theme_mod('hamza_lite_contact_form');
?>

</div><!-- #content -->

<footer id="colophon">

    <?php if (!empty($hamza_lite_google_map_iframe)) { ?>           
        <section id="google-map" class="clearfix">
            <?php
            $allowed = array(
                'iframe' => array(
                    'src' => array()
                )
            );
            echo wp_kses($hamza_lite_google_map_iframe, $allowed);

            if (!empty($hamza_lite_contact_address)) {
                ?>
                <div class="google-section-wrap ak-container">			
                    <div class="ak-contact-address">
                        <div class="map-form">
                            <?php echo do_shortcode($hamza_lite_contact_form); ?>
                        </div>
                        <div class="map-content">            
                            <?php
                            echo wpautop($hamza_lite_contact_address);
                            do_action('hamza_lite_social_links');
                            ?>
                        </div>
                        <div class="direction-pointer"></div>
                        <div class="trialgle"></div>
                    </div>

                </div>
            <?php } ?>
        </section>
    <?php } ?>

    <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) : ?>
        <div id="top-footer">
            <div class="ak-container">
                <div class="footer1 footer" data-animate-scroll='{"alpha": "0", 
                     "duration": "0.5",
                     "y": "50"}'>
                         <?php if (is_active_sidebar('footer-1')) : ?>
                             <?php dynamic_sidebar('footer-1'); ?>
                         <?php endif; ?>	
                </div>

                <div class="footer2 footer"data-animate-scroll='{"alpha": "0", 
                     "duration": "1",
                     "y": "50"}'>
                         <?php if (is_active_sidebar('footer-2')) : ?>
                             <?php dynamic_sidebar('footer-2'); ?>
                         <?php endif; ?>	
                </div>

                <div class="clearfix hide"></div>

                <div class="footer3 footer" data-animate-scroll='{"alpha": "0", 
                     "duration": "1.5",
                     "y": "50"}'>
                         <?php if (is_active_sidebar('footer-3')) : ?>
                             <?php dynamic_sidebar('footer-3'); ?>
                         <?php endif; ?>	
                </div>
            </div>
        </div>
    <?php endif; ?>


    <div id="left-footer">
        <div class="ak-container">
            <div id="middle-footer" class="footer-menu">

                <div class="copyright">

                </div><!-- .copyright -->
            </div>
            <?php if ($hamza_lite_social_link_footer != 1) { ?>
                <div class="footer-socials clearfix">
                    <?php
                    do_action('hamza_lite_social_links');
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>