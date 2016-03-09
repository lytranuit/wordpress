<?php
/**
 * Recent Post with Selected Category
 *
 * @package Hamza Lite
 */
add_action('widgets_init', 'hamza_lite_register_tim_kiem_widget');

function hamza_lite_register_tim_kiem_widget() {
    register_widget('hamza_lite_tim_kiem');
}

class Hamza_Lite_Tim_Kiem extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
                'hamza_lite_tim_kiem', __('Tìm kiếm nâng cao', 'hamza-lite'), array(
            'description' => __('Tìm kiếm nâng cao', 'hamza-lite')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $hamza_lite_fields = array(
            'display_title' => array(
                'hamza_lite_widgets_name' => 'display_title',
                'hamza_lite_widgets_title' => __('Title', 'hamza-lite'),
                'hamza_lite_widgets_field_type' => 'text'
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
        $hamza_lite_number_of_post = ( $hamza_lite_instance['number_of_post'] > 0 ) ? $hamza_lite_instance['number_of_post'] : 3;
        $hamza_lite_display_title = $hamza_lite_instance['display_title'];
        $hamza_lite_category = intval($hamza_lite_instance['category_list']);
        $hamza_lite_category = ($hamza_lite_category == 0) ? 1 : $hamza_lite_category;
        $hamza_lite_display_thumbnail = $hamza_lite_instance['show_post_thumbnail'];
        $hamza_lite_post_date = $hamza_lite_instance['show_post_date'];
        $huong = $_REQUEST['huong'];
        $phaply = $_REQUEST['phaply'];
        $khuvuc = array();
        $dientich = array();
        $mucgia = array();
        foreach ($_REQUEST['khuvuc'] as $row) {
            array_push($khuvuc, $row);
        }
        foreach ($_REQUEST['dientich'] as $row) {
            array_push($dientich, $row);
        }
        foreach ($_REQUEST['mucgia'] as $row) {
            array_push($mucgia, $row);
        }
        $taxonomies = array(
            'khu-vuc'
        );
        $args = array(
            'orderby' => 'asc',
            'hide_empty' => false,
            'parent' => 0
        );
        $categories = get_terms($taxonomies, $args);
        if (is_search()) {
            echo $before_widget;
            // Check if title needs to be shown
            if (isset($hamza_lite_display_title)) {
                echo $before_title . $hamza_lite_display_title . $after_title;
            }
            ?>
            <form class="form-search" role="search" action="<?php echo esc_url(home_url('/?s=advance')); ?>" method="POST">
                <div>
                    <span>Khu vực</span>
                    <select name="khuvuc[]" multiple="" class="selectpicker khuvuc" data-width="100%" title="Chọn Quận/Huyện">
                        <?php
                        foreach ($categories as $cate) {
                            ?>
                            <optgroup label="<?= $cate->name; ?>">
                                <?php
                                $taxonomies = array(
                                    'khu-vuc'
                                );
                                $args = array(
                                    'orderby' => 'asc',
                                    'hide_empty' => false,
                                    'parent' => $cate->term_taxonomy_id
                                );
                                $quanhuyen = get_terms($taxonomies, $args);
                                foreach ($quanhuyen as $quan) {
                                    ?>
                                    <option value="<?= $quan->term_taxonomy_id; ?>"><?= $quan->name ?></option>
                                <?php } ?>
                            </optgroup>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <span>Diện tích</span>
                    <select name="dientich[]" multiple="" class="selectpicker dientich" data-width="100%" title="Chọn diện tích" style="display: none;">
                        <option value="1">50m2-100m2</option>
                        <option value="2">100m2-1000m2</option>
                        <option value="3">Trên 1000m2</option>
                    </select>
                </div>
                <div>
                    <span>Mức giá</span>
                    <select name="mucgia[]" multiple="" class="selectpicker mucgia" data-width="100%" title="Chọn mức giá" style="display: none;">
                        <option value="1">300 triêu - 500 triêu / BĐS</option>
                        <option value="2">500 triêu - 1 tỷ / BĐS</option>
                        <option value="3">1 tỷ - 3 tỷ / BĐS</option>
                        <option value="4">3 tỷ - 5 tỷ / BĐS</option>
                        <option value="5">5 tỷ - 10 tỷ / BĐS</option>
                        <option value="6">Trên 10 tỷ / BĐS</option>
                    </select>
                </div>
                <div>
                    <span>Hướng</span>
                    <select name="huong" class="selectpicker huong" data-width="100%" title="Chọn hướng" style="display: none;">
                        <option value="0">Chọn hướng</option>
                        <option value="Đông">Đông</option>
                        <option value="Tây">Tây</option>
                        <option value="Nam">Nam</option>
                        <option value="Bắc">Bắc</option>
                        <option value="Đông Nam">Đông Nam</option>
                        <option value="Đông Bắc">Đông Bắc</option>
                        <option value="Tây Nam">Tây Nam</option>
                        <option value="Tây Bắc">Tây Bắc</option>
                    </select>
                </div>

                <div>
                    <span>Pháp lý</span>
                    <select name="phaply" class="selectpicker phaply" data-width="100%" title="Chọn pháp lý" style="display: none;">
                        <option value="0">Chọn pháp lý</option>
                        <option value="Sổ đỏ/Sổ hồng">Sổ đỏ/Sổ hồng</option>
                        <option value="Giấy tờ hợp lệ">Giấy tờ hợp lệ</option>
                        <option value="Giấy phép XD">Giấy phép XD</option>
                        <option value="Giấy phép KD">Giấy phép KD</option>
                    </select>
                </div>
                <input type="hidden" name="search" value="advanced">
                <button class="btn btn-success" type="submit" style="margin-top: 20px;">Tìm kiếm</button>
            </form>
            <script>
                jQuery(function ($) {
                    var huong = '<?php echo $huong ?>';
                    var mucgia = <?php echo json_encode($mucgia) ?>;
                    var khuvuc = <?php echo json_encode($khuvuc) ?>;
                    var dientich = <?php echo json_encode($dientich) ?>;
                    var phaply = '<?php echo $phaply; ?>';
                    $(".huong option[value='" + huong + "']").prop("selected", 'selected');
                    $(".phaply option[value='" + phaply + "']").prop("selected", 'selected');
                    $.each(mucgia, function (k1, v1) {
                        $(".mucgia option[value='" + v1 + "']").prop("selected", "selected");
                    });
                    $.each(dientich, function (k1, v1) {
                        $(".dientich option[value='" + v1 + "']").prop("selected", "selected");
                    });
                    $.each(khuvuc, function (k1, v1) {
                        $(".khuvuc option[value='" + v1 + "']").prop("selected", "selected");
                    });
                    $('.selectpicker').selectpicker();
                });
            </script>  
            <?php
            echo $after_widget;
            ?>
            <?php
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
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
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
