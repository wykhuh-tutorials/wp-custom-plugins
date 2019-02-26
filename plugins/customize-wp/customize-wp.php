<?php
/**
 * Plugin Name: Customize WP
 * Plugin URI:  https://example.com/plugins/the-basics/
 * Description: Customize things in WordPress
 * Version:     1.0
 * Author:      Jane Doe
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: customize_wp
 * Domain Path: /languages
 */


// load text domain
function customize_wp_load_textdomain() {
	// first param must match "Text Domain"
	load_plugin_textdomain( 'customize_wp', false, plugin_dir_path( __FILE__ ) . 'languages/' );
}
add_action( 'plugins_loaded', 'customize_wp_load_textdomain' );

 // exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


// if in admin area
if ( is_admin())  {
  // include dependencies
  require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
  require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-validate.php';
}

// include dependencies for admin and public
require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';

// default plugin options
function customize_wp_options_default() {

	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress', 'customize_wp'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">'.__('My custom message', 'customize_wp').'</p>',
		'custom_footer'  => __('Special message for users', 'customize_wp'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);

}


// remove options on uninstall
function customize_wp_on_uninstall() {
	if ( ! current_user_can( 'activate_plugins' ) ) return;

	delete_option( 'customize_wp_options' );

}
register_uninstall_hook( __FILE__, 'customize_wp_on_uninstall' );
