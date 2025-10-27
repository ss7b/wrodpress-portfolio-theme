<?php get_header(); ?>

<!-- Hero Section -->
<section id="home" class="pt-24 pb-16 md:pt-32 md:pb-24 bg-gradient-to-br from-primary to-secondary text-white">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-10 md:mb-0 animate-fadeIn">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                <?php echo get_theme_mod('hero_title', 'Hi, I\'m Alex Morgan'); ?>
            </h1>
            <h2 class="text-2xl md:text-3xl font-semibold mb-6">
                <?php echo get_theme_mod('hero_subtitle', 'Full Stack Web Developer'); ?>
            </h2>
            <p class="text-lg mb-8 max-w-lg">
                <?php echo get_theme_mod('hero_description', 'I create modern, responsive, and user-friendly web applications with cutting-edge technologies.'); ?>
            </p>
            <div class="flex space-x-4">
                <a href="<?php echo esc_url(get_theme_mod('hero_button1_link', '#projects')); ?>" class="px-6 py-3 bg-highlight rounded-lg font-semibold hover:bg-accent transition-colors">
                    <?php echo get_theme_mod('hero_button1_text', 'View My Work'); ?>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('hero_button2_link', '#contact')); ?>" class="px-6 py-3 border-2 border-white rounded-lg font-semibold hover:bg-white hover:text-primary transition-colors">
                    <?php echo get_theme_mod('hero_button2_text', 'Contact Me'); ?>
                </a>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center <?php echo get_theme_mod('hero_icon_animation', true) ? 'animate-float' : ''; ?>">
            <div class="relative w-64 h-64 md:w-80 md:h-80 rounded-full bg-gradient-to-br from-accent to-highlight flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-transparent to-white/10"></div>
                <i class="<?php echo esc_attr(get_theme_mod('hero_icon', 'fas fa-code')); ?> text-white text-8xl md:text-9xl"></i>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-16 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12"><?php echo get_theme_mod('about_section_title', 'About Me'); ?></h2>
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/3 mb-8 md:mb-0 flex justify-center">
                <div class="w-64 h-64 rounded-full overflow-hidden border-4 border-highlight shadow-lg">
                    <?php
                    $about_image = get_theme_mod('about_image');
                    if ($about_image) {
                        echo '<img src="' . esc_url($about_image) . '" alt="' . esc_attr(get_theme_mod('about_title', 'Passionate Web Developer')) . '" class="w-full h-full object-cover">';
                    } else {
                        echo '<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=774&q=80" alt="Default Profile" class="w-full h-full object-cover">';
                    }
                    ?>
                </div>
            </div>
            <div class="md:w-2/3 md:pl-12">
                <h3 class="text-2xl font-semibold mb-4"><?php echo get_theme_mod('about_title', 'Passionate Web Developer'); ?></h3>
                <div class="prose dark:prose-invert max-w-none">
                    <?php
                    $about_content = get_theme_mod('about_content');
                    if ($about_content) {
                        echo wpautop(wp_kses_post($about_content));
                    } else {
                        // المحتوى الافتراضي
                        echo '<p class="mb-4">I\'m a dedicated full-stack developer with 5+ years of experience building web applications. I specialize in creating responsive, user-friendly interfaces and robust backend systems.</p>';
                        echo '<p class="mb-6">My approach combines technical expertise with creative problem-solving to deliver high-quality solutions that meet both user needs and business objectives.</p>';
                    }
                    ?>
                </div>

                <!-- Skills Section -->
                <?php
                $skills_list = get_theme_mod('skills_list', 'HTML,CSS,JavaScript,PHP,WordPress,React');
                if ($skills_list) {
                    $skills = explode(',', $skills_list);
                    echo '<div class="mb-6">';
                    echo '<h4 class="text-lg font-semibold mb-3">Skills</h4>';
                    echo '<div class="flex flex-wrap gap-2">';
                    foreach ($skills as $skill) {
                        $skill = trim($skill);
                        if (!empty($skill)) {
                            echo '<span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-sm">' . esc_html($skill) . '</span>';
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <?php if (get_theme_mod('location')): ?>
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-accent mr-3"></i>
                            <span><?php echo get_theme_mod('location', 'New York, USA'); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('email')): ?>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-accent mr-3"></i>
                            <a href="mailto:<?php echo antispambot(get_theme_mod('email', 'alex@example.com')); ?>" class="hover:text-accent transition-colors">
                                <?php echo antispambot(get_theme_mod('email', 'alex@example.com')); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('phone')): ?>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-accent mr-3"></i>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('phone', '+1 (555) 123-4567')); ?>" class="hover:text-accent transition-colors">
                                <?php echo get_theme_mod('phone', '+1 (555) 123-4567'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('availability')): ?>
                        <div class="flex items-center">
                            <i class="fas fa-calendar text-accent mr-3"></i>
                            <span><?php echo get_theme_mod('availability', 'Available for freelance'); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-16 bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">My Skills</h2>
        <?php echo do_shortcode('[skills]'); ?>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-16 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Experience & Education</h2>
        
        <div class="relative">
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-primary to-highlight hidden lg:block"></div>

            <div class="space-y-12">
                <?php
                $args = array(
                    'post_type' => 'experience',
                    'posts_per_page' => -1,
                    'meta_key' => 'order',
                    'orderby' => array(
                        'meta_value_num' => 'DESC',
                        'start_date' => 'DESC'
                    ),
                    'meta_query' => array(
                        array(
                            'key' => 'start_date',
                            'compare' => 'EXISTS'
                        )
                    )
                );
                
                $experiences = new WP_Query($args);
                $index = 0;
                
                if ($experiences->have_posts()) :
                    while ($experiences->have_posts()) : $experiences->the_post();
                        $experience_type = get_field('experience_type');
                        $start_date = get_field('start_date');
                        $end_date = get_field('end_date');
                        $company = get_field('company');
                        $position = get_field('position');
                        $location = get_field('location');
                        
                        // تنسيق التاريخ
                        $start_date_formatted = $start_date ? date('M Y', strtotime($start_date)) : '';
                        $end_date_formatted = $end_date ? date('M Y', strtotime($end_date)) : 'Present';
                        $date_display = $start_date_formatted . ' - ' . $end_date_formatted;
                        
                        // لون مختلف حسب نوع الخبرة
                        $badge_color = $experience_type === 'education' ? 'bg-accent' : 'bg-highlight';
                        
                        $index++;
                ?>
                        <div class="timeline-item flex flex-col lg:flex-row items-center">
                            <?php if ($index % 2 != 0) : ?>
                                <!-- المحتوى على اليسار للعناصر الفردية -->
                                <div class="lg:w-1/2 lg:pr-12 mb-6 lg:mb-0">
                                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-xl shadow-md animate-slideIn hover:shadow-lg transition-shadow duration-300">
                                        <span class="inline-block px-3 py-1 <?php echo $badge_color; ?> text-white rounded-full text-sm mb-2">
                                            <?php echo esc_html($date_display); ?>
                                        </span>
                                        <h3 class="text-xl font-semibold mb-2"><?php the_title(); ?></h3>
                                        <?php if ($position) : ?>
                                            <p class="font-medium text-accent mb-1"><?php echo esc_html($position); ?></p>
                                        <?php endif; ?>
                                        <?php if ($company) : ?>
                                            <p class="text-gray-600 dark:text-gray-300 mb-2"><?php echo esc_html($company); ?></p>
                                        <?php endif; ?>
                                        <?php if ($location) : ?>
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">📍 <?php echo esc_html($location); ?></p>
                                        <?php endif; ?>
                                        <div class="prose dark:prose-invert max-w-none">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-dot absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full <?php echo $badge_color; ?> border-4 border-white dark:border-gray-800 shadow-lg hidden lg:block"></div>
                                <div class="lg:w-1/2 lg:pl-12"></div>
                            <?php else : ?>
                                <!-- المحتوى على اليمين للعناصر الزوجية -->
                                <div class="lg:w-1/2 lg:pr-12"></div>
                                <div class="timeline-dot absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full <?php echo $badge_color; ?> border-4 border-white dark:border-gray-800 shadow-lg hidden lg:block"></div>
                                <div class="lg:w-1/2 lg:pl-12 mb-6 lg:mb-0">
                                    <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-xl shadow-md animate-slideIn hover:shadow-lg transition-shadow duration-300">
                                        <span class="inline-block px-3 py-1 <?php echo $badge_color; ?> text-white rounded-full text-sm mb-2">
                                            <?php echo esc_html($date_display); ?>
                                        </span>
                                        <h3 class="text-xl font-semibold mb-2"><?php the_title(); ?></h3>
                                        <?php if ($position) : ?>
                                            <p class="font-medium text-accent mb-1"><?php echo esc_html($position); ?></p>
                                        <?php endif; ?>
                                        <?php if ($company) : ?>
                                            <p class="text-gray-600 dark:text-gray-300 mb-2"><?php echo esc_html($company); ?></p>
                                        <?php endif; ?>
                                        <?php if ($location) : ?>
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">📍 <?php echo esc_html($location); ?></p>
                                        <?php endif; ?>
                                        <div class="prose dark:prose-invert max-w-none">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // عرض محتوى افتراضي إذا لم توجد خبرات
                ?>
                    <div class="text-center py-12">
                        <p class="text-gray-600 dark:text-gray-300 text-lg mb-4">لا توجد خبرات مضافة بعد</p>
                        <a href="<?php echo admin_url('post-new.php?post_type=experience'); ?>" class="inline-block bg-highlight text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition-colors">
                            إضافة أول خبرة
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-16 bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">My Projects</h2>
        
        <?php
        $projects = new WP_Query(array(
            'post_type' => 'project',
            'posts_per_page' => 6,
            'meta_query' => array(
                array(
                    'key' => 'project_featured',
                    'value' => '1',
                    'compare' => '='
                )
            )
        ));

        if ($projects->have_posts()) :
        ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while ($projects->have_posts()) : $projects->the_post(); 
                    $project_categories = get_the_terms(get_the_ID(), 'project_category');
                    $project_technologies = get_the_terms(get_the_ID(), 'project_technology');
                    $project_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    
                    // جلب أول صورة من المعرض إذا لم توجد صورة مميزة
                    if (!$project_image) {
                        $gallery_images = get_project_gallery(get_the_ID());
                        if (!empty($gallery_images)) {
                            $project_image = get_project_first_image();
                        }
                    }
                ?>
                    <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                        <div class="h-48 relative overflow-hidden">
                            <?php if($project_image): ?>
                                <img 
                                    src="<?php echo esc_url($project_image); ?>" 
                                    alt="<?php the_title(); ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                >
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-r from-primary to-accent flex items-center justify-center">
                                    <span class="text-white text-lg">No Image</span>
                                </div>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <a href="<?php the_permalink(); ?>" class="bg-white text-gray-900 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                                    View Details
                                </a>
                            </div>
                            <?php if($project_categories): ?>
                            <div class="absolute top-4 left-4">
                                <?php foreach($project_categories as $category): ?>
                                    <span class="bg-highlight text-white text-xs px-2 py-1 rounded mr-2">
                                        <?php echo esc_html($category->name); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2"><?php the_title(); ?></h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-2">
                                <?php echo get_the_excerpt(); ?>
                            </p>
                            
                            <?php if($project_technologies): ?>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <?php foreach($project_technologies as $tech): ?>
                                    <span class="text-xs bg-highlight/20 text-highlight px-2 py-1 rounded">
                                        <?php echo esc_html($tech->name); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            
                            <div class="flex justify-between items-center">
                                <a href="<?php the_permalink(); ?>" class="text-accent hover:text-primary transition-colors font-semibold text-sm">
                                    Read More
                                </a>
                                <?php 
                                $project_url = get_post_meta(get_the_ID(), 'project_url', true);
                                if($project_url): 
                                ?>
                                <a href="<?php echo esc_url($project_url); ?>" target="_blank" class="text-gray-500 hover:text-accent transition-colors" title="Live Demo">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p class="text-center">No projects found.</p>
        <?php endif; ?>

        <div class="text-center mt-12">
            <a href="<?php echo get_post_type_archive_link('project'); ?>" class="px-6 py-3 bg-highlight text-white rounded-lg font-semibold hover:bg-accent transition-colors inline-flex items-center">
                <span>View All Projects</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-16 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Get In Touch</h2>
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                <h3 class="text-2xl font-semibold mb-4">Let's work together!</h3>
                <p class="mb-6">I'm always interested in new opportunities and challenges. Whether you have a project in mind or just want to say hello, feel free to reach out.</p>

                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-highlight/20 flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-highlight"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Email</p>
                            <p><?php echo get_theme_mod('contact_email', 'alex@example.com'); ?></p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-highlight/20 flex items-center justify-center mr-4">
                            <i class="fas fa-phone text-highlight"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Phone</p>
                            <p><?php echo get_theme_mod('contact_phone', '+1 (555) 123-4567'); ?></p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-highlight/20 flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-highlight"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Location</p>
                            <p><?php echo get_theme_mod('contact_location', 'New York, USA'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-4 mt-6">
                    <?php
                    $social_links = array(
                        'linkedin' => get_theme_mod('social_linkedin'),
                        'github' => get_theme_mod('social_github'),
                        'twitter' => get_theme_mod('social_twitter'),
                        'whatsapp' => get_theme_mod('social_whatsapp'),
                    );

                    foreach ($social_links as $platform => $url) {
                        if ($url) {
                            echo '<a href="' . esc_url($url) . '" class="w-10 h-10 rounded-full bg-highlight flex items-center justify-center text-white hover:bg-accent transition-colors" target="_blank" rel="noopener">';
                            echo '<i class="fab fa-' . esc_attr($platform) . '"></i>';
                            echo '</a>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="md:w-1/2">
                <form id="contact-form" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>
                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Message</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required></textarea>
                    </div>
                    <button type="submit" class="px-6 py-3 bg-highlight text-white font-medium rounded-lg hover:bg-accent transition-colors">Send Message</button>
                </form>
                
                <div id="form-message" class="mt-4 hidden"></div>
            </div>
        </div>
    </div>
</section>
<!-- services -->
  <!-- قسم الخدمات -->
    <section id="services" class="py-16 bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-4 text-gray-800 dark:text-white">خدمات الويب الشاملة</h2>
            <p class="text-lg text-center mb-12 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                نقدم مجموعة متكاملة من خدمات تطوير الويب لتحويل أفكارك إلى واقع رقمي متميز
            </p>
            
            <!-- Swiper Container -->
            <div class="swiper servicesSwiper">
                <div class="swiper-wrapper">
                    <!-- خدمة 1 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">تطوير مواقع الويب</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                تصميم وتطوير مواقع ويب احترافية متجاوبة مع جميع الأجهزة باستخدام أحدث التقنيات مثل HTML5, CSS3, JavaScript.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تصميم متجاوب مع جميع الشاشات
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تحسين سرعة الأداء
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    دعم جميع المتصفحات
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- خدمة 2 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">تطبيقات الويب الديناميكية</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                بناء تطبيقات ويب تفاعلية باستخدام إطارات العمل الحديثة مثل React, Vue.js, Angular مع دعم قاعدة البيانات.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تطبيقات أحادية الصفحة (SPA)
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    واجهات برمجة التطبيقات (API)
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    إدارة الحالة المتقدمة
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- خدمة 3 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">أنظمة إدارة المحتوى</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                تطوير وتخصيص أنظمة إدارة المحتوى مثل WordPress, Joomla, Drupal مع تصميم قوالب وإضافات مخصصة.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تطوير القوالب المخصصة
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    بناء الإضافات والوحدات
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تهيئة وتحسين الأداء
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- خدمة 4 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">تحسين محركات البحث (SEO)</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                تحسين مواقع الويب لمحركات البحث لزيادة الظهور في النتائج وجذب المزيد من الزوار المستهدفين.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تحسين الهيكل الداخلي
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تحليل الكلمات المفتاحية
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    بناء الروابط الخلفية
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- خدمة 5 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">تطبيقات الجوال الهجينة</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                تطوير تطبيقات جوال هجينة تعمل على منصتي iOS و Android باستخدام تقنيات الويب مثل React Native و Flutter.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تطوير متعدد المنصات
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    واجهات مستخدم متجاوبة
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تكامل مع APIs المحلية
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- خدمة 6 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">الأمن السيبراني</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                تأمين تطبيقات الويب ضد الهجمات الإلكترونية واختبار الاختراق وتطبيق أفضل ممارسات الأمن السيبراني.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    حماية من الثغرات الشائعة
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تشفير البيانات الحساسة
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تدقيق ومراجعة الأمن
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- خدمة 7 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">التجارة الإلكترونية</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                تطوير منصات تجارة إلكترونية متكاملة مع أنظمة الدفع وإدارة المخزون وتجربة مستخدم محسنة.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    متاجر إلكترونية مخصصة
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تكامل بوابات الدفع
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    إدارة الطلبات والمخزون
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- خدمة 8 -->
                    <div class="swiper-slide">
                        <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                            <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">التحليلات والتقارير</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-center">
                                تطوير لوحات تحكم تفاعلية وأنظمة تقارير متقدمة لتحليل بيانات الأعمال واتخاذ القرارات المستنيرة.
                            </p>
                            <ul class="mt-4 space-y-2">
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    لوحات تحكم تفاعلية
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تصور البيانات البياني
                                </li>
                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    تقارير مخصصة وآلية
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- أزرار التنقل -->
                <div class="swiper-button-next bg-white dark:bg-gray-800 shadow-lg rounded-full w-12 h-12 flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
                <div class="swiper-button-prev bg-white dark:bg-gray-800 shadow-lg rounded-full w-12 h-12 flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                
                <!-- نقاط التمرير -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>