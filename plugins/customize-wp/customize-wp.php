<?php
/**
 * Plugin Name: Customize WP
 * Plugin URI:  https://example.com/plugins/the-basics/
 * Description: Customize things in WordPress
 * Version:     1.0
 * Author:      Jane Doe
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: customize-wp
 * Domain Path: /languages
 */

 // exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


// if in admin area
if ( is_admin())  {
  // include dependencies
  require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
}

// register plugin settings
function custom_wp_register_settings() {

	/*

	register_setting(
		string   $option_group, // same as "settings_fields( 'xxx' )
		string   $option_name, // field name in database
		callable $sanitize_callback
	);

	*/

	register_setting(
		'customize_wp_options',
		'customize_wp_options',
		'custom_wp_callback_validate_options'
	);

	/*

	add_settings_section(
		string   $section id,
		string   $title,
		callable $callback,
		string   $page to display settings;
		         $page should be same as "add_submenu_page -> menu_slug"
	);

	*/

	add_settings_section(
		'customize_wp_section_login',
		'Customize Login Page',
		'customize_wp_callback_section_login',
		'customize_wp'
	);

	add_settings_section(
		'customize_wp_section_admin',
		'Customize Admin Area',
		'customize_wp_callback_section_admin',
		'customize_wp'
	);

}
add_action( 'admin_init', 'custom_wp_register_settings' );


// validate plugin settings
function custom_wp_callback_validate_options($input) {
	// todo: add validation functionality..
	return $input;
}

// callback: login section
function customize_wp_callback_section_login() {
	echo '<p>These settings enable you to customize the WP Login screen.</p>';
}

// callback: admin section
function customize_wp_callback_section_admin() {
	echo '<p>These settings enable you to customize the WP Admin Area.</p>';
}

