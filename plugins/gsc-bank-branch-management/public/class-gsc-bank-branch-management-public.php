<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.quanticedgesolutions.com
 * @since      1.0.0
 *
 * @package    Gsc_Bank_Branch_Management
 * @subpackage Gsc_Bank_Branch_Management/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    Gsc_Bank_Branch_Management
 * @subpackage Gsc_Bank_Branch_Management/public
 * @author     QuanticEdge <info@quanticedge.co.in>
 */
class Gsc_Bank_Branch_Management_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gsc-bank-branch-management-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gsc-bank-branch-management-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Allows to print the branches
	 *
	 * @since    1.0.0
	 */
	public function print_branches(){
		if( is_admin() ){
			return;
		}

		$branches = get_posts( array(
			'numberposts' => -1,
			'post_type' => 'gsc_bank_branches',
			'order' => 'ASC'
		) );

		ob_start();
		include_once( plugin_dir_path( __FILE__ ) . '../public/partials/gsc-bank-branch-management-public-display.php');
		return ob_get_clean();
	}

}
