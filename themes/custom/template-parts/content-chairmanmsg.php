<?php /* Template Name: Chairman Message page */ ?>
<?php
get_header();
?>

<div class="container"><?php 
	if (function_exists('bcn_display')) : ?>
	    <div class="breadcrumbs py-2">
	        <?php bcn_display(); ?>
	    </div>
	<?php endif; ?>
</div>
<div class="page-banner">
	<div class="abc_container">
		<div class="row align-items-center justify-content-end">
			<div class="col-md-5 pr-5 page_banner_left py-4 py-xl-0">
				<?php 
				if (have_rows('page_banner')) {
					while (have_rows('page_banner')) { 
						the_row();
						// Get sub field values.
						$page_banner_image = get_sub_field('page_banner_image');
						$banner_title = get_sub_field('banner_title');
						$banner_description = get_sub_field('banner_description');
						$link = get_sub_field('link');
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
</div><?php

global $wpdb;

// Get child pages
$str_pages = "SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'page' AND post_parent = '" . get_the_ID() . "' LIMIT 9";
$arr_pages = $wpdb->get_results($str_pages);

?><div class="container">
	<div class="abc_page_title mt-5 mb-5">
    	<h2><?php echo esc_html( get_the_title() ); ?></h2>
	</div>
	<p class="mb-5 pb-md-3"><?php the_field('history_top_content'); ?></p>

	<?php if( have_rows('history_blocks') ): ?>
	    <div class="history_blocks">
	    <?php while( have_rows('history_blocks') ): the_row(); 
	        $image_left = get_sub_field('image_left');
	        ?>
	        <div class="row tabs-stage-inner mb-md-5 pb-md-3">
		       <div class="col-md-6">
		            <img class="w-100" src="<?php echo esc_url($image_left['url']); ?>">
				  
			<h3 class="text-g" style="text-align: center;">Shri Ajaybhai H. Patel</h3>
<p style="text-align: center; margin-top: -10px;">Chairman</p>

	
		        </div>
		         <div class="col-md-6 tabs-stage-content-right">
		        	<?php the_sub_field('right_content'); ?>
		        </div>
	    	</div>
	    <?php endwhile; ?>
	    </div>
	<?php endif; ?>
</div>
<?php
get_footer();