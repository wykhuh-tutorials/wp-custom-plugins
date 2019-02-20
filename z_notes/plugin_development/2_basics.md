activation hook
- runs when plugin is activated
- adding default options, add database tables, checking configuration

```
// __FILE__: path to current file

function my_plugin() {
  if (!current_user_can('activate_plugins)) return;

  add_option('my_plugin_posts_per_page', 10);
}

register_activation_hook(__FILE__, 'my_plugin');

```

deactivation hook
- runs when plugin is deactivated
- remove temp data, clear rewrite rule, remove transients


```
// __FILE__: path to current file

function my_plugin() {
  if (!current_user_can('activate_plugins)) return;

  flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'my_plugin');

```

==

wp_die('message');

==

uninstall hook
- when plugin is uninstalled
- remove plugin data from database

```
// __FILE__: path to current file

function my_plugin() {
  if (!current_user_can('activate_plugins)) return;

  delete_option('my_plugin_posts_per_page', 10);
}

register_uninstall_hook(__FILE__, 'my_plugin');

```

==

pluggable functions

WP provides a set of functions that you can replace with custom functions

```
// default logout

wp_logout() {
  wp_destroy_current_session();
  wp_clear_auth_cookie();

  do_action('wp_logout')
}

```

```
// custom logout with hooks

function custom_logout() {

}
add_action('wp_logout', 'custom_logout')

```

```

// custom logout by replacing pluggable function

wp_logout() {
  wp_destroy_current_session();
  wp_clear_auth_cookie();

  do_action('wp_logout')
}
```

==

security techniques

data validation
- check if input data isn't blank
- check if input data is right format
- use wordpress validation functions, php functions or custom validation functions


santize data
- make sure data is safe
- use word press sanization functions, php functions, or custom sanization function

sanitizing input
sanitizing output
- sanitize data as html, sanitize data as a url

using nonces
- generate random string to verify requests

checking users

==

plugin file structure

my_plugin
- admin
  - css
  - js
- public
  - css
  - js
- includes : general php files
- languages
- index.php: empty file to prevent people from view directory files
- my_plugin.pho
- readme.txt
- license.txt

==

architecture patterns

single file with functions

single file with a class

main plugin file and multiple class files

==

wp conditional tags

is_admin()
is_singular() - single post or page
is_single() - single post
is_page - single page
is_archive - archive page

==

avoid naming collisions

namespace
- namespace  functions, classes, hooks, global variables, public variables, database entries

object oriebted programming
- check if class exists

==

