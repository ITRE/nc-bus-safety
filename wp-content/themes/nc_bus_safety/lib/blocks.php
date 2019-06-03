<?php

namespace Bus\Blocks;

function register_acf_block_types() {
    // register a category block.
    acf_register_block_type(array(
        'name'              => 'category',
        'title'             => __('NC Bus Safety Category'),
        'description'       => __('A custom layout block.'),
        'render_template'   => 'templates/blocks/category.php',
        'category'          => 'formatting',
        'icon'              => 'id-alt',
    ));
}

// Check if function exists and hook into setup.
if( class_exists('acf') ) {
    add_action('acf/init', __NAMESPACE__ . '\\register_acf_block_types');
}

 ?>
