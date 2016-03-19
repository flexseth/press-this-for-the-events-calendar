<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://flexperception.com/code/custom-plugin-press-events-calendar
 * @since             1.0.0
 * @package           Press_This_For_The_Events_Calendar
 *
 * @wordpress-plugin
 * Plugin Name:       Press This for The Events Calendar 
 * Plugin URI:        http://flexperception.com/code/custom-plugin-press-events-calendar
 * Description:       Modify the Press This bookmarklet to be able to easily post Event types, which will allow you to easily add Events to The Events Calendar.
 * Version:           1.0.0
 * Author:            Seth Miller
 * Author URI:        http://flexperception.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       press-this-for-the-events-calendar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-press-this-for-the-events-calendar-activator.php
 */
function activate_press_this_for_the_events_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-press-this-for-the-events-calendar-activator.php';
	Press_This_For_The_Events_Calendar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-press-this-for-the-events-calendar-deactivator.php
 */
function deactivate_press_this_for_the_events_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-press-this-for-the-events-calendar-deactivator.php';
	Press_This_For_The_Events_Calendar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_press_this_for_the_events_calendar' );
register_deactivation_hook( __FILE__, 'deactivate_press_this_for_the_events_calendar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-press-this-for-the-events-calendar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_press_this_for_the_events_calendar() {

	$plugin = new Press_This_For_The_Events_Calendar();
	$plugin->run();

}
run_press_this_for_the_events_calendar();

/**
 * Plugin Name: Custom Press-This Post Type
 * Plugin URI:  http://wordpress.stackexchange.com/a/192065/26350
 */
add_action( 'wp_ajax_press-this-save-post', function()
{
    add_filter( 'wp_insert_post_data', function( $data )
    {
        if( isset( $data['post_type'] ) && 'post' === $data['post_type'] )
            $data['post_type'] = 'tribe_events'; // <-- Edit this to your needs!

        return $data;
    }, PHP_INT_MAX );

}, 0 );