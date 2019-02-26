<?php

 // exit if file is called directly
 if ( ! defined( 'ABSPATH' ) ) {
  exit;
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
		esc_html__('Customize Login Page', 'myplugin'),
		'customize_wp_callback_section_login',
		'customize_wp'
	);

	add_settings_section(
		'customize_wp_section_admin',
		esc_html__('Customize Admin Area', 'myplugin'),
		'customize_wp_callback_section_admin',
		'customize_wp'
	);

	/*

	add_settings_field(
    	string   $id: used to retrieve setting from database ,
		string   $title: label,
		callable $callback: display markup,
		string   $page: page to display setting,
		string   $section = 'default':  section to display setting,
		         $section is the same as "add_settings_section -> section"
		array    $args = []: data to pass to callback
	);

	*/

	add_settings_field(
		'custom_url',
		esc_html__('Custom URL', 'myplugin'),
		'customize_wp_callback_field_text',
		'customize_wp',
		'customize_wp_section_login',
		[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
	);

	add_settings_field(
		'custom_title',
		esc_html__('Custom Title', 'myplugin'),
		'customize_wp_callback_field_text',
		'customize_wp',
		'customize_wp_section_login',
		[ 'id' => 'custom_title', 'label' => 'Custom title attribute for the logo link' ]
	);

	add_settings_field(
		'custom_style',
		esc_html__('Custom Style', 'myplugin'),
		'customize_wp_callback_field_radio',
		'customize_wp',
		'customize_wp_section_login',
		[ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login screen' ]
	);

	add_settings_field(
		'custom_message',
		esc_html__('Custom Message', 'myplugin'),
		'customize_wp_callback_field_textarea',
		'customize_wp',
		'customize_wp_section_login',
		[ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
	);

	add_settings_field(
		'custom_footer',
		esc_html__('Custom Footer', 'myplugin'),
		'customize_wp_callback_field_text',
		'customize_wp',
		'customize_wp_section_admin',
		[ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
	);

	add_settings_field(
		'custom_toolbar',
		esc_html__('Custom Toolbar', 'myplugin'),
		'customize_wp_callback_field_checkbox',
		'customize_wp',
		'customize_wp_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
	);

	add_settings_field(
		'custom_scheme',
		esc_html__('Custom Scheme', 'myplugin'),
		'customize_wp_callback_field_select',
		'customize_wp',
		'customize_wp_section_admin',
		[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
	);

}
add_action( 'admin_init', 'custom_wp_register_settings' );


