<?php
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

// Enqueue styles and scripts
function devportfolio_scripts()
{
    // Main stylesheet
    wp_enqueue_style('devportfolio-style', get_stylesheet_uri());

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assetes/css/main.css', array(), '1.0.3');


    // swiper
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12.0.0');

    // تسجيل وتضمين Swiper JS
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.0', true);

    // Tailwind CSS
    wp_enqueue_script('tailwind-config', get_template_directory_uri() . '/js/tailwind-config.js', array(), '1.0', true);
    // swiper


    wp_enqueue_script('main-js', get_template_directory_uri() . '/assetes/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'devportfolio_scripts');

// Customizer settings
function devportfolio_customize_register($wp_customize)
{
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

    // About-me section
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
}
add_action('customize_register', 'devportfolio_customize_register');

// contact
function theme_contact_customize_register($wp_customize)
{
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
add_action('customize_register', 'theme_contact_customize_register');

// Shortcode for Skills
// Register Custom Post Type for Skills
function register_skill_post_type()
{
    $labels = array(
        'name' => 'Skills',
        'singular_name' => 'Skill',
        'menu_name' => 'Skills',
        'add_new' => 'Add New Skill',
        'add_new_item' => 'Add New Skill',
        'edit_item' => 'Edit Skill',
        'new_item' => 'New Skill',
        'view_item' => 'View Skill',
        'search_items' => 'Search Skills',
        'not_found' => 'No skills found',
        'not_found_in_trash' => 'No skills found in Trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor'),
        'show_in_rest' => true,
        'menu_position' => 20
    );

    register_post_type('skill', $args);
}
add_action('init', 'register_skill_post_type');

// Add meta boxes for skills
function add_skill_meta_boxes()
{
    add_meta_box(
        'skill_details',
        'Skill Details',
        'skill_meta_box_callback',
        'skill',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_skill_meta_boxes');

function skill_meta_box_callback($post)
{
    wp_nonce_field('skill_meta_box', 'skill_meta_box_nonce');

    $icon = get_post_meta($post->ID, 'skill_icon', true);
    $technologies = get_post_meta($post->ID, 'skill_technologies', true);
?>
    <div style="display: flex; flex-direction: column; gap: 15px;">
        <div>
            <label for="skill_icon" style="display: block; margin-bottom: 5px; font-weight: bold;">Skill Icon (Font Awesome class)</label>
            <input type="text" id="skill_icon" name="skill_icon" value="<?php echo esc_attr($icon); ?>" style="width: 100%;" placeholder="fas fa-code" />
            <p style="color: #666; font-size: 12px; margin-top: 5px;">
                Example: fas fa-code, fab fa-js, fas fa-database<br>
                Find icons at: <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>
            </p>
        </div>

        <div>
            <label for="skill_technologies" style="display: block; margin-bottom: 5px; font-weight: bold;">Technologies</label>
            <textarea id="skill_technologies" name="skill_technologies" style="width: 100%; height: 80px;" placeholder="JavaScript, React, Node.js"><?php echo esc_textarea($technologies); ?></textarea>
            <p style="color: #666; font-size: 12px; margin-top: 5px;">
                Enter technologies separated by commas
            </p>
        </div>
    </div>
<?php
}

function save_skill_meta($post_id)
{
    if (
        !isset($_POST['skill_meta_box_nonce']) ||
        !wp_verify_nonce($_POST['skill_meta_box_nonce'], 'skill_meta_box') ||
        defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
        !current_user_can('edit_post', $post_id)
    ) {
        return;
    }

    if (isset($_POST['skill_icon'])) {
        update_post_meta($post_id, 'skill_icon', sanitize_text_field($_POST['skill_icon']));
    }

    if (isset($_POST['skill_technologies'])) {
        update_post_meta($post_id, 'skill_technologies', sanitize_textarea_field($_POST['skill_technologies']));
    }
}
add_action('save_post', 'save_skill_meta');

function skills_shortcode($atts)
{
    ob_start();
?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Skill items will be dynamically generated -->
        <?php
        $skills = get_posts(array(
            'post_type' => 'skill',
            'numberposts' => -1,
        ));

        foreach ($skills as $skill) {
            $icon = get_post_meta($skill->ID, 'skill_icon', true);
            $technologies = get_post_meta($skill->ID, 'skill_technologies', true);
        ?>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow animate-fadeIn">
                <div class="w-14 h-14 rounded-full bg-primary flex items-center justify-center mb-4">
                    <i class="<?php echo $icon; ?> text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2"><?php echo $skill->post_title; ?></h3>
                <p class="mb-4"><?php echo $skill->post_content; ?></p>
                <div class="flex flex-wrap gap-2">
                    <?php
                    if ($technologies) {
                        $tech_array = explode(',', $technologies);
                        foreach ($tech_array as $tech) {
                            echo '<span class="px-3 py-1 bg-highlight/20 text-highlight rounded-full text-sm">' . trim($tech) . '</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('skills', 'skills_shortcode');

// الخبرات
// إنشاء Custom Post Type للخبرات
function create_experience_cpt()
{
    $labels = array(
        'name' => __('الخبرات والتعليم', 'textdomain'),
        'singular_name' => __('خبرة', 'textdomain'),
        'menu_name' => __('الخبرات والتعليم', 'textdomain'),
        'name_admin_bar' => __('خبرة', 'textdomain'),
        'add_new' => __('إضافة جديد', 'textdomain'),
        'add_new_item' => __('إضافة خبرة جديدة', 'textdomain'),
        'new_item' => __('خبرة جديدة', 'textdomain'),
        'edit_item' => __('تعديل الخبرة', 'textdomain'),
        'view_item' => __('عرض الخبرة', 'textdomain'),
        'all_items' => __('جميع الخبرات', 'textdomain'),
        'search_items' => __('بحث الخبرات', 'textdomain'),
        'not_found' => __('لا توجد خبرات', 'textdomain'),
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

// المشاريع
// Register Custom Post Type for Projects

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


// إنشاء الحقول البرمجية للمشروع - النسخة المبسطة
function add_project_meta_boxes()
{
    add_meta_box(
        'project_details',
        'Project Details',
        'project_details_callback',
        'project',
        'normal',
        'high'
    );

    add_meta_box(
        'project_gallery',
        'Project Gallery',
        'project_gallery_callback',
        'project',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_project_meta_boxes');

// تحميل scripts الوسائط
function load_admin_scripts($hook)
{
    if ('post.php' !== $hook && 'post-new.php' !== $hook) {
        return;
    }

    global $post_type;
    if ('project' !== $post_type) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script('project-admin', get_template_directory_uri() . '/js/project-admin.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'load_admin_scripts');

// واجهة تفاصيل المشروع
function project_details_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'project_nonce');

    $project_url = get_post_meta($post->ID, 'project_url', true);
    $project_client = get_post_meta($post->ID, 'project_client', true);
    $project_date = get_post_meta($post->ID, 'project_date', true);
    $project_featured = get_post_meta($post->ID, 'project_featured', true);
?>

    <table class="form-table">
        <tr>
            <th><label for="project_url">Project URL</label></th>
            <td>
                <input type="url" id="project_url" name="project_url" value="<?php echo esc_attr($project_url); ?>" class="regular-text">
                <p class="description">Live demo URL</p>
            </td>
        </tr>
        <tr>
            <th><label for="project_client">Client</label></th>
            <td>
                <input type="text" id="project_client" name="project_client" value="<?php echo esc_attr($project_client); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="project_date">Project Date</label></th>
            <td>
                <input type="date" id="project_date" name="project_date" value="<?php echo esc_attr($project_date); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th>Featured Project</th>
            <td>
                <label>
                    <input type="checkbox" name="project_featured" value="1" <?php checked($project_featured, '1'); ?>>
                    Show this project on homepage
                </label>
            </td>
        </tr>
    </table>

<?php
}

// واجهة معرض الصور
function project_gallery_callback($post)
{
    $gallery_images = get_post_meta($post->ID, 'project_gallery_images', true);
    if (!is_array($gallery_images)) {
        $gallery_images = array();
    }
?>

    <div class="project-gallery-wrapper">
        <input type="hidden" id="project_gallery_images" name="project_gallery_images" value="<?php echo esc_attr(implode(',', $gallery_images)); ?>">

        <div id="gallery-preview" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px; margin-bottom: 15px;">
            <?php foreach ($gallery_images as $image_id): ?>
                <?php if ($image_id && wp_attachment_is_image($image_id)): ?>
                    <div class="gallery-item" data-id="<?php echo $image_id; ?>">
                        <div style="position: relative;">
                            <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                            <button type="button" class="remove-image" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <button type="button" id="select-gallery-images" class="button button-primary">Select Gallery Images</button>
        <button type="button" id="clear-gallery" class="button">Clear Gallery</button>

        <p class="description">Select multiple images for the project gallery. First image will be used as featured image.</p>
    </div>

    <script>
        jQuery(document).ready(function($) {
            let frame;

            $('#select-gallery-images').on('click', function(e) {
                e.preventDefault();

                if (frame) {
                    frame.open();
                    return;
                }

                frame = wp.media({
                    title: 'Select Gallery Images',
                    button: {
                        text: 'Add to Gallery'
                    },
                    multiple: true
                });

                frame.on('select', function() {
                    const attachments = frame.state().get('selection').toJSON();
                    const galleryField = $('#project_gallery_images');
                    let currentIds = galleryField.val() ? galleryField.val().split(',') : [];

                    attachments.forEach(function(attachment) {
                        if (!currentIds.includes(attachment.id.toString())) {
                            currentIds.push(attachment.id);
                            $('#gallery-preview').append(
                                '<div class="gallery-item" data-id="' + attachment.id + '">' +
                                '<div style="position: relative;">' +
                                '<img src="' + attachment.sizes.thumbnail.url + '" style="max-width: 100%; height: auto;">' +
                                '<button type="button" class="remove-image" style="position: absolute; top: 5px; right: 5px; background: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    });

                    galleryField.val(currentIds.join(','));
                });

                frame.open();
            });

            $('#clear-gallery').on('click', function() {
                if (confirm('Are you sure you want to clear all images?')) {
                    $('#gallery-preview').empty();
                    $('#project_gallery_images').val('');
                }
            });

            $(document).on('click', '.remove-image', function() {
                const $item = $(this).closest('.gallery-item');
                const imageId = $item.data('id');
                const galleryField = $('#project_gallery_images');
                let currentIds = galleryField.val().split(',').filter(id => id !== imageId.toString() && id !== '');

                galleryField.val(currentIds.join(','));
                $item.remove();
            });
        });
    </script>

<?php
}

// حفظ البيانات - النسخة المبسطة
function save_project_metadata($post_id)
{
    // التحقق من nonce
    if (!isset($_POST['project_nonce']) || !wp_verify_nonce($_POST['project_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // التحقق من التعديل التلقائي
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // التحقق من الصلاحيات
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // حفظ الحقول الأساسية
    $fields = array(
        'project_url',
        'project_client',
        'project_date',
        'project_featured'
    );

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, $field, $value);
        } else {
            delete_post_meta($post_id, $field);
        }
    }

    // حفظ معرض الصور
    if (isset($_POST['project_gallery_images'])) {
        $gallery_ids = sanitize_text_field($_POST['project_gallery_images']);
        $image_ids = $gallery_ids ? explode(',', $gallery_ids) : array();

        // حفظ كـ array في meta
        update_post_meta($post_id, 'project_gallery_images', $image_ids);

        // تعيين أول صورة كصورة مميزة إذا لم تكن موجودة
        if (!empty($image_ids) && !has_post_thumbnail($post_id)) {
            set_post_thumbnail($post_id, $image_ids[0]);
        }
    } else {
        delete_post_meta($post_id, 'project_gallery_images');
    }

    // تسجيل للتصحيح
    error_log('Project metadata saved for post: ' . $post_id);
    error_log('Gallery images: ' . (isset($_POST['project_gallery_images']) ? $_POST['project_gallery_images'] : 'empty'));
}
add_action('save_post_project', 'save_project_metadata');

// دالة مساعدة مبسطة
function get_project_gallery_images($post_id = null)
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $images = get_post_meta($post_id, 'project_gallery_images', true);
    return is_array($images) ? $images : array();
}

// دالة للحصول على أول صورة
function get_project_first_image($post_id = null)
{
    $gallery = get_project_gallery_images($post_id);
    return !empty($gallery) ? wp_get_attachment_image_url($gallery[0], 'large') : '';
}

// إنشاء صفحة الخيارات
// if(function_exists('acf_add_options_page')) {
//     acf_add_options_page(array(
//         'page_title' => 'Projects Settings',
//         'menu_title' => 'Projects Settings',
//         'menu_slug' => 'projects-settings',
//         'capability' => 'edit_posts',
//         'redirect' => false
//     ));
// }