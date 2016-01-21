<?php
/**
 * Feautured Post
 *
 * @package Hamza Lite
 */

add_action( 'widgets_init', 'hamza_lite_register_featured_post_widget' );

function hamza_lite_register_featured_post_widget() {
    register_widget( 'hamza_lite_featured_post' );
}

class Hamza_Lite_Featured_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'hamza_lite_featured_post',
			__( '8D : Hamza Lite Featured Post', 'hamza-lite' ),
			array(
				'description'	=> __( 'A widget that shows featued post.', 'hamza-lite' )
			)
		);
	}

	/**
	 * Helper function that holds widget fields
	 * Array is used in update and form functions
	 */
	 private function widget_fields() {
		$hamza_lite_fields = array(			
            'post_list' => array (
				'hamza_lite_widgets_name'			=> 'post_list',
				'hamza_lite_widgets_title'			=> __( 'Post', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'selectpost',
			),
            'read_more_text' => array (
				'hamza_lite_widgets_name'			=> 'read_more_text',
				'hamza_lite_widgets_title'			=> __( 'Read More Text', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'text'
			),
            'excerpt_character' => array (
				'hamza_lite_widgets_name'			=> 'excerpt_character',
				'hamza_lite_widgets_title'			=> __( 'Excerpt Character', 'hamza-lite' ),
				'hamza_lite_widgets_field_type'		=> 'numbertext'
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
        $hamza_lite_id   = intval($hamza_lite_instance['post_list']);		
        $hamza_lite_read_more	= $hamza_lite_instance['read_more_text'];
        $hamza_lite_excerpt_char = absint($hamza_lite_instance['excerpt_character']);                                      
        
        $hamza_lite_qry = new WP_Query( "p=$hamza_lite_id" );
        if($hamza_lite_qry->have_posts()){
            echo $before_widget;
           
            while($hamza_lite_qry->have_posts()){
                $hamza_lite_qry->the_post();
            ?>
            <div class="hamza-lite-featured clearfix">                
                <div class="hamza-lite-featured-content">
                    <?php echo $before_title . apply_filters('the_title', get_the_title()) . $after_title; ?>                    
                    <div class="hamza_lite-featured-excerpt"><?php echo hamza_lite_excerpt( get_the_content(), $hamza_lite_excerpt_char );?></div>
                    <?php if($hamza_lite_read_more){ ?>
                    <div class="hamza_lite-featured-readmore">
                        <a href="<?php the_permalink();?>" class="bttn" title="<?php the_title(); ?>"><?php echo esc_attr($hamza_lite_read_more); ?></a>
                    </div>
                    <?php } ?>
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
	 * @param	array	$hamza_lite_new_instance	Values just sent to be saved.
	 * @param	array	$hamza_lite_old_instance	Previously saved values from database.
	 *
	 * @uses	hamza_lite_widgets_updated_field_value()		defined in hamza-lite-widget.php
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
	 * @param	array $hamza_lite_instance Previously saved values from database.
	 *
	 * @uses	hamza_lite_widgets_show_widget_field() defined in widget-fields.php
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