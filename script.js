// ===================================
// DYNAMIC DESTINATION ANIMATION
// ===================================

document.addEventListener('DOMContentLoaded', function () {
    const destinations = ['Sundarbans', 'Saint Martin', 'Srimangal', 'Rangamati', 'Cox\'s Bazar', 'Sylhet', 'Bandarbans', 'Jaflong', 'Sajek Valley', 'Sonargaon'];
    const animatedText = document.getElementById('animatedDestination');
    let currentIndex = 0;

    function changeDestination() {
        if (animatedText) {
            animatedText.textContent = destinations[currentIndex];
            animatedText.style.animation = 'none';
            setTimeout(() => {
                animatedText.style.animation = 'fadeInUp 0.5s ease';
            }, 10);
            currentIndex = (currentIndex + 1) % destinations.length;
        }
    }

    setInterval(changeDestination, 3000);
    changeDestination();
});

// ===================================
// NAVBAR SCROLL EFFECT
// ===================================

window.addEventListener('scroll', function () {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 100) {
        navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        navbar.style.padding = '0.5rem 0';
    } else {
        navbar.style.padding = '1rem 0';
    }
});

// ===================================
// SEARCH FORM HANDLING
// ===================================

document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const destination = document.getElementById('destination').value;
    const startDate = document.getElementById('startDate').value;
    const budget = document.getElementById('budget').value;
    const travelers = document.getElementById('travelers').value;

    if (!destination || !startDate || budget === 'Select Budget' || !travelers) {
        alert('Please fill in all fields');
        return;
    }

    // Simulate search
    console.log({
        destination,
        startDate,
        budget,
        travelers
    });
    alert(`Searching for tours to ${destination} for ${travelers} travelers starting ${startDate}`);
});

// ===================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ===================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            const target = document.querySelector(href);
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            // Close navbar if mobile
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse.classList.contains('show')) {
                new bootstrap.Collapse(navbarCollapse).hide();
            }
        }
    });
});

// ===================================
// CONTACT FORM HANDLING
// ===================================

document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Simulate form submission
    console.log('Form submitted');
    alert('Thank you for your message! We will get back to you soon.');
    this.reset();
});

// ===================================
// BOOKING FORM HANDLING
// ===================================

document.getElementById('bookingForm').addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Booking request submitted! We will contact you soon to confirm.');
    this.reset();
});

// ===================================
// INTERSECTION OBSERVER FOR ANIMATIONS
// ===================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function (entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeInUp');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe all cards
document.querySelectorAll('.package-card, .service-card, .testimonial-card, .gallery-item').forEach(el => {
    observer.observe(el);
});

// ===================================
// ADD TO CART / FAVORITES
// ===================================

document.querySelectorAll('.package-card').forEach(card => {
    card.addEventListener('mouseenter', function () {
        this.style.transform = 'translateY(-10px)';
    });
    card.addEventListener('mouseleave', function () {
        this.style.transform = 'translateY(0)';
    });
});

// ===================================
// MODAL ENHANCEMENTS
// ===================================

const bookingModal = document.getElementById('bookingModal');
if (bookingModal) {
    bookingModal.addEventListener('show.bs.modal', function () {
        console.log('Booking modal opened');
    });
}

// ===================================
// DYNAMIC YEAR IN FOOTER
// ===================================

document.addEventListener('DOMContentLoaded', function () {
    const footerText = document.querySelector('.footer-bottom p');
    if (footerText) {
        const currentYear = new Date().getFullYear();
        footerText.textContent = `© ${currentYear} Tour And Travel Touch. All rights reserved. | Privacy Policy | Terms & Conditions`;
    }
});

// ===================================
// ADD RIPPLE EFFECT TO BUTTONS
// ===================================

document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function (e) {
        const ripples = document.createElement('span');
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripples.style.width = ripples.style.height = size + 'px';
        ripples.style.left = x + 'px';
        ripples.style.top = y + 'px';
        ripples.classList.add('ripple');

        this.appendChild(ripples);

        setTimeout(() => ripples.remove(), 600);
    });
});

// ===================================
// FORM VALIDATION
// ===================================

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^(\+88)?0?1[3-9]\d{8}$/;
    return re.test(phone);
}

// Add validation to contact form
const contactForm = document.getElementById('contactForm');
if (contactForm) {
    const emailInput = contactForm.querySelector('input[type="email"]');
    const phoneInput = contactForm.querySelector('input[type="tel"]');

    if (emailInput) {
        emailInput.addEventListener('blur', function () {
            if (this.value && !validateEmail(this.value)) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    }
}

// ===================================
// LAZY LOADING IMAGES
// ===================================

if ('IntersectionObserver' in window) {
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                observer.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));
}

// ===================================
// COUNTER ANIMATION FOR STATS
// ===================================

function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// ===================================
// MOBILE MENU TOGGLE
// ===================================

const navbarToggler = document.querySelector('.navbar-toggler');
if (navbarToggler) {
    navbarToggler.addEventListener('click', function () {
        this.classList.toggle('active');
    });
}

// ===================================
// ACCESSIBILITY IMPROVEMENTS
// ===================================

// Add keyboard navigation
document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        // Close any open modals
        const openModals = document.querySelectorAll('.modal.show');
        openModals.forEach(modal => {
            const bsModal = bootstrap.Modal.getInstance(modal);
            if (bsModal) bsModal.hide();
        });
    }
});

// ===================================
// PERFORMANCE: DEBOUNCE SCROLL
// ===================================

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// ===================================
// THEME DETECTION
// ===================================

function detectThemePreference() {
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (prefersDark) {
        console.log('User prefers dark theme');
    }
}

detectThemePreference();

// ===================================
// INITIALIZATION
// ===================================

console.log('Tour And Travel Touch - Website Loaded Successfully');

// Add CSS for ripple effect dynamically
const style = document.createElement('style');
style.textContent = `
    .btn {
        position: relative;
        overflow: hidden;
    }
    
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
