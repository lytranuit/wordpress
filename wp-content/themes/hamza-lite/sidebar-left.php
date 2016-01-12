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
}

if($hamza_lite_post_class=='left-sidebar' || $hamza_lite_post_class=='both-sidebar' ){
?>
	<div id="secondary-left" class="widget-area left-sidebar sidebar">
		<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'left-sidebar' ); ?>
		<?php endif; ?>
	</div><!-- #secondary -->
<?php } ?>