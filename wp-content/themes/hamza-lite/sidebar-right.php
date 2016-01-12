<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Hamza Lite
 */
?>

<?php 
global $post;
$hamza_lite_post_class = "";

if(!empty($post)){
	if(is_front_page()){
		$hamza_lite_post_id = get_option('page_on_front');
	}else{
		$hamza_lite_post_id = $post->ID;
	}
	$hamza_lite_post_class = get_post_meta( $hamza_lite_post_id, 'hamza_lite_sidebar_layout', true );
}elseif (is_home()) {
	$hamza_lite_post_class='right-sidebar';	
}

if($hamza_lite_post_class=='right-sidebar' || $hamza_lite_post_class=='both-sidebar' || empty($hamza_lite_post_class) || is_archive()){ ?>
	<div id="secondary-right" class="widget-area right-sidebar sidebar">
		<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		<?php endif; ?>
	</div><!-- #secondary -->
<?php } ?>
