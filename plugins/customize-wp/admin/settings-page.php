<?php


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
			// should be same as "add_submenu_page -> menu_slug"
			do_settings_sections( 'customize_wp' );

			// submit button
			submit_button();

			?>

		</form>
	</div>

	<?php

}

