<?php

 // exit if file is called directly
 if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// callback: login section
function customize_wp_callback_section_login() {
	echo '<p>'.esc_html__('These settings enable you to customize the WP Login screen.', 'customize_wp').'</p>';
}

// callback: admin section
function customize_wp_callback_section_admin() {
	echo '<p>'.esc_html__('These settings enable you to customize the WP Admin Area.', 'customize_wp').'</p>';
}

// callback: text field
function customize_wp_callback_field_text( $args ) {
	$options = get_option( 'customize_wp_options', customize_wp_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

	echo '<input id="customize_wp_options_'. $id .'" name="customize_wp_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="customize_wp_options_'. $id .'">'. $label .'</label>';
}


// callback: radio field
function customize_wp_callback_field_radio( $args ) {
	$options = get_option( 'customize_wp_options', customize_wp_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

	$radio_options = array(

		'enable'  => esc_html__('Enable custom styles', 'customize_wp'),
		'disable' => esc_html__('Disable custom styles', 'customize_wp')

	);

	foreach ( $radio_options as $value => $label ) {

		$checked = checked( $selected_option === $value, true, false );

		echo '<label><input name="customize_wp_options['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
	}
}


// callback: textarea field
function customize_wp_callback_field_textarea( $args ) {
	$options = get_option( 'customize_wp_options', customize_wp_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$allowed_tags = wp_kses_allowed_html( 'post' );

	$value = isset( $options[$id] ) ? wp_kses( stripslashes_deep( $options[$id] ), $allowed_tags ) : '';

	echo '<textarea id="customize_wp_options_'. $id .'" name="customize_wp_options['. $id .']" rows="5" cols="50">'. $value .'</textarea><br />';
	echo '<label for="customize_wp_options_'. $id .'">'. $label .'</label>';
}

// callback: checkbox field
function customize_wp_callback_field_checkbox( $args ) {
	$options = get_option( 'customize_wp_options', customize_wp_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';

	echo '<input id="customize_wp_options_'. $id .'" name="customize_wp_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="customize_wp_options_'. $id .'">'. $label .'</label>';

}

// callback: select field
function customize_wp_callback_field_select( $args ) {
	$options = get_option( 'customize_wp_options', customize_wp_options_default() );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

	$select_options = array(

		'default'   => esc_html__('Default',   'customize_wp'),
		'light'     => esc_html__('Light',     'customize_wp'),
		'blue'      => esc_html__('Blue',      'customize_wp'),
		'coffee'    => esc_html__('Coffee',    'customize_wp'),
		'ectoplasm' => esc_html__('Ectoplasm', 'customize_wp'),
		'midnight'  => esc_html__('Midnight',  'customize_wp'),
		'ocean'     => esc_html__('Ocean',     'customize_wp'),
		'sunrise'   => esc_html__('Sunrise',   'customize_wp'),

	);

	echo '<select id="customize_wp_options_'. $id .'" name="customize_wp_options['. $id .']">';

	foreach ( $select_options as $value => $option ) {
		$selected = selected( $selected_option === $value, true, false );
		echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';
	}

	echo '</select> <label for="customize_wp_options_'. $id .'">'. $label .'</label>';
}

