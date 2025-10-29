<?php
/**
 * Skills Meta Boxes
 */

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