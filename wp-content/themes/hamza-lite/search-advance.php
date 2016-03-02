<?php
/**
 * The template for displaying Advanced Search Results pages.
 *
 * @package Ly Tran
 */
get_header();
$khuvuc = array();
$dientich = array();
$mucgia = array();
$huong = $_REQUEST['huong'];
foreach ($_REQUEST['khuvuc'] as $row) {
    array_push($khuvuc, $row);
}
foreach ($_REQUEST['dientich'] as $row) {
    array_push($dientich, $row);
}
foreach ($_REQUEST['mucgia'] as $row) {
    array_push($mucgia, $row);
}

$args = array(
    'post_type' => 'dang-tin',
    
);
$the_query = new WP_Query($args);
echo "<pre>";
print_r($the_query);
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
