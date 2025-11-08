<section id="home" class="pt-24 pb-16 md:pt-32 md:pb-24 bg-gradient-to-br from-primary to-secondary text-white relative overflow-hidden">
    <!-- عناصر SVG للخلفية -->
    <div class="absolute inset-0 opacity-10">
        <svg viewBox="0 0 100 100" preserveAspectRatio="none" class="w-full h-full">
            <defs>
                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100" height="100" fill="url(#grid)"/>
        </svg>
    </div>
    
    <!-- دوائر متحركة للخلفية -->
    <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/5" 
         data-aos="zoom-in" 
         data-aos-delay="500"
         data-aos-duration="1500"></div>
    <div class="absolute -bottom-32 -left-20 w-80 h-80 rounded-full bg-white/5" 
         data-aos="zoom-in" 
         data-aos-delay="1000"
         data-aos-duration="1500"></div>
    
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center relative z-10">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <!-- العنوان الرئيسي -->
            <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight"
                data-aos="fade-down" 
                data-aos-delay="200"
                data-aos-duration="800">
                <?php echo get_theme_mod('hero_title', 'Hi, I\'m Alex Morgan'); ?>
            </h1>
            
            <!-- العنوان الفرعي -->
            <div class="relative inline-block mb-6" 
                 data-aos="fade-right" 
                 data-aos-delay="400"
                 data-aos-duration="800">
                <h2 class="text-2xl md:text-3xl font-semibold relative z-10">
                    <?php echo get_theme_mod('hero_subtitle', 'Full Stack Web Developer'); ?>
                </h2>
                <!-- خط مميز تحت العنوان الفرعي -->
                <svg class="absolute -bottom-2 left-0 w-full h-3" viewBox="0 0 100 10" preserveAspectRatio="none">
                    <path d="M0,5 Q25,0 50,5 T100,5" stroke="#f97316" stroke-width="2" fill="none" />
                </svg>
            </div>
            
            <!-- الوصف -->
            <p class="text-lg mb-8 max-w-lg leading-relaxed"
               data-aos="fade-up" 
               data-aos-delay="600"
               data-aos-duration="800">
                <?php echo get_theme_mod('hero_description', 'I create modern, responsive, and user-friendly web applications with cutting-edge technologies.'); ?>
            </p>
            
            <!-- الأزرار -->
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="<?php echo esc_url(get_theme_mod('hero_button1_link', '#projects')); ?>" 
                   class="px-8 py-3 bg-highlight rounded-lg font-semibold hover:bg-accent transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl flex items-center justify-center"
                   data-aos="fade-right" 
                   data-aos-delay="800"
                   data-aos-duration="600">
                    <span><?php echo get_theme_mod('hero_button1_text', 'View My Work'); ?></span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('hero_button2_link', '#contact')); ?>" 
                   class="px-8 py-3 border-2 border-white rounded-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center"
                   data-aos="fade-left" 
                   data-aos-delay="800"
                   data-aos-duration="600">
                    <span><?php echo get_theme_mod('hero_button2_text', 'Contact Me'); ?></span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </a>
            </div>
            
            <!-- مؤشر التمرير -->
            <div class="mt-16 flex justify-center md:justify-start"
                 data-aos="fade-up" 
                 data-aos-delay="1000"
                 data-aos-duration="800">
                <a href="#about" class="flex flex-col items-center text-white/70 hover:text-white transition-colors">
                    <span class="text-sm mb-2">Scroll Down</span>
                    <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- قسم الأيقونة -->
        <div class="md:w-1/2 flex justify-center">
            <div class="relative">
                <!-- دائرة خلفية متحركة -->
                <div class="absolute -inset-4 rounded-full bg-gradient-to-r from-accent to-highlight opacity-20 blur-lg"
                     data-aos="pulse" 
                     data-aos-delay="300"
                     data-aos-duration="2000"
                     data-aos-iteration="infinite"></div>
                
                <!-- دائرة رئيسية -->
                <div class="relative w-64 h-64 md:w-80 md:h-80 rounded-full bg-gradient-to-br from-accent to-highlight flex items-center justify-center overflow-hidden shadow-2xl"
                     data-aos="zoom-in" 
                     data-aos-delay="500"
                     data-aos-duration="1000">
                    <div class="absolute inset-0 bg-gradient-to-br from-transparent to-white/10"></div>
                    
                    <!-- نمط SVG داخلي -->
                    <div class="absolute inset-0 opacity-10">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <circle cx="50" cy="50" r="40" stroke="white" stroke-width="1" fill="none" />
                            <circle cx="50" cy="50" r="30" stroke="white" stroke-width="0.5" fill="none" />
                            <circle cx="50" cy="50" r="20" stroke="white" stroke-width="0.5" fill="none" />
                        </svg>
                    </div>
                    
                    <!-- الأيقونة الرئيسية -->
                    <i class="<?php echo esc_attr(get_theme_mod('hero_icon', 'fas fa-code')); ?> text-white text-8xl md:text-9xl relative z-10"
                       data-aos="fade-in" 
                       data-aos-delay="800"
                       data-aos-duration="1000"></i>
                </div>
                
                <!-- نقاط زخرفية حول الدائرة -->
                <div class="absolute -top-4 -right-4 w-8 h-8 rounded-full bg-white/30"
                     data-aos="fade-in" 
                     data-aos-delay="700"
                     data-aos-duration="1000"></div>
                <div class="absolute -bottom-2 -left-6 w-6 h-6 rounded-full bg-white/30"
                     data-aos="fade-in" 
                     data-aos-delay="900"
                     data-aos-duration="1000"></div>
                <div class="absolute top-1/2 -right-8 w-4 h-4 rounded-full bg-white/30"
                     data-aos="fade-in" 
                     data-aos-delay="1100"
                     data-aos-duration="1000"></div>
            </div>
        </div>
    </div>
    
    <!-- شكل عدسي سفلي -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
        <svg class="relative block w-full h-16 md:h-24" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M 0,60 
                     C 200,120 400,0 600,60 
                     S 1000,0 1200,60 
                     L 1200,120 
                     L 0,120 
                     Z" 
                  class="fill-current text-white dark:text-gray-800">
            </path>
        </svg>
    </div>
</section>