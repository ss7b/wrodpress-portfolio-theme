<?php get_header(); ?>

<div class="container mx-auto px-4 sm:px-6 pb-16 top-p">
    <div class="max-w-7xl mx-auto">
        <!-- رأس الصفحة المحسّن -->
        <header class="text-center mb-16">
            <div class="inline-block mb-4">
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-accent mx-auto rounded-full"></div>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Projects</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Explore our portfolio of innovative projects and creative solutions that drive success
            </p>
        </header>

        <!-- نظام الفلترة المحسّن -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 mb-16 border border-gray-100 dark:border-gray-700">
            <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-center justify-between">
                <div class="flex-1 w-full">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <i class="fas fa-filter text-primary text-lg"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Filter Projects</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- فلترة بالتصنيف -->
                        <div class="space-y-3">
                            <label for="category-filter" class="flex items-center gap-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <i class="fas fa-folder text-primary"></i>
                                By Category
                            </label>
                            <select id="category-filter" class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 shadow-sm">
                                <option value="">All Categories</option>
                                <?php
                                $categories = get_terms(array(
                                    'taxonomy' => 'project_category',
                                    'hide_empty' => true,
                                ));
                                foreach($categories as $category):
                                ?>
                                <option value="<?php echo esc_attr($category->slug); ?>">
                                    <?php echo esc_html($category->name); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- فلترة بالتقنيات -->
                        <div class="space-y-3">
                            <label for="technology-filter" class="flex items-center gap-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                <i class="fas fa-code text-primary"></i>
                                By Technology
                            </label>
                            <select id="technology-filter" class="w-full px-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-200 shadow-sm">
                                <option value="">All Technologies</option>
                                <?php
                                $technologies = get_terms(array(
                                    'taxonomy' => 'project_technology',
                                    'hide_empty' => true,
                                ));
                                foreach($technologies as $tech):
                                ?>
                                <option value="<?php echo esc_attr($tech->slug); ?>">
                                    <?php echo esc_html($tech->name); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- زر إعادة الضبط -->
                        <div class="flex items-end">
                            <button id="reset-filters" class="w-full px-6 py-3 border-2 border-gray-200 dark:border-gray-600 text-gray-600 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-primary/30 hover:text-primary transition-all duration-200 font-semibold shadow-sm">
                                <i class="fas fa-refresh mr-2"></i>
                                Reset Filters
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قائمة المشاريع المحسّنة -->
        <div id="projects-container">
            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-16">
                    <?php while (have_posts()) : the_post(); 
                        $project_categories = get_the_terms(get_the_ID(), 'project_category');
                        $project_technologies = get_the_terms(get_the_ID(), 'project_technology');
                        $project_year = get_field('project_year', get_the_ID());
                    ?>
                        <div class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 project-item transform hover:-translate-y-2"
                             data-categories="<?php echo $project_categories ? esc_attr(implode(' ', wp_list_pluck($project_categories, 'slug'))) : ''; ?>"
                             data-technologies="<?php echo $project_technologies ? esc_attr(implode(' ', wp_list_pluck($project_technologies, 'slug'))) : ''; ?>">
                            
                            <!-- صورة المشروع -->
                            <div class="h-52 relative overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img 
                                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
                                        alt="<?php the_title(); ?>"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    >
                                <?php else : ?>
                                    <div class="w-full h-full bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                        <i class="fas fa-project-diagram text-white text-4xl"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                
                                <!-- التصنيفات -->
                                <div class="absolute top-4 left-4">
                                    <?php if($project_categories): ?>
                                        <?php foreach(array_slice($project_categories, 0, 2) as $category): ?>
                                            <span class="bg-primary text-white text-xs px-3 py-1.5 rounded-full mr-2 shadow-lg">
                                                <?php echo esc_html($category->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                                <!-- سنة المشروع -->
                                <?php if($project_year): ?>
                                <div class="absolute top-4 right-4">
                                    <span class="bg-white/90 text-gray-800 text-xs px-3 py-1.5 rounded-full font-semibold shadow-lg">
                                        <?php echo esc_html($project_year); ?>
                                    </span>
                                </div>
                                <?php endif; ?>

                                <!-- زر المشاهدة -->
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <a href="<?php the_permalink(); ?>" class="bg-white text-primary px-6 py-3 rounded-full font-semibold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 hover:bg-primary hover:text-white">
                                        View Project
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
                                
                                <!-- التقنيات -->
                                <?php if($project_technologies): ?>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <?php foreach(array_slice($project_technologies, 0, 3) as $tech): ?>
                                        <span class="text-xs bg-primary/10 text-primary px-3 py-1.5 rounded-full font-medium">
                                            <?php echo esc_html($tech->name); ?>
                                        </span>
                                    <?php endforeach; ?>
                                    <?php if(count($project_technologies) > 3): ?>
                                        <span class="text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 px-3 py-1.5 rounded-full">
                                            +<?php echo count($project_technologies) - 3; ?> more
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                
                                <!-- الأزرار -->
                                <div class="flex justify-between items-center pt-4 border-t border-gray-100 dark:border-gray-700">
                                    <a href="<?php the_permalink(); ?>" class="flex items-center gap-2 text-accent hover:text-primary transition-colors font-semibold text-sm group/link">
                                        <span>View Details</span>
                                        <i class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform duration-200"></i>
                                    </a>
                                    
                                    <?php if(get_field('project_url', get_the_ID())): ?>
                                    <a href="<?php echo esc_url(get_field('project_url', get_the_ID())); ?>" target="_blank" 
                                       class="flex items-center gap-2 text-gray-500 hover:text-accent transition-colors group/demo" 
                                       title="Live Demo">
                                        <i class="fas fa-external-link-alt group-hover/demo:scale-110 transition-transform duration-200"></i>
                                        <span class="text-sm font-medium">Live Demo</span>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- ترقيم الصفحات المحسّن -->
                <div class="flex justify-center" id="pagination">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-4">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '<i class="fas fa-chevron-left mr-2"></i> Previous',
                            'next_text' => 'Next <i class="fas fa-chevron-right ml-2"></i>',
                            'screen_reader_text' => ' ',
                            'class' => 'pagination flex gap-2',
                        ));
                        ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">No Projects Found</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">We couldn't find any projects matching your criteria.</p>
                        <button id="reset-filters-main" class="px-6 py-3 bg-primary text-white rounded-xl hover:bg-primary/90 transition-colors font-semibold">
                            Reset Filters
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('category-filter');
    const technologyFilter = document.getElementById('technology-filter');
    const resetButton = document.getElementById('reset-filters');
    const resetButtonMain = document.getElementById('reset-filters-main');
    const projectItems = document.querySelectorAll('.project-item');

    function filterProjects() {
        const selectedCategory = categoryFilter.value;
        const selectedTechnology = technologyFilter.value;
        let visibleCount = 0;

        projectItems.forEach(item => {
            const itemCategories = item.getAttribute('data-categories').split(' ').filter(Boolean);
            const itemTechnologies = item.getAttribute('data-technologies').split(' ').filter(Boolean);
            
            const categoryMatch = !selectedCategory || itemCategories.includes(selectedCategory);
            const technologyMatch = !selectedTechnology || itemTechnologies.includes(selectedTechnology);
            
            if (categoryMatch && technologyMatch) {
                item.style.display = 'block';
                visibleCount++;
                // إضافة تأثير ظهور
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 50);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });

        // إظهار رسالة إذا لم توجد نتائج
        const noResults = document.getElementById('no-results');
        const projectsGrid = document.querySelector('#projects-container .grid');
        
        if (visibleCount === 0 && projectsGrid) {
            if (!noResults) {
                const noResultsMsg = document.createElement('div');
                noResultsMsg.id = 'no-results';
                noResultsMsg.className = 'text-center py-16 col-span-full';
                noResultsMsg.innerHTML = `
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">No Projects Found</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">We couldn't find any projects matching your criteria.</p>
                        <button id="reset-filters-inline" class="px-6 py-3 bg-primary text-white rounded-xl hover:bg-primary/90 transition-colors font-semibold">
                            Reset Filters
                        </button>
                    </div>
                `;
                projectsGrid.appendChild(noResultsMsg);
                
                // إضافة event listener للزر الجديد
                document.getElementById('reset-filters-inline').addEventListener('click', function() {
                    categoryFilter.value = '';
                    technologyFilter.value = '';
                    filterProjects();
                });
            }
        } else if (noResults) {
            noResults.remove();
        }
    }

    // إضافة تأثيرات أولية للعناصر
    projectItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, index * 100);
    });

    categoryFilter.addEventListener('change', filterProjects);
    technologyFilter.addEventListener('change', filterProjects);
    
    resetButton.addEventListener('click', function() {
        categoryFilter.value = '';
        technologyFilter.value = '';
        filterProjects();
    });
    
    if (resetButtonMain) {
        resetButtonMain.addEventListener('click', function() {
            categoryFilter.value = '';
            technologyFilter.value = '';
            filterProjects();
        });
    }
});
</script>

<?php get_footer(); ?>