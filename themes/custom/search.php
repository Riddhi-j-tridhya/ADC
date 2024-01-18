<?php get_header();?>

<div class="container">
    <div class="breadcrumbs py-2">
        <span property="name"><?php _e('Search Result'); ?></span> 
    </div>
</div>
<div class="page-banner">
    <div class="abc_container">
        <div class="row align-items-center justify-content-end">
            <div class="col-md-5 pr-5 page_banner_left py-4 py-xl-0">
                <?php 
                if (have_rows('search_banner','option')) {
                    while (have_rows('search_banner','option')) { 
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
        <h2><?php _e('Search Result'); ?></h2>
    </div><?php
    if (have_posts()) :
        ?><div class="search-results mb-5"><?php 
            while (have_posts()) : the_post();
                $post_img = get_post_thumbnail_id();
                $post_feature_img = wp_get_attachment_image_src($post_img, 'full');
                ?><div id="post-<?php the_ID(); ?>" class="row search-result-row">
	<?php if(!empty($post_feature_img)){?>
                    <div class="img-wrap p-0 col-md-4">
                        <img class="w-100" src="<?php echo $post_feature_img['0']; ?>" alt="<?php echo get_the_title(); ?>">
                    </div>
	<?php } ?>
                    <div class="content col-md-8 py-4 px-md-5">
                        <h3><?php echo get_the_title(); ?></h3>
                        <p><?php 
                            echo customExcerpt( get_the_content(), 17, ' ...' ); 
                        ?></p>
                        <div class="k-more">
                            <a href="<?php echo get_permalink(); ?>" class="btn"><?php _e('Know More'); ?></a>
                        </div>
                    </div>
                </div><?php 
            endwhile; ?>
        </div>

        <nav class="navigation pagination" role="navigation" aria-label="Posts">
            <div class="nav-links"><?php
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'next_text' => '>',
                    'prev_text' => '<',
                ) );
                wp_reset_query();
            ?></div>               
        </nav><?php 
    else: 
        ?><p align="center">Sorry, but nothing matched your search terms. Please try again with some different keywords.</p><?php 
    endif; 
?></div>


<?php get_footer(); ?>