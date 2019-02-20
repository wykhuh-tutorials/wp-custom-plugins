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

// display the plugin settings page
function customize_wp_display_settings_page() {

	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;

	?>

	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">

			<?php

			// output security fields
			settings_fields( 'customize_wp_options' );

			// output setting sections
			do_settings_sections( 'customize_wp' );

			// submit button
			submit_button();

			?>

		</form>
	</div>

	<?php

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

