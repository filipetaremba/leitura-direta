<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'MEU SITE' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS global -->
    <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <style>
        /* Animações personalizadas */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-down {
            animation: slideDown 0.3s ease-out;
        }

        /* Transições suaves */
        * {
            transition-property: background-color, color, border-color, transform;
            transition-duration: 200ms;
            transition-timing-function: ease-in-out;
        }

        /* Badge pulse animation */
        @keyframes pulse {
            0%, 100% { transform: scale(1) translate(0.5rem, -0.25rem); }
            50% { transform: scale(1.1) translate(0.5rem, -0.25rem); }
        }

        .cart-badge.updated {
            animation: pulse 0.5s ease-in-out;
        }

        /* Prevent body scroll when menu is open */
        body.menu-open {
            overflow: hidden;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
        }
        
        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        .carousel-slide {
            flex-shrink: 0;
            width: 100%;
        }
        
        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            border: none;
            padding: 1rem;
            cursor: pointer;
            z-index: 10;
            transition: background 0.3s;
        }
        
        .carousel-button:hover {
            background: rgba(0, 0, 0, 0.8);
        }
        
        .carousel-button.prev {
            left: 1rem;
        }
        
        .carousel-button.next {
            right: 1rem;
        }
        
        .carousel-dots {
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 0.5rem;
            z-index: 10;
        }
        
        .carousel-dot {
            width: 12px;
            height: 12px;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .carousel-dot.active {
            background: white;
        }
         /* WhatsApp Float Button */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .whatsapp-float:hover {
            background: #20BA5A;
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .whatsapp-float i {
            color: white;
            font-size: 32px;
        }

        @keyframes whatsappPulse {
            0% {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15), 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            50% {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15), 0 0 0 10px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15), 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        .whatsapp-float.pulse {
            animation: whatsappPulse 2s infinite;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .whatsapp-float {
                width: 50px;
                height: 50px;
                bottom: 15px;
                right: 15px;
            }

            .whatsapp-float i {
                font-size: 26px;
            }
        }
    
    </style>
    <!-- CSS específico da página -->
    <?= $this->renderSection('css') ?>
</head>
<body>
    <?= $this->include('layouts/header') ?>

    <?php if(!empty($showCarousel) && $showCarousel): ?>
        <?= $this->include('layouts/carousel') ?>
    <?php endif; ?>

    <main class="">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Botão Flutuante WhatsApp -->
    <a href="https://wa.me/+258853592701?text=Olá!%20Gostaria%20de%20mais%20informações" 
       target="_blank" 
       rel="noopener noreferrer"
       class="whatsapp-float pulse"
       aria-label="Fale conosco pelo WhatsApp"
       title="Fale conosco pelo WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <?= $this->include('layouts/footer') ?>

    <!-- JS global -->
 
        <script>
document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const menuBackdrop = document.getElementById('menuBackdrop');
    const cartBadge = document.getElementById('cartBadge');
    const testCartBtn = document.getElementById('testCartBtn');
    
    let menuOpen = false;
    let cartCount = 0;

    // Mobile Menu Toggle
    function toggleMenu() {
        menuOpen = !menuOpen;
        
        if (menuOpen) {
            mobileMenu.classList.remove('hidden');
            menuBackdrop.classList.remove('hidden');
            menuIcon.classList.replace('fa-bars', 'fa-times');
            document.body.classList.add('menu-open');
            mobileMenuBtn.setAttribute('aria-expanded', 'true');
        } else {
            mobileMenu.classList.add('hidden');
            menuBackdrop.classList.add('hidden');
            menuIcon.classList.replace('fa-times', 'fa-bars');
            document.body.classList.remove('menu-open');
            mobileMenuBtn.setAttribute('aria-expanded', 'false');
        }
    }

    // Event Listeners
    mobileMenuBtn.addEventListener('click', toggleMenu);
    menuBackdrop.addEventListener('click', toggleMenu);

    // Close menu on link click (mobile)
    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', function() {
            if (menuOpen) toggleMenu();
        });
    });

    // Test Cart Badge
    testCartBtn.addEventListener('click', function() {
        cartCount++;
        cartBadge.textContent = cartCount;
        cartBadge.classList.add('updated');
        setTimeout(() => cartBadge.classList.remove('updated'), 500);
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && menuOpen) {
            toggleMenu();
        }
    });

    // Close mobile menu on window resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024 && menuOpen) {
            toggleMenu();
        }
    });
});

class InfiniteCarousel {
    constructor(container) {
        this.container = container;
        this.track = container.querySelector('.carousel-track');
        this.slides = Array.from(container.querySelectorAll('.carousel-slide'));
        this.prevBtn = container.querySelector('.carousel-button.prev');
        this.nextBtn = container.querySelector('.carousel-button.next');
        this.dots = Array.from(container.querySelectorAll('.carousel-dot'));
        
        this.currentIndex = 0;
        this.totalSlides = this.slides.length;
        this.isTransitioning = false;
        this.autoPlayInterval = null;
        
        this.init();
    }
    
    init() {
        // Event listeners
        this.prevBtn.addEventListener('click', () => this.prev());
        this.nextBtn.addEventListener('click', () => this.next());
        
        this.dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                const index = parseInt(e.target.dataset.slide);
                this.goToSlide(index);
            });
        });
        
        // Auto play
        this.startAutoPlay();
        
        // Pause on hover
        this.container.addEventListener('mouseenter', () => this.stopAutoPlay());
        this.container.addEventListener('mouseleave', () => this.startAutoPlay());
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prev();
            if (e.key === 'ArrowRight') this.next();
        });
        
        // Touch support
        let touchStartX = 0;
        let touchEndX = 0;
        
        this.container.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        this.container.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            if (touchStartX - touchEndX > 50) this.next();
            if (touchEndX - touchStartX > 50) this.prev();
        });
    }
    
    goToSlide(index) {
        if (this.isTransitioning) return;
        
        this.isTransitioning = true;
        this.currentIndex = index;
        
        const offset = -index * 100;
        this.track.style.transform = `translateX(${offset}%)`;
        
        this.updateDots();
        
        setTimeout(() => {
            this.isTransitioning = false;
        }, 500);
    }
    
    next() {
        let nextIndex = this.currentIndex + 1;
        if (nextIndex >= this.totalSlides) {
            nextIndex = 0;
        }
        this.goToSlide(nextIndex);
    }
    
    prev() {
        let prevIndex = this.currentIndex - 1;
        if (prevIndex < 0) {
            prevIndex = this.totalSlides - 1;
        }
        this.goToSlide(prevIndex);
    }
    
    updateDots() {
        this.dots.forEach((dot, index) => {
            if (index === this.currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }
    
    startAutoPlay() {
        this.autoPlayInterval = setInterval(() => this.next(), 5000);
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
        }
    }
}

// Inicializar carousel
document.addEventListener('DOMContentLoaded', () => {
    const carouselContainer = document.querySelector('.carousel-container');
    if (carouselContainer) {
        new InfiniteCarousel(carouselContainer);
    }
});
</script>

    <!-- JS específico da página -->
    <?= $this->renderSection('js') ?>
</body>
