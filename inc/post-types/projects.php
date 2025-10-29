<?php
// إنشاء Custom Post Type للمشاريع
function create_project_post_type()
{
    register_post_type(
        'project',
        array(
            'labels' => array(
                'name' => __('Projects'),
                'singular_name' => __('Project'),
                'add_new' => __('Add New Project'),
                'add_new_item' => __('Add New Project'),
                'edit_item' => __('Edit Project'),
                'new_item' => __('New Project'),
                'view_item' => __('View Project'),
                'search_items' => __('Search Projects'),
                'not_found' => __('No projects found'),
                'not_found_in_trash' => __('No projects found in Trash')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'menu_icon' => 'dashicons-portfolio',
            'rewrite' => array('slug' => 'projects'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_project_post_type');

// إنشاء Taxonomies للمشاريع
function create_project_taxonomies()
{
    // taxonomy للتصنيفات
    register_taxonomy(
        'project_category',
        'project',
        array(
            'labels' => array(
                'name' => 'Project Categories',
                'singular_name' => 'Project Category',
                'search_items' => 'Search Categories',
                'all_items' => 'All Categories',
                'parent_item' => 'Parent Category',
                'parent_item_colon' => 'Parent Category:',
                'edit_item' => 'Edit Category',
                'update_item' => 'Update Category',
                'add_new_item' => 'Add New Category',
                'new_item_name' => 'New Category Name',
                'menu_name' => 'Categories'
            ),
            'hierarchical' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'project-category'),
            'show_in_rest' => true,
        )
    );
    
    // taxonomy للتقنيات
    register_taxonomy(
        'project_technology',
        'project',
        array(
            'labels' => array(
                'name' => 'Technologies',
                'singular_name' => 'Technology',
                'search_items' => 'Search Technologies',
                'all_items' => 'All Technologies',
                'parent_item' => 'Parent Technology',
                'parent_item_colon' => 'Parent Technology:',
                'edit_item' => 'Edit Technology',
                'update_item' => 'Update Technology',
                'add_new_item' => 'Add New Technology',
                'new_item_name' => 'New Technology Name',
                'menu_name' => 'Technologies'
            ),
            'hierarchical' => false,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'project-technology'),
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'create_project_taxonomies');