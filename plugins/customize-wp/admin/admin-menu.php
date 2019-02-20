<?php

 // exit if file is called directly
 if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


// add sub-level administrative menu
function customize_wp_add_sublevel_menu() {

	/*

	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug,
		callable $function = ''
	);

	*/

	add_submenu_page(
		'options-general.php',
		'Customize WP Settings',
		'Customize WP',
		'manage_options',
		'customize_wp',
		'customize_wp_display_settings_page'
	);

}
add_action( 'admin_menu', 'customize_wp_add_sublevel_menu' );

