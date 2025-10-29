<?php
// إنشاء الحقول البرمجية للمشروع
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

// حفظ البيانات
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

// دالة مساعدة للحصول على صور المعرض
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