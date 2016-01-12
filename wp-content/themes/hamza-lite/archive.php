<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hamza Lite
 */

get_header();
?>

<div class="ak-container">
	<section id="primary" class="content-area">
		<main id="main" class="site-main clearfix">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'hamza-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'hamza-lite' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'hamza-lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'hamza-lite' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'hamza-lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'hamza-lite' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'hamza-lite' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'hamza-lite');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'hamza-lite');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'hamza-lite' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'hamza-lite' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'hamza-lite' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'hamza-lite' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'hamza-lite' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'hamza-lite' );

						else :
							_e( 'Archives', 'hamza-lite' );

						endif;
					?>
				</h1>				
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php 
			while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'summary' );
				?>

			<?php endwhile; ?>
            <div class="clear"></div>
			<?php hamza_lite_num_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
