<?php
/**
 * Contact Section Customizer
 */

function devportfolio_contact_customize_register($wp_customize) {
     // إضافة قسم للاتصال
    $wp_customize->add_section('contact_section', array(
        'title' => __('Contact Section', 'text-domain'),
        'priority' => 30,
    ));

    // إعداد البريد الإلكتروني
    $wp_customize->add_setting('contact_email', array(
        'default' => 'alex@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email', 'text-domain'),
        'section' => 'contact_section',
        'type' => 'email',
    ));

    // إعداد رقم الهاتف
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Contact Phone', 'text-domain'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    // إعداد الموقع
    $wp_customize->add_setting('contact_location', array(
        'default' => 'New York, USA',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_location', array(
        'label' => __('Contact Location', 'text-domain'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    // إعدادات وسائل التواصل الاجتماعي
    $wp_customize->add_setting('social_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_linkedin', array(
        'label' => __('LinkedIn URL', 'text-domain'),
        'section' => 'contact_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('social_github', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_github', array(
        'label' => __('GitHub URL', 'text-domain'),
        'section' => 'contact_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('social_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_twitter', array(
        'label' => __('Twitter URL', 'text-domain'),
        'section' => 'contact_section',
        'type' => 'url',
    ));
    $wp_customize->add_setting('social_whatsapp', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_whatsapp', array(
        'label' => __('Whatsapp URL', 'text-domain'),
        'section' => 'contact_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'devportfolio_contact_customize_register');