<?php
/**
 * Template part for rendering the Programs section.
 *
 * @package iweref
 */

$img = IWEREF_URI . '/assets/images/';
?>

<section class="programs-section" id="programs">
    <div class="container">
        <div class="section-header scroll-reveal fade-up">
            <span class="section-label"><?php esc_html_e( 'OUR CORE PROGRAMS', 'iweref' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Comprehensive Ecology &amp; Resource Programs', 'iweref' ); ?></h2>
        </div>
        <div class="grid grid-4" style="gap: 24px;">
            <!-- Program 1 -->
            <a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="program-card scroll-reveal fade-up" style="--delay:100ms;">
                <img src="<?php echo esc_url( $img . 'about-water.png' ); ?>" alt="<?php esc_attr_e( 'Water, Sanitation & Hygiene', 'iweref' ); ?>" class="program-img" loading="lazy">
                <div class="program-overlay"></div>
                <div class="program-card-content">
                    <span class="program-pill"><?php esc_html_e( 'WATER &amp; HYGIENE', 'iweref' ); ?></span>
                    <div class="program-card-bottom">
                        <p class="program-desc"><?php esc_html_e( 'Providing reliable clean drinking water through solar-powered deep boreholes, storage systems, and community sanitation education.', 'iweref' ); ?></p>
                        <span class="program-cta"><?php esc_html_e( 'Explore WASH', 'iweref' ); ?> <span class="program-cta-arrow" aria-hidden="true">→</span></span>
                    </div>
                </div>
            </a>
            <!-- Program 2 -->
            <a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="program-card scroll-reveal fade-up" style="--delay:200ms;">
                <img src="<?php echo esc_url( $img . 'about-tree.png' ); ?>" alt="<?php esc_attr_e( 'Environmental Conservation', 'iweref' ); ?>" class="program-img" loading="lazy">
                <div class="program-overlay"></div>
                <div class="program-card-content">
                    <span class="program-pill"><?php esc_html_e( 'CONSERVATION', 'iweref' ); ?></span>
                    <div class="program-card-bottom">
                        <p class="program-desc"><?php esc_html_e( 'Restoring river corridors, combating land degradation, and planting indigenous tree species with local farmers and schools.', 'iweref' ); ?></p>
                        <span class="program-cta"><?php esc_html_e( 'Explore Conservation', 'iweref' ); ?> <span class="program-cta-arrow" aria-hidden="true">→</span></span>
                    </div>
                </div>
            </a>
            <!-- Program 3 -->
            <a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="program-card scroll-reveal fade-up" style="--delay:300ms;">
                <img src="<?php echo esc_url( $img . 'about-env.png' ); ?>" alt="<?php esc_attr_e( 'Climate Action', 'iweref' ); ?>" class="program-img" loading="lazy">
                <div class="program-overlay"></div>
                <div class="program-card-content">
                    <span class="program-pill"><?php esc_html_e( 'CLIMATE ACTION', 'iweref' ); ?></span>
                    <div class="program-card-bottom">
                        <p class="program-desc"><?php esc_html_e( 'Empowering communities with climate literacy, flood mitigation, rainwater harvesting, and renewable clean energy systems.', 'iweref' ); ?></p>
                        <span class="program-cta"><?php esc_html_e( 'Explore Climate Action', 'iweref' ); ?> <span class="program-cta-arrow" aria-hidden="true">→</span></span>
                    </div>
                </div>
            </a>
            <!-- Program 4 -->
            <a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="program-card scroll-reveal fade-up" style="--delay:400ms;">
                <img src="<?php echo esc_url( $img . 'about-outreach.png' ); ?>" alt="<?php esc_attr_e( 'Education & Capacity Building', 'iweref' ); ?>" class="program-img" loading="lazy">
                <div class="program-overlay"></div>
                <div class="program-card-content">
                    <span class="program-pill"><?php esc_html_e( 'CAPACITY BUILDING', 'iweref' ); ?></span>
                    <div class="program-card-bottom">
                        <p class="program-desc"><?php esc_html_e( 'Delivering vocational infrastructure training, youth leadership eco-clubs, and empowering women in sustainable community governance.', 'iweref' ); ?></p>
                        <span class="program-cta"><?php esc_html_e( 'Explore Trainings', 'iweref' ); ?> <span class="program-cta-arrow" aria-hidden="true">→</span></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>