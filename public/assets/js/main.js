/**
 * Portfolio - Main JavaScript
 * @author Lucas André Fernando
 */

class Portfolio {
    constructor() {
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.initializeComponents();
        this.handlePageLoad();
    }

    setupEventListeners() {
        // DOM Content Loaded
        document.addEventListener('DOMContentLoaded', () => {
            this.hideLoadingOverlay();
            this.initScrollAnimations();
            this.initCounters();
            this.initSkillBars();
        });

        // Window Load
        window.addEventListener('load', () => {
            this.hideLoadingOverlay();
        });

        // Scroll Events
        window.addEventListener('scroll', this.throttle(() => {
            this.handleScroll();
        }, 16));

        // Resize Events
        window.addEventListener('resize', this.throttle(() => {
            this.handleResize();
        }, 250));

        // Navigation
        this.setupNavigation();

        // Forms
        this.setupForms();

        // Theme Toggle
        this.setupThemeToggle();

        // Back to Top
        this.setupBackToTop();
    }

    initializeComponents() {
        this.setupSmoothScroll();
        this.setupLazyLoading();
        this.setupTooltips();
    }

    handlePageLoad() {
        // Remove loading class from body
        document.body.classList.remove('loading');

        // Add loaded class
        document.body.classList.add('loaded');

        // Initialize page-specific functionality
        this.initPageSpecific();
    }

    // Navigation
    setupNavigation() {
        const navToggle = document.getElementById('nav-toggle');
        const navMenu = document.getElementById('nav-menu');
        const header = document.getElementById('header');

        if (navToggle && navMenu) {
            navToggle.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                navToggle.classList.toggle('active');
                document.body.classList.toggle('nav-open');
            });

            // Close menu when clicking on links
            navMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    navMenu.classList.remove('active');
                    navToggle.classList.remove('active');
                    document.body.classList.remove('nav-open');
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!navMenu.contains(e.target) && !navToggle.contains(e.target)) {
                    navMenu.classList.remove('active');
                    navToggle.classList.remove('active');
                    document.body.classList.remove('nav-open');
                }
            });
        }

        // Header scroll effect
        if (header) {
            this.updateHeaderOnScroll();
        }
    }

    updateHeaderOnScroll() {
        const header = document.getElementById('header');
        const scrolled = window.scrollY > 50;

        if (scrolled) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    // Scroll Handling
    handleScroll() {
        this.updateHeaderOnScroll();
        this.updateBackToTop();
        this.updateActiveNavLink();
        this.triggerScrollAnimations();
    }

    updateBackToTop() {
        const backToTop = document.getElementById('back-to-top');
        if (backToTop) {
            const scrolled = window.scrollY > 300;
            backToTop.classList.toggle('visible', scrolled);
        }
    }

    updateActiveNavLink() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (window.scrollY >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    }

    // Smooth Scroll
    setupSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));

                if (target) {
                    const headerHeight = document.getElementById('header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Back to Top
    setupBackToTop() {
        const backToTop = document.getElementById('back-to-top');

        if (backToTop) {
            backToTop.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    }

    // Loading Overlay
    hideLoadingOverlay() {
        const overlay = document.getElementById('loading-overlay');
        if (overlay) {
            overlay.classList.remove('active');
            setTimeout(() => {
                overlay.style.display = 'none';
            }, 300);
        }
    }

    showLoadingOverlay() {
        const overlay = document.getElementById('loading-overlay');
        if (overlay) {
            overlay.style.display = 'flex';
            setTimeout(() => {
                overlay.classList.add('active');
            }, 10);
        }
    }

    // Animations
    initScrollAnimations() {
        const animatedElements = document.querySelectorAll('.animate-fade-in-up, .animate-fade-in-left, .animate-fade-in-right');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0) translateX(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(el => {
            el.style.opacity = '0';
            if (el.classList.contains('animate-fade-in-up')) {
                el.style.transform = 'translateY(30px)';
            } else if (el.classList.contains('animate-fade-in-left')) {
                el.style.transform = 'translateX(-30px)';
            } else if (el.classList.contains('animate-fade-in-right')) {
                el.style.transform = 'translateX(30px)';
            }
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

            observer.observe(el);
        });
    }

    triggerScrollAnimations() {
        const fadeElements = document.querySelectorAll('.fade-in');

        fadeElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;

            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('visible');
            }
        });
    }

    // Counters
    initCounters() {
        const counters = document.querySelectorAll('.stat-number[data-count]');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => {
            observer.observe(counter);
        });
    }

    animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            element.textContent = Math.floor(current);

            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            }
        }, 16);
    }

    // Skill Bars
    initSkillBars() {
        const skillBars = document.querySelectorAll('.skill-progress[data-width]');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const width = entry.target.getAttribute('data-width');
                    setTimeout(() => {
                        entry.target.style.width = width;
                    }, 200);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        skillBars.forEach(bar => {
            observer.observe(bar);
        });
    }

    // Forms
    setupForms() {
        const contactForm = document.getElementById('contact-form');

        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleContactForm(contactForm);
            });

            // Real-time validation
            const inputs = contactForm.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('blur', () => {
                    this.validateField(input);
                });

                input.addEventListener('input', () => {
                    this.clearFieldError(input);
                });
            });
        }
    }

    async handleContactForm(form) {
        const submitBtn = form.querySelector('#submit-btn');
        const formMessage = document.getElementById('form-message');

        // Show loading state
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;

        // Clear previous messages
        formMessage.className = 'form-message';
        formMessage.textContent = '';

        // Validate form
        if (!this.validateForm(form)) {
            submitBtn.classList.remove('loading');
            submitBtn.disabled = false;
            return;
        }

        try {
            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const result = await response.json();

            if (result.success) {
                formMessage.className = 'form-message success';
                formMessage.textContent = result.message;
                form.reset();

                // Show success animation
                this.showSuccessAnimation();
            } else {
                formMessage.className = 'form-message error';
                formMessage.textContent = result.message;

                // Show field errors if available
                if (result.errors) {
                    this.showFieldErrors(result.errors);
                }
            }
        } catch (error) {
            formMessage.className = 'form-message error';
            formMessage.textContent = 'Erro ao enviar mensagem. Tente novamente.';
            console.error('Form submission error:', error);
        } finally {
            submitBtn.classList.remove('loading');
            submitBtn.disabled = false;
        }
    }

    validateForm(form) {
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!this.validateField(input)) {
                isValid = false;
            }
        });

        return isValid;
    }

    validateField(field) {
        const value = field.value.trim();
        const type = field.type;
        const name = field.name;
        let isValid = true;
        let message = '';

        // Required validation
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            message = 'Este campo é obrigatório';
        }

        // Email validation
        else if (type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                message = 'Email inválido';
            }
        }

        // Phone validation
        else if (name === 'phone' && value) {
            const phoneRegex = /^[\d\s\$\$\-\+]{10,}$/;
            if (!phoneRegex.test(value)) {
                isValid = false;
                message = 'Telefone inválido';
            }
        }

        // Length validations
        else if (value) {
            if (name === 'name' && value.length < 2) {
                isValid = false;
                message = 'Nome deve ter pelo menos 2 caracteres';
            } else if (name === 'subject' && value.length < 5) {
                isValid = false;
                message = 'Assunto deve ter pelo menos 5 caracteres';
            } else if (name === 'message' && value.length < 10) {
                isValid = false;
                message = 'Mensagem deve ter pelo menos 10 caracteres';
            }
        }

        this.showFieldError(field, isValid ? '' : message);
        return isValid;
    }

    showFieldError(field, message) {
        const errorElement = document.getElementById(`${field.name}-error`);

        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.toggle('active', !!message);
        }

        field.classList.toggle('error', !!message);
    }

    clearFieldError(field) {
        const errorElement = document.getElementById(`${field.name}-error`);

        if (errorElement) {
            errorElement.textContent = '';
            errorElement.classList.remove('active');
        }

        field.classList.remove('error');
    }

    showFieldErrors(errors) {
        Object.keys(errors).forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field) {
                this.showFieldError(field, errors[fieldName]);
            }
        });
    }

    showSuccessAnimation() {
        // Create success checkmark animation
        const successIcon = document.createElement('div');
        successIcon.className = 'success-animation';
        successIcon.innerHTML = '<i class="fas fa-check-circle"></i>';

        document.body.appendChild(successIcon);

        setTimeout(() => {
            successIcon.remove();
        }, 3000);
    }

    // Theme Toggle
    setupThemeToggle() {
        const themeToggle = document.getElementById('theme-toggle');

        if (themeToggle) {
            // Load saved theme
            const savedTheme = localStorage.getItem('theme') || 'dark';
            this.setTheme(savedTheme);

            themeToggle.addEventListener('click', () => {
                const currentTheme = document.body.getAttribute('data-theme') || 'dark';
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                this.setTheme(newTheme);
            });
        }
    }

    setTheme(theme) {
        document.body.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);

        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            const icon = themeToggle.querySelector('i');
            icon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
        }
    }

    // Lazy Loading
    setupLazyLoading() {
        const images = document.querySelectorAll('img[loading="lazy"]');

        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(img => {
                img.classList.add('lazy');
                imageObserver.observe(img);
            });
        }
    }

    // Tooltips
    setupTooltips() {
        const tooltipElements = document.querySelectorAll('[data-tooltip]');

        tooltipElements.forEach(element => {
            element.addEventListener('mouseenter', (e) => {
                this.showTooltip(e.target);
            });

            element.addEventListener('mouseleave', () => {
                this.hideTooltip();
            });
        });
    }

    showTooltip(element) {
        const text = element.getAttribute('data-tooltip');
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip';
        tooltip.textContent = text;

        document.body.appendChild(tooltip);

        const rect = element.getBoundingClientRect();
        tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
        tooltip.style.top = rect.top - tooltip.offsetHeight - 10 + 'px';

        setTimeout(() => tooltip.classList.add('visible'), 10);
    }

    hideTooltip() {
        const tooltip = document.querySelector('.tooltip');
        if (tooltip) {
            tooltip.remove();
        }
    }

    // Page Specific
    initPageSpecific() {
        const page = document.body.className.match(/(\w+)-page/);

        if (page) {
            const pageName = page[1];

            switch (pageName) {
                case 'home':
                    this.initHomePage();
                    break;
                case 'projects':
                    this.initProjectsPage();
                    break;
                case 'contact':
                    this.initContactPage();
                    break;
            }
        }
    }

    initHomePage() {
        // Home page specific functionality
        this.setupTypewriter();
    }

    initProjectsPage() {
        // Projects page specific functionality
        this.setupProjectFilters();
    }

    initContactPage() {
        // Contact page specific functionality
        this.setupContactValidation();
    }

    setupTypewriter() {
        const element = document.querySelector('.typewriter');
        if (element) {
            const text = element.textContent;
            element.textContent = '';

            let i = 0;
            const timer = setInterval(() => {
                element.textContent += text.charAt(i);
                i++;

                if (i > text.length) {
                    clearInterval(timer);
                }
            }, 100);
        }
    }

    setupProjectFilters() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const projectCards = document.querySelectorAll('.project-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.getAttribute('data-filter');

                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                // Filter projects
                projectCards.forEach(card => {
                    const category = card.getAttribute('data-category');

                    if (filter === 'all' || category === filter) {
                        card.style.display = 'block';
                        card.classList.add('animate-fade-in-up');
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    setupContactValidation() {
        // Additional contact page validation
        const phoneInput = document.getElementById('phone');

        if (phoneInput) {
            phoneInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');

                if (value.length >= 11) {
                    value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                } else if (value.length >= 7) {
                    value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
                } else if (value.length >= 3) {
                    value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
                }

                e.target.value = value;
            });
        }
    }

    // Utility Functions
    throttle(func, limit) {
        let inThrottle;
        return function () {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    }
    // Continuação do main.js

    debounce(func, wait, immediate) {
        let timeout;
        return function () {
            const context = this;
            const args = arguments;
            const later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // Resize Handler
    handleResize() {
        // Update any size-dependent calculations
        this.updateMobileMenu();
    }

    updateMobileMenu() {
        const navMenu = document.getElementById('nav-menu');
        const navToggle = document.getElementById('nav-toggle');

        if (window.innerWidth > 768) {
            navMenu.classList.remove('active');
            navToggle.classList.remove('active');
            document.body.classList.remove('nav-open');
        }
    }
}

// Initialize Portfolio when DOM is ready
const portfolio = new Portfolio();

// Global utility functions
window.Portfolio = {
    showNotification: function (message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                <span>${message}</span>
                <button class="notification-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        document.body.appendChild(notification);

        // Show notification
        setTimeout(() => notification.classList.add('show'), 100);

        // Auto hide after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 5000);

        // Close button
        notification.querySelector('.notification-close').addEventListener('click', () => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        });
    },

    showModal: function (content, options = {}) {
        const modal = document.createElement('div');
        modal.className = 'modal-overlay';
        modal.innerHTML = `
            <div class="modal-content">
                <div class="modal-header">
                    <h3>${options.title || 'Modal'}</h3>
                    <button class="modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    ${content}
                </div>
                ${options.footer ? `<div class="modal-footer">${options.footer}</div>` : ''}
            </div>
        `;

        document.body.appendChild(modal);
        document.body.classList.add('modal-open');

        // Show modal
        setTimeout(() => modal.classList.add('show'), 100);

        // Close handlers
        const closeModal = () => {
            modal.classList.remove('show');
            document.body.classList.remove('modal-open');
            setTimeout(() => modal.remove(), 300);
        };

        modal.querySelector('.modal-close').addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        // ESC key
        const escHandler = (e) => {
            if (e.key === 'Escape') {
                closeModal();
                document.removeEventListener('keydown', escHandler);
            }
        };
        document.addEventListener('keydown', escHandler);

        return modal;
    }
};