document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.getElementById('contact-form');
    const formMessage = document.getElementById('form-message');

    contactForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // هنا يمكنك إضافة كود AJAX لإرسال النموذج
        // مثال:
        /*
        const formData = new FormData(contactForm);
        
        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                formMessage.className = 'mt-4 p-4 bg-green-100 text-green-700 rounded-lg';
                formMessage.textContent = 'Thank you! Your message has been sent.';
                contactForm.reset();
            } else {
                formMessage.className = 'mt-4 p-4 bg-red-100 text-red-700 rounded-lg';
                formMessage.textContent = 'Sorry, there was an error sending your message. Please try again.';
            }
            formMessage.classList.remove('hidden');
        })
        .catch(error => {
            formMessage.className = 'mt-4 p-4 bg-red-100 text-red-700 rounded-lg';
            formMessage.textContent = 'Sorry, there was an error sending your message. Please try again.';
            formMessage.classList.remove('hidden');
        });
        */

        // عرض رسالة نجاح (بدون إرسال حقيقي)
        formMessage.className = 'mt-4 p-4 bg-green-100 text-green-700 rounded-lg';
        formMessage.textContent = 'Thank you! Your message has been sent successfully.';
        formMessage.classList.remove('hidden');
        contactForm.reset();

        // إخفاء الرسالة بعد 5 ثوانٍ
        setTimeout(() => {
            formMessage.classList.add('hidden');
        }, 5000);
    });
});


// Theme Toggle
const themeToggle = document.getElementById('theme-toggle');
const themeIcon = themeToggle.querySelector('i');

themeToggle.addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    document.documentElement.classList.toggle('light');

    if (document.documentElement.classList.contains('dark')) {
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
        themeIcon.classList.add('text-yellow-300');
        localStorage.setItem('theme', 'dark');
    } else {
        themeIcon.classList.remove('fa-sun');
        themeIcon.classList.remove('text-yellow-300');
        themeIcon.classList.add('fa-moon');
        themeIcon.classList.add('text-gray-800');
        localStorage.setItem('theme', 'light');
    }
});

// Mobile Menu Toggle
const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href');
        if (targetId === '#') return;

        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
            // Close mobile menu after click
            mobileMenu.classList.add('hidden');
        }
    });
});

// Load saved theme
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    document.documentElement.classList.add('dark');
    document.documentElement.classList.remove('light');
    themeIcon.classList.remove('fa-moon');
    themeIcon.classList.add('fa-sun');
    themeIcon.classList.add('text-yellow-300');
}


// تهيئة Swiper
var swiper = new Swiper(".servicesSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});