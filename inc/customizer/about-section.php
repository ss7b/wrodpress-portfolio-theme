<?php
/**
 * About Section Customizer
 */

function devportfolio_about_customize_register($wp_customize) {
  // About Section

    $wp_customize->add_section('about_section', array(
        'title' => __('About Section', 'devportfolio'),
        'priority' => 35,
    ));

    // About Image
    $wp_customize->add_setting('about_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => __('About Image', 'devportfolio'),
        'section' => 'about_section',
        'settings' => 'about_image',
    )));
    // About Section Title
    $wp_customize->add_setting('about_section_title', array(
        'default' => 'About Me',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_section_title', array(
        'label' => __('About Section Title', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    // About Title
    $wp_customize->add_setting('about_title', array(
        'default' => 'Passionate Web Developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_title', array(
        'label' => __('About Title', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    // About Content
    $wp_customize->add_setting('about_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('about_content', array(
        'label' => __('About Content', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'textarea',
        'description' => __('You can use basic HTML tags here.', 'devportfolio'),
    ));

    // Location
    $wp_customize->add_setting('location', array(
        'default' => 'New York, USA',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('location', array(
        'label' => __('Location', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting('email', array(
        'default' => 'alex@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('email', array(
        'label' => __('Email', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'email',
    ));

    // Phone
    $wp_customize->add_setting('phone', array(
        'default' => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('phone', array(
        'label' => __('Phone', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    // Availability
    $wp_customize->add_setting('availability', array(
        'default' => 'Available for freelance',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('availability', array(
        'label' => __('Availability', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    // Skills (يمكن إضافة مهارات ديناميكية)
    $wp_customize->add_setting('skills_list', array(
        'default' => 'HTML,CSS,JavaScript,PHP,WordPress,React',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('skills_list', array(
        'label' => __('Skills List', 'devportfolio'),
        'section' => 'about_section',
        'type' => 'text',
        'description' => __('Separate skills with commas', 'devportfolio'),
    ));

    // باقي إعدادات about-section...
}
add_action('customize_register', 'devportfolio_about_customize_register');