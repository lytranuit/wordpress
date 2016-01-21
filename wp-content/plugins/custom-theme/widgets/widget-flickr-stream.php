<?php
/**
 * Flickr Stream Widget
 *
 * @package Hamza Lite
 */
/**
 * Adds Hamza_Lite_Flickr_Stream widget.
 */
add_action('widgets_init', 'hamza_lite_register_flickr_stream_widget');

function hamza_lite_register_flickr_stream_widget(){
    register_widget( 'hamza_lite_flickr_stream' );
}
class Hamza_Lite_Flickr_Stream extends WP_Widget {
    
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'hamza_lite_flickr_stream',
            __( '8D : Flickr Stream', 'hamza-lite'), 
            array(
                'description' => __('Displays your Flickr photos.', 'hamza-lite')
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $hamza_lite_fields = array(
            // Title
            'widget_title' => array(
                'hamza_lite_widgets_name' => 'widget_title',
                'hamza_lite_widgets_title' => __('Title', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'text'
            ),
            // Other fields
            'flickr_id' => array(
                'hamza_lite_widgets_name' => 'flickr_id',
                'hamza_lite_widgets_title' => __('Flickr ID', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'text'
            ),
            'photo_count' => array(
                'hamza_lite_widgets_name' => 'photo_count',
                'hamza_lite_widgets_title' => __('Number of Photos', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'select',
                'hamza_lite_widgets_field_options' => array(
                    '4' => '4',
                    '8' => '8',
                    '12' => '12',
                    '16' => '16',
                )
            ),
            'photo_type' => array(
                'hamza_lite_widgets_name' => 'photo_type',
                'hamza_lite_widgets_title' => __('Type (user or group)', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'select',
                'hamza_lite_widgets_field_options' => array(
                    'user' => __('User', 'hamza-lite'),
                    'group' => __('Group', 'hamza-lite')
                )
            ),
            'photo_display' => array(
                'hamza_lite_widgets_name' => 'photo_display',
                'hamza_lite_widgets_title' => __('Display', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'select',
                'hamza_lite_widgets_field_options' => array(
                    'latest' => __('Latest', 'hamza-lite'),
                    'random' => __('Random', 'hamza-lite')
                )
            )
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
    public function widget($hamza_lite_args, $hamza_lite_instance) {
        extract($hamza_lite_args);

        $hamza_lite_widget_title = apply_filters('widget_title', $hamza_lite_instance['widget_title']);
        $hamza_lite_flickr_id = strip_tags($hamza_lite_instance['flickr_id']);
        $hamza_lite_photo_count = $hamza_lite_instance['photo_count'];
        $hamza_lite_photo_type = $hamza_lite_instance['photo_type'];
        $hamza_lite_photo_display = $hamza_lite_instance['photo_display'];

        echo $before_widget;

        // Show title
        if (isset($hamza_lite_widget_title)) {
            echo $before_title . $hamza_lite_widget_title . $after_title;
        }
        ?>
        <div class="clearfix widget-flickr-stream">
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo absint($hamza_lite_photo_count) ?>&amp;display=<?php echo esc_attr($hamza_lite_photo_display) ?>&amp;size=s&amp;layout=x&amp;source=<?php echo esc_attr($hamza_lite_photo_type) ?>&amp;<?php echo esc_attr($hamza_lite_photo_type) ?>=<?php echo $hamza_lite_flickr_id ?>"></script>
        </div>

        <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param	array	$new_instance	Values just sent to be saved.
     * @param	array	$old_instance	Previously saved values from database.
     *
     * @uses	hamza_lite_widgets_show_widget_field() defined in widget-fields.php
     *
     * @return	array Updated safe values to be saved.
     */
    public function update($hamza_lite_new_instance, $hamza_lite_old_instance) {
        $hamza_lite_instance = $hamza_lite_old_instance;

        $hamza_lite_widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($hamza_lite_widget_fields as $hamza_lite_widget_field) {
            extract($hamza_lite_widget_field);

            // Use helper function to get updated field values
            $hamza_lite_instance[$hamza_lite_widgets_name] = hamza_lite_widgets_updated_field_value($hamza_lite_widget_field, $hamza_lite_new_instance[$hamza_lite_widgets_name]);
        }

        return $hamza_lite_instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     * <ins></ins>
     * @uses	hamza_lite_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($hamza_lite_instance) {
        $hamza_lite_widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($hamza_lite_widget_fields as $hamza_lite_widget_field) {

            // Make array elements available as variables
            extract($hamza_lite_widget_field);
            $hamza_lite_widgets_field_value = isset($hamza_lite_instance[$hamza_lite_widgets_name]) ? esc_attr($hamza_lite_instance[$hamza_lite_widgets_name]) : '';
            hamza_lite_widgets_show_widget_field($this, $hamza_lite_widget_field, $hamza_lite_widgets_field_value);
        }
    }

}
