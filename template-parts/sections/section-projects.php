<section id="projects" class="py-16 bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">My Projects</h2>

        <?php
        $projects = new WP_Query(array(
            'post_type' => 'project',
            'posts_per_page' => 3,
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
                <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                    <?php get_template_part('template-parts/content', 'card'); ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
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