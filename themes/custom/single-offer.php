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
				if (have_rows('offer_page_banner' )) {
					while (have_rows('offer_page_banner')) { 
						the_row();
						// Get sub field values.
						$page_banner_image = get_sub_field('offer_page_banner_image');
						$banner_title = get_sub_field('offer_banner_title');
						$banner_description = get_sub_field('offer_banner_description');
						$link = get_sub_field('offer_link');
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
        <h2><?php the_title(); ?></h2>
    </div>
    <div class="row my-md-5 pt-md-4 single-offer-content"><?php
    	the_content();
    ?></div>
</div><?php
if( have_rows( 'tabs' ) ){
	?><div class="stories-wrap mb-5" id="offers-terms-conditions">
		<h2><?php _e('Offer Terms & Conditions'); ?></h2><?php
		while( have_rows( 'tabs' ) ){
			the_row();
			?><div class="accordion-set-one">
				<a href="javascript:void(0);" class="stories">
					<span><?php echo get_sub_field('title'); ?></span>
				</a>
				<div class="accordion-content-one" style="display: none;"><?php echo get_sub_field('content'); ?></div>
			</div><?php 
		}
	?></div><?php
}
get_footer();?>