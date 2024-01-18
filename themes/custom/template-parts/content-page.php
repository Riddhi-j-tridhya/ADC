<?php

/*** Template part for displaying page content in page.php */

?>
<div class="container"><?php 
	if (function_exists('bcn_display')) : ?>
	    <div class="breadcrumbs py-2">
	        <?php bcn_display(); ?>
	    </div>
	<?php endif; ?>
</div>
<?php $showhide_banner = get_field('showhide_banner') ;
if(!$showhide_banner) {
?>
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
<?php } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>

	<header class="entry-header abc_page_title mt-5 mb-5">
		<?php //the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content();

		wp_link_pages(

			array(

				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hosen' ),

				'after'  => '</div>',

			)

		);

		?>

	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

		<footer class="entry-footer">

			<?php

			edit_post_link(

				sprintf(

					wp_kses(

						/* translators: %s: Name of current post. Only visible to screen readers */

						__( 'Edit <span class="screen-reader-text">%s</span>', 'hosen' ),

						array(

							'span' => array(
								'class' => array(),
							),

						)

					),
					wp_kses_post( get_the_title() )
				),

				'<span class="edit-link">','</span>'

			);

			?>
		</footer><!-- .entry-footer -->

	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->



