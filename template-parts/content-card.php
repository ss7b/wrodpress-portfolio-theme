<?php

/**
 * قالب بطاقة المشروع
 * 
 * @param WP_Post $project كائن المشروع
 * @param array $args إعدادات إضافية
 */

// الحصول على بيانات إضافية للمشروع
$project_id = get_the_ID();
$project_image = get_the_post_thumbnail_url($project_id, 'medium');
$project_categories = get_the_terms($project_id, 'project_category');
$project_technologies = get_the_terms($project_id, 'project_technology');
$project_url = get_field('project_url', $project_id);
$project_year = get_field('project_year', $project_id); // تأكد من وجود هذا الحقل
?>

<!-- بطاقة المشروع -->
<div class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 project-item transform hover:-translate-y-2"
    data-categories="<?php echo $project_categories ? esc_attr(implode(' ', wp_list_pluck($project_categories, 'slug'))) : ''; ?>"
    data-technologies="<?php echo $project_technologies ? esc_attr(implode(' ', wp_list_pluck($project_technologies, 'slug'))) : ''; ?>">

    <!-- صورة المشروع -->
    <div class="h-52 relative overflow-hidden">
        <?php if (has_post_thumbnail()) : ?>
            <img
                src="<?php echo get_the_post_thumbnail_url($project_id, 'large'); ?>"
                alt="<?php the_title(); ?>"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        <?php else : ?>
            <div class="w-full h-full bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                <i class="fas fa-project-diagram text-white text-4xl"></i>
            </div>
        <?php endif; ?>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        
        <!-- التصنيفات -->
        <?php if ($project_categories): ?>
            <div class="absolute bottom-2 left-4">
                <?php
                // نظهر أول تصنيفين ثم نحسب الباقي
                $visible = array_slice($project_categories, 0, 2);
                $hidden = array_slice($project_categories, 2);
                foreach ($visible as $category):
                    // تأكد أن $category يحتوي term_id و name
                    $cat_link = get_category_link($category->term_id);
                ?>
                    <a href="<?php echo  esc_url($cat_link); ?>"
                        class="bg-primary text-white text-xs px-3 py-1.5 rounded-full mr-2 shadow-lg"
                        title="<?php echo esc_attr(sprintf('عرض التصنيف: %s', $category->name)); ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach; ?>

                <?php if (count($project_categories) > 2):
                    // رابط +N إلى أول تصنيف مخفي (يمكن تغييره حسب الرغبة)
                    $first_hidden = reset($hidden);
                    $first_hidden_link = $first_hidden ? get_category_link($first_hidden->term_id) : '#';
                ?>
                    <span class="inline-block bg-primary text-white text-xs px-2 py-1 rounded"
                        title="<?php echo esc_attr(sprintf('عرض باقي التصنيفات (%d)', count($hidden))); ?>">
                        +<?php echo count($hidden); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- سنة المشروع -->
        <?php if ($project_year): ?>
            <div class="absolute top-4 right-4">
                <span class="bg-white/90 text-gray-800 text-xs px-3 py-1.5 rounded-full font-semibold shadow-lg">
                    <?php echo esc_html($project_year); ?>
                </span>
            </div>
        <?php endif; ?>

        <!-- زر المشاهدة -->
        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <a href="<?php the_permalink(); ?>" class="bg-white text-primary px-6 py-3 rounded-full font-semibold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 hover:bg-primary hover:text-white">
                View Details
            </a>
        </div>
    </div>

    <!-- محتوى البطاقة -->
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors duration-200">
            <?php the_title(); ?>
        </h3>

        <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed line-clamp-3">
            <?php echo get_the_excerpt(); ?>
        </p>

        <!--التقنيات الأزرار -->
        <div class="flex justify-between items-center">
            <?php if ($project_technologies): ?>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($project_technologies as $tech): ?>
                        <span class="text-xs bg-highlight/20 text-highlight dark:text-white px-2 py-1 rounded-full">
                            <?php echo esc_html($tech->name); ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($project_url): ?>
                <a href="<?php echo esc_url($project_url); ?>" target="_blank" class="text-gray-500 hover:text-accent transition-colors" title="Live Demo">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>