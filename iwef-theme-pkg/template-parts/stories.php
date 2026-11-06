<?php
/**
 * Template part for rendering the Success Stories / Testimonials section.
 *
 * @package iweref
 */

$img = IWEREF_URI . '/assets/images/';
?>

<section class="stories-section-original" id="testimonials" style="padding: 100px 0; background-color: var(--color-bg);">
    <div class="container">
        <div class="section-header center scroll-reveal fade-up">
            <span class="section-label"><?php esc_html_e( 'SUCCESS STORIES', 'iweref' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Stories Of Ecological Transformation', 'iweref' ); ?></h2>
        </div>
        <div class="grid grid-2 stories-grid" style="gap: 40px; margin-top: 48px;">
            
            <article class="story-card scroll-reveal fade-right" style="background-color: var(--color-white); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);">
                <div class="story-img-wrapper" style="height: 280px; overflow: hidden; position: relative;">
                    <img src="<?php echo esc_url( $img . 'story-water.png' ); ?>" alt="<?php esc_attr_e( 'Clean Water Initiative', 'iweref' ); ?>" class="story-img" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                    <span class="story-badge" style="position: absolute; top: 24px; left: 24px; background-color: var(--color-white); color: var(--color-primary); font-family: var(--font-heading); font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 6px 14px; border-radius: var(--border-radius-sm); letter-spacing: 1px; box-shadow: var(--shadow-sm);"><?php esc_html_e( 'Water', 'iweref' ); ?></span>
                </div>
                <div class="story-content" style="padding: 40px; flex-grow: 1; display: flex; flex-direction: column; gap: 12px;">
                    <h3 class="story-title" style="font-family: var(--font-heading); font-size: 22px; font-weight: 700; color: var(--color-text-dark);"><?php esc_html_e( 'Solar Filtration in Southern District', 'iweref' ); ?></h3>
                    <p class="story-desc" style="font-size: 15px; color: var(--color-text-light); line-height: 1.7;"><?php esc_html_e( 'IWEREF installed 12 gravity-fed solar-powered water filtration grids in rural dry areas. Today, over 3,000 residents enjoy clean, safe water at their doorstep, boosting public health.', 'iweref' ); ?></p>
                </div>
            </article>

            <article class="story-card scroll-reveal fade-left" style="background-color: var(--color-white); border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); display: flex; flex-direction: column; transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);">
                <div class="story-img-wrapper" style="height: 280px; overflow: hidden; position: relative;">
                    <img src="<?php echo esc_url( $img . 'story-tree.png' ); ?>" alt="<?php esc_attr_e( 'Community Tree Planting Program', 'iweref' ); ?>" class="story-img" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                    <span class="story-badge" style="position: absolute; top: 24px; left: 24px; background-color: var(--color-white); color: var(--color-primary); font-family: var(--font-heading); font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 6px 14px; border-radius: var(--border-radius-sm); letter-spacing: 1px; box-shadow: var(--shadow-sm);"><?php esc_html_e( 'Forestry', 'iweref' ); ?></span>
                </div>
                <div class="story-content" style="padding: 40px; flex-grow: 1; display: flex; flex-direction: column; gap: 12px;">
                    <h3 class="story-title" style="font-family: var(--font-heading); font-size: 22px; font-weight: 700; color: var(--color-text-dark);"><?php esc_html_e( 'Reclaiming Degraded Watersheds', 'iweref' ); ?></h3>
                    <p class="story-desc" style="font-size: 15px; color: var(--color-text-light); line-height: 1.7;"><?php esc_html_e( 'Through community agroforestry clusters, IWEREF planted 15,000 native saplings. This stabilized critical topsoil layers and created microclimate cooling in rural farming hubs.', 'iweref' ); ?></p>
                </div>
            </article>

        </div>
    </div>
</section>
