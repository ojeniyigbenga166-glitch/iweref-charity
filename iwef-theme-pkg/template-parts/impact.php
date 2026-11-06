<?php
/**
 * Template part for rendering the Impact Statistics section.
 *
 * @package iweref
 */
?>

<section class="impact-section">
    <div class="impact-bg-pattern" aria-hidden="true"></div>
    <div class="container">
        <div class="impact-header scroll-reveal fade-up">
            <span class="section-label light"><?php esc_html_e( 'OUR IMPACT IN NUMBERS', 'iweref' ); ?></span>
            <h2 class="section-title text-white"><?php esc_html_e( 'Making Tangible Differences Worldwide', 'iweref' ); ?></h2>
        </div>
        <div class="grid grid-4 impact-grid">
            <div class="stat-card scroll-reveal fade-up" style="--delay:100ms;">
                <div class="stat-icon" aria-hidden="true"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div>
                <div class="stat-number" data-target="10" aria-label="10+ Communities Supported">0</div>
                <div class="stat-label"><?php esc_html_e( 'Communities Supported', 'iweref' ); ?></div>
            </div>
            <div class="stat-card scroll-reveal fade-up" style="--delay:200ms;">
                <div class="stat-icon" aria-hidden="true"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
                <div class="stat-number" data-target="50" aria-label="50+ Environmental Projects">0</div>
                <div class="stat-label"><?php esc_html_e( 'Environmental Projects', 'iweref' ); ?></div>
            </div>
            <div class="stat-card scroll-reveal fade-up" style="--delay:300ms;">
                <div class="stat-icon" aria-hidden="true"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
                <div class="stat-number" data-target="5000" aria-label="5000+ People Impacted">0</div>
                <div class="stat-label"><?php esc_html_e( 'People Impacted', 'iweref' ); ?></div>
            </div>
            <div class="stat-card scroll-reveal fade-up" style="--delay:400ms;">
                <div class="stat-icon" aria-hidden="true"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg></div>
                <div class="stat-number" data-target="100" aria-label="100+ Active Volunteers">0</div>
                <div class="stat-label"><?php esc_html_e( 'Active Volunteers', 'iweref' ); ?></div>
            </div>
        </div>
    </div>
</section>
