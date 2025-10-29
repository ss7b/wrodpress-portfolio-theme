<?php get_header(); ?>

<div class="container mx-auto px-4 sm:px-6 pb-16 top-p">
    <div class="max-w-7xl mx-auto">
        <!-- رأس الصفحة المحسّن -->

        <header class="text-center mb-16">
            <div class="inline-block mb-4">
                <div class="w-20 h-1 bg-gradient-to-r from-primary to-accent mx-auto rounded-full"></div>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">
                    <i class="fas fa-tag "></i>
                    <?php
                    $current_term = get_queried_object();
                    if ($current_term && isset($current_term->name)) {
                        echo esc_html($current_term->name);
                    } else {
                        the_archive_title();
                    }
                    ?>
                </span>
            </h1>
        </header>

        <!-- قائمة المشاريع المحسّنة -->
        <div id="projects-container">
            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-16">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', 'card'); ?>
                    <?php endwhile; ?>
                </div>

                <!-- ترقيم الصفحات المحسّن
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
                </div> -->
            <?php else : ?>
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">No Projects Found</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">We couldn't find any projects matching your criteria.</p>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>