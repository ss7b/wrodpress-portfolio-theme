<?php get_header(); ?>

<div class="container mx-auto px-6 pb-16 top-p">
    <article class="max-w-6xl mx-auto">
        <!-- رأس المشروع المحسن -->
        <header class="mb-12">
            <div class="flex flex-col lg:flex-row justify-between items-start gap-8 mb-8">
                <!-- العنوان والتصنيفات -->
                <div class="flex-1">
                    
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                        <?php the_title(); ?>
                    </h1>

                    <?php
                    $project_categories = get_the_terms(get_the_ID(), 'project_category');
                    if ($project_categories):
                    ?>
                        <div class="flex flex-wrap gap-3 mb-6">
                            <?php foreach ($project_categories as $category): ?>
                                <span class="bg-gradient-to-r from-accent to-primary text-white px-4 py-2 rounded-full text-sm font-medium shadow-lg flex items-center">
                                    <i class="fas fa-tag mr-2 text-white/80"></i>
                                    <?php echo esc_html($category->name); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- أزرار التنقل -->
                <div class="flex gap-4 mt-4 lg:mt-0">
                    <?php if (get_field('project_url')): ?>
                        <a href="<?php echo esc_url(get_field('project_url')); ?>" target="_blank" class="bg-accent text-white px-6 py-2 rounded-lg hover:bg-primary transition-colors inline-flex items-center">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Live Demo
                        </a>
                    <?php endif; ?>
                    <button onclick="history.back()" class="border border-gray-300 dark:border-gray-600 px-6 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back
                    </button>
                </div>
            </div>
        </header>

        <!-- معرض الصور المحسن -->
        <?php
        $gallery_images = get_project_gallery_images();
        if (!empty($gallery_images)): ?>
            <section class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-images mr-3 text-accent"></i>
                        معرض المشروع
                    </h2>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        <?php echo count($gallery_images); ?> صورة
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" id="project-gallery">
                    <?php foreach ($gallery_images as $index => $image_id): ?>
                        <?php if ($image_id && wp_attachment_is_image($image_id)): ?>
                            <?php
                            $image_url = wp_get_attachment_image_url($image_id, 'large');
                            $image_full = wp_get_attachment_image_url($image_id, 'full');
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: get_the_title();
                            ?>
                            <div class="relative group cursor-pointer transform hover:scale-[1.02] transition-transform duration-300">
                                <div class="relative overflow-hidden rounded-2xl shadow-lg">
                                    <img
                                        src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($image_alt); ?>"
                                        class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div data-full="<?php echo esc_url($image_full); ?>" data-index="<?php echo esc_attr($index); ?>" class="gallery-img absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-between p-4">
                                        <span class="text-white text-sm font-medium"><?php echo esc_attr($image_alt); ?></span>
                                        <div class="bg-white/20 backdrop-blur-sm rounded-full w-10 h-10 flex items-center justify-center">
                                            <i class="fas fa-expand text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- Lightbox -->
        <div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center">
            <div class="relative max-w-5xl w-full px-6">
                <button id="close-lightbox" class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300">
                    <i class="fas fa-times"></i>
                </button>

                <div class="swiper lightbox-swiper">
                    <div class="swiper-wrapper" id="lightbox-wrapper"></div>

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
        </div>

        <!-- محتوى المشروع المحسن مع معلومات إضافية -->
        <section class="mb-16">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="border-b border-gray-200 dark:border-gray-700 px-8 py-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-file-alt mr-3 text-accent"></i>
                        تفاصيل المشروع
                    </h2>
                </div>
                <div class="p-8">
                    <!-- معلومات المشروع الإضافية -->
                    
            <!-- معلومات المشروع المصغرة -->
            <div class=" p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php if (get_field('project_client')): ?>
                        <div class="flex items-center space-x-3 p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                            <div class="bg-accent/10 w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-building text-accent"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-700 dark:text-gray-300 text-xs mb-1">العميل</h4>
                                <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html(get_field('project_client')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('project_date')): ?>
                        <div class="flex items-center space-x-3 p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                            <div class="bg-primary/10 w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-calendar-alt text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-700 dark:text-gray-300 text-xs mb-1">تاريخ التسليم</h4>
                                <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html(get_field('project_date')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('project_duration')): ?>
                        <div class="flex items-center space-x-3 p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                            <div class="bg-green-500/10 w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-green-500"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-700 dark:text-gray-300 text-xs mb-1">مدة المشروع</h4>
                                <p class="text-gray-900 dark:text-white font-medium"><?php echo esc_html(get_field('project_duration')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php
                    $project_technologies = get_the_terms(get_the_ID(), 'project_technology');
                    if ($project_technologies):
                    ?>
                        <div class="flex items-center space-x-3 p-3 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                            <div class="bg-purple-500/10 w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-code text-purple-500"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-700 dark:text-gray-300 text-xs mb-1">التقنيات</h4>
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach (array_slice($project_technologies, 0, 2) as $tech): ?>
                                        <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded text-xs font-medium">
                                            <?php echo esc_html($tech->name); ?>
                                        </span>
                                    <?php endforeach; ?>
                                    <?php if (count($project_technologies) > 2): ?>
                                        <span class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded text-xs font-medium">
                                            +<?php echo count($project_technologies) - 2; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

                    <!-- محتوى المشروع -->
                    <div class="prose prose-lg max-w-none dark:prose-invert prose-headings:font-bold prose-headings:text-gray-900 dark:prose-headings:text-white prose-p:text-gray-600 dark:prose-p:text-gray-300 prose-a:text-accent hover:prose-a:text-primary prose-img:rounded-xl prose-img:shadow-md">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- مشاريع ذات صلة -->
        <?php
        $related_projects = new WP_Query(array(
            'post_type' => 'project',
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID()),
            'tax_query' => array(
                array(
                    'taxonomy' => 'project_category',
                    'field' => 'term_id',
                    'terms' => wp_get_post_terms(get_the_ID(), 'project_category', array('fields' => 'ids')),
                )
            )
        )); ?>

        <?php if ($related_projects->have_posts()): ?>
            <section class="mt-16">
                <h2 class="text-2xl font-bold mb-8 text-gray-900 dark:text-white">مشاريع ذات صلة</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php while ($related_projects->have_posts()): $related_projects->the_post(); ?>
                        <?php
                        // الحصول على بيانات إضافية للمشروع
                        $project_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $project_categories = get_the_terms(get_the_ID(), 'project_category');
                        $project_technologies = get_the_terms(get_the_ID(), 'project_technology');
                        $project_url = get_field('project_url', get_the_ID());
                        ?>

                        <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                            <div class="h-48 relative overflow-hidden">
                                <?php if ($project_image): ?>
                                    <img
                                        src="<?php echo esc_url($project_image); ?>"
                                        alt="<?php the_title(); ?>"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                <?php else: ?>
                                    <div class="w-full h-full bg-gradient-to-r from-primary to-accent flex items-center justify-center">
                                        <span class="text-white text-lg">No Image</span>
                                    </div>
                                <?php endif; ?>

                                <!-- Overlay with View Details Button -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <a href="<?php the_permalink(); ?>" class="bg-white text-gray-900 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                                        عرض التفاصيل
                                    </a>
                                </div>

                                <!-- Categories Badges -->
                                <?php if ($project_categories): ?>
                                    <div class="absolute top-4 left-4">
                                        <?php
                                        // نظهر أول تصنيفين ثم نحسب الباقي
                                        $visible = array_slice($project_categories, 0, 2);
                                        $hidden = array_slice($project_categories, 2);
                                        foreach ($visible as $category):
                                            // تأكد أن $category يحتوي term_id و name
                                            $cat_link = get_category_link($category->term_id);
                                        ?>
                                            <a href="<?php echo  esc_url($cat_link); ?>"
                                                class="inline-block bg-highlight text-white text-xs px-2 py-1 rounded mr-2 hover:opacity-90"
                                                title="<?php echo esc_attr(sprintf('عرض التصنيف: %s', $category->name)); ?>">
                                                <?php echo esc_html($category->name); ?>
                                            </a>
                                        <?php endforeach; ?>

                                        <?php if (count($project_categories) > 2):
                                            // رابط +N إلى أول تصنيف مخفي (يمكن تغييره حسب الرغبة)
                                            $first_hidden = reset($hidden);
                                            $first_hidden_link = $first_hidden ? get_category_link($first_hidden->term_id) : '#';
                                        ?>
                                            <span class="inline-block bg-highlight/80 text-white text-xs px-2 py-1 rounded"
                                                title="<?php echo esc_attr(sprintf('عرض باقي التصنيفات (%d)', count($hidden))); ?>">
                                                +<?php echo count($hidden); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white"><?php the_title(); ?></h3>

                                <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-2 text-sm">
                                    <?php
                                    $excerpt = get_the_excerpt();
                                    if (empty($excerpt)) {
                                        $excerpt = wp_trim_words(get_the_content(), 15);
                                    }
                                    echo esc_html($excerpt);
                                    ?>
                                </p>

                                <?php if ($project_technologies): ?>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <?php foreach (array_slice($project_technologies, 0, 3) as $tech): ?>
                                            <span class="text-xs bg-highlight/20 text-highlight px-2 py-1 rounded">
                                                <?php echo esc_html($tech->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                        <?php if (count($project_technologies) > 3): ?>
                                            <span class="text-xs bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-2 py-1 rounded">
                                                +<?php echo count($project_technologies) - 3; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="flex justify-between items-center">
                                    <a href="<?php the_permalink(); ?>" class="text-accent hover:text-primary transition-colors font-semibold text-sm flex items-center group/link">
                                        اقرأ المزيد
                                        <i class="fas fa-arrow-left mr-2 group-hover/link:-translate-x-1 transition-transform ml-1"></i>
                                    </a>

                                    <?php if ($project_url): ?>
                                        <a href="<?php echo esc_url($project_url); ?>" target="_blank"
                                            class="text-gray-500 hover:text-accent transition-colors flex items-center group/demo"
                                            title="Live Demo">
                                            <span class="text-xs mr-2 opacity-0 group-hover/demo:opacity-100 transition-opacity">عرض</span>
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </section>
        <?php endif; ?>
    </article>
</div>

<?php get_footer(); ?>