<section id="contact" class="py-16 bg-white dark:bg-gray-800">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Get In Touch</h2>
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                <h3 class="text-2xl font-semibold mb-4">Let's work together!</h3>
                <p class="mb-6">I'm always interested in new opportunities and challenges. Whether you have a project in mind or just want to say hello, feel free to reach out.</p>

                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-highlight/20 flex items-center justify-center mr-4">
                            <i class="fas fa-envelope text-highlight"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Email</p>
                            <p><?php echo get_theme_mod('contact_email', 'alex@example.com'); ?></p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-highlight/20 flex items-center justify-center mr-4">
                            <i class="fas fa-phone text-highlight"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Phone</p>
                            <p><?php echo get_theme_mod('contact_phone', '+1 (555) 123-4567'); ?></p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-highlight/20 flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-highlight"></i>
                        </div>
                        <div>
                            <p class="font-semibold">Location</p>
                            <p><?php echo get_theme_mod('contact_location', 'New York, USA'); ?></p>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-4 mt-6">
                    <?php
                    $social_links = array(
                        'linkedin' => get_theme_mod('social_linkedin'),
                        'github' => get_theme_mod('social_github'),
                        'twitter' => get_theme_mod('social_twitter'),
                        'whatsapp' => get_theme_mod('social_whatsapp'),
                    );

                    foreach ($social_links as $platform => $url) {
                        if ($url) {
                            echo '<a href="' . esc_url($url) . '" class="w-10 h-10 rounded-full bg-highlight flex items-center justify-center text-white hover:bg-accent transition-colors" target="_blank" rel="noopener">';
                            echo '<i class="fab fa-' . esc_attr($platform) . '"></i>';
                            echo '</a>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="md:w-1/2">
                <form id="contact-form" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                    </div>
                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Message</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-highlight focus:border-highlight dark:bg-gray-700 dark:border-gray-600 dark:text-white" required></textarea>
                    </div>
                    <button type="submit" class="px-6 py-3 bg-highlight text-white font-medium rounded-lg hover:bg-accent transition-colors">Send Message</button>
                </form>

                <div id="form-message" class="mt-4 hidden"></div>
            </div>
        </div>
    </div>
</section>