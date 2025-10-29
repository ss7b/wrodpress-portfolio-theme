<section id="services" class="py-16 bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-4 text-gray-800 dark:text-white">
            <?php echo esc_html(get_theme_mod('services_title', 'خدمات الويب الشاملة')); ?>
        </h2>
        <p class="text-lg text-center mb-12 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
            <?php echo esc_html(get_theme_mod('services_description', 'نقدم مجموعة متكاملة من خدمات تطوير الويب لتحويل أفكارك إلى واقع رقمي متميز')); ?>
        </p>

        <!-- Swiper Container -->
        <div class="swiper servicesSwiper">
            <div class="swiper-wrapper">
                <?php
                $services_count = get_theme_mod('services_count', 3);
                for ($i = 1; $i <= $services_count; $i++):
                    $service_icon = get_theme_mod("service_{$i}_icon");
                    $service_title = get_theme_mod("service_{$i}_title");
                    $service_description = get_theme_mod("service_{$i}_description");
                    $service_features = get_theme_mod("service_{$i}_features");

                    if (!empty($service_title)):
                ?>
                        <div class="swiper-slide">
                            <div class="service-card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                                <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4 mx-auto">
                                    <i class="<?php echo esc_attr($service_icon) ?> text-white"></i>
                                </div>
                                <h3 class="text-xl font-bold text-center mb-3 text-gray-800 dark:text-white">
                                    <?php echo esc_html($service_title); ?>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 text-center">
                                    <?php echo esc_html($service_description); ?>
                                </p>
                                <?php if (!empty($service_features)): ?>
                                    <ul class="mt-4 space-y-2">
                                        <?php
                                        $features = explode(',', $service_features);
                                        foreach ($features as $feature):
                                            if (!empty(trim($feature))):
                                        ?>
                                                <li class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                                    <svg class="w-4 h-4 text-green-500 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    <?php echo esc_html(trim($feature)); ?>
                                                </li>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php
                    endif;
                endfor;
                ?>
            </div>

            <!-- أزرار التنقل -->
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
</section>