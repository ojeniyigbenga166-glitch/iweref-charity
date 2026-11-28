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
    initProgramCardsFX();
    initLandingPageAnimations();
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

/**
 * Program Cards Premium Interactions
 * 3D magnetic tilt + cursor spotlight glare + sibling focus dimming
 */
function initProgramCardsFX() {
    const cards = document.querySelectorAll('.programs-section .program-card');
    if (!cards.length) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const maxTilt = 7;

    cards.forEach((card) => {
        const grid = card.closest('.grid');
        let rafId = null;

        const setActive = (active) => {
            if (grid) grid.classList.toggle('programs-grid-active', active);
            card.classList.toggle('is-hovered', active);
        };

        card.addEventListener('mouseenter', () => setActive(true));
        card.addEventListener('focusin', () => setActive(true));
        card.addEventListener('focusout', () => setActive(false));

        card.addEventListener('pointermove', (e) => {
            if (prefersReducedMotion || e.pointerType === 'touch') return;

            if (rafId) cancelAnimationFrame(rafId);
            rafId = requestAnimationFrame(() => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const px = x / rect.width;
                const py = y / rect.height;

                const tiltY = (px - 0.5) * (maxTilt * 2);
                const tiltX = (0.5 - py) * (maxTilt * 2);

                card.style.setProperty('--tilt-x', `${tiltX.toFixed(2)}deg`);
                card.style.setProperty('--tilt-y', `${tiltY.toFixed(2)}deg`);
                card.style.setProperty('--glare-x', `${(px * 100).toFixed(1)}%`);
                card.style.setProperty('--glare-y', `${(py * 100).toFixed(1)}%`);
                card.style.setProperty('--glare-opacity', '1');
            });
        });

        card.addEventListener('pointerleave', () => {
            setActive(false);
            if (rafId) cancelAnimationFrame(rafId);
            card.style.setProperty('--tilt-x', '0deg');
            card.style.setProperty('--tilt-y', '0deg');
            card.style.setProperty('--glare-opacity', '0');
        });
    });
}



/**
 * Landing Page Premium Animations (All Sections)
 */
function initLandingPageAnimations() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isCoarsePointer = window.matchMedia('(pointer: coarse)').matches;

    // 1. Hero Scroll Depth
    const hero = document.querySelector('.hero');
    const heroContent = document.querySelector('.hero-content-left');
    const heroWatermark = document.querySelector('.hero-charity-watermark');
    if (hero && !prefersReducedMotion) {
        let heroTicking = false;
        window.addEventListener('scroll', () => {
            if (heroTicking) return;
            heroTicking = true;
            requestAnimationFrame(() => {
                const y = window.scrollY;
                const h = hero.offsetHeight || 700;
                const progress = Math.min(Math.max(y / h, 0), 1);
                if (heroContent) {
                    heroContent.style.opacity = String(Math.max(1 - progress * 1.35, 0));
                    heroContent.style.transform = `translateY(${(progress * 36).toFixed(1)}px)`;
                }
                if (heroWatermark) {
                    heroWatermark.style.transform = `scale(${(1 + progress * 0.08).toFixed(3)})`;
                }
                heroTicking = false;
            });
        }, { passive: true });
    }

    // 3. Intro / About Focus Reveal
    const introSection = document.querySelector('.intro-section');
    if (introSection && 'IntersectionObserver' in window) {
        const introObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    introSection.classList.add('in-view');
                    obs.unobserve(introSection);
                }
            });
        }, { threshold: 0.25 });
        introObserver.observe(introSection);
    } else if (introSection) {
        introSection.classList.add('in-view');
    }

    // 4. Integrated Solutions SVG Stroke Draw
    const solutionCards = document.querySelectorAll('.solution-card');
    if (solutionCards.length && !prefersReducedMotion && 'IntersectionObserver' in window) {
        solutionCards.forEach((card) => {
            const shapes = card.querySelectorAll('.solution-icon svg path, .solution-icon svg circle, .solution-icon svg rect, .solution-icon svg line');
            shapes.forEach((shape) => {
                if (typeof shape.getTotalLength === 'function') {
                    const len = shape.getTotalLength();
                    shape.style.strokeDasharray = `${len}`;
                    shape.style.strokeDashoffset = `${len}`;
                    shape.style.transition = 'stroke-dashoffset 0.9s cubic-bezier(0.16, 1, 0.3, 1)';
                }
            });
        });

        const solutionObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const shapes = entry.target.querySelectorAll('.solution-icon svg path, .solution-icon svg circle, .solution-icon svg rect, .solution-icon svg line');
                    shapes.forEach((shape, idx) => {
                        setTimeout(() => {
                            shape.style.strokeDashoffset = '0';
                        }, idx * 90);
                    });
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.25 });
        solutionCards.forEach((card) => solutionObserver.observe(card));
    }

    // 5. Timeline Scroll-Drawn Spine & Node Lighting
    const timelineContainer = document.querySelector('.timeline-container');
    const timelineItems = document.querySelectorAll('.timeline-item');
    if (timelineContainer && timelineItems.length) {
        const progressLine = document.createElement('div');
        progressLine.className = 'timeline-progress-line';
        progressLine.setAttribute('aria-hidden', 'true');
        timelineContainer.prepend(progressLine);

        const updateTimeline = () => {
            const rect = timelineContainer.getBoundingClientRect();
            const vh = window.innerHeight;
            const total = rect.height;
            const passed = Math.min(Math.max((vh * 0.65 - rect.top) / total, 0), 1);
            timelineContainer.style.setProperty('--timeline-progress', `${(passed * 100).toFixed(1)}%`);

            timelineItems.forEach((item) => {
                const itemRect = item.getBoundingClientRect();
                item.classList.toggle('is-lit', itemRect.top < vh * 0.7);
            });
        };

        let tlTicking = false;
        window.addEventListener('scroll', () => {
            if (tlTicking) return;
            tlTicking = true;
            requestAnimationFrame(() => {
                updateTimeline();
                tlTicking = false;
            });
        }, { passive: true });
        updateTimeline();
    }

    // 6. Impact Stat Completion Pulse
    const statNumbers = document.querySelectorAll('.impact-section .stat-number[data-target]');
    statNumbers.forEach((el) => {
        const target = el.getAttribute('data-target');
        const card = el.closest('.stat-card');
        if (!card || !target) return;

        const observer = new MutationObserver(() => {
            const numericText = el.textContent.replace(/[^0-9]/g, '');
            if (numericText === target) {
                card.classList.add('stat-counted');
                observer.disconnect();
            }
        });
        observer.observe(el, { childList: true, characterData: true, subtree: true });
    });

    // 8. Green CTA Magnetic Donate Button
    const donateBtn = document.getElementById('cta-donate-btn');
    if (donateBtn && !prefersReducedMotion && !isCoarsePointer) {
        donateBtn.addEventListener('pointermove', (e) => {
            const rect = donateBtn.getBoundingClientRect();
            const dx = (e.clientX - (rect.left + rect.width / 2)) * 0.22;
            const dy = (e.clientY - (rect.top + rect.height / 2)) * 0.22;
            donateBtn.style.transform = `translate(${dx.toFixed(1)}px, ${dy.toFixed(1)}px)`;
        });
        donateBtn.addEventListener('pointerleave', () => {
            donateBtn.style.transform = 'translate(0, 0)';
        });
    }

    // 9. Get Involved Active Step Highlight
    const involvedSteps = document.querySelectorAll('.get-involved-section .involved-step');
    if (involvedSteps.length && 'IntersectionObserver' in window) {
        const stepObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                entry.target.classList.toggle('is-active-step', entry.isIntersecting);
            });
        }, { rootMargin: '-32% 0px -32% 0px', threshold: 0.1 });
        involvedSteps.forEach((step) => stepObserver.observe(step));
    }
}
