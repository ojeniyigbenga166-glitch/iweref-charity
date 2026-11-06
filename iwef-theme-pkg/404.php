<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package iweref
 */

get_header();
?>

<main id="main-content" class="error-404-main" style="padding-top: calc(var(--header-height) + 80px); background-color: var(--color-bg); display: flex; align-items: center; justify-content: center; min-height: 80vh; text-align: center;">
    <div class="container" style="max-width: 600px; padding: 60px 24px 100px;">
        
        <h1 class="error-code" style="font-family: var(--font-heading); font-size: clamp(80px, 12vw, 150px); font-weight: 800; color: var(--color-primary); line-height: 1; margin: 0; text-shadow: 0 4px 20px rgba(46, 125, 50, 0.15);">
            404
        </h1>
        
        <h2 class="error-title" style="font-family: var(--font-heading); font-size: clamp(22px, 3.5vw, 32px); font-weight: 700; color: var(--color-text-dark); margin-top: 24px; margin-bottom: 16px;">
            <?php esc_html_e( 'Page Not Found', 'iweref' ); ?>
        </h2>
        
        <p class="error-message" style="color: var(--color-text-light); font-size: 16px; line-height: 1.6; margin-bottom: 40px;">
            <?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Try searching or go back home.', 'iweref' ); ?>
        </p>

        <div class="error-search" style="max-width: 400px; margin: 0 auto 40px;">
            <?php get_search_form(); ?>
        </div>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
            <?php esc_html_e( 'Back To Homepage', 'iweref' ); ?>
        </a>

    </div>
</main>

<?php
get_footer();
