<?php
/**
 * Template part for rendering the hero section.
 *
 * @package iweref
 */

// Pull Customizer values or fallbacks
$hero_heading = get_theme_mod(
    'iweref_hero_heading',
    'Protecting Water, Preserving Nature'
);
$hero_subtext = get_theme_mod(
    'iweref_hero_subtext',
    'Empowering communities to secure clean water, restore vital ecosystems, and build lasting climate resilience.'
);
$img = IWEREF_URI . '/assets/images/';
?>

<section class="hero" id="home" aria-label="<?php esc_attr_e( 'Hero banner', 'iweref' ); ?>">
    <div class="hero-bg-overlay" aria-hidden="true"></div>
    <div class="container hero-container hero-split-grid">
        
        <!-- Left Side: Hero Text content -->
        <div class="hero-content scroll-reveal fade-right">
            <span class="hero-subtitle-tag"><?php esc_html_e( 'Empowering Change, Protecting Life', 'iweref' ); ?></span>
            <h1 class="hero-title"><?php echo esc_html( $hero_heading ); ?></h1>
            <p class="hero-description"><?php echo esc_html( $hero_subtext ); ?></p>
            <div class="hero-buttons">
                <a href="#donate" class="btn btn-primary btn-lg" id="hero-primary-cta">
                    <?php esc_html_e( 'Support Our Mission', 'iweref' ); ?>
                </a>
                <a href="#programs" class="btn btn-secondary btn-lg" id="hero-secondary-cta">
                    <?php esc_html_e( 'Explore Projects', 'iweref' ); ?>
                </a>
            </div>
        </div>

        <!-- Right Side: 4-Box Image Collage -->
        <div class="hero-collage-wrapper scroll-reveal fade-left">
            <div class="about-collage-container">
                <div class="collage-grid">
                    <div class="collage-item img-1">
                        <img src="<?php echo esc_url( $img . 'about-water.png' ); ?>" alt="<?php esc_attr_e( 'Clean water project', 'iweref' ); ?>" loading="lazy" width="400" height="220">
                        <div class="collage-caption"><?php esc_html_e( 'Clean Water', 'iweref' ); ?></div>
                    </div>
                    <div class="collage-item img-2">
                        <img src="<?php echo esc_url( $img . 'about-outreach.png' ); ?>" alt="<?php esc_attr_e( 'Community outreach', 'iweref' ); ?>" loading="lazy" width="350" height="180">
                        <div class="collage-caption"><?php esc_html_e( 'Outreach', 'iweref' ); ?></div>
                    </div>
                    <div class="collage-item img-3">
                        <img src="<?php echo esc_url( $img . 'about-tree.png' ); ?>" alt="<?php esc_attr_e( 'Tree planting', 'iweref' ); ?>" loading="lazy" width="320" height="180">
                        <div class="collage-caption"><?php esc_html_e( 'Afforestation', 'iweref' ); ?></div>
                    </div>
                    <div class="collage-item img-4">
                        <img src="<?php echo esc_url( $img . 'about-env.png' ); ?>" alt="<?php esc_attr_e( 'Renewable energy', 'iweref' ); ?>" loading="lazy" width="400" height="210">
                        <div class="collage-caption"><?php esc_html_e( 'Renewable Energy', 'iweref' ); ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="hero-scroll-indicator" aria-hidden="true">
        <span class="scroll-dot"></span>
    </div>
</section>
