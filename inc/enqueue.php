<?php
/**
 * Enqueue Styles and Scripts
 */

function devportfolio_scripts()
{
    // Main stylesheet
    wp_enqueue_style('devportfolio-style', get_stylesheet_uri());

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assetes/css/main.css', array(), '1.0.2');

    // swiper
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12.0.0');

    // تسجيل وتضمين Swiper JS
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.0', true);    

    // Tailwind CSS
    wp_enqueue_script('tailwind-config', get_template_directory_uri() . '/js/tailwind-config.js', array(), '1.0', true);

    wp_enqueue_script('main-js', get_template_directory_uri() . '/assetes/js/main.js', array(), '2.0.3', true);
}
add_action('wp_enqueue_scripts', 'devportfolio_scripts');

// motion 
// إضافة مكتبة AOS للرسوم المتحركة
function add_aos_animation() {
    // إضافة CSS الخاص بـ AOS
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');
    
    // إضافة JS الخاص بـ AOS
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);
    
    // تهيئة AOS
    wp_add_inline_script('aos-js', '
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                duration: 800,
                easing: "ease-in-out",
                once: true,
                mirror: false,
                offset: 100
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'add_aos_animation');


// إعداد إرسال البريد من Hostinger
add_action('phpmailer_init', 'setup_hostinger_smtp');
function setup_hostinger_smtp($phpmailer) {
     $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_HOST; // عرف في wp-config.php
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 465;
    $phpmailer->Username = SMTP_USER; // عرف في wp-config.php
    $phpmailer->Password = SMTP_PASS; // عرف في wp-config.php
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = get_bloginfo('name');
    
    // إعدادات أمان إضافية
    $phpmailer->SMTPAutoTLS = true;
    $phpmailer->Timeout = 15;
}

// معالجة نموذج الاتصال
add_action('wp_ajax_send_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_send_contact_form', 'handle_contact_form');

function handle_contact_form() {
    // التحقق من Nonce للأمان
    if (!wp_verify_nonce($_POST['nonce'], 'contact_form_nonce')) {
        wp_send_json_error('طلب غير مصرح');
    }

    // منع التحميل الزائد - ٦٠ ثانية بين الطلبات
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'contact_form_' . md5($user_ip);
    
    if (get_transient($transient_key)) {
        wp_send_json_error('يرجى الانتظار دقيقة قبل إرسال رسالة أخرى');
    }

    // جمع وتنقية البيانات
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // التحقق من البيانات المطلوبة
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_send_json_error('جميع الحقول مطلوبة');
    }

    // تحقق من صحة البريد الإلكتروني
    if (!is_email($email)) {
        wp_send_json_error('البريد الإلكتروني غير صالح');
    }

    // تحقق من طول البيانات
    if (strlen($name) < 2 || strlen($name) > 100) {
        wp_send_json_error('الاسم يجب أن يكون بين ٢ و ١٠٠ حرف');
    }

    if (strlen($subject) < 5 || strlen($subject) > 200) {
        wp_send_json_error('الموضوع يجب أن يكون بين ٥ و ٢٠٠ حرف');
    }

    if (strlen($message) < 10 || strlen($message) > 2000) {
        wp_send_json_error('الرسالة يجب أن تكون بين ١٠ و ٢٠٠٠ حرف');
    }

    // منع المحتوى الضار
    $forbidden_patterns = [
        '/<script/i', '/javascript:/i', '/onclick=/i', 
        '/onload=/i', '/<iframe/i', '/href=.*javascript/i'
    ];
    
    $all_fields = $name . $subject . $message;
    foreach ($forbidden_patterns as $pattern) {
        if (preg_match($pattern, $all_fields)) {
            wp_send_json_error('المحتوى غير مسموح به');
        }
    }

    // إعداد محتوى البريد
    $to = get_theme_mod('contact_email', get_option('admin_email'));
    $email_subject = "رسالة جديدة: " . $subject;
    
    $email_body = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <h2 style='color: #333; border-bottom: 2px solid #007cba; padding-bottom: 10px;'>
                رسالة جديدة من نموذج الاتصال
            </h2>
            
            <div style='background: #f9f9f9; padding: 20px; border-radius: 5px; margin: 15px 0;'>
                <p><strong style='color: #007cba;'>الاسم:</strong> {$name}</p>
                <p><strong style='color: #007cba;'>البريد الإلكتروني:</strong> {$email}</p>
                <p><strong style='color: #007cba;'>الموضوع:</strong> {$subject}</p>
            </div>
            
            <div style='background: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;'>
                <h3 style='color: #333; margin-top: 0;'>الرسالة:</h3>
                <p style='line-height: 1.6;'>" . nl2br(esc_html($message)) . "</p>
            </div>
            
            <div style='margin-top: 20px; padding: 15px; background: #f5f5f5; border-radius: 5px; font-size: 12px; color: #666;'>
                <p>تم الإرسال في: " . date('Y-m-d H:i:s') . "</p>
                <p>عنوان IP: {$user_ip}</p>
            </div>
        </div>
    ";

    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $to . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    ];

    // إرسال البريد
    $sent = wp_mail($to, $email_subject, $email_body, $headers);

    if ($sent) {
        // تعيين transient لمنع الإرسال المتكرر
        set_transient($transient_key, true, 60); // 60 ثانية
        
        // إرسال إشعار للمستخدم (اختياري)
        $user_notification_body = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; text-align: center;'>
                <h2 style='color: #007cba;'>شكراً لتواصلك معنا!</h2>
                <p>تم استلام رسالتك بنجاح وسنرد عليك في أقرب وقت ممكن.</p>
                <div style='margin: 20px 0; padding: 15px; background: #f0f8ff; border-radius: 5px;'>
                    <p><strong>تفاصيل رسالتك:</strong></p>
                    <p>الاسم: {$name}</p>
                    <p>الموضوع: {$subject}</p>
                </div>
                <p style='color: #666; font-size: 14px;'>هذه رسالة تلقائية، يرجى عدم الرد عليها</p>
            </div>
        ";
        
        wp_mail($email, "تم استلام رسالتك بنجاح", $user_notification_body, $headers);
        
        wp_send_json_success('تم إرسال رسالتك بنجاح. شكراً لتواصلك معنا!');
    } else {
        wp_send_json_error('حدث خطأ في إرسال الرسالة. يرجى المحاولة مرة أخرى.');
    }
}
?>