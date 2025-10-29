<?php
/**
 * Theme Setup
 */

// Register menus
function devportfolio_setup()
{
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'devportfolio'),
    ));

    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'devportfolio_setup');