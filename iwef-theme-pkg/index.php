<?php
/**
 * IWEREF Index Template (required WordPress fallback)
 *
 * @package iweref
 */
get_header();
?>
<main id="main-content" class="container" style="padding: 120px 24px 80px;">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="section-title"><?php the_title(); ?></h1>
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <p><?php esc_html_e( 'No content found.', 'iweref' ); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
