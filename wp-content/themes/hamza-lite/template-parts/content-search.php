<?php
$meta = get_post_meta($post->ID);
$cat = wp_get_post_terms($post->ID, 'khu-vuc', array("fields" => "all"));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("row"); ?>>
    <div class="search-thumb col-lg-3">
        <?php if (isset($meta['wpcf-hinh-anh']) && $meta['wpcf-hinh-anh'][0] != '') { ?>

            <img src="<?php echo $meta['wpcf-hinh-anh'][0]; ?>"/>

        <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/featured-fallback.jpg"/>

        <?php } ?>
    </div>
    <div class="entry-content col-lg-9">
        <header class="entry-header">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <?php hamza_lite_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->
        <div class="entry-summary">
            <?php echo substr(get_the_excerpt(), 0, 300) . '...'; ?>
        </div>
        <footer class="entry-footer row">
            <div class="details-wp">
                <div class="diachi col-lg-12">
                    <label>
                        Địa chỉ:
                    </label>
                    <span>
                        <?php echo $meta['wpcf-dia-chi'][0]; ?>
                    </span>
                </div>
                <div class="khuvuc col-lg-12">
                    <label>
                        Khu vực:
                    </label>
                    <span>
                        <?php echo $cat[0]->name; ?>
                    </span>
                </div>
                <div class="dtich col-lg-3">
                    <label>
                        DT:
                    </label>
                    <span>
                        <?php echo $meta['wpcf-dien-tich'][0]; ?>
                    </span>
                </div>
                <div class="gia col-lg-3">
                    <label>
                        Giá:
                    </label>
                    <span>
                        <?php echo $meta['wpcf-gia'][0]; ?>
                    </span>
                </div>

                <div class="huong col-lg-3">
                    <label>
                        Hướng:
                    </label>
                    <span>
                        <?php echo $meta['wpcf-huong'][0]; ?>
                    </span>
                </div>
                <div class="phaply col-lg-3">
                    <label>
                        Pháp lý:
                    </label>
                    <span>
                        <?php echo $meta['wpcf-phap-ly'][0]; ?>
                    </span>
                </div>
            </div>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-## -->