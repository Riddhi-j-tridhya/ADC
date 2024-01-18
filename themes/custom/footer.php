<?php

/**

 * The template for displaying the footer
*/
?>


<div class="footer-top pb-md-4">
	<div class="container-fluid">
		<div class="row mx-3 mx-md-4 mb-5 py-4 py-md-4 footer-top-border justify-content-evenly""><?php 
			if (have_rows('footer_top', 'option')) {
                while (have_rows('footer_top' , 'option')) {
                    the_row();
                    // Get sub field values.
                    $ft_image = get_sub_field('ft_image', 'option');
                    $ft_title = get_sub_field('ft_title', 'option');
                    $ft_link = get_sub_field('ft_link', 'option');
					?><div class="col-md-2 text-center py-md-4" >
						<a href="<?php echo esc_url($ft_link); ?>">
							<img src="<?php echo esc_url($ft_image['url']); ?>">
							<div class="mb-3 mb-md-0"><?php echo ($ft_title); ?></div>
						</a>
					</div><?php
                }
            }
        ?></div>
	</div>
</div>
<footer class="site-footer">
		<div class="container">
			
			<div class="nav-wrap">
				<div class="v-nav">
				<?php $about_us_title = get_field( 'about_us_title', 'option'); ?>
					<h4><?php echo $about_us_title ;?></h4>
					<?php wp_nav_menu( array(
						'theme_location' => 'footer_left_navigation',
					) ); ?>
					<!-- <ul>
						<li><a href="#">History</a></li>
						<li><a href="#">Chairman's Message</a></li>
						<li><a href="#">Board of Directors</a></li>
						<li><a href="#">Important Links</a></li>
						<li><a href="#">Mission & Vision</a></li>
						<li><a href="#">Press</a></li>
					</ul> -->

				</div>
				<div class="v-nav">
				<?php $downloads_title = get_field( 'downloads_title', 'option'); ?>
					<h4><?php echo $downloads_title ;?></h4>
					<?php wp_nav_menu( array(
						'theme_location' => 'footer_middle1_navigation',
					) ); ?>
					<!-- <ul>
						<li><a href="#">Forms</a></li>
						<li><a href="#">Achievements</a></li>
						<li><a href="#">Annual Reports</a></li>
						<li><a href="#">In-Operative Accounts</a></li>
						<li><a href="#">Circulars</a></li>
						<li><a href="#">Calendar</a></li>
					</ul> -->
				</div>
				<div class="v-nav">
				<?php $useful_links_title = get_field( 'useful_links_title', 'option'); ?>
					<h4><?php echo $useful_links_title ;?></h4>
					<?php wp_nav_menu( array(
						'theme_location' => 'footer_middle2_navigation',
					) ); ?>
					<!-- <ul>
						<li><a href="#">Report Frauds</a></li>
						<li><a href="#">Service Charges</a></li>
						<li><a href="#">EMI Calculator</a></li>
						<li><a href="#">RBI Kehta Hai</a></li>
						<li><a href="#">Regulatory Disclosures</a></li>
					</ul> -->
				</div>
				<div class="v-nav">
				<?php $more_information_title = get_field( 'more_information_title', 'option'); ?>
					<h4><?php echo $more_information_title ;?></h4>
					<?php wp_nav_menu( array(
						'theme_location' => 'footer_right_navigation',
					) ); ?>
					
					<!-- <ul>
						<li><a href="#">Disclaimer</a></li>
						<li><a href="#">Terms & Condition</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Customer Service Policy</a></li>
						<li><a href="#">Grievance Redressal Policy</a></li>
						<li><a href="#">Cheque Collection Policy</a></li>
					</ul> -->
				</div>
				<div class="v-nav">
				<?php $download_mobile_app_title = get_field( 'download_mobile_app_title', 'option'); ?>
					<h4><?php echo $download_mobile_app_title ;?></h4>
					<?php  
                 $app_store_link = get_field( 'app_store_link', 'option');
				 $google_play_link = get_field( 'google_play_link', 'option');
				 ?>
					<div class="row">
    <div class="col-md-6">
        <div class="m-app">
            <?php if ($app_store_link): ?>
            <a href="<?php echo $app_store_link; ?>" target="_blank">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/app-store-footer.png" alt="" class="app-link">
            </a>
            <?php endif; ?>
            <a href="<?php echo $app_store_link; ?>" target="_blank">
                <img src="https://beta.adcbank.in/adcbank/wp-content/uploads/2023/10/qr-code-150x150.png">
            </a>
            
        </div>
    </div>

    <div class="col-md-6">
        <div class="m-app">
            <?php if( $google_play_link ): ?>
                        <a href="<?php echo $google_play_link; ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/google-play-footer.png" alt="" class="app-link"></a>
                        <?php endif; ?>
            <a href="<?php echo $google_play_link; ?>" target="_blank">
                <img src="https://beta.adcbank.in/adcbank/wp-content/uploads/2023/10/qr-code-2-150x150.png">
            </a>
        </div>
    </div>
</div>


					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom-wrap">
			<?php $copyright_text = get_field( 'copyright_text', 'option'); ?>
				<div class="left"><?php echo $copyright_text;  ?></div>
				<div class="right">
				<?php  
                 $facebook_url = get_field( 'facebook_url', 'option');
				 $linkedin_url = get_field( 'linkedin_url', 'option');
                 $youtube_url = get_field( 'youtube_url', 'option');
				 $twitter_url = get_field( 'twitter_url', 'option');
                 $instagram_url = get_field( 'instagram_url', 'option');
              
          ?>
					<div class="footer-social">
						<?php if( $facebook_url ): ?>
							<a href="<?php echo $facebook_url; ?>" target="_blank"><i class="fa fa-facebook"></i></a> 
						<?php endif; ?>
						<?php if( $linkedin_url ): ?>
						<a href="<?php echo $linkedin_url; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
						<?php endif; ?>
						<?php if( $youtube_url ): ?>
						<a href="<?php echo $youtube_url; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
						<?php endif; ?>
						<?php if( $twitter_url ): ?>
						<a href="<?php echo $twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
						<?php endif; ?>
						<?php if( $instagram_url ): ?>
						<a href="<?php echo $instagram_url; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<a href="#" class="scrollToTop"><span><i class="fa fa-chevron-up"></i></span></a>
	
<!-- javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/custom.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>																									  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
																					  
<?php wp_footer(); ?>
</body>

</html>

