<?php
/**
 * IWEREF Page Template (Generic single page)
 *
 * @package iweref
 */
get_header();
?>
<main id="main-content" class="container" style="padding: 120px 24px 80px;">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( ! is_front_page() ) : ?>
                <h1 class="section-title" style="margin-bottom: 32px;"><?php the_title(); ?></h1>
            <?php endif; ?>
            <div class="entry-content">
                <?php
                the_content();
                wp_link_pages( array(
                    'before' => '<nav class="page-links">',
                    'after'  => '</nav>',
                ) );
                ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
