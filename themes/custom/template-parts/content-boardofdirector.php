<?php /* Template Name: Board of Director */ ?>
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
<?php 
$content = get_field("content");
$bank_management_title = get_field("bank_management_title");
?>
<p>	<?php echo $content; ?>	</p>
	<h3 class="management-title">	<?php echo $bank_management_title; ?>	</h3>
		<div class="main-director row">
		<?php if (have_rows('directors_detail')) : 
			$i=1;
			?>
			<?php while (have_rows('directors_detail')) : the_row(); 
				$image = get_sub_field('image');
				$name = get_sub_field('name');
				$designation = get_sub_field('designation');
				$content = get_sub_field('content'); // Moved content retrieval here
			?>
			<?php
		
			$cssclass="col-md-3";
			$teamcssclass="col-md-6";
			?>
			<div class="<?php if($i>2) {  echo $cssclass; } ?><?php if($i<=2) {echo $teamcssclass; } ?> director-image" data-bs-toggle="modal" data-bs-target="#lightboxModal<?php echo sanitize_title($name); ?>">
				<a href="#">
					<img src="<?php echo $image['url'] ?>" alt="Thumbnail Image">
				</a>
				<h4><?php echo $name; ?></h4>
				<p><?php echo $designation; ?></p>
			</div>
			<?php 
		$i++;
		endwhile;
			
			?>
		<?php endif; ?>
		</div>
	</div>
</div>

<?php if (have_rows('directors_detail')) : ?>
    <?php while (have_rows('directors_detail')) : the_row(); 
        $image = get_sub_field('image');
        $name = get_sub_field('name');
        $content = get_sub_field('content');
 $designation = get_sub_field('designation');
    ?>
    <div class="modal fade director-modal" id="lightboxModal<?php echo sanitize_title($name); ?>" tabindex="-1" aria-labelledby="lightboxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
					 <div class="modal-post">
						<h5 class="modal-title" id="lightboxModalLabel"><?php echo $name; ?></h5>
						<h6><?php echo $designation; ?></h6>
					 </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="<?php echo $image['url'] ?>" alt="Large Image" class="img-fluid">
                    <p><?php echo $content; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
