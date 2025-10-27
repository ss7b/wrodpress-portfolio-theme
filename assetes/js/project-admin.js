jQuery(document).ready(function($) {
    'use strict';
    
    // تأكد من أن وسائط ووردبريس محملة
    if (typeof wp === 'undefined' || typeof wp.media === 'undefined') {
        console.error('WordPress media library not loaded');
        return;
    }
    
    let mediaFrame;
    
    // زر إضافة الصور
    $('#select-gallery-images').on('click', function(e) {
        e.preventDefault();
        
        // إذا كان الإطار موجوداً مسبقاً، افتحه
        if (mediaFrame) {
            mediaFrame.open();
            return;
        }
        
        // إنشاء إطار وسائط جديد
        mediaFrame = wp.media({
            title: 'Select Gallery Images',
            button: {
                text: 'Add to Gallery'
            },
            multiple: true,
            library: {
                type: 'image'
            }
        });
        
        // عند التحديد
        mediaFrame.on('select', function() {
            const selection = mediaFrame.state().get('selection');
            const galleryField = $('#project_gallery_images');
            let currentIds = galleryField.val() ? galleryField.val().split(',') : [];
            const galleryPreview = $('#gallery-preview');
            
            selection.forEach(function(attachment) {
                attachment = attachment.toJSON();
                const attachmentId = attachment.id.toString();
                
                // تجنب التكرار
                if (currentIds.indexOf(attachmentId) === -1) {
                    currentIds.push(attachmentId);
                    
                    // إضافة المعاينة
                    const imageUrl = attachment.sizes && attachment.sizes.thumbnail ? 
                        attachment.sizes.thumbnail.url : attachment.url;
                    
                    galleryPreview.append(
                        '<div class="gallery-item" data-id="' + attachmentId + '">' +
                        '<div style="position: relative; border: 2px solid #ddd; padding: 5px; border-radius: 4px;">' +
                        '<img src="' + imageUrl + '" style="max-width: 100%; height: auto; display: block;">' +
                        '<button type="button" class="remove-image" style="position: absolute; top: 5px; right: 5px; background: #dc3232; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 12px; line-height: 1;">×</button>' +
                        '</div>' +
                        '</div>'
                    );
                }
            });
            
            // تحديث الحقل المخفي
            galleryField.val(currentIds.join(','));
        });
        
        // افتح الإطار
        mediaFrame.open();
    });
    
    // مسح المعرض
    $('#clear-gallery').on('click', function(e) {
        e.preventDefault();
        
        if (confirm('Are you sure you want to clear all gallery images?')) {
            $('#gallery-preview').empty();
            $('#project_gallery_images').val('');
        }
    });
    
    // إزالة صورة فردية
    $(document).on('click', '.remove-image', function(e) {
        e.preventDefault();
        
        const $galleryItem = $(this).closest('.gallery-item');
        const imageId = $galleryItem.data('id');
        const galleryField = $('#project_gallery_images');
        
        let currentIds = galleryField.val().split(',').filter(function(id) {
            return id !== imageId.toString() && id !== '';
        });
        
        galleryField.val(currentIds.join(','));
        $galleryItem.remove();
    });
});