<?php
/**
 * The template for displaying archive pages.
 *
 * @package iweref
 */

get_header();
?>

<main id="main-content" class="archive-main" style="padding-top: calc(var(--header-height) + 40px); background-color: var(--color-bg);">
    <div class="container" style="max-width: 1200px; padding: 60px 24px 100px;">
        
        <header class="archive-header" style="margin-bottom: 48px; border-bottom: 2px solid rgba(46, 125, 50, 0.1); padding-bottom: 24px;">
            <span class="section-label" style="display: block; margin-bottom: 12px;"><?php esc_html_e( 'Archive', 'iweref' ); ?></span>
            <h1 class="archive-title" style="font-family: var(--font-heading); font-size: 36px; font-weight: 800; color: var(--color-text-dark);">
                <?php the_archive_title(); ?>
            </h1>
            <?php the_archive_description( '<div class="taxonomy-description" style="margin-top: 12px; color: var(--color-text-light); max-width: 700px; line-height: 1.6;">', '</div>' ); ?>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="grid grid-3" style="gap: 32px;">
                <?php
                while ( have_posts() ) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'project-action-card' ); ?> style="background-color: var(--color-white); border-radius: var(--border-radius-md); overflow: hidden; box-shadow: var(--shadow-sm); display: flex; flex-direction: column;">
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="project-card-image" style="height: 200px; overflow: hidden;">
                                <?php the_post_thumbnail( 'medium_large', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="project-card-body" style="padding: 28px; flex-grow: 1; display: flex; flex-direction: column; gap: 12px; border-top: 4px solid var(--color-primary);">
                            <span class="project-meta" style="font-family: var(--font-heading); font-size: 11px; font-weight: 700; color: var(--color-primary); text-transform: uppercase;">
                                <?php echo get_the_date(); ?>
                            </span>
                            <h3 class="project-card-title" style="font-family: var(--font-heading); font-size: 20px; font-weight: 700; line-height: 1.3;">
                                <a href="<?php the_permalink(); ?>" style="color: var(--color-text-dark);"><?php the_title(); ?></a>
                            </h3>
                            <p class="project-card-desc" style="font-size: 15px; color: var(--color-text-light); line-height: 1.6; flex-grow: 1;">
                                <?php echo wp_trim_words( get_the_excerpt(), 18 ); ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-text" style="color: var(--color-primary); font-weight: 600; font-size: 14px; margin-top: auto; display: inline-flex; align-items: center; gap: 8px;">
                                <?php esc_html_e( 'Read More', 'iweref' ); ?> &rarr;
                            </a>
                        </div>

                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <div class="archive-pagination" style="margin-top: 60px; text-align: center;">
                <?php the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '&larr; Previous', 'iweref' ),
                    'next_text' => __( 'Next &rarr;', 'iweref' ),
                ) ); ?>
            </div>

        <?php else : ?>
            <p><?php esc_html_e( 'No posts found.', 'iweref' ); ?></p>
        <?php endif; ?>

    </div>
</main>

<?php
get_footer();
