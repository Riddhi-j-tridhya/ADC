<?php /* Template Name: EmiCalc */ ?>
<?php get_header(); ?>

<?php ?>
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
	<div class="row">
		<p>			
		</p>
	<div class="titlesnormal">
<p align="justify">Use EMI calculator as a guide before availing for any kind of loan. EMI calculator let’s you judge how affordable a loan can be for you. Always use the calculator to get a quick quote on your EMIs. You can calculate EMI with this calculator, if the quote satisfies you, then apply accordingly.</p>

</div>

<script src="https://emicalculator.net/widget/2.0/js/emicalc-loader.min.js" type="text/javascript"></script>
<div id="ecww-widgetwrapper" style="min-width: 250px; width: 100%;">
<div id="ecww-widget" style="position: relative; padding-top: 0; padding-bottom: 280px; height: 0; overflow: hidden;"></div>
<div id="ecww-more" style="background: #333; font: normal 13px/1 Helvetica, Arial, Verdana, Sans-serif; padding: 10px 0; color: #fff; text-align: center; width: 100%; clear: both; margin: 0; float: left;"></div>
</div>

</div>
</div>
<?php get_footer(); ?>