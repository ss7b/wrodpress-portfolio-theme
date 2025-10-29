<section id="about" class="py-16 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12 gradient"><?php echo get_theme_mod('about_section_title', 'About Me'); ?></h2>
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <!-- الصورة الجديدة بشكل غير دائري -->
            <div class="lg:w-2/5 flex justify-center">
                <div class="relative w-80 h-80 overflow-hidden rounded-2xl shadow-2xl transform transition-transform duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent/20 to-highlight/20 rounded-2xl z-10"></div>
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