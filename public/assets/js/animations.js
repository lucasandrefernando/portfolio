/**
 * Portfolio - Animations JavaScript
 * @author Lucas André Fernando
 */

// Advanced Animation Controller
class AnimationController {
    constructor() {
        this.animations = new Map();
        this.observers = new Map();
        this.init();
    }

    init() {
        this.setupIntersectionObservers();
        this.setupScrollAnimations();
        this.setupParallaxEffects();
        this.setupParticleEffects();
    }

    // Intersection Observer for scroll animations
    setupIntersectionObservers() {
        const fadeInObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.triggerFadeIn(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        const slideInObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.triggerSlideIn(entry.target);
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        });

        // Observe elements
        document.querySelectorAll('.fade-in-on-scroll').forEach(el => {
            fadeInObserver.observe(el);
        });

        document.querySelectorAll('.slide-in-on-scroll').forEach(el => {
            slideInObserver.observe(el);
        });

        this.observers.set('fadeIn', fadeInObserver);
        this.observers.set('slideIn', slideInObserver);
    }

    // Scroll-based animations
    setupScrollAnimations() {
        let ticking = false;

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    this.updateScrollAnimations();
                    ticking = false;
                });
                ticking = true;
            }
        });
    }

    updateScrollAnimations() {
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;

        // Parallax elements
        document.querySelectorAll('.parallax').forEach(element => {
            const speed = parseFloat(element.getAttribute('data-speed') || '0.5');
            const yPos = -(scrollY * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });

        // Scale on scroll elements
        document.querySelectorAll('.scale-on-scroll').forEach(element => {
            const rect = element.getBoundingClientRect();
            const elementTop = rect.top;
            const elementHeight = rect.height;

            if (elementTop < windowHeight && elementTop + elementHeight > 0) {
                const progress = Math.max(0, Math.min(1, (windowHeight - elementTop) / windowHeight));
                const scale = 0.8 + (progress * 0.2);
                element.style.transform = `scale(${scale})`;
            }
        });

        // Rotate on scroll elements
        document.querySelectorAll('.rotate-on-scroll').forEach(element => {
            const speed = parseFloat(element.getAttribute('data-rotation-speed') || '0.1');
            const rotation = scrollY * speed;
            element.style.transform = `rotate(${rotation}deg)`;
        });
    }

    // Parallax effects
    setupParallaxEffects() {
        document.querySelectorAll('.parallax-container').forEach(container => {
            const layers = container.querySelectorAll('.parallax-layer');

            layers.forEach(layer => {
                const speed = parseFloat(layer.getAttribute('data-speed') || '0.5');
                layer.style.willChange = 'transform';
            });
        });
    }

    // Particle effects
    setupParticleEffects() {
        document.querySelectorAll('.particles-container').forEach(container => {
            this.createParticleSystem(container);
        });
    }

    createParticleSystem(container) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        canvas.style.position = 'absolute';
        canvas.style.top = '0';
        canvas.style.left = '0';
        canvas.style.pointerEvents = 'none';
        canvas.style.zIndex = '1';

        container.appendChild(canvas);

        const resizeCanvas = () => {
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
        };

        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        // Particle system
        const particles = [];
        const particleCount = parseInt(container.getAttribute('data-particle-count') || '50');

        for (let i = 0; i < particleCount; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 0.5,
                vy: (Math.random() - 0.5) * 0.5,
                size: Math.random() * 2 + 1,
                opacity: Math.random() * 0.5 + 0.2
            });
        }

        const animate = () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            particles.forEach(particle => {
                // Update position
                particle.x += particle.vx;
                particle.y += particle.vy;

                // Wrap around edges
                if (particle.x < 0) particle.x = canvas.width;
                if (particle.x > canvas.width) particle.x = 0;
                if (particle.y < 0) particle.y = canvas.height;
                if (particle.y > canvas.height) particle.y = 0;

                // Draw particle
                ctx.beginPath();
                ctx.arc(particle.x, particle.y, particle.size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(212, 175, 55, ${particle.opacity})`;
                ctx.fill();
            });

            requestAnimationFrame(animate);
        };

        animate();
    }

    // Animation triggers
    triggerFadeIn(element) {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

        requestAnimationFrame(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        });
    }

    triggerSlideIn(element) {
        const direction = element.getAttribute('data-slide-direction') || 'left';
        let initialTransform = '';

        switch (direction) {
            case 'left':
                initialTransform = 'translateX(-100px)';
                break;
            case 'right':
                initialTransform = 'translateX(100px)';
                break;
            case 'up':
                initialTransform = 'translateY(100px)';
                break;
            case 'down':
                initialTransform = 'translateY(-100px)';
                break;
        }

        element.style.opacity = '0';
        element.style.transform = initialTransform;
        element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';

        requestAnimationFrame(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateX(0) translateY(0)';
        });
    }

    // Text animations
    animateText(element, animation = 'typewriter') {
        const text = element.textContent;
        element.textContent = '';

        switch (animation) {
            case 'typewriter':
                this.typewriterEffect(element, text);
                break;
            case 'fadeInWords':
                this.fadeInWordsEffect(element, text);
                break;
            case 'slideInChars':
                this.slideInCharsEffect(element, text);
                break;
        }
    }

    typewriterEffect(element, text) {
        let i = 0;
        const speed = 50;

        const type = () => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        };

        type();
    }

    fadeInWordsEffect(element, text) {
        const words = text.split(' ');
        element.innerHTML = words.map(word =>
            `<span class="word-animate" style="opacity: 0;">${word}</span>`
        ).join(' ');

        const wordElements = element.querySelectorAll('.word-animate');

        wordElements.forEach((word, index) => {
            setTimeout(() => {
                word.style.transition = 'opacity 0.5s ease';
                word.style.opacity = '1';
            }, index * 100);
        });
    }

    slideInCharsEffect(element, text) {
        element.innerHTML = text.split('').map(char =>
            `<span class="char-animate" style="opacity: 0; transform: translateY(20px);">${char === ' ' ? '&nbsp;' : char}</span>`
        ).join('');

        const charElements = element.querySelectorAll('.char-animate');

        charElements.forEach((char, index) => {
            setTimeout(() => {
                char.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                char.style.opacity = '1';
                char.style.transform = 'translateY(0)';
            }, index * 30);
        });
    }

    // Hover animations
    setupHoverAnimations() {
        document.querySelectorAll('.hover-lift').forEach(element => {
            element.addEventListener('mouseenter', () => {
                element.style.transform = 'translateY(-10px)';
                element.style.transition = 'transform 0.3s ease';
            });

            element.addEventListener('mouseleave', () => {
                element.style.transform = 'translateY(0)';
            });
        });

        document.querySelectorAll('.hover-scale').forEach(element => {
            element.addEventListener('mouseenter', () => {
                element.style.transform = 'scale(1.05)';
                element.style.transition = 'transform 0.3s ease';
            });

            element.addEventListener('mouseleave', () => {
                element.style.transform = 'scale(1)';
            });
        });

        document.querySelectorAll('.hover-rotate').forEach(element => {
            element.addEventListener('mouseenter', () => {
                element.style.transform = 'rotate(5deg)';
                element.style.transition = 'transform 0.3s ease';
            });

            element.addEventListener('mouseleave', () => {
                element.style.transform = 'rotate(0deg)';
            });
        });
    }

    // Loading animations
    createLoadingAnimation(container) {
        const loader = document.createElement('div');
        loader.className = 'custom-loader';
        loader.innerHTML = `
            <div class="loader-ring">
                <div class="loader-ring-inner"></div>
            </div>
            <div class="loader-text">Carregando...</div>
        `;

        container.appendChild(loader);
        return loader;
    }

    removeLoadingAnimation(loader) {
        if (loader && loader.parentNode) {
            loader.style.opacity = '0';
            loader.style.transition = 'opacity 0.3s ease';

            setTimeout(() => {
                loader.remove();
            }, 300);
        }
    }

    // Page transition animations
    pageTransitionIn() {
        document.body.style.opacity = '0';
        document.body.style.transform = 'translateY(20px)';
        document.body.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

        requestAnimationFrame(() => {
            document.body.style.opacity = '1';
            document.body.style.transform = 'translateY(0)';
        });
    }

    pageTransitionOut(callback) {
        document.body.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        document.body.style.opacity = '0';
        document.body.style.transform = 'translateY(-20px)';

        setTimeout(() => {
            if (callback) callback();
        }, 300);
    }

    // Cleanup
    destroy() {
        this.observers.forEach(observer => {
            observer.disconnect();
        });

        this.animations.clear();
        this.observers.clear();
    }
}

// Initialize animations when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    const animationController = new AnimationController();

    // Setup hover animations
    animationController.setupHoverAnimations();

    // Page transition in
    animationController.pageTransitionIn();

    // Text animations for specific elements
    document.querySelectorAll('.animate-text').forEach(element => {
        const animationType = element.getAttribute('data-animation') || 'typewriter';

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animationController.animateText(entry.target, animationType);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(element);
    });

    // Make animation controller globally available
    window.AnimationController = animationController;
});

// CSS for animations (to be added to components.css)
const animationStyles = `
/* Animation Utilities */
.fade-in-on-scroll,
.slide-in-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
}

.fade-in-on-scroll.visible,
.slide-in-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}

.parallax {
    will-change: transform;
}

.scale-on-scroll {
    will-change: transform;
}

.rotate-on-scroll {
    will-change: transform;
}

/* Particle Container */
.particles-container {
    position: relative;
    overflow: hidden;
}

/* Custom Loader */
.custom-loader {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.loader-ring {
    width: 50px;
    height: 50px;
    border: 3px solid rgba(212, 175, 55, 0.3);
    border-top: 3px solid var(--gold-classic);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 1rem;
}

.loader-text {
    color: var(--gold-classic);
    font-size: 0.9rem;
}

/* Hover Effects */
.hover-lift,
.hover-scale,
.hover-rotate {
    cursor: pointer;
}

/* Text Animation */
.word-animate,
.char-animate {
    display: inline-block;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
`;

// Inject animation styles
const styleSheet = document.createElement('style');
styleSheet.textContent = animationStyles;
document.head.appendChild(styleSheet);