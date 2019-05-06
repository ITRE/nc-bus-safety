<?php

// Add all files in lib folder into array
$include = [
  '/lib/cpt.php',       			// Register Post Type
  '/lib/customizer.php',      // Register Customizer Fields
  '/lib/fields.php',       		// Register Custom Fields
  '/lib/menus.php',       		// Register Menus and Sidebars
  '/lib/styles.php',       		// Register Styles and Scripts
];

// Require Once each file in the array
foreach ($include as $file) {
    if (!$filepath = (dirname(__FILE__) .$file)) {
        trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

?>
