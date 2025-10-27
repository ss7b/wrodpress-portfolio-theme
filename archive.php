<?php get_header(); ?>

<div class="container mx-auto px-6 py-16">
    <div class="max-w-7xl mx-auto">
        <!-- رأس الصفحة -->
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Our Projects</h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                Explore our portfolio of innovative projects and creative solutions
            </p>
        </header>

        <!-- نظام الفلترة -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-12">
            <div class="flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
                <div class="flex-1 w-full">
                    <h3 class="font-semibold mb-3 text-gray-900 dark:text-white">Filter Projects</h3>
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- فلترة بالتصنيف -->
                        <div class="flex-1">
                            <label for="category-filter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                By Category
                            </label>
                            <select id="category-filter" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
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
                        <div class="flex-1">
                            <label for="technology-filter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                By Technology
                            </label>
                            <select id="technology-filter" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
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
                            <button id="reset-filters" class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قائمة المشاريع -->
        <div id="projects-container">
            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <?php while (have_posts()) : the_post(); 
                        $project_categories = get_the_terms(get_the_ID(), 'project_category');
                        $project_technologies = get_the_terms(get_the_ID(), 'project_technology');
                    ?>
                        <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 project-item"
                             data-categories="<?php echo $project_categories ? esc_attr(implode(' ', wp_list_pluck($project_categories, 'slug'))) : ''; ?>"
                             data-technologies="<?php echo $project_technologies ? esc_attr(implode(' ', wp_list_pluck($project_technologies, 'slug'))) : ''; ?>">
                            <div class="h-48 relative overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img 
                                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" 
                                        alt="<?php the_title(); ?>"
                                        class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                    >
                                <?php else : ?>
                                    <div class="w-full h-full bg-gradient-to-r from-primary to-accent flex items-center justify-center">
                                        <span class="text-white text-lg">No Image</span>
                                    </div>
                                <?php endif; ?>
                                <div class="absolute top-4 left-4">
                                    <?php if($project_categories): ?>
                                        <?php foreach($project_categories as $category): ?>
                                            <span class="bg-highlight text-white text-xs px-2 py-1 rounded mr-2">
                                                <?php echo esc_html($category->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
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
                                        View Details
                                    </a>
                                    <?php if(get_field('project_url', get_the_ID())): ?>
                                    <a href="<?php echo esc_url(get_field('project_url', get_the_ID())); ?>" target="_blank" class="text-gray-500 hover:text-accent transition-colors" title="Live Demo">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- ترقيم الصفحات -->
                <div class="flex justify-center">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('Previous', 'textdomain'),
                        'next_text' => __('Next', 'textdomain'),
                    ));
                    ?>
                </div>
            <?php else : ?>
                <div class="text-center py-12">
                    <p class="text-xl text-gray-600 dark:text-gray-300">No projects found matching your criteria.</p>
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
    const projectItems = document.querySelectorAll('.project-item');

    function filterProjects() {
        const selectedCategory = categoryFilter.value;
        const selectedTechnology = technologyFilter.value;
        let visibleCount = 0;

        projectItems.forEach(item => {
            const itemCategories = item.getAttribute('data-categories').split(' ');
            const itemTechnologies = item.getAttribute('data-technologies').split(' ');
            
            const categoryMatch = !selectedCategory || itemCategories.includes(selectedCategory);
            const technologyMatch = !selectedTechnology || itemTechnologies.includes(selectedTechnology);
            
            if (categoryMatch && technologyMatch) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // إظهار رسالة إذا لم توجد نتائج
        const noResults = document.getElementById('no-results');
        if (visibleCount === 0) {
            if (!noResults) {
                const noResultsMsg = document.createElement('div');
                noResultsMsg.id = 'no-results';
                noResultsMsg.className = 'text-center py-12 col-span-full';
                noResultsMsg.innerHTML = '<p class="text-xl text-gray-600 dark:text-gray-300">No projects found matching your criteria.</p>';
                document.querySelector('#projects-container .grid').appendChild(noResultsMsg);
            }
        } else if (noResults) {
            noResults.remove();
        }
    }

    categoryFilter.addEventListener('change', filterProjects);
    technologyFilter.addEventListener('change', filterProjects);
    
    resetButton.addEventListener('click', function() {
        categoryFilter.value = '';
        technologyFilter.value = '';
        filterProjects();
    });
});
</script>

<?php get_footer(); ?>