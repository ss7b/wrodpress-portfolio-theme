<!DOCTYPE html>
<html <?php language_attributes(); ?> class="light">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right');
            bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#3C467B',
                        secondary: '#50589C',
                        accent: '#636CCB',
                        highlight: '#6E8CFB'
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fadeIn': 'fadeIn 1s ease-in-out',
                        'slideIn': 'slideIn 1s ease-in-out',
                        'bounce-slow': 'bounce 3s infinite'
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { transform: translateX(-100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* .timeline-item:nth-child(odd) .timeline-content {
            @apply lg:text-right;
        }
        
        .timeline-item:nth-child(odd) .timeline-dot {
            @apply lg:right-0 lg:left-auto lg:-translate-x-1/2;
        } */
             nav li a {
            @apply px-4 text-primary dark:text-white hover:text-highlight transition;
            }

            header nav li .sub-menu {
            @apply absolute bg-white/90 dark:bg-gray-900/90 shadow-sm rounded-md w-48 top-[63%] opacity-0 invisible transition-opacity duration-300 ease-in-out overflow-hidden;
            }

            header nav li .sub-menu li a {
            @apply block px-4 py-2 text-primary  hover:bg-blue-100 dark:text-white dark:hover:bg-gray-800 ;
            }

            header nav .menu-item-has-children:hover > .sub-menu {
            @apply opacity-100 visible;
            }
        
        .dark {
            @apply bg-gray-900 text-white;
        }
        
        .light {
            @apply bg-gray-50 text-gray-800;
        }
    </style>
</head>

<body <?php body_class('font-sans transition-colors duration-300'); ?>>
    <!-- Header & Navigation -->
    <header class="fixed w-full z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm shadow-sm mb-30">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-14 h-10flex items-center justify-center">
                    <!-- Logo -->
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<span class=" rounded-full bg-gradient-to-r from-accent to-highlight text-white font-bold">SA</span>';
                    }
                    ?>
                </div>
                <!-- <a href="<?php echo home_url(); ?>" class="text-xl font-bold"><?php bloginfo('name'); ?></a> -->
            </div>

            <nav class="hidden md:flex ">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>

            <div class="flex items-center space-x-4">
                <button id="theme-toggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700">
                    <i class="fas fa-moon text-gray-800 dark:text-yellow-300"></i>
                </button>
                <button class="md:hidden" id="mobile-menu-toggle">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white dark:bg-gray-800 shadow-lg">
            <div class="container mx-auto px-6 py-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'space-y-4',
                    'container' => false,
                ));
                ?>
            </div>
        </div>
    </header>