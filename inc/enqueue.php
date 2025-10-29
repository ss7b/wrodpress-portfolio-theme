<?php
/**
 * Enqueue Styles and Scripts
 */

function devportfolio_scripts()
{
    // Main stylesheet
    wp_enqueue_style('devportfolio-style', get_stylesheet_uri());

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assetes/css/main.css', array(), '1.0.1');

    // swiper
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12.0.0');

    // تسجيل وتضمين Swiper JS
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.0', true);

    // Tailwind CSS
    wp_enqueue_script('tailwind-config', get_template_directory_uri() . '/js/tailwind-config.js', array(), '1.0', true);

    wp_enqueue_script('main-js', get_template_directory_uri() . '/assetes/js/main.js', array(), '2.0.3', true);
}
add_action('wp_enqueue_scripts', 'devportfolio_scripts');