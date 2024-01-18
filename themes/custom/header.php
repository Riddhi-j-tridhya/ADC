<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="euc-jp">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--     <title><?php //echo get_bloginfo(); ?></title> -->

   

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Fonts -->

    <!-- font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font Awesome -->

    <!-- Slick slider Css -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/slick.css">
    <!-- Slick slider Css -->

    <!-- Css -->
    <link href="<?php bloginfo('template_url'); ?>/assets/css/navigation.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/css/style.css" rel="stylesheet" type="text/css">
	  
    <!-- Css -->

    <?php wp_head(); ?>   
  </head>
   <body <?php body_class(); ?>>
    
   <div class="site-header-wrap">
   <div class="header-top">
		<div class="container">
			<div class="topnav">
			<?php wp_nav_menu( array(
					'theme_location' => 'primary_top_navigation',
			) ); ?>
				
			</div>
			<div class="header-right">
				
					<ul class="links">
					<?php $contect_us_link = get_field('contect_us_link','options'); ?>
					<?php $locate_us_link = get_field('locate_us_link','options'); ?>
						<li><a href="<?php echo $contect_us_link['url'] ; ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/top-call.png" alt="" width="16" height="16"><?php echo $contect_us_link['title']; ?></a></li>
						<li><a href="<?php echo $locate_us_link['url'] ; ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/top-location.png" alt="" width="12" height="16"><?php echo $locate_us_link['title']; ?></a></li>
					</ul>
					<div class="notification"><a href="<?php echo get_site_url(); ?>/event"><img src="<?php echo site_url(); ?>/wp-content/uploads/2023/12/icons8-gallery-64.png" alt="" width="22" height="16"></a></div>

<!-- <div class="notification"><a href="<?php echo get_site_url(); ?>/announcement"><img src="<?php bloginfo('template_url'); ?>/assets/images/notification-icon.png" alt="" width="18" height="16"><span class="counter"><?php echo $count_posts = wp_count_posts( 'announcement' )->publish; ?></span></a></div> -->
				
				<div class="top-search">
					<a href="#" class="search-button"><img src="<?php bloginfo('template_url'); ?>/assets/images/search-icon.png" alt="" width="16" height="16"></a>
					<form class="search-section" style="display: none;">
						<input type="text" name="s" id="s" value="Search" class="form-control" onblur="if(this.value=='')this.value='Search'" onfocus="if(this.value=='Search')this.value=''" required/>
        	    <input type="hidden" value="submit" />        	                     								
						<button type="submit" id="search_btn">
							<svg xmlns="http://www.w3.org/2000/svg" width="17px" height="17px" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
						</button>
						
					</form>
				</div>
				<div class="btn-group">
				<?php $internet_banking_login_link = get_field('internet_banking_login_link','options'); ?>
				<?php $cyber_awareness_link = get_field('cyber_awareness_link','options'); ?>
					<a href="<?php echo $internet_banking_login_link['url'] ; ?>" class="btn" target="_blanck"><?php echo $internet_banking_login_link['title'] ; ?></a>
					<a href="<?php echo $cyber_awareness_link['url'] ; ?>" class="btn btn-green"><?php echo $cyber_awareness_link['title'] ; ?></a>
				</div>
			</div>
		</div>
	</div>
	<header class="site-header">
		<div class="container">
			<?php $header_logo = get_field('header_logo','options'); ?>
			<div class="logo"><a href="<?php echo get_site_url(); ?>" rel="home"><img src="<?php echo $header_logo['url']; ?>" class="attachment-full size-full" alt="" loading="lazy" /></a> </div>
			<div class="wrap">
				<div class="small-screen">
					<div class="mobile-header">
						<ul class="links">
						<?php $contect_us_link = get_field('contect_us_link','options'); ?>
						<?php $locate_us_link = get_field('locate_us_link','options'); ?>
							<li><a href="<?php echo $contect_us_link['url'] ; ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/top-call-white.png" alt="" width="16" height="16"></a></li>
							<li><a href="<?php echo $locate_us_link['url'] ; ?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/top-location-white.png" alt="" width="12" height="16"></a></li>
						</ul>
<div class="notification"><a href="<?php echo get_site_url(); ?>/event"><img src="<?php echo site_url(); ?>/wp-content/uploads/2023/12/icons8-gallery-16-1.png" alt="" width="18" height="16"></a></div>
<!-- 						<div class="notification"><a href="<?php echo get_site_url(); ?>/announcement"><img src="<?php bloginfo('template_url'); ?>/assets/images/notification-icon-white.png" alt="" width="18" height="16"><span class="counter"><?php echo $count_posts = wp_count_posts( 'news' )->publish; ?></span></a></div> -->
					</div>
					<div class="top-search-mobile">
						<a href="#" class="search-button-mobile"><img src="<?php bloginfo('template_url'); ?>/assets/images/search-icon-mobile.png" alt="" width="16" height="16"></a>
						<form class="search-section-mobile" style="display: none;">
<input type="text" name="s" id="s" value="Search" class="form-control" onblur="if(this.value=='')this.value='Search'" onfocus="if(this.value=='Search')this.value=''" required/>	
							 <input type="hidden" value="submit" />        	                     								
						
						</form>
					</div>
				</div>
				<!-- <div class="nav-toggle"><i></i></div> -->

					<div class="header-menu"><?php dynamic_sidebar( 'header-menu' ); ?></div>

			</div>
		</div>
	</header>
	</div>
  
	<div class="small-screen">
		<div class="top-btn-group">
			<div class="container">
			<?php $internet_banking_login_link = get_field('internet_banking_login_link','options'); ?>
			<?php $cyber_awareness_link = get_field('cyber_awareness_link','options'); ?>
				<a href="<?php echo $internet_banking_login_link['url'] ; ?>" class="btn" ><?php echo $internet_banking_login_link['title'] ; ?></a>
				<a href="<?php echo $cyber_awareness_link['url'] ; ?>" class="btn btn-green">Cyber Awareness</a>
			</div>
		</div>
	</div>

