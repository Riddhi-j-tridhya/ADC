<?php /* Template Name: Locate Us */ ?>
<?php get_header(); ?>
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
<div class="branch-main">
 <div class="container">
        <ul class="view-tabs">
            <li><a href="#map-view">Map View</a></li>
            <li><a href="#grid-view">Grid View</a></li>
        </ul>
        <div class="row banch-locator">
        
            <div class="col-md-4 contact-left">
                  <?php echo do_shortcode('[gsc_bank_branches]'); ?>
             </div>
           
            <div class="col-md-8 contact-right">
                <div id="map-view" class="view-content">
                    <iframe width="100%" src="https://www.google.com/maps/embed?pb=!..." width="600" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              
            </div>
  			<div id="grid-view" class="view-content" style="display: none;">
				
				<?php
		// Get all branches
		$filter= get_posts(['post_type' => 'gsc_bank_branches', 'posts_per_page' => -1, 'order' => 'ASC']);

		// Create arrays to store unique city names and PIN codes
		$uniqueCities = array();
		$uniquePins = array();

		foreach ($filter as $branch) {
			$city = get_field('city', $branch->ID);
			$pin = get_field('pin_code', $branch->ID);
			$phone=get_field('phone', $branch->ID);
			// Add unique city names to the array
			if (!in_array($city, $uniqueCities)) {
				$uniqueCities[] = $city;
			}

			// Add unique PIN codes to the array
			if (!in_array($pin, $uniquePins)) {
				$uniquePins[] = $pin;
			}
		}
		?>
			<div class="filter-selectbox">
				
				
				<select disabled>
				<option value="Gujarat"  selected>Gujarat</option>
				</select>
			<!-- Select box for filtering by city -->
			<select name="filtercity" id="filtercity" class="col-lg-6">
				<option value="" disabled selected hidden>City</option>
				<?php foreach ($uniqueCities as $city) : ?>
					<option value="<?php echo $city; ?>"><?php echo $city; ?></option>
				<?php endforeach; ?>
			</select>

			<!-- Select box for filtering by PIN code -->
			<select name="filterpin" id="filterpin" class="col-lg-6">
				<option value="" disabled selected hidden>Pin</option>
				<?php foreach ($uniquePins as $pin) : ?>
					<option value="<?php echo $pin; ?>"><?php echo $pin; ?></option>
				<?php endforeach; ?>
			</select>
			<button id="search-button">Search</button>
				</div>
				
   			 <div class="row branches-list ">
		 <div id='searchloadingmessage' style='display:none'>
       <img src='https://www.jqueryscript.net/images/jQuery-Ajax-Loading-Overlay-with-Loading-Text-Spinner-Plugin.jpg' alt="loading image"/>
</div>
        <?php
        
      	 $branches = get_posts(['post_type' => 'gsc_bank_branches', 'posts_per_page' => 6, 'order'=> 'ASC']);
        ?>
		

		<?php 
		
        foreach ($branches as $branch) {
            // Display branch information in the grid format
            // 
           $address=get_field('address', $branch->ID);
			 $city=get_field('city', $branch->ID);
			$ifsc=get_field('ifsc_code', $branch->ID);
			$pin=get_field('pin_code', $branch->ID);
			$phone=get_field('phone', $branch->ID);
            ?>
			<div class="col-lg-4">
				<div class="branch-item">

					<h3><?php echo $branch->post_title; ?></h3>
					<p><?php echo $address; ?></p> 
					<p><?php echo $city; ?></p> 
					<p>PIN Code : <?php echo $pin; ?></p>
					<p>Contect No  : <?php echo $phone; ?></p>
					<p>IFSC Code : <?php echo $ifsc; ?></p>
					<!-- Add more branch data here -->
				</div>
				</div>
            <?php
        }
        ?>
    </div>
    <button id="view-all-branches">View All</button>
				 <div id='loadingmessage' style='display:none'>
       <img src='<?php echo get_site_url(); ?>/wp-content/uploads/2023/12/Spinner-2s-200px.svg' alt="loading image" class="loading-img"/>
</div>
</div>

        </div>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".view-tabs a");
    const viewContents = document.querySelectorAll(".view-content");
    const shortcodeContent = document.querySelector(".contact-left");
    const mapContent = document.querySelector(".contact-right");
    const viewAllButton = document.getElementById("view-all-branches");

    // Simulate a click on the "Grid View" tab to display it by default
    tabs[1].parentElement.classList.add("active");
    viewContents[1].style.display = "block";
    shortcodeContent.style.display = "none"; // Hide the shortcode content for "Grid View"
    mapContent.style.display = "none"; // Hide the map content for "Grid View"

    tabs.forEach((tab, index) => {
        tab.addEventListener("click", (e) => {
            e.preventDefault();
            tabs.forEach((t) => t.parentElement.classList.remove("active"));
            tab.parentElement.classList.add("active");
            viewContents.forEach((content) => (content.style.display = "none"));
            viewContents[index].style.display = "block";

            if (index === 1) {
                shortcodeContent.style.display = "none";
                mapContent.style.display = "none";
            } else {
                shortcodeContent.style.display = "block";
                mapContent.style.display = "block";
            }
        });
    });

    // AJAX request when "View All" button is clicked
    viewAllButton.addEventListener("click", function () {
        // Make an AJAX request to fetch all branches
        jQuery('#loadingmessage').show();
        jQuery.ajax({
            url: ajaxurl,
            type: 'GET',
            data: {
                action: 'load_all_branches'
            },
            success: function (response) {
                document.querySelector(".branches-list").innerHTML = response;
                viewAllButton.style.display = "none";
                jQuery('#loadingmessage').hide();
            },
        });
    });
});

	
	document.addEventListener("DOMContentLoaded", function () {
    const filterCitySelect = document.getElementById("filtercity");
    const filterPinSelect = document.getElementById("filterpin");
    const searchButton = document.getElementById("search-button");
    const branchesList = document.querySelector(".branches-list");
    const searchLoadingMessage = document.getElementById("searchloadingmessage"); // Get the loading message element

    searchButton.addEventListener("click", function () {
        const selectedCity = filterCitySelect.value;
        const selectedPin = filterPinSelect.value;

        // Show the loading spinner
        searchLoadingMessage.style.display = "block";

        // Make an AJAX request to fetch filtered branches
        jQuery.ajax({
            url: ajaxurl, // WordPress AJAX URL
            type: 'GET',
            data: {
                action: 'filter_branches', // The PHP function to handle the AJAX request
                city: selectedCity,
                pin: selectedPin
            },
            success: function (response) {
                // Update branches list with the filtered content
                branchesList.innerHTML = response;
            },
            error: function () {
                // Handle error if needed
            },
            complete: function () {
                // Hide the loading spinner after the request is complete
                searchLoadingMessage.style.display = "none";
            },
        });
    });
});

	

</script>


<?php get_footer(); ?>
