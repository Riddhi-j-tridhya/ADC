<?php /* Template Name: Report Frauds Page */ ?>
<?php
get_header();
?>
<?php 
$please_report_the_following_heading = get_field("please_report_the_following_heading");
$please_report_the_following_content_1 = get_field("please_report_the_following_content_1");
$please_report_the_following_sub_heading= get_field("please_report_the_following_sub_heading");
$please_report_the_following_content_2= get_field("please_report_the_following_content_2");
$note= get_field("note");
$security_tips_heading= get_field("security_tips_heading");
$security_tips_content= get_field("security_tips_content");
$dos_heading= get_field("do’s_heading");
$dont_heading=get_field("dont’s_heading");

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
    <div class="terms-cards">
        <div class="blogwidget">
                            <div class="blogtitle">
                                <h4 style=""><strong><?php echo $please_report_the_following_heading; ?> </strong></h4>
                            </div>
                            <div class="widgetbody" style="padding:15px;">
                                <?php echo $please_report_the_following_content_1; ?>
<!-- 									Kindly report any Unauthorized transaction done by unauthorized person from your ADC Bank account of <strong>via any Electronic Payment Channels</strong>. -->
									
                                <p align="justify" style="color: #212e7d;"><strong> <?php echo $please_report_the_following_sub_heading; ?></strong></p>
                                <?php echo $please_report_the_following_content_2; ?><br><br>
                                
                                <p align="justify" style="color: #ff3333; font-size:20px; ">
                                    <strong><?php echo $note; ?></strong>
                                </p>
                            </div>
                            <span class="box-arrow"></span> 
        </div>
        <div class="report-form">
            <div class="blogtitle">
				<h4><i class="fa fa-user-secret" aria-hidden="true"></i> <strong><?php _e("Fraud Report Form"); ?></strong></h4>
			</div>
            <div class="report-form-inner">
                <?php echo do_shortcode('[contact-form-7 id="0b68eed" title="Fraud Report Form"]'); ?>
            </div>
        </div>
    </div>

    <div class="boxes-full">
					<div class="security-box">
                        <div class="blogtitle" style="">
						    <h4 style=""><strong><?php echo $security_tips_heading; ?></strong></h4>
					    </div>
                        <div class="splitnone" style="">
                            <div class="list-group" style="">
                                <?php if( have_rows('security_tips_content') ): ?>
    
									<?php while( have_rows('security_tips_content') ): the_row(); 
										$content = get_sub_field('content');
										?>
											 <span class="list-group-item" style="">
																	<b><i class="fa fa-hand-o-right" aria-hidden="true"></i></b>&nbsp;&nbsp;&nbsp;     
										   <?php echo $content; ?>
										   </span>

									<?php endwhile; ?>

								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="security-box">
                        <div class="blogtitle" style="">
                            <h4 style=""><strong><?php echo $dos_heading; ?></strong></h4>
                        </div>
                        <div class="splitnone" style="">
                            <div class="list-group" style="">
                                <?php if( have_rows('do’s_content') ): ?>
    
									<?php while( have_rows('do’s_content') ): the_row(); 
										$content = get_sub_field('content');
										?>
											 <span class="list-group-item" style="">
																	<b><i class="fa fa-hand-o-right" aria-hidden="true"></i></b>&nbsp;&nbsp;&nbsp;     
										   <?php echo $content; ?>
										   </span>

									<?php endwhile; ?>

								<?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="security-box">
                        <div class="blogtitle" style="">
                            <h4 style=""><strong><?php echo $dont_heading; ?></strong></h4>
                        </div>
                        <div class="splitnone" style="">
                            <div class="list-group" style="">
                                <?php if( have_rows('dont’s_content') ): ?>
    
									<?php while( have_rows('dont’s_content') ): the_row(); 
										$content = get_sub_field('content');
										?>
											 <span class="list-group-item" style="">
																	<b><i class="fa fa-hand-o-right" aria-hidden="true"></i></b>&nbsp;&nbsp;&nbsp;     
										   <?php echo $content; ?>
										   </span>

									<?php endwhile; ?>

								<?php endif; ?>
                            </div>
                        </div>
                    </div>
					<span class="box-arrow"></span> 
				</div>
</div>
<?php
get_footer();