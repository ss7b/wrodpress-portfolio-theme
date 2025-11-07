<section id="about" class="py-16 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12 gradient"><?php echo get_theme_mod('about_section_title', 'About Me'); ?></h2>
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-2/5 flex justify-center flex-col items-center relative">
                <!-- صورة الملف الشخصي -->
                <div class="profile-img relative w-80 h-80 overflow-hidden shadow-2xl transform transition-transform duration-500 hover:scale-105 mb-6" style="border-radius: 15px 157px 15px;">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent/20 to-highlight/20 z-10" style="border-radius: 15px 157px 15px;"></div>
                    <?php
                    $about_image = get_theme_mod('about_image');
                    if ($about_image) {
                        echo '<img src="' . esc_url($about_image) . '" alt="' . esc_attr(get_theme_mod('about_title', 'Passionate Web Developer')) . '" class="w-full h-full object-cover" style="border-radius: 15px 157px 15px;">';
                    } else {
                        echo '<img src="https://upload.wikimedia.org/wikipedia/commons/6/69/%D8%B5%D9%88%D8%B1%D8%A9_%D8%B4%D8%AE%D8%B5%D9%8A%D8%A9_%D9%A1%D9%A2%D9%A3.jpg" alt="Default Profile" class="w-full h-full object-cover" style="border-radius: 15px 157px 15px;">';
                    }
                    ?>
                </div>
                
                <!-- وسائل التواصل الاجتماعي -->
                <ul class="socail-links gap-4 mt-4 absolute bottom-0 left-[56px] flex rounded-[50px] px-[18px] py-[5px] bg-gray-50 dark:bg-gray-700/50">
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('whatsapp_url', '#')); ?>" target="_blank" class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center text-white hover:bg-green-600 transition-colors shadow-md hover:shadow-lg transform hover:scale-110 duration-300">
                            <svg class="w-5 h-5" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M16.75 13.96c.25.13.41.2.46.3.06.11.04.61-.21 1.18-.2.56-1.24 1.1-1.7 1.12-.46.02-.47.36-2.96-.73-2.49-1.09-3.99-3.75-4.11-3.92-.12-.17-.96-1.38-.92-2.61.05-1.22.69-1.8.95-2.04.24-.26.51-.29.68-.26h.47c.15 0 .36-.06.55.45l.69 1.87c.06.13.1.28.01.44l-.27.41-.39.42c-.12.12-.26.25-.12.5.12.26.62 1.09 1.32 1.78.91.88 1.71 1.17 1.95 1.3.24.14.39.12.54-.04l.81-.94c.19-.25.35-.19.58-.11l1.67.88M12 2a10 10 0 0 1 10 10 10 10 0 0 1-10 10c-1.97 0-3.8-.57-5.35-1.55L2 22l1.55-4.65A9.969 9.969 0 0 1 2 12 10 10 0 0 1 12 2m0 2a8 8 0 0 0-8 8c0 1.72.54 3.31 1.46 4.61L4.5 19.5l2.89-.96A7.95 7.95 0 0 0 12 20a8 8 0 0 0 8-8 8 8 0 0 0-8-8z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(get_theme_mod('github_url', '#')); ?>" target="_blank" class="w-12 h-12 rounded-full bg-gray-800 flex items-center justify-center text-white hover:bg-gray-900 transition-colors shadow-md hover:shadow-lg transform hover:scale-110 duration-300">
                            <svg class="w-5 h-5" focusable="false" aria-hidden="true" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.09-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- المحتوى -->
            <div class="lg:w-3/5">
                <h3 class="text-2xl font-bold mb-4 bg-gradient-to-r from-accent to-highlight bg-clip-text text-transparent"><?php echo get_theme_mod('about_title', 'Passionate Web Developer'); ?></h3>
                <div class="prose dark:prose-invert max-w-none mb-6 text-gray-700 dark:text-gray-300">
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
                    echo '<div class="mb-8">';
                    echo '<h4 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Skills & Expertise</h4>';
                    echo '<div class="flex flex-wrap gap-3">';
                    foreach ($skills as $skill) {
                        $skill = trim($skill);
                        if (!empty($skill)) {
                            echo '<span class="px-4 py-2 bg-gradient-to-r from-accent/10 to-highlight/10 text-accent dark:text-highlight border border-accent/20 dark:border-highlight/20 rounded-full text-sm font-medium transition-all duration-300 hover:from-accent/20 hover:to-highlight/20 hover:shadow-md">' . esc_html($skill) . '</span>';
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>

                <!-- معلومات الاتصال -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-gray-50 dark:bg-gray-700/50 p-6 rounded-xl">
                    <?php if (get_theme_mod('location')): ?>
                        <div class="flex items-center group">
                            <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center mr-3 group-hover:bg-accent/20 transition-colors">
                                <i class="fas fa-map-marker-alt text-accent"></i>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300"><?php echo get_theme_mod('location', 'New York, USA'); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('email')): ?>
                        <div class="flex items-center group">
                            <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center mr-3 group-hover:bg-accent/20 transition-colors">
                                <i class="fas fa-envelope text-accent"></i>
                            </div>
                            <a href="mailto:<?php echo antispambot(get_theme_mod('email', 'alex@example.com')); ?>" class="text-gray-700 dark:text-gray-300 hover:text-accent transition-colors">
                                <?php echo antispambot(get_theme_mod('email', 'alex@example.com')); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('phone')): ?>
                        <div class="flex items-center group">
                            <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center mr-3 group-hover:bg-accent/20 transition-colors">
                                <i class="fas fa-phone text-accent"></i>
                            </div>
                            <a href="tel:<?php echo esc_attr(get_theme_mod('phone', '+1 (555) 123-4567')); ?>" class="text-gray-700 dark:text-gray-300 hover:text-accent transition-colors">
                                <?php echo get_theme_mod('phone', '+1 (555) 123-4567'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('availability')): ?>
                        <div class="flex items-center group">
                            <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center mr-3 group-hover:bg-accent/20 transition-colors">
                                <i class="fas fa-calendar text-accent"></i>
                            </div>
                            <span class="text-gray-700 dark:text-gray-300"><?php echo get_theme_mod('availability', 'Available for freelance'); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>