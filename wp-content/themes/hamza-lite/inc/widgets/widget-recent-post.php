<?php
/**
 * Recent Post with Selected Category
 *
 * @package Hamza Lite
 */

add_action( 'widgets_init', 'hamza_lite_register_recent_post_widget' );

function hamza_lite_register_recent_post_widget() {
    register_widget( 'hamza_lite_recent_post' );
}

class Hamza_Lite_Recent_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'hamza_lite_recent_post',
			__('8D : Hamza Lite Recent Posts', 'hamza-lite'),
			array(
				'description'	=> __( 'A widget that shows recent posts of selected category', 'hamza-lite' )
			)
		);
	}

	/**
	 * Helper function that holds widget fields
	 * Array is used in update and form functions
	 */
	 private function widget_fields() {
		$hamza_lite_fields = array(
			'display_title' => array (
				'hamza_lite_widgets_name'			=> 'display_title',
				'hamza_lite_widgets_title'			=> __( 'Title', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'text'
			),
            'category_list' => array (
				'hamza_lite_widgets_name'			=> 'category_list',
				'hamza_lite_widgets_title'			=> __( 'Category', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'selectcat',
			),
            'number_of_post' => array (
				'hamza_lite_widgets_name'			=> 'number_of_post',
				'hamza_lite_widgets_title'			=> __( 'Number of Posts', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'number',
			),
			'show_post_thumbnail' => array (
				'hamza_lite_widgets_name'			=> 'show_post_thumbnail',
				'hamza_lite_widgets_title'			=> __( 'Show featured image', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'checkbox'
			),
            'show_post_date' => array (
				'hamza_lite_widgets_name'			=> 'show_post_date',
				'hamza_lite_widgets_title'			=> __( 'Show Post Date', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'checkbox'
			),
		);
		return $hamza_lite_fields;
	 }

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $hamza_lite_args, $hamza_lite_instance ) {
		extract( $hamza_lite_args );
		$hamza_lite_number_of_post	  = ( $hamza_lite_instance['number_of_post'] > 0 ) ? $hamza_lite_instance['number_of_post'] : 3;
		$hamza_lite_display_title	  = $hamza_lite_instance['display_title'];
        $hamza_lite_category          = intval($hamza_lite_instance['category_list']);
		$hamza_lite_category          = ($hamza_lite_category == 0) ? 1 : $hamza_lite_category;
        $hamza_lite_display_thumbnail = $hamza_lite_instance['show_post_thumbnail'];
        $hamza_lite_post_date         = $hamza_lite_instance['show_post_date'];
                              
        $hamza_lite_recent_arg = array(
            'post_type'     => 'post',
            'cat'           => $hamza_lite_category,
            'post_status'   => 'publish',
            'posts_per_page'=> $hamza_lite_number_of_post
        );
        //var_dump($recent_arg);
        $hamza_lite_recent_qry = new WP_Query( $hamza_lite_recent_arg );
        if($hamza_lite_recent_qry->have_posts()){
            echo $before_widget;
            // Check if title needs to be shown
            if( isset( $hamza_lite_display_title ) ){
                echo $before_title . $hamza_lite_display_title . $after_title;
            }
            while($hamza_lite_recent_qry->have_posts()){
                $hamza_lite_recent_qry->the_post();
                $hamza_lite_img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'hamza-lite-recent-post-thumbnail', true );
            ?>
            	<div class="hamza_lite-recent-rightdivs clearfix">
                	<?php 
                	if($hamza_lite_display_thumbnail){ 
                		if( has_post_thumbnail()){ ?>
                			<div class="hamza_lite-recent-rightbar-img">
                    			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($hamza_lite_img_url[0]); ?>" alt="<?php the_title();?>" /></a>
                			</div>    
                		<?php 
            			}else{ ?>
                			<div class="hamza_lite-recent-rightbar-img">
                    			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/image65by56.jpg'); ?>" alt="<?php the_title();?>" /></a>
                			</div>
                		<?php
                		} 
                	}?>
                	<div class="hamza_lite-recent-rightbar-content">
                    	<h6 class="hamza_lite-recent-rightbar-title"><a href="<?php the_permalink(); ?>"><?php echo hamza_lite_excerpt( get_the_title(), 30 ); ?></a></h6>
                    	<?php 
                    	if($hamza_lite_post_date){ ?>
                    		<div class="hamza_lite-recent-rightbar-date"><?php echo get_the_date('F j, Y'); ?></div>
                    	<?php 
                    	} ?>
                	</div>
            	</div>            
            <?php
            }            
            echo $after_widget;
            wp_reset_postdata();            
        }
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param	array	$new_instance	Values just sent to be saved.
	 * @param	array	$old_instance	Previously saved values from database.
	 *
	 * @uses	hamza_lite_widgets_updated_field_value()		defined in hamzalite-widget.php
	 *
	 * @return	array Updated safe values to be saved.
	 */
	public function update( $hamza_lite_new_instance, $hamza_lite_old_instance ) {
		$hamza_lite_instance = $hamza_lite_old_instance;
		$hamza_lite_widget_fields = $this->widget_fields();

		// Loop through fields
		foreach( $hamza_lite_widget_fields as $hamza_lite_widget_field ) {
			extract( $hamza_lite_widget_field );
			// Use helper function to get updated field values
			$hamza_lite_instance[$hamza_lite_widgets_name] = hamza_lite_widgets_updated_field_value( $hamza_lite_widget_field, $hamza_lite_new_instance[$hamza_lite_widgets_name] );
			echo $hamza_lite_instance[$hamza_lite_widgets_name];
		}
		return $hamza_lite_instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param	array $instance Previously saved values from database.
	 *
	 * @uses	hamza_lite_widgets_show_widget_field()		defined in widget-fields.php
	 */
	public function form( $hamza_lite_instance ) {
		$hamza_lite_widget_fields = $this->widget_fields();
		// Loop through fields
		foreach( $hamza_lite_widget_fields as $hamza_lite_widget_field ) {
			// Make array elements available as variables
			extract( $hamza_lite_widget_field );
			$hamza_lite_widgets_field_value = isset( $hamza_lite_instance[$hamza_lite_widgets_name] ) ? esc_attr( $hamza_lite_instance[$hamza_lite_widgets_name] ) : '';
			hamza_lite_widgets_show_widget_field( $this, $hamza_lite_widget_field, $hamza_lite_widgets_field_value );
		}	
	}
}