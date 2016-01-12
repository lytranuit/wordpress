<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Hamza Lite
 */
 
 global $post;
 $hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hamza-lite-blog-image', false ); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
            <h1 class="entry-title">
                <?php the_title(); ?>
            </h1>
	</header><!-- .entry-header -->
    
    <?php if(has_post_thumbnail()){?>
		<div class="entry-thumbnail">
			<img src="<?php echo esc_url($hamza_lite_image[0]);?>" alt="<?php the_title(); ?>" />
		</div>
	<?php } ?>
    
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hamza-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'hamza-lite' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
