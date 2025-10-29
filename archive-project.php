<?php get_header(); ?>

<div class="container mx-auto px-4 sm:px-6 pb-16 top-p">
    <div class="max-w-7xl mx-auto">
        <!-- رأس الصفحة المحسّن -->
        <header class="text-center mb-16">
            <div class="inline-block mb-4">
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-accent mx-auto rounded-full"></div>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                My <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Projects</span>
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
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', 'card' ); ?>
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
        const pagination = document.getElementById('pagination');

        
        if (visibleCount === 0 && projectsGrid) {
            if (!noResults) {
                pagination.style.display = 'none';
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

<style>

</style>

<?php get_footer(); ?>