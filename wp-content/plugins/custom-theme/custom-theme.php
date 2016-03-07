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
?>
<?php
add_shortcode('form_dang_tin', 'create_form_dang_tin');

function create_form_dang_tin() {
    global $wp_query;
    if (is_user_logged_in()) {
        wp_enqueue_media();
        $user_id = get_current_user_id();
        $current_user = wp_get_current_user();
        do_action('do_post_dang_tin');
        $taxonomies = array(
            'khu-vuc'
        );
        $args = array(
            'orderby' => 'asc',
            'hide_empty' => false
        );
        $khuvuc = get_terms($taxonomies, $args);
//        echo "<pre>";
//        print_r($khuvuc);
        //wp_enqueue_style('bosstrap', plugins_url('css/bootstrap.css', __FILE__), array("hamza-lite-style"), '1.0');
        wp_enqueue_style('custom_css', plugins_url('css/custom.css', __FILE__));

        wp_enqueue_script('validate', plugins_url('js/jquery.validate.js', __FILE__), array('jquery'), '1.0', true);
        wp_enqueue_script('custom_them_script', plugins_url('js/custom.js', __FILE__), array('jquery'), '1.0', true);
        ?>
        <script>
            var khuvuc = <?php echo json_encode($khuvuc); ?>;
            console.log(khuvuc);
        </script>
        <form method="POST" action="" id="form-dang-tin">
            <fieldset>
                <legend>Thông tin bắt buộc</legend>
                <i class="describe">Bạn vui lòng điền đầy đủ thông tin bên dưới.</i>
                <div class="form-group col-md-12 tieude parent">
                    <label for="post_titles">
                        Tiêu đề:
                    </label><span class="text-danger">*</span><span class="error-place"></span>
                    <input type="text" name="post_titles" class="form-control" placeholder="Tiêu đề" required=""/>
                </div>
                <div class="form-group col-md-12 noidung parent">
                    <label for="post_contents">
                        Nội dung 
                    </label><span class="text-danger">*</span><span class="error-place"></span>
                    <textarea name="post_contents" class="form-control" required=""></textarea>
                </div>
                <div class="form-group col-md-6 parent">
                    <label>
                        Tỉnh/Thành phố
                    </label><span class="text-danger">*</span><span class="error-place"></span>
                    <select name="post_tp" ajax="<?= admin_url('admin-ajax.php') ?>" class="post_tp form-control" required="">
                        <?php foreach ($khuvuc as $cate) { ?>
                            <?php if ($cate->parent == 0) { ?>
                                <option value="<?= $cate->term_taxonomy_id; ?>"><?= $cate->name ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6 parent">
                    <label>
                        Quận/Huyện:
                    </label><span class="text-danger">*</span><span class="error-place"></span>
                    <select name="post_quan" ajax="<?= admin_url('admin-ajax.php') ?>" class="post_quan form-control" required="">
                    </select>
                </div>
                <div class="form-group col-md-4 parent">
                    <label>
                        Địa chỉ:
                    </label><span class="text-danger">*</span><span class="error-place"></span>
                    <input name="diachi" class="diachi form-control" required=""/>
                </div>
                <div class="form-group col-md-4 parent">
                    <label>
                        Diện tích (m2):
                    </label><span class="text-danger">*</span><span class="error-place"></span>
                    <input name="dientich" class="dien-tich form-control" required=""/>
                </div>
                <div class="form-group col-md-4 parent">
                    <label>
                        Giá tiền (triệu đồng):
                    </label><span class="text-danger">*</span><span class="error-place"></span>
                    <input name="gia_ban" class="gia form-control" required=""/>
                </div>
            </fieldset>
            <fieldset>
                <legend>Hình ảnh</legend>
                <i class="describe">Hình ảnh thật của bất động sản.</i>
                <div class="col-md-12">
                    <button id="media" onclick="return false;" class="btn btn-success">Select Images</button>
                    <!-- List of images id to save -->
                    <input id="gallery_input" type="hidden" name="images" value="">
                    <!-- Show images, use wp_get_attachment_image_src -->
                    <ul id="display_gallery"></ul>
                </div>
            </fieldset>
            <fieldset>
                <legend>Thông tin khác</legend>
                <i class="describe">THông tin không bắt buộc,nên điền đầy đủ để máy chủ tìm kiếm bài viết của bạn dễ hơn.</i>
                <div class="form-group col-sm-12 col-md-6 parent">
                    <label>
                        Chiều dài
                    </label><span class="error-place"></span>
                    <input name="chieudai" class="form-control chieudai"/>
                </div>
                <div class="form-group col-sm-12 col-md-6 parent">
                    <label>
                        Chiều rộng
                    </label><span class="error-place"></span>
                    <input name="chieurong" class="form-control chieurong"/>
                </div>
                <div class="form-group col-sm-12 col-md-6 parent">
                    <label>
                        Hướng
                    </label><span class="error-place"></span>
                    <select name="huong" class="form-control">
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
                <div class="form-group col-sm-12 col-md-6 parent">
                    <label>
                        Pháp lý
                    </label><span class="error-place"></span>
                    <select name="phaply" class="form-control">
                        <option value="0">--- Chọn Pháp lý ---</option>
                        <option value="1">Sổ đỏ/Sổ hồng</option>
                        <option value="2">Giấy tờ hợp lệ</option>
                        <option value="3">Giấy phép XD</option>
                        <option value="4">Giấy phép KD</option>
                    </select>
                </div>
            </fieldset>
            <?php
            wp_nonce_field('post_nonce', 'post_nonce_field');
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
        $post_img = explode(',', $_POST['images']);
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
            update_post_meta($post_id, 'wpcf-dia-chi', $post_diachi);
            foreach ($post_img as $img) {
                update_post_meta($post_id, 'wpcf-hinh-anh', $img);
            }
            update_post_meta($post_id, 'wpcf-chieu-dai', $post_dai);
            update_post_meta($post_id, 'wpcf-chieu-rong', $post_rong);
            update_post_meta($post_id, 'wpcf-huong', $post_huong);
            update_post_meta($post_id, 'wpcf-phap-ly', $post_phaply);
            wp_set_post_terms($post_id, $post_quan, 'khu-vuc');
            wp_set_post_terms($post_id, 6, 'loai-tin');
        }

        echo '<div class="alert alert-success"><strong>Bạn đã đăng bài thành công!</strong></div>';
    }
}
