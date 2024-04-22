<?php
// Enqueue Tailwind CSS as a style, not a script
function enqueue_styles_and_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com');

    // Enqueue base styles
    wp_enqueue_style('main-styles', get_theme_file_uri() . '/style.css', array(), 
    filemtime(get_theme_file_path() . '/style.css'), 'all');

    // Choosing to use get_theme_file_uri() and get_theme_file_path() since it is popular for a theme to inherit a parent

}

// Add the function to the wp_enqueue_scripts action hook
add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');
?>
