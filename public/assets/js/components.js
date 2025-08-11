/**
 * Portfolio - Components JavaScript
 * @author Lucas André Fernando
 */

// Project Gallery Component
class ProjectGallery {
    constructor(element) {
        this.element = element;
        this.images = element.querySelectorAll('.gallery-image');
        this.currentIndex = 0;
        this.init();
    }

    init() {
        this.createControls();
        this.setupEventListeners();
        this.showImage(0);
    }

    createControls() {
        const controls = document.createElement('div');
        controls.className = 'gallery-controls';
        controls.innerHTML = `
            <button class="gallery-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="gallery-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        `;

        this.element.appendChild(controls);

        // Create indicators
        const indicators = document.createElement('div');
        indicators.className = 'gallery-indicators';

        this.images.forEach((_, index) => {
            const indicator = document.createElement('button');
            indicator.className = 'gallery-indicator';
            indicator.setAttribute('data-index', index);
            indicators.appendChild(indicator);
        });

        this.element.appendChild(indicators);
    }

    setupEventListeners() {
        const prevBtn = this.element.querySelector('.gallery-prev');
        const nextBtn = this.element.querySelector('.gallery-next');
        const indicators = this.element.querySelectorAll('.gallery-indicator');

        prevBtn.addEventListener('click', () => this.prevImage());
        nextBtn.addEventListener('click', () => this.nextImage());

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.showImage(index));
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (this.element.classList.contains('active')) {
                if (e.key === 'ArrowLeft') this.prevImage();
                if (e.key === 'ArrowRight') this.nextImage();
                if (e.key === 'Escape') this.close();
            }
        });

        // Touch/swipe support
        this.setupTouchEvents();
    }

    setupTouchEvents() {
        let startX = 0;
        let endX = 0;

        this.element.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        this.element.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;

            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    this.nextImage();
                } else {
                    this.prevImage();
                }
            }
        });
    }

    showImage(index) {
        this.currentIndex = index;

        this.images.forEach((img, i) => {
            img.classList.toggle('active', i === index);
        });

        const indicators = this.element.querySelectorAll('.gallery-indicator');
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
        });
    }

    nextImage() {
        const nextIndex = (this.currentIndex + 1) % this.images.length;
        this.showImage(nextIndex);
    }

    prevImage() {
        const prevIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
        this.showImage(prevIndex);
    }

    close() {
        this.element.classList.remove('active');
        document.body.classList.remove('gallery-open');
    }
}

// Skills Chart Component
class SkillsChart {
    constructor(element) {
        this.element = element;
        this.skills = JSON.parse(element.getAttribute('data-skills') || '[]');
        this.init();
    }

    init() {
        this.createChart();
        this.animateChart();
    }

    createChart() {
        const canvas = document.createElement('canvas');
        canvas.width = 300;
        canvas.height = 300;
        this.element.appendChild(canvas);

        this.ctx = canvas.getContext('2d');
        this.centerX = canvas.width / 2;
        this.centerY = canvas.height / 2;
        this.radius = 100;
    }

    animateChart() {
        let progress = 0;
        const animate = () => {
            progress += 0.02;

            this.ctx.clearRect(0, 0, 300, 300);
            this.drawChart(Math.min(progress, 1));

            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        };

        animate();
    }

    drawChart(progress) {
        const angleStep = (2 * Math.PI) / this.skills.length;

        this.skills.forEach((skill, index) => {
            const angle = index * angleStep - Math.PI / 2;
            const skillProgress = (skill.level / 100) * progress;

            // Draw skill line
            this.ctx.beginPath();
            this.ctx.moveTo(this.centerX, this.centerY);
            this.ctx.lineTo(
                this.centerX + Math.cos(angle) * this.radius * skillProgress,
                this.centerY + Math.sin(angle) * this.radius * skillProgress
            );
            this.ctx.strokeStyle = '#D4AF37';
            this.ctx.lineWidth = 3;
            this.ctx.stroke();

            // Draw skill point
            this.ctx.beginPath();
            this.ctx.arc(
                this.centerX + Math.cos(angle) * this.radius * skillProgress,
                this.centerY + Math.sin(angle) * this.radius * skillProgress,
                5,
                0,
                2 * Math.PI
            );
            this.ctx.fillStyle = '#FFD700';
            this.ctx.fill();

            // Draw skill label
            this.ctx.fillStyle = '#F5F5F5';
            this.ctx.font = '12px Inter';
            this.ctx.textAlign = 'center';
            this.ctx.fillText(
                skill.name,
                this.centerX + Math.cos(angle) * (this.radius + 20),
                this.centerY + Math.sin(angle) * (this.radius + 20)
            );
        });
    }
}

// Contact Map Component
class ContactMap {
    constructor(element) {
        this.element = element;
        this.lat = parseFloat(element.getAttribute('data-lat') || '-23.5505');
        this.lng = parseFloat(element.getAttribute('data-lng') || '-46.6333');
        this.init();
    }

    init() {
        // Simple map placeholder (you can integrate with Google Maps or other services)
        this.createMapPlaceholder();
    }

    createMapPlaceholder() {
        this.element.innerHTML = `
            <div class="map-placeholder">
                <div class="map-marker">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="map-info">
                    <h4>São Paulo, SP</h4>
                    <p>Brasil</p>
                    <a href="https://maps.google.com/?q=${this.lat},${this.lng}"  class="btn btn-primary btn-sm">
                        <i class="fas fa-external-link-alt"></i>
                        Ver no Google Maps
                    </a>
                </div>
            </div>
        `;
    }
}

// Testimonials Slider Component
class TestimonialsSlider {
    constructor(element) {
        this.element = element;
        this.testimonials = element.querySelectorAll('.testimonial-item');
        this.currentIndex = 0;
        this.autoplayInterval = null;
        this.init();
    }

    init() {
        if (this.testimonials.length <= 1) return;

        this.createControls();
        this.setupEventListeners();
        this.showTestimonial(0);
        this.startAutoplay();
    }

    createControls() {
        const controls = document.createElement('div');
        controls.className = 'testimonials-controls';
        controls.innerHTML = `
            <button class="testimonials-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="testimonials-indicators"></div>
            <button class="testimonials-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        `;

        this.element.appendChild(controls);

        // Create indicators
        const indicatorsContainer = controls.querySelector('.testimonials-indicators');
        this.testimonials.forEach((_, index) => {
            const indicator = document.createElement('button');
            indicator.className = 'testimonials-indicator';
            indicator.setAttribute('data-index', index);
            indicatorsContainer.appendChild(indicator);
        });
    }

    setupEventListeners() {
        const prevBtn = this.element.querySelector('.testimonials-prev');
        const nextBtn = this.element.querySelector('.testimonials-next');
        const indicators = this.element.querySelectorAll('.testimonials-indicator');

        prevBtn.addEventListener('click', () => {
            this.stopAutoplay();
            this.prevTestimonial();
            this.startAutoplay();
        });

        nextBtn.addEventListener('click', () => {
            this.stopAutoplay();
            this.nextTestimonial();
            this.startAutoplay();
        });

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                this.stopAutoplay();
                this.showTestimonial(index);
                this.startAutoplay();
            });
        });

        // Pause on hover
        this.element.addEventListener('mouseenter', () => this.stopAutoplay());
        this.element.addEventListener('mouseleave', () => this.startAutoplay());
    }

    showTestimonial(index) {
        this.currentIndex = index;

        this.testimonials.forEach((testimonial, i) => {
            testimonial.classList.toggle('active', i === index);
        });

        const indicators = this.element.querySelectorAll('.testimonials-indicator');
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
        });
    }

    nextTestimonial() {
        const nextIndex = (this.currentIndex + 1) % this.testimonials.length;
        this.showTestimonial(nextIndex);
    }

    prevTestimonial() {
        const prevIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length;
        this.showTestimonial(prevIndex);
    }

    startAutoplay() {
        this.autoplayInterval = setInterval(() => {
            this.nextTestimonial();
        }, 5000);
    }

    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
    }
}

// Initialize components when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Project Galleries
    document.querySelectorAll('.project-gallery').forEach(gallery => {
        new ProjectGallery(gallery);
    });

    // Initialize Skills Charts
    document.querySelectorAll('.skills-chart').forEach(chart => {
        new SkillsChart(chart);
    });

    // Initialize Contact Maps
    document.querySelectorAll('.contact-map').forEach(map => {
        new ContactMap(map);
    });

    // Initialize Testimonials Sliders
    document.querySelectorAll('.testimonials-slider').forEach(slider => {
        new TestimonialsSlider(slider);
    });
});