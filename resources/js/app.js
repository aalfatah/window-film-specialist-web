import './bootstrap';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-float').forEach((el) => {
        el.classList.add('reveal');
        observer.observe(el);
    });
});

// Inisialisasi hanya jika elemen ada di halaman
document.addEventListener('DOMContentLoaded', () => {
    const serviceSlider = document.querySelector('.service-swiper');
    
    if (serviceSlider) {
        const swiper = new Swiper(serviceSlider, {
            modules: [Navigation, Pagination],
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.nav-next',
                prevEl: '.nav-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });

        // Simpan instance swiper ke window agar bisa diakses fungsi filter di inline HTML
        window.swiperInstance = swiper;
    }
});

// Fungsi Filter Global
window.filterService = function(category, element) {
    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active-filter'));
    element.classList.add('active-filter');

    const slides = document.querySelectorAll('.service-item');
    
    slides.forEach(slide => {
        if (category === 'all' || slide.classList.contains(category)) {
            slide.classList.remove('hidden');
        } else {
            slide.classList.add('hidden');
        }
    });

    if (window.swiperInstance) {
        window.swiperInstance.update();
        window.swiperInstance.slideTo(0);
    }
};