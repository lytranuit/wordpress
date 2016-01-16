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
?>
<?php
add_shortcode('form_dang_tin', 'create_form_dang_tin');

function create_form_dang_tin() {
    global $wp_query;
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $current_user = wp_get_current_user();
        $taxonomies = array(
            'khu-vuc'
        );
        $args = array(
            'orderby' => 'asc',
            'hide_empty' => false,
            'parent' => 0
        );
        $categories = get_terms($taxonomies, $args);
        wp_enqueue_script('custom_them_script', plugins_url('js/custom.js', __FILE__), array('jquery'), '1.0', true);
        ?>
        <form method="post" class="form-horizontal" action="">
            <div class="form-group col-sm-12 col-md-6">
                <label for="post_title">
                    Tiêu đề:
                </label>
                <input type="text" name="post_title" class="form-control" placeholder="Tiêu đề" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label for="post_content">
                    Nội dung 
                </label>
                <?php wp_editor('', 'mycustomeditor', array('textarea_name' => 'post_content', 'media_buttons' => false, 'quicktags' => false)); ?>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Tỉnh/Thành phố
                </label>
                <select name="post_tp" ajax="<?= admin_url('admin-ajax.php') ?>" class="post_tp">
                    <option>--- Chọn Tỉnh/Thành ---</option>
                    <?php foreach ($categories as $cate) { ?>
                        <option value="<?= $cate->term_taxonomy_id; ?>"><?= $cate->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Quận/Huyện:
                </label>
                <select name="post_quan" ajax="<?= admin_url('admin-ajax.php') ?>" class="post_quan">
                    <option>--- Chọn Quận/Huyện ---</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Diện tích:
                </label>
                <input name="dien-tich" class="dien-tich" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Giá tiền:
                </label>
                <input name="gia" class="gia" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Chiều dài
                </label>
                <input name="chieu-dai" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Chiều rộng
                </label>
                <input name="chieu-rong" />
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Hướng
                </label>
                <select name="huong">
                    <option>--- Chọn Hướng ---</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label>
                    Pháp lý
                </label>
                <select name="phap-ly" >
                    <option>--- Chọn Pháp lý ---</option>
                </select>
            </div>

            <?php wp_nonce_field('post_nonce', 'post_nonce_field');
            ?>
            <div class="form-group">
                <div class="col-sm-12" style="padding-left:0;">
                    <input type="hidden" name="post_type" value="dang-tin"/>
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
    <option>--- Chọn Quận/Huyện ---</option>
    <?php
    foreach ($categories as $cate) {
        ?>
        <option value="<?= $cate->term_taxonomy_id; ?>"><?= $cate->name ?></option>
        <?php
    }
}

add_action('do_post_dang_tin', 'save_dang_tin');

function save_dang_tin() {

    if (isset($_POST) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $post_type = $_POST['post_type'];
        $post_tp = $_POST['post_tp'];
        $post_quan = $_POST['post_quan'];
        $post_dientich = $_POST['dien-tich'];
        $post_gia = $_POST['gia'];
        $post_rong = $_POST['chieu-rong'];
        $post_dai = $_POST['dien-dai'];
        $post_huong = $_POST['huong'];
        $post_phaply = $_POST['phap-ly'];
        $post_data = array(
            'post_title' => wp_strip_all_tags($post_title),
            'post_content' => $post_content,
            'post_status' => 'publish',
            'post_type' => $post_type,
            'post_author' => $user_id
        );
        $post_id = wp_insert_post($post_data);
        echo '<div class="alert alert-success"><strong>Bạn đã đăng bài thành công!</strong></div>';
    }
}
