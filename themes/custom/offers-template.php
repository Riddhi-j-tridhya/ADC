<?php /* Template Name: Offers page */ ?>
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
	<div class="abc_page_title mt-5 mb-5">
    	<h2><?php echo esc_html( get_the_title() ); ?></h2>
	</div>
	<div class="row">
		<div class="col-md-4 adc-offers-filter">
			<div class="fil">
				<div class="d-flex justify-content-between"><h3 class="fil-heading mb-3"><?php _e('Filters'); ?></h3><a class="clear-all-btn" href="javascript:void(0);"><?php _e('Clear All'); ?></a></div><?php
				$tags = get_terms( array(
					'taxonomy' => 'offer-tag',
					'hide_empty' => false,
				) );
				foreach( $tags as $tag ){
				    ?><div class="adc-form-group">
				     	<input type="checkbox" class="tag" id="tag-<?php echo $tag->term_id; ?>" value="<?php echo $tag->slug; ?>" <?php echo ( isset( $_GET['tags'] ) && in_array( $tag->slug, $_GET['tags'] ) ) ? 'checked="checked"' : ''; ?>>
				      	<label for="tag-<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></label>
				    </div><?php
				}
			?></div>
			<div class="cat">
				<h3 class="cat-heading mb-3"><?php _e('Categories'); ?></h3><?php
				$categories = get_terms( array(
					'taxonomy' => 'offer-category',
					'hide_empty' => false,
				) );
				foreach( $categories as $category ){
					?><div class="adc-cat">
						<div class="d-flex adc-cat-heading justify-content-between adc_cat <?php echo ( isset( $_GET['category'] ) && $category->slug == $_GET['category'] ) ? 'active' : ''; ?>" data-cat="<?php echo $category->slug; ?>">
							<label><?php echo $category->name; ?></label>
						</div>
					</div><?php
				}
			?></div>
			<div class="adc-brands mb-5">
				<h3 class="Brands-heading mb-3"><?php _e('Brands'); ?></h3>
				<?php
				$brands = get_terms( array(
					'taxonomy' => 'brand',
					'hide_empty' => false,
				) );
				$total_brands = count( $brands );
				$i=0;
				foreach( $brands as $brand ){
					++$i;
				    ?><div class="adc-form-group adc-brand" <?php echo $i > 3 ? 'style="display:none;"' : ''; ?>>
				    	<input type="checkbox" class="brand" id="brand-<?php echo $brand->term_id; ?>" value="<?php echo $brand->slug; ?>" class="adc_brand" <?php echo ( isset( $_GET['brands'] ) && in_array( $brand->slug, $_GET['brands'] ) ) ? 'checked="checked"' : ''; ?>>
				      	<label for="brand-<?php echo $brand->term_id; ?>"><?php echo $brand->name; ?></label>
				    </div><?php
				}
				?><a class="mt-3 show-more-btn d-block hiding" href="javascript:void(0);" data-label="<?php echo sprintf( __('Show %d More'), $total_brands-3); ?>"><?php echo sprintf( __('Show %d More'), $total_brands-3); ?><i class="pl-2 fa fa-chevron-down"></i></a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row Offers"><?php
				
                
            
				$page_id = get_queried_object_id();
		        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		        $args = array('posts_per_page' => 6, 'post_type' => 'offer', 'paged' => $paged, 'page' => $paged, 'post_status' => 'publish');
		        $append_url = '';

		        if (isset( $_GET['category'] ) || isset($_GET['brands']) || isset($_GET['tags'] ) ) {
		            $tax_query = array('relation' => 'AND');
		            $append_url = '?';
		        }

		        if (isset( $_GET['category'] ) ) {
		            $category_terms = sanitize_text_field( $_GET['category'] );
		            $tax_query[] = array(
		                'taxonomy' => 'offer-category',
		                'field'    => 'slug',
		                'terms'    => array( $category_terms ),
		            );
		            $append_url .= 'category=' . $category_terms;
		        }

		        if (isset($_GET['brands']) && is_array($_GET['brands'])) {
		            $brand_terms = array_map('sanitize_text_field', $_GET['brands'] );
		            $tax_query[] = array(
		                'taxonomy' => 'brand',
		                'field'    => 'slug',
		                'terms'    => $brand_terms,
		            );

		            foreach( $brand_terms as $brand ){
		            	$append_url .= '&brands[]=' . $brand;
		            }
		        }

		        if (isset($_GET['tags']) && is_array($_GET['tags'])) {
		            $tag_terms = array_map('sanitize_text_field', $_GET['tags'] );
		            $tax_query[] = array(
		                'taxonomy' => 'offer-tag',
		                'field'    => 'slug',
		                'terms'    => $tag_terms,
		            );

		            foreach( $tag_terms as $tag ){
		            	$append_url .= '&tags[]=' . $tag;
		            }
		        }

		        if( isset( $tax_query ) ){
		            $args['tax_query'] = $tax_query;
		        }

		        $query = new WP_Query($args);
				if ($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post(); 
                		$offer_img = get_post_thumbnail_id($query->ID);
                		$offer_feature_img = wp_get_attachment_image_src($offer_img, 'full');
						?><div class="col-md-6 mb-4">
							<div class="bank-service">
								<div class="content">
									<div class="time pb-3"><i class="fa fa-clock-o pr-2"></i>169 Days Left</div>
									<img class="mb-2" src="<?php echo $offer_feature_img[0]; ?>" alt="<?php echo get_the_title(); ?>"><?php
									$categories = wp_get_object_terms( get_the_ID(), 'offer-category' );
									$cats = array();
									foreach( $categories as $category ){
										$cats[] = $category->name;
									}
									?><div class="Offers-cat"><?php echo implode(', ', $cats ); ?></div>
									<h3 class="my-4 pb-1"><?php echo get_the_title(); ?></h3>
									<p> 
										 <?php echo $content = get_the_content();
   ?>

									</p>
									<?php $link = get_field("view_t&c_link"); 
                                    if($link){ ?>
									<a class="offers-btn d-block pb-2" target="_blank" href="<?php echo $link['url']; ?>"><?php _e('View T&C'); ?><i class="fa fa-angle-right"></i></a>
									<?php } ?>
									<hr class="my-4">
									<div class="d-flex justify-content-between">
										<span>12512 Views</span>
										<div class="d-flex">
											<i class="fa fa-eye"></i>
											<i class="fa fa-heart-o px-3"></i>
											<i class="fa fa-share-alt"></i>
										</div>
									</div>
								</div>
							</div>
						</div><?php
					endwhile;
					wp_reset_postdata();
				endif;
			?></div><?php
			if( $query->max_num_pages > $paged ){
				?><div class="k-more">
    	            <a class="btn" href="<?php echo get_permalink() . 'paged/' . $paged+1 . $append_url;?>"><?php _e('Load More'); ?></a>
        	    </div><?php
        	}
		?></div>
	</div>
</div>

<script>
    jQuery(document).ready(function($) {
        // Checkbox click event for .tag checkboxes
        $('.tag').on('change', function() {
            filterOffers();
        });

        // Checkbox click event for .brand checkboxes
        $('.brand').on('change', function() {
            filterOffers();
        });

        // Click event for the "Clear All" button
        $('.clear-all-btn').on('click', function() {
            // Uncheck all checkboxes with class 'tag' and 'brand'
            $('.tag').prop('checked', false);
            $('.brand').prop('checked', false);

            // Remove the 'active' class from all categories
            $('.adc-cat-heading').removeClass('active');

            // Trigger the filter function with empty values to show all offers
            filterOffers();
        });

        function filterOffers() {
            // Create separate arrays for .tag and .brand checkboxes
            var selectedTags = [];
            var selectedBrands = [];

            // Loop through selected .tag checkboxes
            $('.tag:checked').each(function() {
                selectedTags.push($(this).val());
            });

            // Loop through selected .brand checkboxes
            $('.brand:checked').each(function() {
                selectedBrands.push($(this).val());
            });

            // Perform separate AJAX requests for .tag and .brand checkboxes
            $.ajax({
                type: 'POST',
                url: custom_ajax_object.ajax_url,
                data: {
                    action: 'filter_offers',
                    selected_values: {
                        tags: selectedTags,
                        brands: selectedBrands
                    }
                },
                success: function(response) {
                    // Update the offers container with the filtered content
                    $('.Offers').html(response);
                }
            });
        }
    });

    jQuery(document).ready(function($) {
        // Click event for .adc-cat-heading checkboxes
        $('.adc-cat-heading').on('click', function() {
            // Get the selected category slug
            var selectedCategory = $(this).data('cat');

            // Remove the 'active' class from all categories
            $('.adc-cat-heading').removeClass('active');

            // Add the 'active' class to the clicked category
            $(this).addClass('active');

            // Send an AJAX request to filter offers by category
            filterOffersByCategory(selectedCategory);
        });

        function filterOffersByCategory(selectedCategory) {
            // Perform an AJAX request to the server
            $.ajax({
                type: 'POST',
                url: custom_ajax_object.ajax_url,
                data: {
                    action: 'filter_offers_by_category',
                    selected_category: selectedCategory,
                },
                success: function(response) {
                    // Update the Offers section with the filtered content
                    $('.Offers').html(response);
                }
            });
        }
    });
</script>

<?php
get_footer();