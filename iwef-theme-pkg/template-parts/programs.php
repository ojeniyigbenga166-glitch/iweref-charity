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
            <div class="program-card scroll-reveal fade-up" style="--delay:100ms;">
                <div class="program-img-wrapper" style="height: 180px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img . 'about-water.png' ); ?>" alt="<?php esc_attr_e( 'Water, Sanitation & Hygiene', 'iweref' ); ?>" class="program-img" loading="lazy">
                </div>
                <div class="program-body" style="padding: 20px;">
                    <span class="section-label" style="font-size: 11px;">WASH</span>
                    <h3 class="program-title" style="font-size: 18px; margin-bottom: 6px;"><?php esc_html_e( 'Water, Sanitation &amp; Hygiene', 'iweref' ); ?></h3>
                    <p style="font-size: 13px; font-weight: 600; color: var(--color-primary); margin-bottom: 8px;"><?php esc_html_e( 'Community Borehole Development', 'iweref' ); ?></p>
                    <p class="program-desc" style="font-size: 13px;"><?php esc_html_e( 'Providing reliable clean drinking water through solar-powered deep boreholes, storage systems, and community sanitation education.', 'iweref' ); ?></p>
                </div>
            </div>
            <!-- Program 2 -->
            <div class="program-card scroll-reveal fade-up" style="--delay:200ms;">
                <div class="program-img-wrapper" style="height: 180px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img . 'about-tree.png' ); ?>" alt="<?php esc_attr_e( 'Environmental Conservation', 'iweref' ); ?>" class="program-img" loading="lazy">
                </div>
                <div class="program-body" style="padding: 20px;">
                    <span class="section-label" style="font-size: 11px;">CONSERVATION</span>
                    <h3 class="program-title" style="font-size: 18px; margin-bottom: 6px;"><?php esc_html_e( 'Environmental Conservation', 'iweref' ); ?></h3>
                    <p style="font-size: 13px; font-weight: 600; color: var(--color-primary); margin-bottom: 8px;"><?php esc_html_e( 'Community Tree Planting Initiative', 'iweref' ); ?></p>
                    <p class="program-desc" style="font-size: 13px;"><?php esc_html_e( 'Restoring river corridors, combating land degradation, and planting indigenous tree species with local farmers and schools.', 'iweref' ); ?></p>
                </div>
            </div>
            <!-- Program 3 -->
            <div class="program-card scroll-reveal fade-up" style="--delay:300ms;">
                <div class="program-img-wrapper" style="height: 180px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img . 'about-env.png' ); ?>" alt="<?php esc_attr_e( 'Climate Action', 'iweref' ); ?>" class="program-img" loading="lazy">
                </div>
                <div class="program-body" style="padding: 20px;">
                    <span class="section-label" style="font-size: 11px;">CLIMATE ACTION</span>
                    <h3 class="program-title" style="font-size: 18px; margin-bottom: 6px;"><?php esc_html_e( 'Climate Action', 'iweref' ); ?></h3>
                    <p style="font-size: 13px; font-weight: 600; color: var(--color-primary); margin-bottom: 8px;"><?php esc_html_e( 'Climate Change Awareness &amp; Resilience', 'iweref' ); ?></p>
                    <p class="program-desc" style="font-size: 13px;"><?php esc_html_e( 'Empowering communities with climate literacy, flood mitigation, rainwater harvesting, and renewable clean energy systems.', 'iweref' ); ?></p>
                </div>
            </div>
            <!-- Program 4 -->
            <div class="program-card scroll-reveal fade-up" style="--delay:400ms;">
                <div class="program-img-wrapper" style="height: 180px; overflow: hidden;">
                    <img src="<?php echo esc_url( $img . 'about-outreach.png' ); ?>" alt="<?php esc_attr_e( 'Education & Capacity Building', 'iweref' ); ?>" class="program-img" loading="lazy">
                </div>
                <div class="program-body" style="padding: 20px;">
                    <span class="section-label" style="font-size: 11px;">CAPACITY BUILDING</span>
                    <h3 class="program-title" style="font-size: 18px; margin-bottom: 6px;"><?php esc_html_e( 'Education &amp; Capacity Building', 'iweref' ); ?></h3>
                    <p style="font-size: 13px; font-weight: 600; color: var(--color-primary); margin-bottom: 8px;"><?php esc_html_e( 'Community &amp; Youth Leadership Initiative', 'iweref' ); ?></p>
                    <p class="program-desc" style="font-size: 13px;"><?php esc_html_e( 'Delivering vocational infrastructure training, youth leadership eco-clubs, and empowering women in sustainable community governance.', 'iweref' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>