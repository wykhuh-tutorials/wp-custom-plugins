Custom post types


$args = ();

 function my_post_type() {
   register_post_type('recipes', $args);
 }

 add_action('init', 'my_custom_post_type');

==

custom taxonomies


$args = ();

 function my_taxonomy() {
   register_taxonomy('recipe-type', 'recipes', $args);
 }

 add_action('init', 'my_taxonomy');


==

