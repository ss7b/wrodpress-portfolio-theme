// document.addEventListener('DOMContentLoaded', function () {
//     const contactForm = document.getElementById('contact-form');
//     const formMessage = document.getElementById('form-message');

//     contactForm.addEventListener('submit', function (e) {
//         e.preventDefault();

//         // هنا يمكنك إضافة كود AJAX لإرسال النموذج
//         // مثال:
//         /*
//         const formData = new FormData(contactForm);

//         fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
//             method: 'POST',
//             body: formData
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 formMessage.className = 'mt-4 p-4 bg-green-100 text-green-700 rounded-lg';
//                 formMessage.textContent = 'Thank you! Your message has been sent.';
//                 contactForm.reset();
//             } else {
//                 formMessage.className = 'mt-4 p-4 bg-red-100 text-red-700 rounded-lg';
//                 formMessage.textContent = 'Sorry, there was an error sending your message. Please try again.';
//             }
//             formMessage.classList.remove('hidden');
//         })
//         .catch(error => {
//             formMessage.className = 'mt-4 p-4 bg-red-100 text-red-700 rounded-lg';
//             formMessage.textContent = 'Sorry, there was an error sending your message. Please try again.';
//             formMessage.classList.remove('hidden');
//         });
//         */

//         // عرض رسالة نجاح (بدون إرسال حقيقي)
//         formMessage.className = 'mt-4 p-4 bg-green-100 text-green-700 rounded-lg';
//         formMessage.textContent = 'Thank you! Your message has been sent successfully.';
//         formMessage.classList.remove('hidden');
//         contactForm.reset();

//         // إخفاء الرسالة بعد 5 ثوانٍ
//         setTimeout(() => {
//             formMessage.classList.add('hidden');
//         }, 5000);
//     });
// });






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
var swiperone = new Swiper(".servicesSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
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


// 
const galleryImages = document.querySelectorAll(".gallery-img");
const lightbox = document.getElementById("lightbox");
const closeBtn = document.getElementById("close-lightbox");
const wrapper = document.getElementById("lightbox-wrapper");
let swiper;

// فتح الـ Lightbox عند الضغط على أي صورة
galleryImages.forEach((img) => {
    img.addEventListener("click", () => {
        const currentIndex = parseInt(img.dataset.index);

        // مسح الصور القديمة من الـ swiper
        wrapper.innerHTML = "";

        // بناء جميع الشرائح (slides)
        galleryImages.forEach((g) => {
            const fullSrc = g.dataset.full;
            const altText = g.alt || "";
            const slide = document.createElement("div");
            slide.classList.add("swiper-slide", "flex", "justify-center");
            slide.innerHTML = `
          <img src="${fullSrc}" alt="${altText}" class="max-h-[90vh] object-contain rounded-lg">
        `;
            wrapper.appendChild(slide);
        });

        // إظهار Lightbox
        lightbox.classList.remove("hidden");
        lightbox.classList.add("flex");
        document.body.style.overflow = "hidden";

        // تهيئة Swiper
        swiper = new Swiper(".lightbox-swiper", {
            initialSlide: currentIndex,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            loop: true,
            slidesPerView: 1,
            centeredSlides: true,
        });
    });
});

// إغلاق الـ Lightbox
const closeLightbox = () => {
    lightbox.classList.add("hidden");
    lightbox.classList.remove("flex");
    document.body.style.overflow = "auto";
    if (swiper) swiper.destroy(true, true);
};

closeBtn.addEventListener("click", closeLightbox);

// إغلاق بالضغط على الخلفية
lightbox.addEventListener("click", (e) => {
    if (e.target === lightbox) closeLightbox();
});

// إغلاق بالـ ESC
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeLightbox();
});

// 
