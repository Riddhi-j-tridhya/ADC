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

<style>

</style>

<div class="press-main events">

	<div class="container">

		   <h3 class="text-g " style="text-align: center;"><?php echo get_the_title(); ?></h3>

		<div class="row">
<?php
			if( have_rows('event_gallery_photo') ):
$i= 1;
			while( have_rows('event_gallery_photo') ) : the_row();


				$image = get_sub_field('image');?>
			<div class="column col-lg-4">
				
			
<a href="#" data-bs-toggle="modal" data-bs-target="#lightboxModal<?php echo $i;?>">

		         
             <img src="<?php echo $image['url']; ?> ">

	
		      
</a></div>

<?php $i++; endwhile; endif;   ?>
		

			
</div>
	</div>
</div>

<?php
	if( have_rows('event_gallery_photo') ):
	$i = 1;
	  $count = count(get_field('event_gallery_photo'));
    while( have_rows('event_gallery_photo') ) : the_row();

     
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