<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Hamza Lite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function hamza_lite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'primary',
		'footer_widgets' => array( 'footer-1', 'footer-2', 'footer-3', 'footer-4' ),
        'render'    => 'hamza_lite_infinite_scroll_render'
	) );
}
add_action( 'after_setup_theme', 'hamza_lite_jetpack_setup' );

function hamza_lite_infinite_scroll_render(){
    get_template_part( 'template-parts/content', get_post_format() );
}