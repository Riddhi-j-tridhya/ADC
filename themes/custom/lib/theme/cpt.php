<?php 
function custom_post_type() {
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'ABC' ),
        'singular_name'       => _x( 'Services', 'Post Type Singular Name', 'ABC' ),
        'menu_name'           => __( 'Services', 'ABC' ),
        'parent_item_colon'   => __( 'Parent Services', 'ABC' ),
        'all_items'           => __( 'All Services', 'ABC' ),
        'view_item'           => __( 'View Services', 'ABC' ),
        'add_new_item'        => __( 'Add New Services', 'ABC' ),
        'add_new'             => __( 'Add New', 'ABC' ),
        'edit_item'           => __( 'Edit Services', 'ABC' ),
        'update_item'         => __( 'Update Services', 'ABC' ),
        'search_items'        => __( 'Search Services', 'ABC' ),
        'not_found'           => __( 'Not Found', 'ABC' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ABC' ),
    );
      
    $args = array(
        'label'               => __( 'Services', 'ABC' ),
        'description'         => __( 'Services Services and reviews', 'ABC' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'services', $args );
  
}
  
add_action( 'init', 'custom_post_type', 0 );

function cpt_stories() {
    $labels = array(
        'name'                => _x( 'Stories', 'Post Type General Name', 'ABC' ),
        'singular_name'       => _x( 'Stories', 'Post Type Singular Name', 'ABC' ),
        'menu_name'           => __( 'Stories', 'ABC' ),
        'parent_item_colon'   => __( 'Parent Stories', 'ABC' ),
        'all_items'           => __( 'All Stories', 'ABC' ),
        'view_item'           => __( 'View Stories', 'ABC' ),
        'add_new_item'        => __( 'Add New Stories', 'ABC' ),
        'add_new'             => __( 'Add New', 'ABC' ),
        'edit_item'           => __( 'Edit Stories', 'ABC' ),
        'update_item'         => __( 'Update Stories', 'ABC' ),
        'search_items'        => __( 'Search Stories', 'ABC' ),
        'not_found'           => __( 'Not Found', 'ABC' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ABC' ),
    );
      
    $args = array(
        'label'               => __( 'Stories', 'ABC' ),
        'description'         => __( 'Stories Stories and reviews', 'ABC' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'stories', $args );
  
}
  
add_action( 'init', 'cpt_stories', 0 );

function cpt_news() {
    $labels = array(
        'name'                => _x( 'News', 'Post Type General Name', 'ABC' ),
        'singular_name'       => _x( 'News', 'Post Type Singular Name', 'ABC' ),
        'menu_name'           => __( 'News', 'ABC' ),
        'parent_item_colon'   => __( 'Parent News', 'ABC' ),
        'all_items'           => __( 'All News', 'ABC' ),
        'view_item'           => __( 'View News', 'ABC' ),
        'add_new_item'        => __( 'Add New News', 'ABC' ),
        'add_new'             => __( 'Add New', 'ABC' ),
        'edit_item'           => __( 'Edit News', 'ABC' ),
        'update_item'         => __( 'Update News', 'ABC' ),
        'search_items'        => __( 'Search News', 'ABC' ),
        'not_found'           => __( 'Not Found', 'ABC' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ABC' ),
    );
      
    $args = array(
        'label'               => __( 'News', 'ABC' ),
        'description'         => __( 'News news and reviews', 'ABC' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'news', $args );
  
}
  
add_action( 'init', 'cpt_news', 0 );

function cpt_announcement() {
    $labels = array(
        'name'                => _x( 'Announcement', 'Post Type General Name', 'ABC' ),
        'singular_name'       => _x( 'Announcement', 'Post Type Singular Name', 'ABC' ),
        'menu_name'           => __( 'Announcement', 'ABC' ),
        'parent_item_colon'   => __( 'Parent Announcement', 'ABC' ),
        'all_items'           => __( 'All Announcement', 'ABC' ),
        'view_item'           => __( 'View Announcement', 'ABC' ),
        'add_new_item'        => __( 'Add New Announcement', 'ABC' ),
        'add_new'             => __( 'Add New', 'ABC' ),
        'edit_item'           => __( 'Edit Announcement', 'ABC' ),
        'update_item'         => __( 'Update Announcement', 'ABC' ),
        'search_items'        => __( 'Search Announcement', 'ABC' ),
        'not_found'           => __( 'Not Found', 'ABC' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ABC' ),
    );
      
    $args = array(
        'label'               => __( 'Announcement', 'ABC' ),
        'description'         => __( 'Announcement Announcement and reviews', 'ABC' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'announcement', $args );
  
}
  
add_action( 'init', 'cpt_announcement', 0 );

function cpt_event() {
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'ABC' ),
        'singular_name'       => _x( 'Events', 'Post Type Singular Name', 'ABC' ),
        'menu_name'           => __( 'Events', 'ABC' ),
        'parent_item_colon'   => __( 'Parent Events', 'ABC' ),
        'all_items'           => __( 'All Events', 'ABC' ),
        'view_item'           => __( 'View Events', 'ABC' ),
        'add_new_item'        => __( 'Add New Events', 'ABC' ),
        'add_new'             => __( 'Add New', 'ABC' ),
        'edit_item'           => __( 'Edit Events', 'ABC' ),
        'update_item'         => __( 'Update Events', 'ABC' ),
        'search_items'        => __( 'Search Events', 'ABC' ),
        'not_found'           => __( 'Not Found', 'ABC' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ABC' ),
    );
      
    $args = array(
        'label'               => __( 'Events', 'ABC' ),
        'description'         => __( 'Events Events and reviews', 'ABC' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
    register_post_type( 'event', $args );
  
}
  
add_action( 'init', 'cpt_event', 0 );



/**/
// Register Location Post Type
function register_location_post_type() {
    $labels = array(
        'name'               => 'Locations',
        'singular_name'      => 'Location',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Location',
        'edit_item'          => 'Edit Location',
        'new_item'           => 'New Location',
        'all_items'          => 'All Locations',
        'view_item'          => 'View Location',
        'search_items'       => 'Search Locations',
        'not_found'          => 'No locations found',
        'not_found_in_trash' => 'No locations found in Trash',
        'menu_name'          => 'Locations'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => false,
        'menu_icon'           => 'dashicons-location',
        'rewrite'             => array( 'slug' => 'locations' ),
        'supports'            => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'location', $args );
}
add_action( 'init', 'register_location_post_type' );



add_action( 'init', 'cpt_annualreport' );
/**
* Register a annual report post type.
*
* @link http://codex.wordpress.org/Function_Reference/register_post_type 
*/
function cpt_annualreport() { 
$labels = array( 
    'name'               => _x( 'Annual report', 'post type general name', 'Annual report' ),
    'singular_name'      => _x( 'Annual report', 'post type singular name', 'Annual report' ),
    'menu_name'          => _x( 'Annual report', 'admin menu', 'Annual report' ),
    'name_admin_bar'     => _x( 'Annual report', 'add new on admin bar', 'Annual report' ),
    'add_new'            => _x( 'Add New', 'annual report', 'Annual report' ),
    'add_new_item'       => __( 'Add New Annual report', 'Annual report' ),
    'new_item'           => __( 'New Annual report', 'Annual report' ),
    'edit_item'          => __( 'Edit Annual report', 'Annual report' ),
    'view_item'          => __( 'View Annual report', 'Annual report' ),
    'all_items'          => __( 'All Annual report', 'Annual report' ),
    'search_items'       => __( 'Search Annual report', 'Annual report' ),
    'parent_item_colon'  => __( 'Parent Annual report:', 'Annual report' ),
    'not_found'          => __( 'No Annual report found.', 'Annual report' ),
    'not_found_in_trash' => __( 'No Annual report found in Trash.', 'Annual report' )
);

$args = array(
    'labels'             => $labels,
    'description'        => __( 'Annual report', 'Annual report' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'https://beta.adcbank.in/adcbank/' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => ["title","editor","author","thumbnail","excerpt","comments"]
);

register_post_type( 'annual report', $args );
}
