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

// So my initial idea for getting the reading time for a post is to calculate the number of words in a post,
// including headings, links, paragraphs etc. Find the average reading time of a human as an assumption of speed and
// divide the number of words by number of words read per minute.

function reading_time() {
    // Assuming the average speed for reading is 200 WPM
    $average_read_speed = 200; 

    // Get the post content, this includes tags
    $post_content = get_post_field('post_content', get_the_ID());

    // Convert to string and strip html tags for accuracy
    $word_count = str_word_count(strip_tags($post_content));

    // If the word count is zero, we can create a condition to tell the user there is no post content yet
    if ($word_count == 0) {
        return 0;
    }

    // Find the total reading time, round up using 'ceil' as this tends to be a more accurate representation
    $reading_time = ceil($word_count / $average_read_speed);

    return $reading_time;
}

// You could also write a database function to this so the processing is only applied once and the result is saved as the blogs reading time.
// This would end up being a substantial factor towards becoming a more sustainable project as the hefty process wouldn't be loaded every time a user visits the page.

// Add the function to the wp_enqueue_scripts action hook
add_action('wp_enqueue_scripts', 'enqueue_styles_and_scripts');
?>
