<?php
/**
 * The template for displaying all single posts.
 *
 * @package iweref
 */

get_header();
?>

<main id="main-content" class="single-post-main" style="padding-top: calc(var(--header-height) + 40px); background-color: var(--color-bg);">
    <div class="container" style="max-width: 800px; padding: 60px 24px 100px;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
                    <header class="post-header" style="margin-bottom: 32px;">
                        <span class="post-meta" style="font-family: var(--font-heading); font-size: 13px; font-weight: 700; color: var(--color-primary); text-transform: uppercase; letter-spacing: 1px;">
                            <?php echo get_the_date(); ?> &mdash; <?php the_category( ', ' ); ?>
                        </span>
                        <h1 class="post-title" style="font-family: var(--font-heading); font-size: clamp(28px, 4vw, 42px); font-weight: 800; color: var(--color-text-dark); margin-top: 12px; line-height: 1.2;">
                            <?php the_title(); ?>
                        </h1>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail" style="border-radius: var(--border-radius-md); overflow: hidden; margin-bottom: 40px; box-shadow: var(--shadow-sm); border: 4px solid var(--color-white);">
                            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; height:auto; display:block; object-fit:cover;' ) ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-entry-content" style="font-family: var(--font-body); font-size: 16px; line-height: 1.8; color: var(--color-text-dark);">
                        <?php 
                        the_content(); 
                        wp_link_pages();
                        ?>
                    </div>

                    <footer class="post-footer" style="margin-top: 60px; padding-top: 30px; border-top: 1px solid rgba(25, 53, 29, 0.1); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                        <div class="post-tags" style="font-size: 14px; color: var(--color-text-light);">
                            <?php the_tags( __( 'Tags: ', 'iweref' ), ', ', '' ); ?>
                        </div>
                        <div class="post-navigation">
                            <?php the_post_navigation( array(
                                'prev_text' => '&larr; %title',
                                'next_text' => '%title &rarr;',
                            ) ); ?>
                        </div>
                    </footer>

                </article>
                <?php
            endwhile;
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
