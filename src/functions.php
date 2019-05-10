<?php

// Add all files in lib folder into array
$include = [
  '/lib/customizer.php',      // Register Customizer Fields
  '/lib/menus.php',       		// Register Menus and Sidebars
  '/lib/styles.php',       		// Register Styles and Scripts
  '/lib/cpt.php',       			// Register Post Type
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
