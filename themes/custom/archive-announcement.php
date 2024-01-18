<?php

/**

 * The template for displaying announcement archive

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Twenty_Seventeen

 * @since 1.0

 * @version 1.0

 */



get_header();

?><div class="container"><?php 
    if (function_exists('bcn_display')) : ?>
        <div class="breadcrumbs py-2">
            <?php bcn_display(); ?>
        </div>
    <?php endif; ?>
</div><?php
?>

<div class="page-banner">

  <div class="abc_container">
        <div class="row align-items-center justify-content-end">
            <div class="col-md-5 pr-5 page_banner_left py-4 py-xl-0">
                <?php 
                if (have_rows('announcement_archive_banner','option')) {
                    while (have_rows('announcement_archive_banner','option')) { 
                        the_row();
                        // Get sub field values.
                        $page_banner_image = get_sub_field('banner_image','option');
                        $banner_title = get_sub_field('banner_title','option');
                        $banner_description = get_sub_field('banner_description','option');
                        $link = get_sub_field('link','option');
                        ?>
                        <div class="page_banner_detils">
                            <h2 class="page_banner_title mb-4"><?php echo $banner_title; ?></h2>
                            <p class="page_banner_dec"><?php echo $banner_description; ?></p>
                            <?php 
                            // Check if the link sub-field exists and output the link if available.
                            if ($link) {
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php
                            }
                        ?></div><?php
                    }
                }
                ?>
            </div>
            <div class="col-md-7">
                <img class="w-100" src="<?php echo $page_banner_image['url']; ?>" class="hero_banner_img" alt="<?php echo $page_banner_image['alt']; ?>">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="abc_page_title mt-5 mb-5">
        <h2><?php echo __('Announcement'); ?></h2>
    </div>
    <div class="row my-md-5 pt-md-4"><?php 
        $page_id = get_queried_object_id();
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array('cat'  => $page_id, 'posts_per_page' => 9, 'post_type' => 'announcement', 'paged' => $paged, 'page' => $paged, 'post_status' => 'publish');
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); 
                $news_img = get_post_thumbnail_id($query->ID);
                $news_feature_img = wp_get_attachment_image_src($news_img, 'full');
                ?><div class="col-md-6 col-lg-4 mb-4">
                    <div class="bank-service">
                        <div class="img-wrap p-0">
                            <img src="<?php echo $news_feature_img['0']; ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
                        </div>
                        <div class="content">
                            <p><?php 
                                echo customExcerpt( get_the_content(), 17, ' ...' ); 
                            ?></p>
                            <div class="k-more">
                                <a class="btn" href="<?php echo get_permalink($query->ID);?>"><?php _e('Know More'); ?></a> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?> 
            <div class="row">
                <div class="col-md-12">
                    <nav class="adc-nav" aria-label="Page navigation"><?php 
                        tt_pagination( $query->max_num_pages ) ?>
                    </nav>
                </div>
            </div>
        <?php else: ?>
            <div class="error"><?php _e('Not found.'); ?></div> 
        <?php endif; ?>
    </div>
</div>
<?php get_footer();?>