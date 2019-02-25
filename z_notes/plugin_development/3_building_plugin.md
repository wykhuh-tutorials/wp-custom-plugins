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
