<?php
/**
 * IWEREF Full Width Page Template
 * For use with Elementor — removes header/footer chrome for full Elementor control.
 *
 * Template Name: IWEREF Full Width
 * Template Post Type: page
 *
 * @package iweref
 */
get_header();
?>
<main id="main-content">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
