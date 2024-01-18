<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
$tt_includes = array('lib/theme/theme.php', 'lib/project/project.php');


add_theme_support( 'title-tag' );

foreach ( $tt_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( 'Error locating %s for inclusion', $file ), E_USER_ERROR );
	}

	require_once $filepath;
}
unset( $file, $filepath );

function qc_page_categories() {
    $labels = array(
        'name'              => _x( 'Page Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Page Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Page Categories' ),
        'all_items'         => __( 'All Page Categories' ),
        'parent_item'       => __( 'Parent Page Category' ),
        'parent_item_colon' => __( 'Parent Page Category:' ),
        'edit_item'         => __( 'Edit Page Category' ),
        'update_item'       => __( 'Update Page Category' ),
        'add_new_item'      => __( 'Add New Page Category' ),
        'new_item_name'     => __( 'New Page Category Name' ),
        'menu_name'         => __( 'Page Categories' ),
    );
    $args = array(
        'hierarchical'      => true, // Set to false if you want non-hierarchical (like tags) instead of categories.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'page-category' ), // Customize the slug as needed.
    );
    register_taxonomy( 'page_category', 'page', $args );

    // Register Offers Post type
    $labels = array(
            'name'                  => _x( 'Offers', 'Post type general name' ),
            'singular_name'         => _x( 'Offer', 'Post type singular name' ),
            'menu_name'             => _x( 'Offers', 'Admin Menu text' ),
            'name_admin_bar'        => _x( 'Offer', 'Add New on Toolbar' ),
            'add_new'               => __( 'Add New' ),
            'add_new_item'          => __( 'Add New Offer' ),
            'new_item'              => __( 'New Offer' ),
            'edit_item'             => __( 'Edit Offer' ),
            'view_item'             => __( 'View Offer' ),
            'all_items'             => __( 'All Offers' ),
            'search_items'          => __( 'Search Offers' ),
            'parent_item_colon'     => __( 'Parent Offers:' ),
            'not_found'             => __( 'No offers found.' ),
            'not_found_in_trash'    => __( 'No offers found in Trash.' ),
            'featured_image'        => _x( 'Offer Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3' ),
            'archives'              => _x( 'Offer archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4' ),
            'insert_into_item'      => _x( 'Insert into offer', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this offer', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4' ),
            'filter_items_list'     => _x( 'Filter offers list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4' ),
            'items_list_navigation' => _x( 'Offers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4' ),
            'items_list'            => _x( 'Offers list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'offer' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
    );
    register_post_type( 'offer', $args );

    $labels = array(
        'name'              => _x( 'Brands', 'taxonomy general name' ),
        'singular_name'     => _x( 'Brand', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Brands' ),
        'all_items'         => __( 'All Brands' ),
        'parent_item'       => __( 'Parent Brand' ),
        'parent_item_colon' => __( 'Parent Brand:' ),
        'edit_item'         => __( 'Edit Brand' ),
        'update_item'       => __( 'Update Brand' ),
        'add_new_item'      => __( 'Add New Brand' ),
        'new_item_name'     => __( 'New Brand Name' ),
        'menu_name'         => __( 'Brands' ),
    );
    $args = array(
        'hierarchical'      => false, // Set to false if you want non-hierarchical (like tags) instead of categories.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'brand' ), // Customize the slug as needed.
    );
    register_taxonomy( 'brand', 'offer', $args );

    $labels = array(
        'name'              => _x( 'Category', 'taxonomy general name' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Brand' ),
        'parent_item_colon' => __( 'Parent Brand:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );
    $args = array(
        'hierarchical'      => true, // Set to false if you want non-hierarchical (like tags) instead of categories.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'offer-category' ), // Customize the slug as needed.
    );
    register_taxonomy( 'offer-category', 'offer', $args );

    $labels = array(
        'name'              => _x( 'Tag', 'taxonomy general name' ),
        'singular_name'     => _x( 'Tag', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Tags' ),
        'all_items'         => __( 'All Tags' ),
        'parent_item'       => __( 'Parent Tag' ),
        'parent_item_colon' => __( 'Parent Tag:' ),
        'edit_item'         => __( 'Edit Tag' ),
        'update_item'       => __( 'Update Tag' ),
        'add_new_item'      => __( 'Add New Tag' ),
        'new_item_name'     => __( 'New Tag Name' ),
        'menu_name'         => __( 'Tags' ),
    );
    $args = array(
        'hierarchical'      => false, // Set to false if you want non-hierarchical (like tags) instead of categories.
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'offer-tag' ), // Customize the slug as needed.
    );
    register_taxonomy( 'offer-tag', 'offer', $args );
}
add_action( 'init', 'qc_page_categories' );

function qc_modify_search_query($query) {
    // Check if this is the main search query and not an admin query
    if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
        // Modify the search query to include only the 'page' post type
        $query->set('post_type', 'page','post');
    }
}
add_action('pre_get_posts', 'qc_modify_search_query');

// function SearchFilter($query) {
//     if ($query->is_search) {
//         $query->set('post_type', 'page');
//     }
//     return $query;
// }

function qc_enqueue_custom_js_based_on_template() {
    global $post;

    $template_name = 'offers-template.php';

    // Check if the current page is using the specific template
    if (is_a($post, 'WP_Post') && $template_name === get_page_template_slug($post->ID)) {
        wp_enqueue_script('offers', get_stylesheet_directory_uri() . '/assets/js/offers.js', array('jquery'), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'qc_enqueue_custom_js_based_on_template');

/*21-08-2023*/
function digital_Services_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Digital Services Sidebar', 'adcbank' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'adcbank' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	}
add_action( 'widgets_init', 'digital_Services_widgets_init' );

   // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
            'digital-service-menu' => __( 'Digital Service Menu', 'adcbank' ),
		'advances-menu' => __( 'Advances Menu', 'adcbank' ),
		'deposit-menu' => __( 'Deposit Menu', 'adcbank' ),
    ) );

// AJAX callback to load all branches
function load_all_branches_callback() {
    $branches = get_posts(['post_type' => 'gsc_bank_branches', 'posts_per_page' => -1,'order'=> 'ASC']);

    ob_start();

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

    $output = ob_get_clean();
    wp_send_json($output);
}
add_action('wp_ajax_load_all_branches', 'load_all_branches_callback');
add_action('wp_ajax_nopriv_load_all_branches', 'load_all_branches_callback');

//filter

// Add this to your theme's functions.php file


function filter_branches() {
    $selectedCity = $_GET['city'];
    $selectedPin = $_GET['pin'];

    // Query to get filtered branches
    $args = array(
        'post_type' => 'gsc_bank_branches',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'city',
                'value' => $selectedCity,
                'compare' => '=',
            ),
            array(
                'key' => 'pin_code',
                'value' => $selectedPin,
                'compare' => '=',
            )
        )
    );

    $filtered_branches = new WP_Query($args);

    // Loop through and display filtered branches
    if ($filtered_branches->have_posts()) {
        while ($filtered_branches->have_posts()) {
            $filtered_branches->the_post();
            
            // Get branch details
            $address = get_field('address', $filtered_branches->post->ID);
            $city = get_field('city', $filtered_branches->post->ID);
            $ifsc = get_field('ifsc_code', $filtered_branches->post->ID);
            $pin = get_field('pin_code', $filtered_branches->post->ID);
            $phone = get_field('phone', $filtered_branches->post->ID);
            
            // Display branch information in the grid format
            echo '<div class="col-lg-4">';
            echo '<div class="branch-item">';
            echo '<h3>' . $filtered_branches->post->post_title . '</h3>';
            echo '<p>' . $address . '</p>';
            echo '<p>' . $city . '</p>';
            echo '<p>PIN Code : ' . $pin . '</p>';
            echo '<p>Contact No  : ' . $phone . '</p>';
            echo '<p>IFSC Code : ' . $ifsc . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No branches found.</p>';
    }

    // Reset post data
    wp_reset_postdata();

    wp_die(); // End AJAX request
}
add_action('wp_ajax_filter_branches', 'filter_branches');
add_action('wp_ajax_nopriv_filter_branches', 'filter_branches');





function select_branch() {
  wpcf7_add_form_tag( 'select_branch', 'get_selected_branch' );
}
function get_selected_branch( $tag ) {
  ob_start();
    $args = array(
    'post_type' => 'gsc_bank_branches',
    'post_status'=> 'publish',
	'posts_per_page' => -1,
	'order'=>'ASC');
    $branches = get_posts($args);
	
    $output = '<select name="branch" id="single" class="form-control"  placeholder="— Select Area Branch —"><option value="— Select Area Branch —">— Select Area Branch —</option>';
     foreach ( $branches as $item) 
     {
        $output .= '<option value="'.$item->post_title.'">'.$item->post_title.'</option>';
     }
    $output .= "</select>";
    return $output; 

    return ob_get_clean();
}
add_action( 'wpcf7_init', 'select_branch' );


function enqueue_custom_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), '1.0', true);

    // Pass the AJAX URL to the script
    wp_localize_script('custom-ajax', 'custom_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');




function filter_offers() {
    // Get selected values from AJAX request
    $selectedTags = isset($_POST['selected_values']['tags']) ? $_POST['selected_values']['tags'] : array();
    $selectedBrands = isset($_POST['selected_values']['brands']) ? $_POST['selected_values']['brands'] : array();

    // Define an empty tax_query array
    $tax_query = array('relation' => 'AND'); // Use 'AND' relation between tags and brands

    // Taxonomy 'offer-tag' (Change to your actual taxonomy name)
    if (!empty($selectedTags)) {
        $tax_query[] = array(
            'taxonomy' => 'offer-tag', // Change to your actual taxonomy name
            'field' => 'slug',
            'terms' => $selectedTags,
            'operator' => 'IN',
        );
    }

    // Taxonomy 'brand' (Change to your actual taxonomy name)
    if (!empty($selectedBrands)) {
        $tax_query[] = array(
            'taxonomy' => 'brand', // Change to your actual taxonomy name
            'field' => 'slug',
            'terms' => $selectedBrands,
            'operator' => 'IN',
        );
    }

    // Your WP_Query args with tax_query based on selected values
    $args = array(
        'posts_per_page' => 6,
        'post_type' => 'offer',
        'paged' => 1,
        'post_status' => 'publish',
        'tax_query' => $tax_query, // Add tax_query here
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            // Generate HTML content for each offer
            $offer_title = get_the_title();
            $offer_content = get_the_content();
            $offer_image = get_the_post_thumbnail_url();

            // Output the HTML for the offer
            echo '<div class="col-md-6 mb-4">';
            echo '<div class="bank-service">';
            echo '<div class="content">';
            echo '<img class="mb-2" src="' . $offer_image . '" alt="' . $offer_title . '">';
            echo '<h3 class="my-4 pb-1">' . $offer_title . '</h3>';
            echo '<p>' . $offer_content . '</p>';
            echo '<a class="offers-btn d-block pb-2" href="' . get_permalink() . '">' . __('Know More') . '<i class="fa fa-angle-right"></i></a>';
            echo '<hr class="my-4">';
            echo '<div class="d-flex justify-content-between">';
            echo '<span>12512 Views</span>';
            echo '<div class="d-flex">';
            echo '<i class="fa fa-eye"></i>';
            echo '<i class="fa fa-heart-o px-3"></i>';
            echo '<i class="fa fa-share-alt"></i>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No offers found.';
    endif;

    die(); // Always use die() at the end of AJAX callback function
}


add_action('wp_ajax_filter_offers', 'filter_offers'); // For logged-in users
add_action('wp_ajax_nopriv_filter_offers', 'filter_offers'); // For non-logged-in users


function filter_offers_by_category() {
    $selected_category = $_POST['selected_category'];

    $args = array(
        'posts_per_page' => 6,
        'post_type' => 'offer',
        'post_status' => 'publish',
    );

    if (!empty($selected_category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'offer-category', // Change to your actual taxonomy name
                'field' => 'slug',
                'terms' => $selected_category,
            ),
        );
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Get offer details
            $offer_title = get_the_title();
            $offer_content = get_the_content();
            $offer_image = get_the_post_thumbnail_url();
            $offer_permalink = get_permalink();

            // Output the offer HTML
            ?>
            <div class="col-md-6 mb-4">
                <div class="bank-service">
                    <div class="content">
                        <img class="mb-2" src="<?php echo esc_url($offer_image); ?>" alt="<?php echo esc_attr($offer_title); ?>">
                        <h3 class="my-4 pb-1"><?php echo esc_html($offer_title); ?></h3>
                        <p><?php echo esc_html($offer_content); ?></p>
                        <a class="offers-btn d-block pb-2" href="<?php echo esc_url($offer_permalink); ?>"><?php _e('Know More'); ?><i class="fa fa-angle-right"></i></a>
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
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo 'No offers found for this category.';
    }

    $response = ob_get_clean();

    echo $response;

    die();
}

add_action('wp_ajax_filter_offers_by_category', 'filter_offers_by_category');
add_action('wp_ajax_nopriv_filter_offers_by_category', 'filter_offers_by_category');






function fun_load_more() {
    $page   = !empty($_POST['page']) ? $_POST['page'] : 1;
    $args = array(
        'post_type'      => 'annualreport',
        'posts_per_page' => 6,
        'paged'          => $page,
        'post_status'    => 'publish',
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_title = get_the_title();          ?>
<div class="column col-lg-4">
                        <div class="annualreport">
                            <h3><?php echo get_the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <?php
                            $file = get_field('annual_pdf_link');
                            $file_url = $file['url'];
                            ?>
                            <a href="<?php echo esc_url($file_url); ?>" class="btn btn-read-more" target="_blank">Know more</a>
                        </div>
                    </div>
<?php
        }
        wp_reset_query();
        wp_reset_postdata();
        if (function_exists("pagination")) {
         pagination($query->max_num_pages);
        }
        if( $page != $query->max_num_pages ){
            echo'<button class="load_more btn hide-report-data" data_page="'.($page + 1).'">Load more</button>';
			
        }  
		
?>
<div class="loader" style="display:none">
	<img src="<?php echo site_url(); ?>/wp-content/uploads/2023/12/Spinner-2s-200px.svg" alt="loading image" class="loading-img">
</div>
<?php
    } ?>
<?php

    if(wp_doing_ajax() ){
        exit();
    }
      ?>
		
	<?php  
}

add_action('wp_ajax_load_more', 'fun_load_more');
add_action('wp_ajax_nopriv_load_more', 'fun_load_more');


// Add shortcode to display the branch search table
function branch_search_table_shortcode() {
    ob_start(); ?>
    <div class="branch-search-table-container">
<!--         <label for="branch-search">Search Branch:</label> -->
        <input type="text" id="branch-search" placeholder="Search Branch">
    </div>
    <script>
        jQuery(document).ready(function ($) {
            // Add search functionality
            $('#branch-search').on('input', function () {
                var searchText = $(this).val().toLowerCase();
                $('#branchTable tbody tr').show(); // Show all rows before filtering
                if (searchText.trim() !== '') {
                    $('#branchTable tbody tr').not(':first').filter(function () {
                        var branchName = $(this).find('td:eq(1)').text().toLowerCase(); // Target the second column for branch names
                        return branchName.indexOf(searchText) === -1;
                    }).hide();
                }
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('branch_search_table', 'branch_search_table_shortcode');


