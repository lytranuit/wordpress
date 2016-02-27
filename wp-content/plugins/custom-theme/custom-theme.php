<?php
/**
 * Plugin Name: Custom Theme    
 * Plugin URI: localhost
 * Description: Plugin chinh sua theme va them chuc nan
 * Version: 1.0 // Đây là phiên bản đầu tiên của plugin
 * Author: DaoTran
 * Author URI: 
 * License: GPLv2 or later // Thông tin license của plugin, nếu không quan tâm thì bạn cứ để GPLv2 vào đây
 */
require_once(ABSPATH . 'wp-admin/includes/plugin.php');
define('custom_theme_url', plugin_dir_url(__FILE__));
define('custom_theme_path', plugin_dir_path(__FILE__));
define('custom_theme_plugin', plugin_basename(__FILE__));

require_once (custom_theme_path . 'widget-function.php');
?>
<?php
add_shortcode('form_dang_tin', 'create_form_dang_tin');

function create_form_dang_tin() {
    global $wp_query;
    if (is_user_logged_in()) {

        $user_id = get_current_user_id();
        $current_user = wp_get_current_user();
        do_action('do_post_dang_tin');
        $taxonomies = array(
            'khu-vuc'
        );
        $args = array(
            'orderby' => 'asc',
            'hide_empty' => false,
            'parent' => 0
        );
        $khuvuc = get_terms($taxonomies, $args);
        wp_enqueue_script('custom_them_script', plugins_url('js/custom.js', __FILE__), array('jquery'), '1.0', true);
        ?>
        <form method="POST" class="form-horizontal" action="">
            <div class="form-group col-sm-12 col-md-6">
                <label for="post_titles">
                    Tiêu đề:
                </label>
                <input type="text" name="post_titles" class="form-control" placeholder="Tiêu đề" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label for="post_contents">
                    Nội dung 
                </label>
                <textarea name="post_contents"></textarea>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Tỉnh/Thành phố
                </label>
                <select name="post_tp" ajax="<?= admin_url('admin-ajax.php') ?>" class="post_tp">
                    <option value="0">--- Chọn Tỉnh/Thành ---</option>
                    <?php foreach ($khuvuc as $cate) { ?>
                        <option value="<?= $cate->term_taxonomy_id; ?>"><?= $cate->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Quận/Huyện:
                </label>
                <select name="post_quan" ajax="<?= admin_url('admin-ajax.php') ?>" class="post_quan">
                    <option value="0">--- Chọn Quận/Huyện ---</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Địa chỉ
                </label>
                <input name="diachi" class="diachi" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Diện tích:
                </label>
                <input name="dientich" class="dien-tich" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Giá tiền:
                </label>
                <input name="gia_ban" class="gia" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Chiều dài
                </label>
                <input name="chieudai" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Chiều rộng
                </label>
                <input name="chieurong" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Hướng
                </label>
                <select name="huong">
                    <option value="0">--- Chọn Hướng ---</option>
                    <option value="1">Đông</option>
                    <option value="2">Tây</option>
                    <option value="3">Nam</option>
                    <option value="4">Bắc</option>
                    <option value="5">Đông Nam</option>
                    <option value="6">Đông Bắc</option>
                    <option value="7">Tây Nam</option>
                    <option value="8">Tây Bắc</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Pháp lý
                </label>
                <select name="phaply" >
                    <option value="0">--- Chọn Pháp lý ---</option>
                    <option value="1">Sổ đỏ/Sổ hồng</option>
                    <option value="2">Giấy tờ hợp lệ</option>
                    <option value="3">Giấy phép XD</option>
                    <option value="4">Giấy phép KD</option>
                </select>
            </div>

            <?php wp_nonce_field('post_nonce', 'post_nonce_field');
            ?>
            <div class="form-group">
                <div class="col-sm-12" style="padding-left:0;">
                    <button type="submit" class="btn btn-primary">Đăng Bài</button>
                </div>
            </div>
        </form>
        <?php
    } else {
        wp_redirect(home_url() . "/login-4");
        exit;
    }
}

add_action('wp_ajax_get_quan_huyen', 'get_quan_huyen');

function get_quan_huyen() {
    if (isset($_POST['parent']))
        $parent = $_POST['parent'];
    else
        $parent = 0;
    $taxonomies = array(
        'khu-vuc'
    );
    $args = array(
        'orderby' => 'asc',
        'hide_empty' => false,
        'parent' => $parent
    );
    $categories = get_terms($taxonomies, $args);
    ?>
    <option value="0">--- Chọn Quận/Huyện ---</option>
    <?php
    foreach ($categories as $cate) {
        ?>
        <option value="<?= $cate->term_taxonomy_id; ?>"><?= $cate->name ?></option>
        <?php
    }
}

add_action('do_post_dang_tin', 'save_dang_tin');

function save_dang_tin() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
        $post_title = $_POST['post_titles'];
        $post_content = $_POST['post_contents'];
        $post_tp = $_POST['post_tp'];
        $post_quan = $_POST['post_quan'];
        $post_dientich = $_POST['dientich'];
        $post_gia = $_POST['gia_ban'];
        $post_rong = $_POST['chieurong'];
        $post_dai = $_POST['chieudai'];
        $post_huong = $_POST['huong'];
        $post_phaply = $_POST['phaply'];
        $post_diachi = $_POST['diachi'];
        $user_id = get_current_user_id();
        $post_data = array(
            'post_title' => wp_strip_all_tags($post_title),
            'post_content' => $post_content,
            'post_status' => 'publish',
            'post_type' => 'dang-tin',
            'post_author' => $user_id
        );
        $post_id = wp_insert_post($post_data);
        if ($post_id) {
            update_post_meta($post_id, 'wpcf-dien-tich', $post_dientich);
            update_post_meta($post_id, 'wpcf-gia', $post_gia);
            update_post_meta($post_id, 'wpcf-chieu-dai', $post_dai);
            update_post_meta($post_id, 'wpcf-chieu-rong', $post_rong);
            update_post_meta($post_id, 'wpcf-huong', $post_huong);
            update_post_meta($post_id, 'wpcf-phap-ly', $post_phaply);
            update_post_meta($post_id, 'wpcf-dia-chi', $post_diachi);
            wp_set_post_terms($post_id, $post_quan, 'khu-vuc');
            wp_set_post_terms($post_id, 6, 'loai-tin');
        }

        echo '<div class="alert alert-success"><strong>Bạn đã đăng bài thành công!</strong></div>';
    }
}