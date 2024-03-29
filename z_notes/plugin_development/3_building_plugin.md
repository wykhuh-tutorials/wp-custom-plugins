https://developer.wordpress.org/plugins/plugin-basics/header-requirements/

https://developer.wordpress.org/plugins/wordpress-org/how-your-readme-txt-works/

==

add plugin to admin menu

top-level menu
- may contain submenus
- best for plugins with multiple settings pages


sub-level menu
- add to existing top-level menu
- best for plugins with one settings page

==

sub-level menu

parent slugs for add_submenu_page()

- slug determines which menu to add the submenu to

Dashboard menu - index.php

posts - edit.php

pages - edit.php?post_type=page

media - upload.php

comments - edit-comments.php

themes - themes.php

plugins - plugins.php

users - users.php

tools - tools.php

setting - options-general.php

==

allowed html fields

text input, radio, checkbox, textarea, select menu

==
register settings

register_setting() - register settings

admin_init() is only applied in the admin arrea

```
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

}
add_action( 'admin_init', 'custom_wp_register_settings' );
```
==


i18n

1) add "languages" folder
2) add a file the same as the plugin
3) Have "Text Domain" and "Domain Path" in the plugin settings setup and readme.txt
- text domain must match the name of the plugin directory
- domain path points to language folder


~~

add localization function

1) include load_plugin_textdomain()
2) replace all text strings with localization function

==

__(): return string
_e(): echo string
_x(): specify context with params

safe i10n
- santize the localized string
- prevent translators from inserting malicious code via translation files

esc_html__()
esc_html__e()
esc_html__x()

==

create POT files

Poedit - app

Loco Translate - WP plugin

==

Loco Translate -> plugin -> select plugin -> create template

==

plugin cleanup

remove options from database

- register_uninstall_hook()
- uninstall.php


uninstall.php is the preferred method
- delete_option(): delete options from database
- delete_site_option(): delete multisite options
- delete_transient(): delete transients from database
- delete_metadata(): delete metadata from database
