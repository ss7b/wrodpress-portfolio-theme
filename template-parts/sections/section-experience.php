<section id="experience" class="py-12 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-center mb-8">Experience & Education</h2>

        <div class="relative">
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-gradient-to-b from-primary to-highlight hidden lg:block"></div>

            <div class="space-y-6">
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
                                <div class="w-full lg:w-1/2 lg:pr-6 mb-4 lg:mb-0">
                                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm hover:shadow transition-shadow duration-300 border border-gray-100 dark:border-gray-600">
                                        <!-- العنوان والتاريخ في صف واحد -->
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-lg font-semibold"><?php the_title(); ?></h3>
                                            <span class="inline-block px-2 py-1 <?php echo $badge_color; ?> text-white rounded-full text-xs whitespace-nowrap ml-2">
                                                <?php echo esc_html($date_display); ?>
                                            </span>
                                        </div>
                                        
                                        <!-- المسمى الوظيفي تحت العنوان -->
                                        <?php if ($position) : ?>
                                            <p class="font-medium text-accent text-sm mb-2"><?php echo esc_html($position); ?></p>
                                        <?php endif; ?>
                                        
                                        <!-- اسم الشركة والموقع جنباً إلى جنب -->
                                        <div class="flex items-center text-sm mb-3">
                                            <?php if ($company) : ?>
                                                <span class="text-gray-600 dark:text-gray-300 font-medium"><?php echo esc_html($company); ?></span>
                                            <?php endif; ?>
                                            <?php if ($location) : ?>
                                                <span class="text-gray-500 dark:text-gray-400 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <?php echo esc_html($location); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        
                                        <!-- الوصف -->
                                        <div class="prose dark:prose-invert max-w-none text-sm text-gray-700 dark:text-gray-300">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-dot absolute left-1/2 transform -translate-x-1/2 w-3 h-3 rounded-full <?php echo $badge_color; ?> border-2 border-white dark:border-gray-800 shadow hidden lg:block"></div>
                                <div class="lg:w-1/2 lg:pl-6"></div>
                            <?php else : ?>
                                <!-- المحتوى على اليمين للعناصر الزوجية -->
                                <div class="lg:w-1/2 lg:pr-6"></div>
                                <div class="timeline-dot absolute left-1/2 transform -translate-x-1/2 w-3 h-3 rounded-full <?php echo $badge_color; ?> border-2 border-white dark:border-gray-800 shadow hidden lg:block"></div>
                                <div class="w-full lg:w-1/2 lg:pl-6 mb-4 lg:mb-0">
                                    <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow-sm hover:shadow transition-shadow duration-300 border border-gray-100 dark:border-gray-600">
                                        <!-- العنوان والتاريخ في صف واحد -->
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-lg font-semibold"><?php the_title(); ?></h3>
                                            <span class="inline-block px-2 py-1 <?php echo $badge_color; ?> text-white rounded-full text-xs whitespace-nowrap ml-2">
                                                <?php echo esc_html($date_display); ?>
                                            </span>
                                        </div>
                                        
                                        <!-- المسمى الوظيفي تحت العنوان -->
                                        <?php if ($position) : ?>
                                            <p class="font-medium text-accent text-sm mb-2"><?php echo esc_html($position); ?></p>
                                        <?php endif; ?>
                                        
                                        <!-- اسم الشركة والموقع جنباً إلى جنب -->
                                        <div class="flex items-center text-sm mb-3">
                                            <?php if ($company) : ?>
                                                <span class="text-gray-600 dark:text-gray-300 font-medium"><?php echo esc_html($company); ?></span>
                                            <?php endif; ?>
                                            <?php if ($location) : ?>
                                                <span class="text-gray-500 dark:text-gray-400 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <?php echo esc_html($location); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <!-- الوصف -->
                                        <div class="prose dark:prose-invert max-w-none text-sm text-gray-700 dark:text-gray-300">
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
                    <div class="text-center py-8">
                        <p class="text-gray-600 dark:text-gray-300 text-base mb-3">لا توجد خبرات مضافة بعد</p>
                        <a href="<?php echo admin_url('post-new.php?post_type=experience'); ?>" class="inline-block bg-highlight text-white px-4 py-1.5 rounded hover:bg-opacity-90 transition-colors text-sm">
                            إضافة أول خبرة
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>