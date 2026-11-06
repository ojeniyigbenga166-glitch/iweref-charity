<?php
/**
 * Template part for rendering the About section.
 *
 * @package iweref
 */

$img = IWEREF_URI . '/assets/images/';
?>

<section class="about-section" id="about">
    <div class="container grid grid-2">

        <div class="about-text scroll-reveal fade-right">
            <span class="section-label"><?php esc_html_e( 'ABOUT IWEREF', 'iweref' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Building a Sustainable Future Through Environmental Action', 'iweref' ); ?></h2>
            <p class="section-desc"><?php esc_html_e( 'Integrated Water and Environment Resource Foundation (IWEREF) is a non-governmental organization committed to restoring and preserving the environment while improving human lives.', 'iweref' ); ?></p>
            <p class="section-desc-secondary"><?php esc_html_e( 'We focus on long-term systemic impact. By integrating state-of-the-art hydrological research, ecological forestry, and community-driven development, we empower local populations to manage their natural resources sustainably. Our work spans remote rural watersheds to modern smart cities.', 'iweref' ); ?></p>
            <div class="about-points">
                <div class="about-point">
                    <div class="point-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
                    <span><?php esc_html_e( 'Scientifically backed water resource management', 'iweref' ); ?></span>
                </div>
                <div class="about-point">
                    <div class="point-icon" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg></div>
                    <span><?php esc_html_e( 'Collaborative forestation and nature preservation', 'iweref' ); ?></span>
                </div>
            </div>
            <a href="#programs" class="btn btn-primary" id="about-learn-more"><?php esc_html_e( 'Learn More', 'iweref' ); ?></a>
        </div>

        <!-- Right Side: Single Premium landscape image with floating stats badge -->
        <div class="about-single-image-wrapper scroll-reveal fade-left">
            <div class="about-img-box">
                <img src="<?php echo esc_url( $img . 'volunteer.png' ); ?>" alt="<?php esc_attr_e( 'IWEREF nature protection mission', 'iweref' ); ?>" loading="lazy" class="about-featured-img">
                <div class="about-floating-badge">
                    <span class="badge-num-large"><?php esc_html_e( '100%', 'iweref' ); ?></span>
                    <span class="badge-text-small"><?php esc_html_e( 'Community Driven', 'iweref' ); ?></span>
                </div>
            </div>
        </div>

    </div>
</section>
