<?php

get_header();

?>

<div class="hero-banner">
        <div class="hero-slider">
		<?php if( have_rows('banner_slider') ): ?>
    
    <?php while( have_rows('banner_slider') ): the_row(); 
    	if( get_sub_field( 'banner_option' ) == 'only image'){
	        $banner_image = get_sub_field('banner');
	        ?>
	        <div>
	           <img class="w-100" src="<?php echo $banner_image['url']; ?>" alt="" title="">
	        </div><?php
	    } else {
	    	$banner_3_columns = get_sub_field( 'banner_3_columan' );
	    	if( $banner_3_columns ){
		    	?><div style="background-size: cover;background-image: url(<?php echo $banner_3_columns['background_image']['url']; ?>)">
		    		    <div class="container">
				    		<div class="row align-items-center py-5">
								<div class="col-md-4 hero-banner-content">
									<h2><?php echo $banner_3_columns['column_1']['title']; ?></h2>
									<p><?php echo nl2br( $banner_3_columns['column_1']['description'] ); ?></p>
									<div class="d-flex app-btn"><?php
										foreach( $banner_3_columns['column_1']['images'] as $image ){
											?><a target="_blank" href="<?php echo $image['url']; ?>"><img class="w-100" src="<?php echo $image['image']['url']; ?>"></a><?php
										}
									?></div>
								</div>
								<div class="col-md-4 text-center my-4 my-md-0">
									<img class="mx-auto" src="<?php echo $banner_3_columns['column_2']['url']; ?>">
								</div>
								<div class="col-md-4"><?php
									foreach ($banner_3_columns['column_3'] as $column) {
										?><a href="<?php echo $column['link']; ?>">
											<div class="slider-services mb-4">
												<div class="d-sm-flex align-items-center">
													<div class="col-sm-2 col-md-3 mb-3 mb-sm-0 mr-sm-2"><img src="<?php echo $column['icon']['url']; ?>"></div>
													<div class="col-sm-10 col-md-9">
														<h3 class="mb-2"><?php echo $column['title']; ?></h3>
														<p class="mb-0"><?php echo nl2br( $column['description'] ); ?></p>
													</div>
												</div>
											</div>
										</a><?php
									}
								?></div>
							</div>
						</div>
		    	</div><?php
		    }
	    }
    endwhile; ?>
    
<?php endif; ?>
        </div>
</div>
<div class="site-main">
		<div class="container">
			<div class="row">
				<?php
					$args = array(
					'post_type'=> 'services',
					'orderby'    => 'ID',
					'post_status' => 'publish',
					'order'    => 'desc',
					'posts_per_page' => 5
				);
				
					$result = new WP_Query( $args );
			if ( $result-> have_posts() ) :?>
			
				<?php 
				$total_post = $result->found_posts; 
				while ( $result->have_posts() ) : $result->the_post(); 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );?>
			    <div class="col-md-6 col-lg-4 mb-4">
					<div class="bank-service">
						<div class="img-wrap">
						<img src="<?php echo $image[0];?>" alt="">
						</div>
						<div class="content">
							<h3><?php the_title();?></h3>
							<?php $description=get_field('description');
							      echo $description; ?>
							<?php $link=get_field('link');?>
							<div class="k-more"><a class="btn" href="<?php echo $link['url'];?>"><?php _e('Know More');?></a></div>
						</div>
					</div>
				</div>
		    	<?php endwhile; ?>
		   
			<?php endif; 
			wp_reset_postdata(); ?>

				
				<div class="col-md-6 col-lg-4 mb-4">
					<div class="rate-charges">
					<?php $rate_and_charges_title = get_field('rate_and_charges_title'); ?>
						<div class="title"><?php echo $rate_and_charges_title; ?></div>
						<div class="accordion-wrap">
							<div class="accordion-container">

							<?php if( have_rows('rate_and_charges_details') ): ?>
    
									<?php
									    $s=1;
										while( have_rows('rate_and_charges_details') ): the_row(); 
										if($s != 1)
										{
											$accstyle="display:none";
										} 
										?>
									<div class="accordion-set">
										<?php $link = get_sub_field('link'); 
										if( $link ): 
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';?>
										<a href="<?php echo $link_url; ?>" class=""><?php endif; ?>
											<?php $image = get_sub_field('image'); ?>
											<img src="<?php echo $image['url']; ?>" alt="">
											<?php $service_title = get_sub_field('service_title'); ?>
											<span><?php echo $service_title; ?></span>
										</a>
										<div class="accordion-content" style=<?php echo $accstyle; ?>>
										<?php $fixed_deposits_title = get_sub_field('fixed_deposits_title'); ?>
										<?php $fixed_deposits_days = get_sub_field('fixed_deposits_days'); ?>
											<p><?php echo $fixed_deposits_title; ?><?php echo '('.$fixed_deposits_days.')'; ?></p>
											<table>
											<?php $regular_title = get_sub_field('regular_title'); ?>
											<?php $regular_percentage = get_sub_field('regular_percentage'); ?>
											<?php $senior_citizen_title = get_sub_field('senior_citizen_title'); ?>
											<?php $senior_citizen_percentage = get_sub_field('senior_citizen_percentage'); ?>
												<tr>
												<td><?php echo $regular_title; ?></td>
												<td><?php echo $regular_percentage; ?></td>
												</tr>
												<tr>
												<td><?php echo $senior_citizen_title; ?></td>
												<td><?php echo $senior_citizen_percentage; ?></td>
												</tr>
											</table>
										</div>
									</div>
									<?php $s++;
									endwhile; 
									?>

									
								<?php endif; ?>
								
							</div>
							<div class="text-center"><a href="<?php echo get_site_url(); ?>/investment/fixed-deposit/" class="btn"><?php _e('See All Rates') ?></a></div>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-4">
				<div class="col-md-12 col-lg-8 mb-4">
					<img src="<?php bloginfo('template_url'); ?>/assets/images/small-banner.png" class="" alt="">
				</div>
				<div class="col-md-12 col-lg-4 mb-4">
				<div class="stories-wrap">
					<?php $stories_in_focus_title=get_field('stories_in_focus_title');?>
					<h3><?php echo $stories_in_focus_title; ?></h3>

						<?php
						$args = array(
						'post_type'=> 'stories',
						'orderby'    => 'ID',
						'post_status' => 'publish',
						'order'    => 'desc',
						'posts_per_page' => 6
						);
							
								$result = new WP_Query( $args );
						if ( $result-> have_posts() ) :?>
						
							<?php 
							$total_post = $result->found_posts;
							$i = 1;
							while ( $result->have_posts() ) : $result->the_post();
// 							if($i != 1)
// 							{
// 								$style="display:none";
// 							} 
							?>
							<div class="accordion-set-one">
								<a href="JavaScript:void(0)" class="stories">
								<span><?php the_title();?></span>
								</a>
								<div class="accordion-content-one" style="display:none" >
								<?php $description=get_field('description');
							      echo $description; ?>	
								</div>
							</div>

							<?php $i++; 
							endwhile; 
							?>
					
						<?php endif; 
						wp_reset_postdata(); ?>

				</div>
			</div>
			<div class="row mb-5">
			<?php $insights_title=get_field('insights_title');?>
				<div class="col-12 text-center mb-2 mt-5"><h2><?php echo $insights_title; ?></h2></div>
				<div class="clearfix"></div>
				<div class="col-md-12 col-lg-6 mb-4">
					<div class="new-article-sec">
					<?php $news_post_title=get_field('news_post_title');?>
					<h3><?php echo $news_post_title; ?></h3>
						<?php /*
								$args = array(
								'post_type'=> 'news',
								'orderby'    => 'ID',
								'post_status' => 'publish',
								'order'    => 'desc',
								'posts_per_page' => -1
							);
							
								$result = new WP_Query( $args );
						if ( $result-> have_posts() ) :?>
						
							<?php 
							$total_post = $result->found_posts; 
							while ( $result->have_posts() ) : $result->the_post(); 
							?>
							<div class="article">
								<p><?php the_title();?></p>
								<a href="<?php echo get_permalink();?>" class="r-more"><?php _e('Read more »'); ?></a>
							</div>
							<?php endwhile; ?>
					
						<?php endif; 
						wp_reset_postdata(); */?>
						<?php $what_is_new_data = get_field('what_is_new_data');
						if(!empty($what_is_new_data)){
							foreach($what_is_new_data as $key => $what_is_new_data_value) {
								$title = $what_is_new_data_value['title'];
								$cta = $what_is_new_data_value['cta'];
						?>
						<div class="article">
							<p><?php echo $title; ?></p>
							<a href="<?php echo $cta['url']; ?>" class="r-more"><?php echo $cta['title']; ?> »</a>
						</div>
						<?php } } ?>
						</div>
				</div>
				<div class="col-md-12 col-lg-6 mb-4">
					<div class="event-gallery-sec">
					<?php $event_title=get_field('event_title');?>
					<h3><?php echo $event_title; ?></h3>
						<?php
								$args = array(
								'post_type'=> 'event',
								'orderby'    => 'ID',
								'post_status' => 'publish',
								'order'    => 'DESC',
								'posts_per_page' => 5
							);
							
								$result = new WP_Query( $args );
						if ( $result-> have_posts() ) :?>
						<div class="event-slider">
							<?php 
							$total_post = $result->found_posts; 
							while ( $result->have_posts() ) : $result->the_post(); 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

							?>
							
							
									<div><a href="<?php echo site_url(); ?>/event/"><img src="<?php echo $image[0];?>" alt=""></a></div>
									

							<?php endwhile; ?>
							</div>
							
						<?php endif; 
						wp_reset_postdata(); ?>
						<!-- <div class="event-slider">
							<div><img src="<?php bloginfo('template_url'); ?>/assets/images/event-gallery.jpg" alt=""></div>
							<div><img src="<?php bloginfo('template_url'); ?>/assets/images/event-gallery-one.jpg" alt=""></div>
						</div>
						<p>Opening of S G Road New Gota Branch</p> -->
					</div>
				</div>
<!-- 				<div class="col-md-12 col-lg-4 mb-4">
					<div class="announcements-sec">
					<?php $announcements_title=get_field('announcements_title');?>
					<h3><?php echo $announcements_title; ?></h3>
						<?php
								$args = array(
								'post_type'=> 'announcement',
								'orderby'    => 'ID',
								'post_status' => 'publish',
								'order'    => 'desc',
								'posts_per_page' => -1
							);
							
								$result = new WP_Query( $args );
						if ( $result-> have_posts() ) :?>
						
							<?php 
							$total_post = $result->found_posts; 
							while ( $result->have_posts() ) : $result->the_post(); 
							?>
								<div class="announcements">
									<p><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></p>
								</div>

							<?php endwhile; ?>
					
						<?php endif; 
						wp_reset_postdata(); ?>
						<!-- <div class="announcements"><p><a href="#">For Non KYC Compliant Customers: Please submit KYC documents urgently otherwise account will freezed / closed as per RBI guidelines.</a></p></div>
						<div class="announcements"><p><a href="#">To avail mobile SMS service please furnish mobile numbers to the nearest branch</p></a></div>
						<div class="announcements"><p><a href="#">MobileBanking / InternetBanking is the most easy and convenient way to stay connected to your bank</a></p></div> -->
					</div>
				</div> 
			</div>
		</div>
	</div>


<?php

get_footer();

?>



