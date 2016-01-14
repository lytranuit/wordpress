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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')) {
            if (isset($_POST['post_title'])) {
                $post_title = $_POST['post_title'];
            }
            if (isset($_POST['post_content'])) {
                $post_content = $_POST['post_content'];
            } else {
                echo 'Please enter the content';
            }
            if (isset($_POST['post_type'])) {
                $post_type = $_POST['post_category'];
            }
        } else {
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
            <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
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
                <?php wp_nonce_field('post_nonce', 'post_nonce_field');
                ?>
                <div class="form-group">
                    <div class="col-sm-12" style="padding-left:0;">
                        <button type="submit" class="btn btn-primary">Đăng Bài</button>
                    </div>
                </div>
            </form>
            <?php
        }
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
