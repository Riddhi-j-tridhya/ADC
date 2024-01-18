<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.quanticedgesolutions.com
 * @since      1.0.0
 *
 * @package    Gsc_Bank_Branch_Management
 * @subpackage Gsc_Bank_Branch_Management/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gsc_Bank_Branch_Management
 * @subpackage Gsc_Bank_Branch_Management/admin
 * @author     QuanticEdge <info@quanticedge.co.in>
 */
class Gsc_Bank_Branch_Management_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the post type.
	 *
	 * @since    1.0.0
	 */
	public function register_post_type(){
		$labels = array(
            'name' => _x('Branches', 'Post type general name', 'gsc-bank-branch-management'),
            'singular_name' => _x('Branch','Post type singular name', 'gsc-bank-branch-management'),
            'menu_name' => _x('Branches', 'Admin Menu text', 'gsc-bank-branch-management'),
            'name_admin_bar' => _x('Branch','Add New on Toolbar', 'gsc-bank-branch-management'),
            'add_new' => __('Add New Branch', 'gsc-bank-branch-management'),
            'add_new_item' => __('Add New Branch', 'gsc-bank-branch-management'),
            'edit_item' => __('Edit Branch', 'gsc-bank-branch-management'),
            'new_item' => __('New Branch', 'gsc-bank-branch-management'),
            'view_item' => __('View Branch', 'gsc-bank-branch-management'),
            'search_items' => __('Search Branch', 'gsc-bank-branch-management'),
            'not_found' => __( 'No branches found', 'gsc-bank-branch-management'),
            'not_found_in_trash' => __('No branches found in trash', 'gsc-bank-branch-management'),
            'item_updated' => __('Branch updated successfully', 'gsc-bank-branch-management'),
            'item_published' => __('Branch published successfully', 'gsc-bank-branch-management')
        );
    
        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => false,
            'show_ui' => true,
            'has_archive' => true,
            'menu_position' => 5,
            'supports' => array( 'title' ),
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'gsc_bank_branches' ),
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_icon' => 'dashicons-bank',
        );
        register_post_type( 'gsc_bank_branches' , $args );
	}

    /**
     * Adds the fields required on branches
     *
     * @since    1.0.0
     */
    public function branches_fields(){
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            return;
        }

        acf_add_local_field_group( array(
            'key' => 'group_64bf76f7a460e',
            'title' => 'Branch Details',
            'fields' => array(
                array(
                    'key' => 'field_64bf76f83f478',
                    'label' => 'Address',
                    'name' => 'address',
                    'aria-label' => '',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'placeholder' => '',
                    'new_lines' => '',
                ),
				array(
                    'key' => 'field_64bf76f83f478e',
                    'label' => 'City',
                    'name' => 'city',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'rows' => '',
                    'placeholder' => '',
                    'new_lines' => '',
                ),
                array(
                    'key' => 'field_64bf77293f479',
                    'label' => 'Phone',
                    'name' => 'phone',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
                array(
                    'key' => 'field_64bf77293e779',
                    'label' => 'Fax',
                    'name' => 'fax',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
                array(
                    'key' => 'field_64bf774c3f47a',
                    'label' => 'IFSC Code',
                    'name' => 'ifsc_code',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
				
				array(
                    'key' => 'field_64bf774c3f47d',
                    'label' => 'PIN Code',
                    'name' => 'pin_code',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
				
				
                array(
                    'key' => 'field_64bf775c3f47b',
                    'label' => 'Facilities at Branch',
                    'name' => 'facilities_at_branch',
                    'aria-label' => '',
                    'type' => 'checkbox',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        'atm' => 'ATM',
                        'lockers' => 'Lockers',
                        'banking' => 'Banking',
						'e-stamping' => 'E Stamping',
						'auto-vault' => 'Auto Vault',
						'franking' => 'Franking',
						'cash-depositor' => 'Cash Depositor',
						'kiosk' => 'Kiosk',
                    ),
                    'default_value' => array(
                    ),
                    'return_format' => 'array',
                    'allow_custom' => 0,
                    'layout' => 'vertical',
                    'toggle' => 1,
                    'save_custom' => 0,
                    'custom_choice_button_text' => 'Add new choice',
                ),
                array(
                    'key' => 'field_64bf77c63f47c',
                    'label' => 'Information',
                    'name' => 'information',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'gsc_bank_branches',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ) );
    }
}
