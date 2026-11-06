<?php
/**
 * IWEREF Front Page Template
 * Modularized homepage calling section template-parts.
 *
 * @package iweref
 */

get_header();

// Pull Customizer values or fallbacks
$hero_heading = get_theme_mod( 'iweref_hero_heading', 'Protecting Water, Preserving Nature' );
$hero_subtext = get_theme_mod( 'iweref_hero_subtext', 'Empowering communities to secure clean water, restore vital ecosystems, and build lasting climate resilience.' );
$contact_address = get_theme_mod( 'iweref_contact_address', '72 Eco-Conservation Boulevard, Suite 300, Capital City' );
$contact_email   = get_theme_mod( 'iweref_contact_email',   'contact@iweref.org' );
$contact_phone   = get_theme_mod( 'iweref_contact_phone',   '+1 (800) 456-7890' );

// Asset helper
$img = IWEREF_URI . '/assets/images/';
?>

<main id="main-content">

    <!-- 1. Hero Section -->
    <?php get_template_part( 'template-parts/hero' ); ?>

    <!-- Focus Areas (Three Feature Cards) -->
    <section class="feature-cards-section" aria-label="<?php esc_attr_e( 'Key focus areas', 'iweref' ); ?>">
        <div class="container grid grid-3">

            <div class="feature-card scroll-reveal fade-up" style="--delay:100ms;">
                <div class="card-num" aria-hidden="true">01</div>
                <div class="card-icon-wrapper" aria-hidden="true">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 7-7c0-4.3-7-11-7-11S5 10.7 5 15a7 7 0 0 0 7 7z"/></svg>
                </div>
                <h3 class="card-title"><?php esc_html_e( 'Water Resource Management', 'iweref' ); ?></h3>
                <p class="card-description"><?php esc_html_e( 'Promoting sustainable water conservation, purification, and responsible water use for all ecosystems.', 'iweref' ); ?></p>
                <a href="#programs" class="card-link"><?php esc_html_e( 'Learn More', 'iweref' ); ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>

            <div class="feature-card scroll-reveal fade-up" style="--delay:200ms;">
                <div class="card-num" aria-hidden="true">02</div>
                <div class="card-icon-wrapper" aria-hidden="true">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                </div>
                <h3 class="card-title"><?php esc_html_e( 'Environmental Conservation', 'iweref' ); ?></h3>
                <p class="card-description"><?php esc_html_e( 'Protecting vulnerable ecosystems, conserving biodiversity through active local programs and global awareness.', 'iweref' ); ?></p>
                <a href="#programs" class="card-link"><?php esc_html_e( 'Learn More', 'iweref' ); ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>

            <div class="feature-card scroll-reveal fade-up" style="--delay:300ms;">
                <div class="card-num" aria-hidden="true">03</div>
                <div class="card-icon-wrapper" aria-hidden="true">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3 class="card-title"><?php esc_html_e( 'Community Development', 'iweref' ); ?></h3>
                <p class="card-description"><?php esc_html_e( 'Supporting and empowering communities through capacity building, environmental education, and green initiatives.', 'iweref' ); ?></p>
                <a href="#programs" class="card-link"><?php esc_html_e( 'Learn More', 'iweref' ); ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            </div>

        </div>
    </section>

    <!-- 2. About Section -->
    <?php get_template_part( 'template-parts/about' ); ?>

    <!-- 3. Programs Section -->
    <?php get_template_part( 'template-parts/programs' ); ?>

    <!-- 4. Impact Statistics Section -->
    <?php get_template_part( 'template-parts/impact' ); ?>

    <!-- Green Call to Action (Coded layout section) -->
    <section class="green-cta-section" id="donate">
        <div class="cta-overlay-pattern" aria-hidden="true"></div>
        <div class="container">
            <div class="cta-content scroll-reveal scale-in">
                <h2 class="cta-title"><?php esc_html_e( 'Together We Can Create A Sustainable Tomorrow', 'iweref' ); ?></h2>
                <p class="cta-description"><?php esc_html_e( 'Support our mission to protect natural water resources, restore degraded ecosystems, and empower local communities to lead independent, ecological lives.', 'iweref' ); ?></p>
                <a href="#contact" class="btn btn-accent btn-lg" id="cta-donate-btn"><?php esc_html_e( 'Donate Now', 'iweref' ); ?></a>
            </div>
        </div>
    </section>

    <!-- Get Involved Section -->
    <section class="get-involved-section" id="projects">
        <div class="container grid grid-2">
            <div class="involved-image-wrapper scroll-reveal fade-right">
                <img src="<?php echo esc_url( $img . 'volunteer.png' ); ?>" alt="<?php esc_attr_e( 'IWEREF volunteers working together', 'iweref' ); ?>" class="involved-image" loading="lazy">
                <div class="involved-image-badge">
                    <span class="badge-number">100+</span>
                    <span class="badge-label"><?php esc_html_e( 'Active Global Members', 'iweref' ); ?></span>
                </div>
            </div>
            <div class="involved-text scroll-reveal fade-left">
                <span class="section-label"><?php esc_html_e( 'GET INVOLVED', 'iweref' ); ?></span>
                <h2 class="section-title"><?php esc_html_e( 'Join Our Movement For Environmental Change', 'iweref' ); ?></h2>
                <p class="section-desc"><?php esc_html_e( 'Change starts with dedicated individuals. By partnering with IWEREF as a volunteer, technical expert, or donor, you contribute directly to local initiatives that preserve water and build resilience against climate shifts.', 'iweref' ); ?></p>
                <p class="section-desc-secondary"><?php esc_html_e( 'We offer structured roles for project designers, field workers, environmental educators, and administrative advocates. Together, we can construct sustainable water grids and plant forests that protect our common future.', 'iweref' ); ?></p>
                <div class="involved-steps">
                    <div class="involved-step">
                        <div class="step-icon" aria-hidden="true"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
                        <div>
                            <h4 class="step-title"><?php esc_html_e( 'Protect Vital Ecosystems', 'iweref' ); ?></h4>
                            <p class="step-desc"><?php esc_html_e( 'Direct action on watersheds, soils, and forests.', 'iweref' ); ?></p>
                        </div>
                    </div>
                    <div class="involved-step">
                        <div class="step-icon" aria-hidden="true"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
                        <div>
                            <h4 class="step-title"><?php esc_html_e( 'Empower Local Leaders', 'iweref' ); ?></h4>
                            <p class="step-desc"><?php esc_html_e( 'Transfer sustainable knowledge to future resource stewards.', 'iweref' ); ?></p>
                        </div>
                    </div>
                </div>
                <a href="#contact" class="btn btn-primary" id="involved-volunteer-btn"><?php esc_html_e( 'Become A Volunteer', 'iweref' ); ?></a>
            </div>
        </div>
    </section>

    <!-- 5. Projects Section -->
    <?php get_template_part( 'template-parts/projects' ); ?>

    <!-- 6. Success Stories Section -->
    <?php get_template_part( 'template-parts/stories' ); ?>

    <!-- 7. Partners Section -->
    <?php get_template_part( 'template-parts/partners' ); ?>

    <!-- 8. Contact Section -->
    <?php get_template_part( 'template-parts/contact' ); ?>

</main>

<?php
get_footer();
