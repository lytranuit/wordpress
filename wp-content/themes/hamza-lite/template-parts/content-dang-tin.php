<?php
$meta = get_post_meta($post->ID);
$cat = wp_get_post_terms($post->ID, 'khu-vuc', array("fields" => "all"));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("row"); ?>>
    <header class="entry-header">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="entry-meta">
            <?php hamza_lite_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="clearfix"></div>
    <hr>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <hr>
    <div class="entry-info">
        <div class="diachi col-md-12">
            <label>Địa chỉ:</label>
            <span><?= $meta['wpcf-dia-chi'][0]; ?></span>
        </div>
        <div class="dtich col-lg-3">
            <label>DT:</label>
            <span>
                <?php echo $meta['wpcf-dien-tich'][0]; ?>
            </span>
        </div>
        <div class="gia col-lg-3">
            <label>Giá:</label>
            <span>
                <?php echo $meta['wpcf-gia'][0]; ?>
            </span>
        </div>
        <div class="col-md-12">
            <div class="col-md-12" style="margin-left: -15px;font-weight: bold;color: black;" >Một số hình ảnh của bất động sản :</div>
            <?php if (isset($meta['wpcf-hinh-anh']) && $meta['wpcf-hinh-anh'][0] != '') { ?>
                <?php foreach ($meta['wpcf-hinh-anh'] as $hinhanh) { ?>
                    <img src="<?php echo $hinhanh; ?>"/>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</article>