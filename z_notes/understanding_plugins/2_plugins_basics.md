if you need a certain functionality if you switch themes, you should put the functionality in a plugin

==

wordpress plugin API lets the plugin  communicate with wordpress

Hooks
- action hooks
- filter hooks

hooks lets you run custom code when a certain action happens
- we write a function that does something and then attach the function to the right hook

==

actions - add, remove, or modify functionality
- actions for admin area, actions for posts, etc
- has_action, add_action(), do_action()

filters - add, remove, or modify data
- filters after you read data from database
- filters before you write data to database
- filters before you display the data
- has_filter, add_filter(), apply_filters

==

add_action($tag, $function, $priority, $args)

priority - optional, default is 10
- lower priority happens sooner; higher priority happens later

args - optional, default is 1

==

add_filter($tag, $function, $priority, $args)

==

custom hooks

do_action($function, $arguments)


1) define action hook

function my_action() {
  do_action('my_action', 1);
}


2) attach function to action hook

add_action('my_action', 'do_something');
function do_something() {
  echo 'this action';
}

3) call action hook

my_action();

==

custom filters


1) add filter hook

add_filter('add_more_letters', 'more_letters');
function more_letters($letters) {
  $letters[] = 'd';
  return $letters;
}

2) call filter hook if it exists

function all_letters() {
  $letters = array(
    'a',
    'b',
    'c'
  )

  $list = '<ul>';

  if(has_filter('add_more_letters')) {
    $letters = apply_filters('add_more_letters', $letters)
  }

  foreach($letters as $letter) {
    $list .= '<li>'.$letter.'</li>'
  }
  $list .= '</ul>';

  return $list;
}

==

activation / deactivation hooks

activation
- refresh permalinks when WP registers a new post type
- set default actions in database
- redirect to plugin settings page


deactivation
- unschedule cron jobs

register_activation_hook(__FILE__, 'function');
register_deactivation_hook(__FILE__, 'function');

==

uninstall hook

- when a plugin is deactivated, the deactivation hook runs

- when a plugin is uninstalled, the uninstall hook runs
- remove data from database


==

