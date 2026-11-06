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
        <div class="grid grid-3">
            <div class="program-card scroll-reveal fade-up" style="--delay:100ms;">
                <div class="program-img-wrapper">
                    <img src="<?php echo esc_url( $img . 'about-water.png' ); ?>" alt="<?php esc_attr_e( 'Water resource management', 'iweref' ); ?>" class="program-img" loading="lazy">
                </div>
                <div class="program-body">
                    <h3 class="program-title"><?php esc_html_e( 'Sustainable Water Governance', 'iweref' ); ?></h3>
                    <p class="program-desc"><?php esc_html_e( 'We develop community-centered water distribution grids, smart agricultural micro-irrigation systems, and rain-harvesting installations to prevent drought and supply clean drinking water.', 'iweref' ); ?></p>
                </div>
            </div>
            <div class="program-card scroll-reveal fade-up" style="--delay:200ms;">
                <div class="program-img-wrapper">
                    <img src="<?php echo esc_url( $img . 'about-tree.png' ); ?>" alt="<?php esc_attr_e( 'Ecosystem conservation', 'iweref' ); ?>" class="program-img" loading="lazy">
                </div>
                <div class="program-body">
                    <h3 class="program-title"><?php esc_html_e( 'Ecosystem Conservation', 'iweref' ); ?></h3>
                    <p class="program-desc"><?php esc_html_e( 'Restoring biological corridors through massive tree planting drives, protecting native fauna, and combating land degradation through sustainable land husbandry practices.', 'iweref' ); ?></p>
                </div>
            </div>
            <div class="program-card scroll-reveal fade-up" style="--delay:300ms;">
                <div class="program-img-wrapper">
                    <img src="<?php echo esc_url( $img . 'about-env.png' ); ?>" alt="<?php esc_attr_e( 'Community solar energy', 'iweref' ); ?>" class="program-img" loading="lazy">
                </div>
                <div class="program-body">
                    <h3 class="program-title"><?php esc_html_e( 'Community Solar &amp; Green Grid', 'iweref' ); ?></h3>
                    <p class="program-desc"><?php esc_html_e( 'Providing off-grid renewable energy installations for community facilities, schools, and water pumps, enabling sustainable socio-economic growth without carbon footprints.', 'iweref' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
