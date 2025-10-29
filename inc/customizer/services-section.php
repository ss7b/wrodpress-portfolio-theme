<?php
/**
 * Services Section Customizer
 */

function devportfolio_services_customize_register($wp_customize) {
    // قسم الخدمات
    $wp_customize->add_section('services_section', array(
        'title' => __('Services Section', 'mytheme'),
        'priority' => 30,
    ));

    // عنوان قسم الخدمات
    $wp_customize->add_setting('services_title', array(
        'default' => 'خدمات الويب الشاملة',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_title', array(
        'label' => __('عنوان الخدمات', 'mytheme'),
        'section' => 'services_section',
        'type' => 'text',
    ));

    // وصف قسم الخدمات
    $wp_customize->add_setting('services_description', array(
        'default' => 'نقدم مجموعة متكاملة من خدمات تطوير الويب لتحويل أفكارك إلى واقع رقمي متميز',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('services_description', array(
        'label' => __('وصف الخدمات', 'mytheme'),
        'section' => 'services_section',
        'type' => 'textarea',
    ));

    // عدد الخدمات
    $wp_customize->add_setting('services_count', array(
        'default' => 3,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('services_count', array(
        'label' => __('عدد الخدمات', 'mytheme'),
        'section' => 'services_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
        ),
    ));

    // إعدادات الخدمات الفردية
    for ($i = 1; $i <= 10; $i++) {
        // عنوان الخدمة
        $wp_customize->add_setting("service_{$i}_icon", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("service_{$i}_icon", array(
            'label' => sprintf(__(' الايقونة %d', 'mytheme'), $i),
            'section' => 'services_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("service_{$i}_title", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("service_{$i}_title", array(
            'label' => sprintf(__('عنوان الخدمة %d', 'mytheme'), $i),
            'section' => 'services_section',
            'type' => 'text',
        ));

        // وصف الخدمة
        $wp_customize->add_setting("service_{$i}_description", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("service_{$i}_description", array(
            'label' => sprintf(__('وصف الخدمة %d', 'mytheme'), $i),
            'section' => 'services_section',
            'type' => 'textarea',
        ));

        // ميزات الخدمة (مفصولة بفاصلة)
        $wp_customize->add_setting("service_{$i}_features", array(
            'default' => '',
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("service_{$i}_features", array(
            'label' => sprintf(__('ميزات الخدمة %d (مفصولة بفاصلة)', 'mytheme'), $i),
            'section' => 'services_section',
            'type' => 'textarea',
        ));
    }
}
add_action('customize_register', 'devportfolio_services_customize_register');