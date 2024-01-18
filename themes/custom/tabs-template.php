<?php /* Template Name: Tabs page */ ?>
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
</div>
<div class="container"><div class="abc_page_title mt-5 mb-5">
    	<h2><?php //echo esc_html( get_the_title() ); ?></h2>
	</div>
</div><?php

if (have_rows('tabs_nav')) {
	?><div class="tabs">
		<div class="container"><?php
			$count = 0;
			$li_content = '';
			while (have_rows('tabs_nav')) {
				the_row();
				$li_content .= '<li class="mb-3 mb-md-0"><a href="#tab-' . $count . '"> ' . get_sub_field('title') . '</a></li>';
				$count++;
			}
			?><ul class="tabs-nav d-md-flex justify-content-center mb-4 text-center tab-list"><?php
				echo $li_content;
			?></ul>
			<div class="tabs-stage px-md-5"><?php
				$count = 0;
				while (have_rows('tabs_nav')) {
					the_row();
					?><div class="tabs-stage-inner" id="tab-<?php echo $count;?>">
				    	<div class="col-md-11 mx-auto mb-4 pb-3"><?php the_sub_field('paragraph'); ?></div><?php
				      	$inner_count = 0;

				      	if( have_rows('content_repeater')) {
				      		while (have_rows('content_repeater')) {
								the_row();

								$image = get_sub_field('image');
								$block_content = get_sub_field('content');
								if($inner_count % 2 == 0) {
							      	?><div class="row align-items-center mb-md-5 pb-md-3">
								      	<div class="col-md-6"><?php
								      	if(isset($image) && !empty($image)) {
								      		?><img class="w-100" src="<?php echo $image['url'];?>"><?php
								      	}
								      	?></div>
								      	<div class="col-md-6 tabs-stage-content tabs-stage-content-right"><?php
								      		echo $block_content;	
								      	?></div>
						      		</div><?php
						      	}
					      		else {
					      			?><div class="row align-items-center mb-md-5 pb-md-3">	      	
								      	<div class="col-md-6 order-2 order-md-1 tabs-stage-content tabs-stage-content-left"><?php
								      		echo $block_content;	
								      	?></div>
								      	<div class="col-md-6 order-1 order-md-2"><?php
								      	if(isset($image) && !empty($image)) {
								      		?><img class="w-100" src="<?php echo $image['url'];?>"><?php
								      	}
								      	?></div>
						      		</div><?php
					      		}
					      		$inner_count++;
				      		}
			      		}
		    		?></div><?php
		  		$count++;
	  		}
			?></div>
		</div>
	</div><?php
}
get_footer();