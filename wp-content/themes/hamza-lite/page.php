<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Hamza Lite
 */

get_header(); 
global $post;
if(is_front_page()){
	$hamza_lite_post_id = get_option('page_on_front');
}else{
	$hamza_lite_post_id = $post->ID;
}
$hamza_lite_post_class = get_post_meta( $hamza_lite_post_id, 'hamza_lite_sidebar_layout', true );
?>

<div class="ak-container">

<div class="inner-pages-wrapper clearfix">

<?php 
	if ($hamza_lite_post_class=='both-sidebar') { ?>
		<div id="primary-wrap" class="clearfix"> 
	<?php }
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
get_sidebar('left'); 

	if ($hamza_lite_post_class=='both-sidebar') { ?>
		</div> 
	<?php }

get_sidebar('right'); ?>
</div>
</div>
<?php get_footer(); ?>