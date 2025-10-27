<?php get_header(); ?>

<div class="container mx-auto px-6 py-16">
    <article class="max-w-6xl mx-auto">
        <!-- رأس المشروع -->
        <header class="mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4"><?php the_title(); ?></h1>

                    <?php
                    $project_categories = get_the_terms(get_the_ID(), 'project_category');
                    if ($project_categories):
                    ?>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach ($project_categories as $category): ?>
                                <span class="bg-highlight text-white px-3 py-1 rounded-full text-sm">
                                    <?php echo esc_html($category->name); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="flex gap-4 mt-4 md:mt-0">
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

            <!-- معلومات المشروع -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg">
                <?php if (get_field('project_client')): ?>
                    <div>
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300">Client</h3>
                        <p class="text-gray-900 dark:text-white"><?php echo esc_html(get_field('project_client')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if (get_field('project_date')): ?>
                    <div>
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300">Date</h3>
                        <p class="text-gray-900 dark:text-white"><?php echo esc_html(get_field('project_date')); ?></p>
                    </div>
                <?php endif; ?>

                <?php
                $project_technologies = get_the_terms(get_the_ID(), 'project_technology');
                if ($project_technologies):
                ?>
                    <div>
                        <h3 class="font-semibold text-gray-700 dark:text-gray-300">Technologies</h3>
                        <div class="flex flex-wrap gap-1">
                            <?php foreach ($project_technologies as $tech): ?>
                                <span class="bg-highlight/20 text-highlight px-2 py-1 rounded text-sm">
                                    <?php echo esc_html($tech->name); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- معرض الصور -->
        <?php
        $gallery_images = get_project_gallery_images();
        if (!empty($gallery_images)):
        ?>
            <section class="mb-12">
                <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Project Gallery</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($gallery_images as $image_id): ?>
                        <?php if ($image_id && wp_attachment_is_image($image_id)): ?>
                            <?php
                            $image_url = wp_get_attachment_image_url($image_id, 'large');
                            $image_full = wp_get_attachment_image_url($image_id, 'full');
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: get_the_title();
                            ?>
                            <div class="relative group cursor-pointer">
                                <img
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($image_alt); ?>"
                                    class="w-full h-64 object-cover rounded-lg group-hover:opacity-80 transition-opacity"
                                    onclick="openLightbox('<?php echo esc_url($image_full); ?>')">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors rounded-lg flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <i class="fas fa-search-plus text-white text-2xl"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- محتوى المشروع -->
        <section class="prose prose-lg max-w-none dark:prose-invert mb-12">
            <?php the_content(); ?>
        </section>

        <!-- Lightbox -->
        <div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center">
            <div class="relative max-w-4xl max-h-full">
                <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300">
                    <i class="fas fa-times"></i>
                </button>
                <img id="lightbox-img" src="" alt="" class="max-w-full max-h-screen">
            </div>
        </div>

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
        ));

        if ($related_projects->have_posts()):
        ?>
            <section class="mt-16">
                <h2 class="text-2xl font-bold mb-8 text-gray-900 dark:text-white">Related Projects</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php while ($related_projects->have_posts()): $related_projects->the_post(); ?>
                        <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                            <?php if (has_post_thumbnail()): ?>
                                <img
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>"
                                    alt="<?php the_title(); ?>"
                                    class="w-full h-48 object-cover">
                            <?php endif; ?>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg mb-2"><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="text-accent hover:text-primary transition-colors text-sm font-semibold">
                                    View Project
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </section>
        <?php endif; ?>
    </article>
</div>

<script>
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.remove('hidden');
        document.getElementById('lightbox').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.getElementById('lightbox').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // إغلاق Lightbox بالضغط على ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>

<?php get_footer(); ?>