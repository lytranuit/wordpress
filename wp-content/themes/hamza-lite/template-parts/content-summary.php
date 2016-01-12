<?php
/**
 * @package Hamza Lite
 */
?>
<?php
global $post;
$hamza_lite_cat_testimonial = get_theme_mod('hamza_lite_testimonial_category');
$hamza_lite_cat_portfolio = get_theme_mod('hamza_lite_portfolio_category');
$hamza_lite_cat_blog = get_theme_mod('hamza_lite_blog_category');
$hamza_lite_read_more_text = get_theme_mod('hamza_lite_readmore_text', __('Read More', 'hamza-lite'));

if(!empty($hamza_lite_cat_testimonial) && is_category() && is_category($hamza_lite_cat_testimonial)): ?>

<article id="post-<?php the_ID(); ?>" class="cat-testimonial-list clearfix">
	<div class="cat-testimonial-image clearfix">
	<?php 
		if( has_post_thumbnail() ){
			$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hamza-lite-testimonial-image', false ); 
		?>
		<img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>">
		<?php }else {?>	
		<img src="<?php echo esc_url(get_template_directory_uri(). '/images/testimonial-dummy1.jpg'); ?>" alt="<?php the_title(); ?>">
		<?php }?>
	</div>
		
	<header class="entry-header">
	<h3><?php the_title(); ?></h3>
	</header><!-- .entry-header -->

	<div class="cat-testimonial-excerpt">
        <?php the_content(); ?>
	</div>
</article>

<?php elseif(!empty($hamza_lite_cat_portfolio) && is_category() && is_category($hamza_lite_cat_portfolio)): ?>

<article id="post-<?php the_ID(); ?>" class="cat-portfolio-list">
<?php 
$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hamza-lite-portfolio-image', false ); 
?>
	<a href="<?php the_permalink(); ?>" >
    <div class="cat-portfolio-image">
		<?php if( has_post_thumbnail() ){?>
        <img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>">
        <?php }else{ ?>
        <img src="<?php echo esc_url(get_template_directory_uri(). '/images/portfolio-fallback.jpg'); ?>" alt="<?php the_title(); ?>">            
        <?php }?>
    </div>
	<div class="portofolio-layout">
		<div class="portofolio-content-wrap">
			<h1><?php the_title(); ?></h1>
			<div class="cat-portfolio-excerpt">
			    <?php echo hamza_lite_excerpt(get_the_content(),'100'); ?>
			</div>
		</div>
	</div>
    </a>
</article>

<?php elseif(!empty($hamza_lite_cat_blog) && is_category() && is_category($hamza_lite_cat_blog)): ?>
<article id="post-<?php the_ID(); ?>" class="cat-blog-list">
<?php 
$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hamza-lite-blog-image', false );
?>
	<?php if(has_post_thumbnail()){?>
		<div class="entry-thumbnail">
			<img src="<?php echo esc_url($hamza_lite_image[0]);?>" alt="<?php the_title(); ?>" />
		</div>
	<?php } ?>
    
    <header class="entry-header clearfix">
		<figure class="blog-author-img">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 62 );?>
        </figure>
        
        <div class="entry-meta">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if ( 'post' == get_post_type() ) : ?>
		
            
            <div class="blog-date">
            <?php echo get_the_date('F n Y');?>
            </div>
            
            <div class="comment-count">
                <?php printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'hamza-lite' ), number_format_i18n( get_comments_number() ) ); ?> 
            </div>
            
            <?php
				/* translators: used between list items, there is a space after the comma */
				$hamza_lite_tags_list = get_the_tag_list( '', __( ', ', 'hamza-lite' ) );
				if ( $hamza_lite_tags_list ) :
			?>
			<div class="tags-links">
				<?php printf( __( '%1$s', 'hamza-lite' ), $hamza_lite_tags_list ); ?>
			</div>
            <?php endif; // End if $tags_list ?>
            
            <?php if(function_exists('echo_views')){?>
            <div class="post-view-count">
                <?php echo_views(get_the_ID()); ?>
                <?php echo __( 'Views', 'hamza-lite' );?>
            </div>
            <?php } ?>
            
            <div class="by-line">
           	    <?php echo __( 'By ', 'hamza-lite' );the_author_posts_link(); ?>
           	</div>      
		        		
		  
		<?php endif; // End if 'post' == get_post_type() ?>
        </div><!-- .entry-meta -->  
	</header><!-- .entry-header -->
    
    <div class="entry-content">		
		<div class="entry-exrecpt">
		<div class="short-content clearfix">
		<?php echo hamza_lite_excerpt( get_the_content() , 600 ) ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_html($hamza_lite_read_more_text);?></a>		
		</div>
	</div><!-- .entry-content -->
    
    
</article>

<?php else: ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php hamza_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php if(has_post_thumbnail()){?>
		<div class="entry-thumbnail">
			<?php  the_post_thumbnail('hamza-lite-featured-thumbnail'); ?>
		</div>
		<?php } ?>
		<div class="entry-exrecpt <?php if(!has_post_thumbnail()){ echo "full-width"; }?>">
		<div class="short-content clearfix">
		<?php echo hamza_lite_excerpt( get_the_content() , 380 ) ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="bttn"><?php echo esc_html($hamza_lite_read_more_text);?></a>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'hamza-lite' ),
				'after'  => '</div>',
			) );
		?>
		</div>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$hamza_lite_categories_list = get_the_category_list( __( ', ', 'hamza-lite' ) );
				if ( $hamza_lite_categories_list && hamza_lite_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'hamza-lite' ), $hamza_lite_categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$hamza_lite_tags_list = get_the_tag_list( '', __( ', ', 'hamza-lite' ) );
				if ( $hamza_lite_tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'hamza-lite' ), $hamza_lite_tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php endif; ?>