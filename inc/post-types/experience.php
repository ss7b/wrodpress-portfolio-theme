<?php
/**
 * Experience Post Type
 */

// إنشاء Custom Post Type للخبرات
function create_experience_cpt()
{
    $labels = array(
        'name' => __('الخبرات والتعليم', 'devportfolio'),
        'singular_name' => __('خبرة', 'devportfolio'),
        'menu_name' => __('الخبرات والتعليم', 'devportfolio'),
        'name_admin_bar' => __('خبرة', 'devportfolio'),
        'add_new' => __('إضافة جديد', 'devportfolio'),
        'add_new_item' => __('إضافة خبرة جديدة', 'devportfolio'),
        'new_item' => __('خبرة جديدة', 'devportfolio'),
        'edit_item' => __('تعديل الخبرة', 'devportfolio'),
        'view_item' => __('عرض الخبرة', 'devportfolio'),
        'all_items' => __('جميع الخبرات', 'devportfolio'),
        'search_items' => __('بحث الخبرات', 'devportfolio'),
        'not_found' => __('لا توجد خبرات', 'devportfolio'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'experience'),
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => array('title', 'editor'),
        'show_in_rest' => true,
    );

    register_post_type('experience', $args);
}
add_action('init', 'create_experience_cpt');

// تحسين ترتيب الخبرات
function modify_experience_query($query)
{
    if (!is_admin() && $query->is_main_query() && is_page_template('template-your-page.php')) {
        if (isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'experience') {
            $query->set('meta_query', array(
                array(
                    'key' => 'start_date',
                    'compare' => 'EXISTS'
                )
            ));
            $query->set('orderby', array(
                'order' => 'DESC',
                'start_date' => 'DESC'
            ));
        }
    }
}
add_action('pre_get_posts', 'modify_experience_query');