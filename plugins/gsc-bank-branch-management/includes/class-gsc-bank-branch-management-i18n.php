<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.quanticedgesolutions.com
 * @since      1.0.0
 *
 * @package    Gsc_Bank_Branch_Management
 * @subpackage Gsc_Bank_Branch_Management/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Gsc_Bank_Branch_Management
 * @subpackage Gsc_Bank_Branch_Management/includes
 * @author     QuanticEdge <info@quanticedge.co.in>
 */
class Gsc_Bank_Branch_Management_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'gsc-bank-branch-management',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
