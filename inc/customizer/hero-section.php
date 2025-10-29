<?php
/**
 * Hero Section Customizer
 */

function devportfolio_hero_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'devportfolio'),
        'priority' => 30,
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Hi, I\'m Alex Morgan',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // باقي إعدادات الهيرو...
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Full Stack Web Developer',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'I create modern, responsive, and user-friendly web applications with cutting-edge technologies.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    // Button 1 Text
    $wp_customize->add_setting('hero_button1_text', array(
        'default' => 'View My Work',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button1_text', array(
        'label' => __('Button 1 Text', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Button 1 Link
    $wp_customize->add_setting('hero_button1_link', array(
        'default' => '#projects',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button1_link', array(
        'label' => __('Button 1 Link', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Button 2 Text
    $wp_customize->add_setting('hero_button2_text', array(
        'default' => 'Contact Me',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button2_text', array(
        'label' => __('Button 2 Text', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // Button 2 Link
    $wp_customize->add_setting('hero_button2_link', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button2_link', array(
        'label' => __('Button 2 Link', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Hero Icon
    $wp_customize->add_setting('hero_icon', array(
        'default' => 'fas fa-code',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_icon', array(
        'label' => __('Hero Icon', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'text',
        'description' => __('Enter Font Awesome icon class (e.g., fas fa-code, fas fa-laptop-code)', 'devportfolio'),
    ));

    // Icon Animation
    $wp_customize->add_setting('hero_icon_animation', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('hero_icon_animation', array(
        'label' => __('Enable Icon Animation', 'devportfolio'),
        'section' => 'hero_section',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'devportfolio_hero_customize_register');