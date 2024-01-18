<?php /* Template Name: Digital Services */ ?>
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
<div class="container">
	<div class="abc_page_title mt-5 mb-5">
		<div class="history_blocks">
	    	        <div class="row tabs-stage-inner mb-md-5 pb-md-3">
		       <div class="col-md-4 col-lg-3">
				   <?php
 if ( is_active_sidebar( 'sidebar-1' ) ) {
        get_sidebar( 'sidebar-1' ); 
 }?>
						</div>
				   <div class="col-md-8 col-lg-9">
					   <?php
echo the_content();
?>
				   </div>
			   </div>
	     </div>
	</div></div>

<?php
get_footer();