<?php

 // exit if file is called directly
 if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// callback: validate options
function customize_wp_callback_validate_options( $input ) {

	// custom url
	if ( isset( $input['custom_url'] ) ) {
    // use esc_url to santize url
		$input['custom_url'] = esc_url( $input['custom_url'] );
	}

	// custom title
	if ( isset( $input['custom_title'] ) ) {
		$input['custom_title'] = sanitize_text_field( $input['custom_title'] );
	}

	// custom style
	$radio_options = array(
		'enable'  => 'Enable custom styles',
		'disable' => 'Disable custom styles'
	);

  // check is custom_style is set
	if ( ! isset( $input['custom_style'] ) ) {
		$input['custom_style'] = null;
  }

  // check if custom_style is a valid option
	if ( ! array_key_exists( $input['custom_style'], $radio_options ) ) {
		$input['custom_style'] = null;
	}

	// custom message
	if ( isset( $input['custom_message'] ) ) {
    // wp_kses_post checks for text and markup
		$input['custom_message'] = wp_kses_post( $input['custom_message'] );
	}

	// custom footer
	if ( isset( $input['custom_footer'] ) ) {
		$input['custom_footer'] = sanitize_text_field( $input['custom_footer'] );
	}

  // custom toolbar
  // check if custom_toolbar is set
	if ( ! isset( $input['custom_toolbar'] ) ) {
		$input['custom_toolbar'] = null;
	}

  // check if custom_toolbar is a boolean
	$input['custom_toolbar'] = ($input['custom_toolbar'] == 1 ? 1 : 0);

	// custom scheme
	$select_options = array(
		'default'   => 'Default',
		'light'     => 'Light',
		'blue'      => 'Blue',
		'coffee'    => 'Coffee',
		'ectoplasm' => 'Ectoplasm',
		'midnight'  => 'Midnight',
		'ocean'     => 'Ocean',
		'sunrise'   => 'Sunrise',
	);

  // check if custom_scheme is set
	if ( ! isset( $input['custom_scheme'] ) ) {
		$input['custom_scheme'] = null;
	}

  // check if custom_scheme is a valid option
	if ( ! array_key_exists( $input['custom_scheme'], $select_options ) ) {
		$input['custom_scheme'] = null;
	}

	return $input;
}
