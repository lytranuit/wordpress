<?php 
/**
 * Template Name: Front Page
 * 
 * @package Hamza Lite
 */

get_header(); 

global $post;

$hamza_lite_read_more_text = get_theme_mod('hamza_lite_readmore_text', __('Read More', 'hamza-lite'));
$hamza_lite_call_to_action_post_id = get_theme_mod('hamza_lite_callto_post');
$hamza_lite_call_to_action_post_content = get_theme_mod('hamza_lite_show_full_content');
$hamza_lite_call_to_action_post_char = get_theme_mod('hamza_lite_call_to_action_char', '650');
$hamza_lite_call_to_action_read_more = get_theme_mod('hamza_lite_call_to_action_text', __('Read More', 'hamza-lite'));
$hamza_lite_call_to_action_buy_button = get_theme_mod('hamza_lite_cta_button', __('Buy Now', 'hamza-lite'));
$hamza_lite_call_to_action_buy_button_link = get_theme_mod('hamza_lite_cta_button_link');
$hamza_lite_featured_title = get_theme_mod('hamza_lite_featured_title');
$hamza_lite_featured_text = get_theme_mod('hamza_lite_featured_content');
$hamza_lite_show_fontawesome_icon = get_theme_mod('hamza_lite_featured_post_icon');
$hamza_lite_featured_post1 = get_theme_mod('hamza_lite_featured_post_one');
$hamza_lite_featured_post2 = get_theme_mod('hamza_lite_featured_post_two');
$hamza_lite_featured_post3 = get_theme_mod('hamza_lite_featured_post_three');
$hamza_lite_featured_post4 = get_theme_mod('hamza_lite_featured_post_four');
$hamza_lite_featured_post1_icon = get_theme_mod('hamza_lite_featured_post_one_icon');
$hamza_lite_featured_post2_icon = get_theme_mod('hamza_lite_featured_post_two_icon');
$hamza_lite_featured_post3_icon = get_theme_mod('hamza_lite_feature_post_three_icon');
$hamza_lite_featured_post4_icon = get_theme_mod('hamza_lite_featured_post_four_icon');
$hamza_lite_featured_post_readmore = get_theme_mod('hamza_lite_featured_read_more', __('Read More', 'hamza-lite'));
$hamza_lite_blog_cat = get_theme_mod('hamza_lite_blog_category');
$hamza_lite_show_blog_date = get_theme_mod('hamza_lite_show_blog_date', '1') ;
$hamza_lite_hide_blogmore = get_theme_mod('hamza_lite_show_blog_button') ;
$hamza_lite_testimonial_category = get_theme_mod('hamza_lite_testimonial_category');
$hamza_lite_service_title = get_theme_mod('hamza_lite_service_title');
$hamza_lite_service_text = get_theme_mod('hamza_lite_service_content');
$hamza_lite_service_post1 = get_theme_mod('hamza_lite_service_post_one');
$hamza_lite_service_post2 = get_theme_mod('hamza_lite_service_post_two');
$hamza_lite_service_post3 = get_theme_mod('hamza_lite_service_post_three');
$hamza_lite_service_post_icon1 = get_theme_mod('hamza_lite_service_post_one_icon');
$hamza_lite_service_post_icon2 = get_theme_mod('hamza_lite_service_post_two_icon');
$hamza_lite_service_post_icon3 = get_theme_mod('hamza_lite_service_post_three_icon');
$hamza_lite_portfolio_title = get_theme_mod('hamza_lite_portfolio_title');
$hamza_lite_portfolio_text = get_theme_mod('hamza_lite_portfolio_content');
$hamza_lite_portfolio_cat = get_theme_mod('hamza_lite_portfolio_category');
$hamza_lite_recent_title = get_theme_mod('hamza_lite_recent_title', __('Recent Post', 'hamza-lite'));
$hamza_lite_recent_cat = get_theme_mod('hamza_lite_recent_category');
?>

<?php if(!empty($hamza_lite_call_to_action_post_id)){ ?>
<section id="about-section">
	<div class="ak-container clearfix">
	<?php 
    
        $hamza_lite_query1 = new WP_Query( 'p='.$hamza_lite_call_to_action_post_id );
        while ($hamza_lite_query1->have_posts()) : $hamza_lite_query1->the_post(); ?>
					 
        <h1 class="roboto-light main-title <?php echo hamza_lite_title_class();?>"><a href="<?php the_permalink(); ?>"><?php echo hamza_lite_get_title(); ?></a></h1>
        <div class="welcome-detail">
            <?php 
                if($hamza_lite_call_to_action_post_content != 1 || empty($hamza_lite_call_to_action_post_content)){ ?>
                    <p class="welcome-content"><?php echo hamza_lite_truncate( get_the_content(), $hamza_lite_call_to_action_post_char, '...', false, true );?></p>
                    <?php if(!empty($hamza_lite_call_to_action_buy_button)){ ?>
                    <a href="<?php echo esc_url($hamza_lite_call_to_action_buy_button_link);?>" class="read-more bttn"><?php echo esc_html($hamza_lite_call_to_action_buy_button);?></a>
                    <?php }  if(!empty($hamza_lite_call_to_action_read_more)){ ?>                        
                        <a href="<?php the_permalink(); ?>" class="read-more bttn"><?php echo esc_html($hamza_lite_call_to_action_read_more); ?></a>                        
                    <?php } 
                }else{ 
				    the_content();
				}?>
					
        </div>
        <?php endwhile;	
            wp_reset_postdata(); ?>
	
	</div>
</section>
<?php } ?>

<?php if(!empty($hamza_lite_service_post1) || !empty($hamza_lite_service_post2) || !empty($hamza_lite_service_post3)){ ?>
<section class="service-section">
	<div class="ak-container">
		<?php if(!empty($hamza_lite_service_title)){ ?>
        <h1 class="roboto-light main-title"><?php echo apply_filters( 'the_title', $hamza_lite_service_title) ; ?></h1>
        <?php } if(!empty($hamza_lite_service_text)){ ?>
		<p><?php echo wp_kses_post($hamza_lite_service_text); ?></p>
        <?php } ?>
		
        <div class="service-slider">
        
        <?php if(!empty($hamza_lite_service_post1)){?>
        <div class="service-box">
			<div class="service-title-section clearfix">
				<?php if(!empty($hamza_lite_service_post_icon1)){ ?>
                <figure>
					<i class="fa <?php echo esc_attr($hamza_lite_service_post_icon1);?>"></i>	
				</figure>
                <?php } 
                    $hamza_lite_spost1 = get_post($hamza_lite_service_post1);
                ?>
                
				<h2 class="service-title"><?php echo apply_filters('the_title', $hamza_lite_spost1->post_title); ?></h2>
			</div>
			<div class="service-content">
				<?php echo apply_filters('the_content', hamza_lite_truncate($hamza_lite_spost1->post_content, 75, '', true, true)); ?>
			</div>
		</div>
		<?php wp_reset_postdata();
        } ?>
        
        <?php if(!empty($hamza_lite_service_post2)){?>
        <div class="service-box">
			<div class="service-title-section clearfix">
				<?php if(!empty($hamza_lite_service_post_icon2)){ ?>
                <figure>
					<i class="fa <?php echo esc_attr($hamza_lite_service_post_icon2);?>"></i>	
				</figure>
                <?php } 
                    $hamza_lite_spost2 = get_post($hamza_lite_service_post2);
                ?>
                
				<h2 class="service-title"><?php echo apply_filters('the_title', $hamza_lite_spost2->post_title); ?></h2>
			</div>
			<div class="service-content">
				<?php echo apply_filters('the_content', hamza_lite_truncate($hamza_lite_spost2->post_content, 75, '', true, true)); ?>
			</div>
		</div>
		<?php wp_reset_postdata(); 
        } ?>
        
        <?php if(!empty($hamza_lite_service_post3)){?>
        <div class="service-box">
			<div class="service-title-section clearfix">
				<?php if(!empty($hamza_lite_service_post_icon3)){ ?>
                <figure>
					<i class="fa <?php echo esc_attr($hamza_lite_service_post_icon3);?>"></i>	
				</figure>
                <?php } 
                    $hamza_lite_spost3 = get_post($hamza_lite_service_post3);
                ?>
                
				<h2 class="service-title"><?php echo apply_filters('the_title', $hamza_lite_spost3->post_title); ?></h2>
			</div>
			<div class="service-content">
				<?php echo apply_filters('the_content', hamza_lite_truncate($hamza_lite_spost3->post_content, 75, '', true, true)); ?>
			</div>
		</div>
		<?php wp_reset_postdata(); 
        } ?>
        </div>
		
		<div class="clearfix"></div>		
	</div>
</section>
<?php } ?>

<?php if(!empty($hamza_lite_featured_post1) || !empty($hamza_lite_featured_post2) || !empty($hamza_lite_featured_post3) || !empty($hamza_lite_featured_post4)){ ?>
<section id="mid-section" class="featured-section clearfix">
	<div class="ak-container">
		<?php 
        if(!empty($hamza_lite_featured_title)){ ?>
            <h3 class="roboto-light main-title"><?php echo apply_filters('the_title', $hamza_lite_featured_title); ?></h3>
		<?php } 
        if(!empty($hamza_lite_featured_text)){ ?>
            <div class="sub-desc"><?php echo wp_kses_post($hamza_lite_featured_text); ?></div>
		<?php } ?>

		<div class="featured-post-wrapper clearfix">
		<?php
		    if(!empty($hamza_lite_featured_post1)) { ?>
				<div id="featured-post-1" class="featured-post">
					<div class="featrued-post-border"><span>border</span></div>
					<?php
						$hamza_lite_query2 = new WP_Query( 'p='.$hamza_lite_featured_post1 );
						// the Loop
						while ($hamza_lite_query2->have_posts()) : $hamza_lite_query2->the_post();
							if( $hamza_lite_show_fontawesome_icon != 1 ){
							?>
							<figure class="featured-image">
								<a href="<?php the_permalink(); ?>">
									<?php 							
									if( has_post_thumbnail()){
									$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-featured-thumbnail', false ); 
									?>
									<img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
									<?php }else { ?>
									<img src="<?php echo esc_url(get_template_directory_uri(). '/images/featured-fallback.jpg'); ?>" alt="<?php the_title(); ?>" />
									<?php } 
									?>
								</a>
							</figure>
							<?php } ?>
                            
							<?php 
							if($hamza_lite_show_fontawesome_icon == 1){ ?>
							<div class="featured-icon">
                                <i class="fa <?php echo esc_attr($hamza_lite_featured_post1_icon); ?>"></i>
							</div>		
							<?php } ?>
							
							<div class="featured-content">
								<h2 class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo hamza_lite_excerpt( get_the_content() , 90 ) ?></p>
								<?php if(!empty($hamza_lite_featured_post_readmore)){?>
								<a href="<?php the_permalink(); ?>" class="view-more"><?php echo esc_attr($hamza_lite_featured_post_readmore); ?></a>
								<?php } ?>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
				</div>
			<?php }

			if(!empty($hamza_lite_featured_post2)) { ?>
				<div id="featured-post-2" class="featured-post">	
					<div class="featrued-post-border"><span>border</span></div>				
					<?php
						$hamza_lite_query3 = new WP_Query( 'p='.$hamza_lite_featured_post2 );
						// the Loop
						while ($hamza_lite_query3->have_posts()) : $hamza_lite_query3->the_post();							
							if( $hamza_lite_show_fontawesome_icon != 1 ){
							?>
							<figure class="featured-image">
								<a href="<?php the_permalink(); ?>">
									<?php 							
									if( has_post_thumbnail()){
									$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-featured-thumbnail', false ); 
									?>
									<img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
									<?php }else { ?>
									<img src="<?php echo esc_url(get_template_directory_uri(). '/images/featured-fallback.jpg'); ?>" alt="<?php the_title(); ?>" />
									<?php } 
									?>
								</a>
							</figure>
							<?php } ?>
                            	
							<?php 
							if($hamza_lite_show_fontawesome_icon == 1){ ?>
							<div class="featured-icon">
                                <i class="fa <?php echo esc_attr($hamza_lite_featured_post2_icon); ?>"></i>
							</div>		
							<?php } ?>
							
							<div class="featured-content">
								<h2 class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo hamza_lite_excerpt( get_the_content() , 90 ) ?></p>
								<?php if(!empty($hamza_lite_featured_post_readmore)){?>
								<a href="<?php the_permalink(); ?>" class="view-more"><?php echo esc_attr($hamza_lite_featured_post_readmore); ?></a>
								<?php } ?>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>				
				</div>
			<?php } ?>

			<?php if(!empty($hamza_lite_featured_post3)) { ?>
				<div id="featured-post-3" class="featured-post">
					<div class="featrued-post-border"><span>border</span></div>
					<?php
						$hamza_lite_query4 = new WP_Query( 'p='.$hamza_lite_featured_post3 );
						// the Loop
						while ($hamza_lite_query4->have_posts()) : $hamza_lite_query4->the_post(); 
							if( $hamza_lite_show_fontawesome_icon != 1 ){
							?>
							<figure class="featured-image">
								<a href="<?php the_permalink(); ?>">
									<?php 							
									if( has_post_thumbnail()){
									$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-featured-thumbnail', false ); 
									?>
									<img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
									<?php }else { ?>
									<img src="<?php echo esc_url(get_template_directory_uri(). '/images/featured-fallback.jpg' );?>" alt="<?php the_title(); ?>" />
									<?php } 
									?>
								</a>
							</figure>
							<?php } ?>	
				
							<?php 
							if($hamza_lite_show_fontawesome_icon == 1){ ?>
							<div class="featured-icon">
    							<i class="fa <?php echo esc_attr($hamza_lite_featured_post3_icon); ?>"></i>
							</div>		
							<?php } ?>
	
							<div class="featured-content">
								<h2 class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo hamza_lite_excerpt( get_the_content() , 90 ) ?></p>
								<?php if(!empty($hamza_lite_featured_post_readmore)){?>
								<a href="<?php the_permalink(); ?>" class="view-more"><?php echo esc_attr($hamza_lite_featured_post_readmore); ?></a>
								<?php } ?>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>				
				</div>
			<?php } 

			if(!empty($hamza_lite_featured_post4)) { ?>
				<div id="featured-post-4" class="featured-post">
					<div class="featrued-post-border"><span>border</span></div>
						<?php
						$hamza_lite_query5 = new WP_Query( 'p='.$hamza_lite_featured_post4 );
						// the Loop
						while ($hamza_lite_query5->have_posts()) : $hamza_lite_query5->the_post(); 
							if( $hamza_lite_show_fontawesome_icon != 1 ){
							?>
							<figure class="featured-image">
								<a href="<?php the_permalink(); ?>">
									<?php 							
									if( has_post_thumbnail()){
									$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-featured-thumbnail', false ); 
									?>
									<img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
									<?php }else { ?>
									<img src="<?php echo esc_url(get_template_directory_uri(). '/images/featured-fallback.jpg');?>" alt="<?php the_title(); ?>" />
									<?php }  
									?>
								</a>
							</figure>
							<?php } ?>	

							<?php 
							if($hamza_lite_show_fontawesome_icon == 1){ ?>
							<div class="featured-icon">
							<i class="fa <?php echo esc_attr($hamza_lite_featured_post4_icon); ?>"></i>
							</div>		
							<?php } ?>
							
							<div class="featured-content">
								<h2 class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo hamza_lite_excerpt( get_the_content() , 90 ) ?></p>
								<?php if(!empty($hamza_lite_featured_post_readmore)){?>
								<a href="<?php the_permalink(); ?>" class="view-more"><?php echo esc_attr($hamza_lite_featured_post_readmore); ?></a>
								<?php } ?>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
									
				</div>
			<?php } ?>
		</div>	
	</div>
</section>
<?php } ?>

<?php if(!empty($hamza_lite_portfolio_cat)){ ?>
<section class="work-section clearfix">
	<div class="work-section-bg">
		<div class="ak-container">
			<?php if(!empty($hamza_lite_portfolio_title)){?>
            <h3><?php echo apply_filters('the_title', $hamza_lite_portfolio_title);?></h3>
			<?php }
            if(!empty($hamza_lite_portfolio_text)){?>
            <p><?php echo wp_kses_post($hamza_lite_portfolio_text);?></p>
			<?php } ?>
            <?php 
                $hamza_lite_p_qry = new WP_Query( array(
                    'post_type'     => 'post',
                    'cat'           => $hamza_lite_portfolio_cat,
                    'post_status'   => 'publish',
                    'posts_per_page'=> 3
                ));
                $hamza_lite_i = 0;
                if($hamza_lite_p_qry->have_posts()){
                    while($hamza_lite_p_qry->have_posts()){
                        $hamza_lite_p_qry->the_post();
                        $hamza_lite_i++;            
                        $hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-latest-work', false );
            ?>
            <div class="work-box<?php if($hamza_lite_i==3) echo ' no-margin';?>">
				<div class="work-dot"></div>
				<?php if(has_post_thumbnail()){ ?>
                <figure class="work-pc">
					<img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title();?>" />
					<a href="<?php the_permalink();?>"><div class="work-detail-img"><i class="fa fa-plus"></i></div></a>
				</figure>
                <?php }else{ ?>
                <figure class="work-pc">
				<img src="<?php echo esc_url(get_template_directory_uri(). '/images/work-fallback.jpg');?>" alt="<?php the_title();?>" />
				<a href="<?php the_permalink();?>"><div class="work-detail-img"><i class="fa fa-plus"></i></div></a>
				</figure>
                <?php }?>
				<div class="work-pc-bottom">
					<div class="work-pc-handle"></div>	
				</div>
				<h3 class="work-img-title"><?php the_title(); ?></h3>
			</div>
            <?php  
                    }
                }
                wp_reset_postdata();
            ?>            
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<?php }?>

<div class="ak-container clearfix">
	<div class="border-bottom"></div>
</div>

<?php if(!empty($hamza_lite_blog_cat)){ ?>
<section id="top-section" class="blog-section clearfix">
	<div id="latest-blog" class="ak-container clearfix">
		<div class="blog-left-section">
			<?php		
	            $hamza_lite_loop = new WP_Query( array(
	                'cat' => $hamza_lite_blog_cat,
                    'post_status' => 'publish',
	                'posts_per_page' => 4,
	            )); ?>
	        <div class="clearfix">
	        	<h1 class="main-title">
	                <a href="<?php echo esc_url(get_category_link($hamza_lite_blog_cat)); ?>">
	                    <?php echo esc_attr(get_cat_name($hamza_lite_blog_cat)); ?>
	                </a>
	            </h1>
             <?php if($hamza_lite_hide_blogmore != 1 ) { ?>			
                <a href="<?php echo esc_url(get_category_link($hamza_lite_blog_cat)); ?>" class="view-more"><?php _e('View All','hamza-lite');?></a>             <?php } ?>
	        </div>
            <div class="blog-list-wrapper clearfix">
                <div class="blog-list-content">
                <?php while ($hamza_lite_loop->have_posts()) : $hamza_lite_loop->the_post(); ?>
    	        	<div class="blog-list clearfix">
	        		
	        		<figure class="blog-thumbnail clearfix">
						<a href="<?php the_permalink(); ?>">
						<?php 
						if( has_post_thumbnail() ){
						$hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-blog-thumbnail', false ); 
						?>
						<img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
						<?php }else{
						?>
						<img src="<?php echo esc_url(get_template_directory_uri(). '/images/blog-fallback.jpg');?>" alt="<?php the_title();?>" />
						<?php } ?>
						</a>
					</figure>	

					<div class="blog-detail clearfix">
		        		<figure class="blog-author-img">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 62 );?>
		        		</figure>
		        		<div class="blog-text">
		        			<h4 class="blog-title">
		        			<a href="<?php the_permalink(); ?>"><?php echo hamza_lite_excerpt( get_the_title() , 18 ); ?></a>
		        		</h4>
                        <div class="date-byline-wrap">
                        <?php if($hamza_lite_show_blog_date == 1){?>
                        	<div class="by-line">
                            	<?php the_author_posts_link(); ?>
                        	</div>
                            <div class="blog-date">
                                <?php echo ', '.get_the_date('jS M Y');?>
                            </div>
                        <?php } ?>
		        		</div>
                        <div class="blog-excerpt">
		        			<?php echo hamza_lite_excerpt( get_the_content() , 100 ); ?>
		        		</div>
		        		</div>
						
	        		</div>
	        	</div>
	        <?php endwhile; ?>
			</div>			
			<div class="clearfix">&nbsp;</div>			
			</div>
	        <?php wp_reset_postdata(); ?>	
		</div>
        
		<div class="blog-right-section">
			<h1 class="main-title"><?php echo apply_filters('the_title', $hamza_lite_recent_title);?></h1>
            <?php 
                $hamza_lite_r_qry = new WP_Query( array(
                    'post_type'     => 'post',
                    'cat'           => $hamza_lite_recent_cat,
                    'post_status'   => 'publish',
                    'posts_per_page'=> 5
                ));
                if($hamza_lite_r_qry->have_posts()){
                    while($hamza_lite_r_qry->have_posts()){
                        $hamza_lite_r_qry->the_post();
            ?>
                <div class="recent-post-box">
                    <h4 class="recent-post-title">
                    <a href="<?php the_permalink();?>"><?php echo apply_filters('the_title', hamza_lite_truncate( get_the_title(), 30));?></a></h4>
				    <div class="date-byline-wrap">
                        <?php if($hamza_lite_show_blog_date == 1){?>
                      	<div class="by-line">
                           	<?php the_author_posts_link(); ?>
                        </div>
                        <div class="blog-date">
                            <?php echo ', '.get_the_date('jS M Y');?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="recent-post-content"><?php echo apply_filters('the_content', hamza_lite_truncate( get_the_content(), 150));?></div>
                </div>
            <?php
                    }
                }
                wp_reset_postdata();
            ?>
		</div>
	</div>
</section>
<?php }?>

<?php if(!empty($hamza_lite_testimonial_category)) {	?>
<section id="bottom2-section" class="clients-say-section clearfix">
	<div class="ak-container">		
        <?php if(!empty($hamza_lite_testimonial_category)){?>
        <h3 class="testimonial-title roboto-light"><?php echo esc_attr(get_cat_name($hamza_lite_testimonial_category)); ?></h3>
        <div class="testimonial-content"><?php echo wp_kses_post(category_description( $hamza_lite_testimonial_category )); ?></div>
        <?php }?>
        <?php
            $hamza_lite_loop2 = new WP_Query( array(
                'cat' => $hamza_lite_testimonial_category,
                'post_status' => 'publish',
                'posts_per_page' => 5,
            )); ?>
            <div class="testimonial-wrap">
                <div class="testimonial-slider">
                <?php while ($hamza_lite_loop2->have_posts()) : $hamza_lite_loop2->the_post(); ?>
       	            <div class="testimonial-slide">
                        <div class="testimonial-excerpt">
                            <?php echo hamza_lite_excerpt( get_the_content() , 140 ) ?>
      		            </div>                                    
                        <div class="testimonial-list clearfix">
      		                <div class="testimonial-thumbnail">
		        		    <?php 
                            if(has_post_thumbnail()){
                                $hamza_lite_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-testimonial-thumbnail', false ); ?> 
                                <img src="<?php echo esc_url($hamza_lite_image[0]); ?>" alt="<?php the_title(); ?>" />
                            <?php }else{ ?>
                                <img src="<?php echo esc_url(get_template_directory_uri(). '/images/testimonial-dummy.jpg'); ?>" alt="no-image"/>
                            <?php } ?>
                            </div>
                            <div class="testimonial-name-box">
	                            <div class="testimoinal-client-name"><?php the_title(); ?></div>
	                            <div class="testimonail-designation"><?php the_excerpt();?></div>
	                        </div>
   	                    </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php wp_reset_postdata(); ?>		 
	</div>			
</section>
<?php }?>
<?php get_footer(); ?>