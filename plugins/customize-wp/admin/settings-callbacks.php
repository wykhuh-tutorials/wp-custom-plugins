<?php

 // exit if file is called directly
 if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

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

// callback: text field
function customize_wp_callback_field_text( $args ) {
	// todo: add callback functionality..
	echo 'This will be a text field.';
}

// callback: radio field
function customize_wp_callback_field_radio( $args ) {
	// todo: add callback functionality..
	echo 'This will be a radio field.';
}

// callback: textarea field
function customize_wp_callback_field_textarea( $args ) {
	// todo: add callback functionality..
	echo 'This will be a textarea.';
}

// callback: checkbox field
function customize_wp_callback_field_checkbox( $args ) {
	// todo: add callback functionality..
	echo 'This will be a checkbox.';
}

// callback: select field
function customize_wp_callback_field_select( $args ) {
	// todo: add callback functionality..
	echo 'This will be a select menu.';
}
