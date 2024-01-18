<?php

get_header();

$queried_object = get_queried_object();
$args = array(
	'post_status' => "publish",
	'post_type' => "page",
	'post_per_page' => -1,
	'tax_query'      => array(
        array(
            'taxonomy' => 'page_category',
            'field'    => 'term_id', 
            'terms'    => $queried_object->term_id, 
        ),
    ),
);

$posts = new WP_Query( $args ); ?>

<div class="container">
	<div class="bannertext">
    	<h2><?php echo single_cat_title( '', false );?></h2>
	</div>
	<div class="row">
	    <?php if ( $posts->have_posts() ) {
	        while ( $posts->have_posts() ) {
	            $posts->the_post();
	            ?>
	            <div class="col-md-6 col-lg-4 mb-4">
	                <div class="bank-service">
	                    <div class="img-wrap">
	                        <?php echo get_the_post_thumbnail(); ?>
	                    </div>
	                    <div class="content">
	                        <h3><?php the_title(); ?></h3>
	                        <p><?php the_content(); ?></p>
	                        <div class="k-more"><a class="btn" href="<?php the_permalink(); ?>">Know More</a></div>
	                    </div>
	                </div>
	            </div>
	            <?php
	        }
	        wp_reset_postdata();
	    } else {
	        echo 'No posts found.';
	    }
	    ?>
	</div>
</div>
<?php
get_footer();
