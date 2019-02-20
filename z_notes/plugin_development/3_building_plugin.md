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
