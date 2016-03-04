<?php
/**
 * The template for displaying Advanced Search Results pages.
 *
 * @package Ly Tran
 */
get_header();
$khuvuc = array();
$dientich = array(
    'relation' => 'OR'
);
$mucgia = array(
    'relation' => 'OR'
);
$huong = $_REQUEST['huong'];
/* huong */
if ($huong) {
    $huong = array(
        'key' => 'wpcf-huong', //(string) - Tên meta key
        'value' => $huong, //(string/array) - Giá trị meta value
        'type' => 'NUMERIC',
        'compare' => '='
    );
} else {
    
}
foreach ($_REQUEST['khuvuc'] as $row) {
    array_push($khuvuc, $row);
}
foreach ($_REQUEST['dientich'] as $row) {
    if ($row == 1) {
        $push = array(
            'key' => 'wpcf-dien-tich', //(string) - Tên meta key
            'value' => array(50, 100), //(string/array) - Giá trị meta value
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN'
        );
    } elseif ($row == 2) {
        $push = array(
            'key' => 'wpcf-dien-tich', //(string) - Tên meta key
            'value' => array(50, 100), //(string/array) - Giá trị meta value
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN'
        );
    } elseif ($row == 3) {
        $push = array(
            'key' => 'wpcf-dien-tich', //(string) - Tên meta key
            'value' => '1000', //(string/array) - Giá trị meta value
            'type' => 'NUMERIC',
            'compare' => '>='
        );
    }
    array_push($dientich, $push);
}
foreach ($_REQUEST['mucgia'] as $row) {
    if ($row == 1) {
        $push = array(
            'key' => 'wpcf-gia',
            'value' => array(300, 500),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN'
        );
    } elseif ($row == 2) {
        $push = array(
            'key' => 'wpcf-gia',
            'value' => array(500, 1000),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN'
        );
    } elseif ($row == 3) {
        $push = array(
            'key' => 'wpcf-gia',
            'value' => array(1000, 3000),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN'
        );
    } elseif ($row == 4) {
        $push = array(
            'key' => 'wpcf-gia',
            'value' => array(3000, 5000),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN'
        );
    } elseif ($row == 5) {
        $push = array(
            'key' => 'wpcf-gia',
            'value' => array(5000, 10000),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN'
        );
    } elseif ($row == 6) {
        $push = array(
            'key' => 'wpcf-gia', //(string) - Tên meta key
            'value' => '10000', //(string/array) - Giá trị meta value
            'type' => 'NUMERIC',
            'compare' => '>='
        );
    }
    array_push($mucgia, $push);
}

$args = array(
    'post_type' => 'dang-tin',
    'tax_query' => array(
        array(
            'taxonomy' => 'khu-vuc', //(string) - Tên của taxonomy
            'field' => 'id', //(string) - Loại field cần xác định term của taxonomy, sử dụng 'id' hoặc 'slug'
            'terms' => array(20, 21, 21), //(int/string/array) - Slug của các terms bên trong taxonomy cần lấy bài
            'operator' => 'IN'                    //(string) - Toán tử áp dụng cho mảng tham số này. Sử dụng 'IN' hoặc 'NOT IN'
        ),
    ),
    'meta_query' => array(//(array)  - Sử dụng nhiều điều kiện lấy bài viết theo custom field 
        'relation' => 'AND', //(string) - Mối quan hệ của các array query bên trong, sử dụng 'OR' hoặc 'AND'
        $dientich,
        $mucgia,
        $huong
    )
);
$the_query2 = new WP_Query($args);
$query_types = get_query_var();
echo "<pre>";
print_r($the_query2);
?>
<div class="ak-container">

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if ($the_query->have_posts()) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php printf(__('Có tất cả %s kết quả', 'hamza-lite'), '<span>' . $the_query->post_count . '</span>'); ?></h1>
                </header><!-- .page-header -->

                <?php /* Start the Loop */ ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php get_template_part('template-parts/content', 'summary'); ?>

                <?php endwhile; ?>

                <?php hamza_lite_paging_nav(); ?>

            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; ?>

        </main><!-- #main -->
    </section><!-- #primary -->

    <?php get_sidebar('right'); ?>
    <?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>
