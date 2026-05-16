// Mobile Menu Toggle
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');

hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    hamburger.classList.toggle('active');
});

// Intersection Observer for fade-in animations
const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        } else {
            entry.target.classList.remove('visible');
        }
    });
}, observerOptions);

// Add fade-in class to sections
document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('.section, .hero-text, .hero-image');
    sections.forEach(section => {
        section.classList.add('fade-in');
        observer.observe(section);
    });

    // Close mobile menu on click
    const navItems = document.querySelectorAll('.nav-link');
    navItems.forEach(item => {
        item.addEventListener('click', () => {
            navMenu.classList.remove('active');
            hamburger.classList.remove('active');
        });
    });
});

// Navbar background change on scroll
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        navbar.style.boxShadow = '0 10px 30px -10px rgba(2,12,27,0.7)';
    } else {
        navbar.style.boxShadow = 'none';
    }
});

// Theme Toggle
const themeToggle = document.getElementById('theme-toggle');
const themeIcon = document.getElementById('theme-icon');

const currentTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark');

if (currentTheme === 'light') {
    document.documentElement.setAttribute('data-theme', 'light');
    if (themeIcon) themeIcon.textContent = '🌙';
}

if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        let theme = document.documentElement.getAttribute('data-theme');
        if (theme === 'light') {
            document.documentElement.removeAttribute('data-theme');
            localStorage.setItem('theme', 'dark');
            themeIcon.textContent = '🌞';
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
            themeIcon.textContent = '🌙';
        }
    });
}

// Typing Effect
const typeEffectElements = document.querySelectorAll('.type-effect');

typeEffectElements.forEach(el => {
    const text = el.textContent.trim();
    if(text) {
        el.setAttribute('data-text', text);
        el.innerHTML = '<span class="type-text"></span><span class="type-cursor">|</span>';
    }
});

function typeWriter(element, text, i) {
    if (!element.classList.contains('typed')) return;
    
    const typeText = element.querySelector('.type-text');
    if (!typeText) return;
    
    if (i < text.length) {
        typeText.textContent += text.charAt(i);
        setTimeout(() => typeWriter(element, text, i + 1), 30 + Math.random() * 40);
    } else {
        const cursor = element.querySelector('.type-cursor');
        if (cursor) cursor.style.display = 'none';
    }
}

const typingObserverOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.2
};

const typingObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const el = entry.target;
            if (!el.classList.contains('typed')) {
                el.classList.add('typed');
                typeWriter(el, el.getAttribute('data-text'), 0);
            }
        } else {
            const el = entry.target;
            el.classList.remove('typed');
            const typeText = el.querySelector('.type-text');
            if (typeText) typeText.textContent = '';
            const cursor = el.querySelector('.type-cursor');
            if (cursor) cursor.style.display = 'inline';
        }
    });
}, typingObserverOptions);

typeEffectElements.forEach(el => {
    typingObserver.observe(el);
});
