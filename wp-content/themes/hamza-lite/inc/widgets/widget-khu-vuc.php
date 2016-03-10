<?php
/**
 * Widget API: WP_Widget_Categories class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */
/**
 * Core class used to implement a Categories widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
add_action('widgets_init', 'hamza_lite_register_khu_vuc_widget');

function hamza_lite_register_khu_vuc_widget() {
    register_widget('hamza_lite_khu_vuc');
}

class Hamza_Lite_Khu_Vuc extends WP_Widget {

    /**
     * Sets up a new Categories widget instance.
     *
     * @since 2.8.0
     * @access public
     */
    public function __construct() {
        parent::__construct(
                'hamza_lite_khu_vuc', __('Khu vực', 'hamza-lite'), array(
            'description' => __('Khu vực nổi bật', 'hamza-lite')
                )
        );
    }

    private function widget_fields() {
        $hamza_lite_fields = array(
            'display_title' => array(
                'hamza_lite_widgets_name' => 'display_title',
                'hamza_lite_widgets_title' => __('Title', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'text'
            ),
            'show_post_counts' => array(
                'hamza_lite_widgets_name' => 'show_post_counts',
                'hamza_lite_widgets_title' => __('Show post counts', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'checkbox'
            ),
            'show_hierarchy' => array(
                'hamza_lite_widgets_name' => 'show_hierarchy',
                'hamza_lite_widgets_title' => __('Show Hierarchy', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'checkbox'
            ),
        );
        return $hamza_lite_fields;
    }

    /**
     * Outputs the content for the current Categories widget instance.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Categories widget instance.
     */
    public function widget($hamza_lite_args, $hamza_lite_instance) {
        extract($hamza_lite_args);
        $hamza_lite_display_title = $hamza_lite_instance['display_title'];
        $hamza_lite_display_counts = $hamza_lite_instance['show_post_counts'];
        $hamza_lite_show_hierarchy = $hamza_lite_instance['show_hierarchy'];
        $taxonomies = 'khu-vuc';
        $hamza_lite_recent_arg = array(
            'orderby' => 'term_order',
            'show_count' => $hamza_lite_display_counts,
            'hide_empty' => !$hamza_lite_show_hierarchy,
            'parent' => 0
        );
        //var_dump($recent_arg);
        $hamza_lite_recent_qry = get_terms($taxonomies, $hamza_lite_recent_arg);
//        echo "<pre>";
//        print_r($hamza_lite_recent_qry);
//        die();
        if (count($hamza_lite_recent_qry)) {
            echo $before_widget;
            // Check if title needs to be shown
            if (isset($hamza_lite_display_title)) {
                echo $before_title . $hamza_lite_display_title . $after_title;
            }
            ?>
            <div class="khuvu-widget-right row">
                <?php foreach ($hamza_lite_recent_qry as $parent) { ?>
                    <div class="col-md-6">
                        <div class="parent"><a href="<?= esc_url(get_term_link($parent)); ?>"><?php echo $parent->name; ?></a></div>
                        <ul>
                            <?php
                            $args = array(
                                'orderby' => 'term_order',
                                'show_count' => $hamza_lite_display_counts,
                                'hide_empty' => !$hamza_lite_show_hierarchy,
                                'parent' => $parent->term_taxonomy_id
                            );
                            $quanhuyen = get_terms($taxonomies, $args);

                            foreach ($quanhuyen as $quan) {
                                ?>
                                <li class="child"><a href="<?= esc_url(get_term_link($quan)); ?>"><?php echo $quan->name; ?></li>
                                <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <?php
            echo $after_widget;
            ?>
            <script>
                jQuery(function ($) {
                    $(document).ready(function () {
                    });
                });
            </script>
            <?php
        }
    }

    /**
     * Handles updating settings for the current Categories widget instance.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update($hamza_lite_new_instance, $hamza_lite_old_instance) {
        $hamza_lite_instance = $hamza_lite_old_instance;
        $hamza_lite_widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($hamza_lite_widget_fields as $hamza_lite_widget_field) {
            extract($hamza_lite_widget_field);
            // Use helper function to get updated field values
            $hamza_lite_instance[$hamza_lite_widgets_name] = hamza_lite_widgets_updated_field_value($hamza_lite_widget_field, $hamza_lite_new_instance[$hamza_lite_widgets_name]);
            echo $hamza_lite_instance[$hamza_lite_widgets_name];
        }
        return $hamza_lite_instance;
    }

    /**
     * Outputs the settings form for the Categories widget.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $instance Current settings.
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
