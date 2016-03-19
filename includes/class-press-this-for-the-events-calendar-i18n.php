<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://flexperception.com
 * @since      1.0.0
 *
 * @package    Press_This_For_The_Events_Calendar
 * @subpackage Press_This_For_The_Events_Calendar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Press_This_For_The_Events_Calendar
 * @subpackage Press_This_For_The_Events_Calendar/includes
 * @author     Seth Miller <seth@flexperception.com>
 */
class Press_This_For_The_Events_Calendar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'press-this-for-the-events-calendar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
