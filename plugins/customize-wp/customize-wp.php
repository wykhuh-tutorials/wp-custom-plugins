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
