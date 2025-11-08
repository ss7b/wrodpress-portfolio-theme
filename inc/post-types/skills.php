<?php
/**
 * Skills Post Type
 */

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

// Shortcode for Skills
function skills_shortcode($atts)
{
    ob_start();
    ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $skills = get_posts(array(
            'post_type' => 'skill',
            'numberposts' => -1,
        ));

        $animation_index = 0;
        foreach ($skills as $skill) {
            $icon = get_post_meta($skill->ID, 'skill_icon', true);
            $technologies = get_post_meta($skill->ID, 'skill_technologies', true);
        ?>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 h-full flex flex-col"
                 data-aos="fade-up" 
                 data-aos-delay="<?php echo $animation_index * 100; ?>"
                 data-aos-duration="600">
                <div class="w-14 h-14 rounded-full bg-primary flex items-center justify-center mb-4">
                    <i class="<?php echo $icon; ?> text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2"><?php echo $skill->post_title; ?></h3>
                <div class="text-gray-600 dark:text-gray-300 mb-4 flex-grow">
                    <?php echo $skill->post_content; ?>
                </div>
                <div class="flex flex-wrap gap-2 mt-2">
                    <?php
                    if ($technologies) {
                        $tech_array = explode(',', $technologies);
                        foreach ($tech_array as $tech) {
                            echo '<span class="px-3 py-1 bg-highlight/20 text-highlight dark:text-white rounded-full text-sm">' . trim($tech) . '</span>';
                        }
                    }
                    ?>
                </div>
            </div>
        <?php
            $animation_index++;
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('skills', 'skills_shortcode');