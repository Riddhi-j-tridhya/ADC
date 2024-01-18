<?php /* Template Name: Press */ ?>
<?php
get_header();
?>
<div class="container">
    <?php if (function_exists('bcn_display')) : ?>
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
<style>
body {
  
  margin: 0;
}

* {
  box-sizing: border-box;
}

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}
img {
  margin-bottom: -4px;
}









	.press-main {
		padding:50px 0;
	}
	.press-main .column {
		margin-bottom:30px;
	}
	
	.press-main .container {
    	box-shadow: 0px 0px 10px #ccc;
		padding:20px;
	}
</style>

<div class="press-main">

	<div class="container">


		<div class="row">
<?php
			if( have_rows('prees_repeater') ):
$i= 1;
			while( have_rows('prees_repeater') ) : the_row();


				$image = get_sub_field('image');?>
			<div class="column col-lg-4">
				
			
<a href="#" data-bs-toggle="modal" data-bs-target="#lightboxModal<?php echo $i;?>">

		         
				  
			<h3 class="text-g hover-shadow cursor" style="text-align: center;"><?php echo $image; ?> </h3>

	
		      
</a></div>

<?php $i++; endwhile; endif;   ?>
		

			<?php $last_image = get_field('last_image');
			$pdf = get_field('pdf');?>

<div class="column col-lg-4">
	<a href="<?php echo $pdf['url']; ?>" target="_blank">	
		<h3 class="text-g hover-shadow cursor" style="text-align: center;"><?php echo $last_image; ?> </h3></a>
		  </div>
</div>
	</div>
</div>

<?php
	if( have_rows('pop_up_repeater') ):
	$i = 1;
	  $count = count(get_field('pop_up_repeater'));
    while( have_rows('pop_up_repeater') ) : the_row();

     
        $image = get_sub_field('image');?>
<div class="modal fade" id="lightboxModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="lightboxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid">
            </div>
            <div class="modal-footer">
                <?php if ($i > 1) : ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#lightboxModal<?php echo $i - 1; ?>">
                        Previous
                    </button>
                <?php endif; ?>
                <?php if ($i < $count) : ?>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#lightboxModal<?php echo $i + 1; ?>">
                        Next
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $i++; endwhile; endif; ?>

<?php
get_footer();