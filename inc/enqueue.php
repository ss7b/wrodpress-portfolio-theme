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
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assetes/css/main.css', array(), '1.0.2');

    // swiper
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12.0.0');

    // تسجيل وتضمين Swiper JS
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.0', true);    

    // Tailwind CSS
    wp_enqueue_script('tailwind-config', get_template_directory_uri() . '/js/tailwind-config.js', array(), '1.0', true);

    wp_enqueue_script('main-js', get_template_directory_uri() . '/assetes/js/main.js', array(), '2.0.3', true);
}
add_action('wp_enqueue_scripts', 'devportfolio_scripts');

// motion 
// إضافة مكتبة AOS للرسوم المتحركة
function add_aos_animation() {
    // إضافة CSS الخاص بـ AOS
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');
    
    // إضافة JS الخاص بـ AOS
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);
    
    // تهيئة AOS
    wp_add_inline_script('aos-js', '
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                duration: 800,
                easing: "ease-in-out",
                once: true,
                mirror: false,
                offset: 100
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'add_aos_animation');