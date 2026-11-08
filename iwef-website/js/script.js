/* -------------------------------------------------------------
   IWEREF JavaScript Interactions
   Premium, responsive behaviors
------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', () => {
    initPageLoader();
    initScrollProgressBar();
    initNavbarScroll();
    initMobileNav();
    initSmoothScroll();
    initScrollReveal();
    initStatsCounter();
    initActiveNavOnScroll();
    initImageParallax();
    initFaqAccordion();
    initDonationSelector();
    initBackToTop();
    initContactForm();
});

/**
 * 1. Page Loader
 * Hides the loading overlay once the page is fully loaded
 */
function initPageLoader() {
    const loader = document.getElementById('page-loader');
    if (!loader) return;

    const hideLoader = () => {
        loader.classList.add('hidden');
        setTimeout(() => {
            loader.style.display = 'none';
        }, 600); // match CSS transition duration
    };

    if (document.readyState === 'complete') {
        hideLoader();
    } else {
        window.addEventListener('load', hideLoader);
    }
}

/**
 * 2. Scroll Progress Bar
 * Updates a fixed top progress bar based on scroll position
 */
function initScrollProgressBar() {
    const bar = document.getElementById('scroll-progress');
    if (!bar) return;

    const updateBar = () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        bar.style.width = pct + '%';
    };

    window.addEventListener('scroll', updateBar, { passive: true });
    updateBar();
}

/**
 * 3. Navbar Scroll Effect
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
    const navLinks = document.querySelectorAll('.nav-link');
    // Only run single-page scroll spy if navigation contains purely in-page hashes
    const hasHashNav = Array.from(navLinks).some(link => {
        const href = link.getAttribute('href');
        return href && href.startsWith('#');
    });
    if (!hasHashNav) return;

    const sections = document.querySelectorAll('section[id], header[id]');
    if ('IntersectionObserver' in window) {
        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const activeId = entry.target.getAttribute('id');
                    navLinks.forEach(link => {
                        if (link.getAttribute('href') && link.getAttribute('href').startsWith('#')) {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${activeId}`) {
                                link.classList.add('active');
                            }
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
 * 8. FAQ Accordion Interaction
 */
function initFaqAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');
    if (!faqItems.length) return;

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        if (!question) return;

        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) otherItem.classList.remove('active');
            });
            // Toggle clicked item
            item.classList.toggle('active', !isActive);
        });
    });
}

/**
 * 9. Donation Tier Selector & Frequency Switcher
 */
function initDonationSelector() {
    const tierButtons = document.querySelectorAll('.tier-btn');
    const customInput = document.querySelector('.custom-amount-input');
    const freqButtons = document.querySelectorAll('.freq-btn');
    const impactDisplay = document.querySelector('.impact-preview-pill');

    const tierImpacts = {
        '25': 'Your $25 provides clean, filtered drinking water for a child for one full year.',
        '50': 'Your $50 plants and nurtures 20 native trees in vulnerable watershed corridors.',
        '100': 'Your $100 supplies water test kits and sanitation upgrades for an entire village clinic.',
        '250': 'Your $250 helps engineer and install a community solar-powered borehole pump.',
        '500': 'Your $500 funds comprehensive watershed ecological restoration and local leader training.',
        'custom': 'Every dollar helps restore our freshwater ecosystems and empower rural communities.'
    };

    if (tierButtons.length && impactDisplay) {
        tierButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                tierButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const amount = btn.getAttribute('data-amount');
                if (customInput) customInput.value = amount;
                if (tierImpacts[amount]) {
                    impactDisplay.textContent = tierImpacts[amount];
                }
            });
        });
    }

    if (customInput && impactDisplay) {
        customInput.addEventListener('input', (e) => {
            const val = e.target.value.trim();
            tierButtons.forEach(b => {
                if (b.getAttribute('data-amount') === val) {
                    b.classList.add('active');
                } else {
                    b.classList.remove('active');
                }
            });
            if (tierImpacts[val]) {
                impactDisplay.textContent = tierImpacts[val];
            } else if (val) {
                impactDisplay.textContent = `Your $${val} gift empowers IWEREF to provide clean water and protect precious ecosystems.`;
            } else {
                impactDisplay.textContent = tierImpacts['custom'];
            }
        });
    }

    if (freqButtons.length) {
        freqButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                freqButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    }
}

/**
 * 10. Back to Top Button
 * Shows/hides button after scrolling 400px and smoothly scrolls to top on click
 */
function initBackToTop() {
    const btn = document.getElementById('back-to-top');
    if (!btn) return;

    const toggleVisibility = () => {
        if (window.scrollY > 400) {
            btn.classList.add('visible');
        } else {
            btn.classList.remove('visible');
        }
    };

    window.addEventListener('scroll', toggleVisibility, { passive: true });
    toggleVisibility();

    btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

/**
 * 11. Web3Forms AJAX Contact Form Handler
 * Submits form data asynchronously to Web3Forms and routes directly to Gmail
 */
function initContactForm() {
    const contactForm = document.getElementById('contact-form');
    if (!contactForm) return;

    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn ? submitBtn.innerHTML : 'Send Message';

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Sending Message...';
        }

        const formData = new FormData(contactForm);

        try {
            const response = await fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                if (submitBtn) {
                    submitBtn.innerHTML = '✓ Message Sent Successfully!';
                    submitBtn.style.backgroundColor = '#10B981';
                    submitBtn.style.borderColor = '#10B981';
                }
                contactForm.reset();
                setTimeout(() => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalText;
                        submitBtn.style.backgroundColor = '';
                        submitBtn.style.borderColor = '';
                    }
                }, 4000);
            } else {
                alert(data.message || 'Submission failed. Please check your Web3Forms Access Key.');
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            }
        } catch (err) {
            alert('A network error occurred. Please try again.');
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        }
    });
}
