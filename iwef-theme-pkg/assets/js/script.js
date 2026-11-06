/* -------------------------------------------------------------
   IWEREF JavaScript Interactions
   Premium, responsive behaviors
------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {
    initNavbarScroll();
    initMobileNav();
    initSmoothScroll();
    initScrollReveal();
    initStatsCounter();
    initActiveNavOnScroll();
    initImageParallax();
    initContactForm();
});

/**
 * 1. Navbar Scroll Effect
 * Adds scrolled class to header when window is scrolled beyond 50px
 */
function initNavbarScroll() {
    const header = document.getElementById('header');
    if (!header) return;

    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Run once initially in case page loads scrolled down
}

/**
 * 2. Mobile Menu Toggle
 * Opens/closes side menu and animates hamburger bars
 */
function initMobileNav() {
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    if (!menuToggle || !navMenu) return;

    const toggleMenu = () => {
        menuToggle.classList.toggle('active');
        navMenu.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    };

    const closeMenu = () => {
        menuToggle.classList.remove('active');
        navMenu.classList.remove('active');
        document.body.classList.remove('no-scroll');
    };

    menuToggle.addEventListener('click', toggleMenu);

    navLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Close when clicking outside of menu on mobile
    document.addEventListener('click', (e) => {
        if (navMenu.classList.contains('active') && 
            !navMenu.contains(e.target) && 
            !menuToggle.contains(e.target)) {
            closeMenu();
        }
    });
}

/**
 * 3. Smooth Scrolling
 * Eased smooth scrolling for page anchors
 */
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (!targetElement) return;
            
            e.preventDefault();
            
            const headerHeight = document.getElementById('header').offsetHeight;
            const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - headerHeight + 5;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        });
    });
}

/**
 * 4. Scroll Reveal Animations
 * Uses IntersectionObserver to reveal sections as user scrolls
 */
function initScrollReveal() {
    const revealElements = document.querySelectorAll('.scroll-reveal');
    
    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-active');
                    // Once animate is run, unobserve it (avoids repetitive triggers)
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -60px 0px'
        });
        
        revealElements.forEach(el => revealObserver.observe(el));
    } else {
        // Fallback for older browsers
        revealElements.forEach(el => el.classList.add('reveal-active'));
    }
}

/**
 * 5. Animated Statistics Counter
 * Triggers counting numbers from 0 to target when visible
 */
function initStatsCounter() {
    const statNumbers = document.querySelectorAll('.stat-number');
    if (statNumbers.length === 0) return;

    const runCounter = (el) => {
        const target = parseInt(el.getAttribute('data-target'), 10);
        const duration = 2000; // 2 seconds
        const stepTime = 15;
        const steps = duration / stepTime;
        const increment = target / steps;
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                el.innerText = target.toLocaleString() + '+';
                clearInterval(timer);
            } else {
                el.innerText = Math.floor(current).toLocaleString() + '+';
            }
        }, stepTime);
    };

    if ('IntersectionObserver' in window) {
        const statsObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    runCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        statNumbers.forEach(num => statsObserver.observe(num));
    } else {
        // Fallback: Animate instantly if observer isn't supported
        statNumbers.forEach(num => runCounter(num));
    }
}

/**
 * 6. Active Navigation On Scroll
 * Highlights current navigation link corresponding to active section
 */
function initActiveNavOnScroll() {
    const sections = document.querySelectorAll('section[id], header[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    
    if ('IntersectionObserver' in window) {
        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const activeId = entry.target.getAttribute('id');
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${activeId}`) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }, {
            rootMargin: '-30% 0px -70% 0px' // Trigger when section occupies the active band
        });
        
        sections.forEach(sec => navObserver.observe(sec));
    }
}

/**
 * 7. Micro-Interactions: Image 3D Hover/Parallax
 * Adds a premium tilt feel to collage items and story images
 */
function initImageParallax() {
    const items = document.querySelectorAll('.collage-item, .story-card');
    
    items.forEach(item => {
        item.addEventListener('mousemove', (e) => {
            const rect = item.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = ((y - centerY) / centerY) * -6; // Max rotate 6 degrees
            const rotateY = ((x - centerX) / centerX) * 6;
            
            item.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
        });
        
        item.addEventListener('mouseleave', () => {
            item.style.transform = '';
        });
    });
}

/**
 * 8. Contact Form Submission
 * On WordPress: submits via AJAX using wp-admin/admin-ajax.php
 * On static HTML: provides basic client-side validation feedback
 */
function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('form-submit-btn');
        const feedback  = document.getElementById('form-feedback');

        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';
        if (feedback) feedback.innerHTML = '';

        if (window.IWEREF && window.IWEREF.ajaxUrl) {
            try {
                const formData = new FormData(form);
                const response = await fetch(window.IWEREF.ajaxUrl, { 
                    method: 'POST', 
                    body: formData, 
                    credentials: 'same-origin' 
                });
                const data = await response.json();
                if (data.success) {
                    form.reset();
                    if (feedback) {
                        feedback.innerHTML = `<p style="color:var(--color-primary);font-weight:600;margin-bottom:12px;">✓ ${data.data.message}</p>`;
                    }
                } else {
                    if (feedback) {
                        feedback.innerHTML = `<p style="color:#c62828;font-weight:600;margin-bottom:12px;">✗ ${data.data.message}</p>`;
                    }
                }
            } catch(err) {
                if (feedback) {
                    feedback.innerHTML = `<p style="color:#c62828;font-weight:600;margin-bottom:12px;">✗ Network error. Please try again.</p>`;
                }
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send Message';
            }
        } else {
            setTimeout(() => {
                form.reset();
                if (feedback) {
                    feedback.innerHTML = `<p style="color:var(--color-primary);font-weight:600;margin-bottom:12px;">✓ Thank you! We will get back to you soon.</p>`;
                }
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send Message';
            }, 800);
        }
    });
}

