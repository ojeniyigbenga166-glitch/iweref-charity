<?php
/**
 * Template part for rendering the Projects section.
 *
 * @package iweref
 */

$img = IWEREF_URI . '/assets/images/';

// WP_Query for custom 'projects' post type
$args = array(
    'post_type'      => 'projects',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
);
$projects_query = new WP_Query( $args );
?>

<section class="stories-section" id="stories">
    <div class="container">
        <div class="section-header center scroll-reveal fade-up">
            <span class="section-label"><?php esc_html_e( 'Our Projects in Action', 'iweref' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Initiatives creating real impact.', 'iweref' ); ?></h2>
        </div>
        
        <div class="grid grid-3 projects-action-grid">
            <?php if ( $projects_query->have_posts() ) : ?>
                <?php 
                $delay = 100;
                while ( $projects_query->have_posts() ) : $projects_query->the_post(); 
                    $location = get_post_meta( get_the_ID(), '_project_location', true );
                    $category = get_post_meta( get_the_ID(), '_project_category', true );
                    if ( empty( $category ) ) {
                        $terms = get_the_terms( get_the_ID(), 'category' );
                        $category = ! empty( $terms ) ? $terms[0]->name : __( 'Initiative', 'iweref' );
                    }
                    ?>
                    <div class="project-action-card scroll-reveal fade-up" style="--delay:<?php echo esc_attr( $delay ); ?>ms;">
                        <div class="project-card-image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large' ); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url( $img . 'about-water.png' ); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="project-card-body">
                            <div class="project-meta">
                                <span class="project-category"><?php echo esc_html( $category ); ?></span>
                                <?php if ( ! empty( $location ) ) : ?>
                                    <span class="project-location"><?php echo esc_html( $location ); ?></span>
                                <?php endif; ?>
                            </div>
                            <h3 class="project-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="project-card-desc"><?php echo wp_trim_words( get_the_excerpt(), 18 ); ?></p>
                        </div>
                    </div>
                    <?php 
                    $delay += 100;
                endwhile; 
                wp_reset_postdata(); 
                ?>
            <?php else : ?>
                <!-- Static Fallback Cards if CPT has no posts -->
                
                <!-- Project Card 1 -->
                <div class="project-action-card scroll-reveal fade-up" style="--delay:100ms;">
                    <div class="project-card-image">
                        <img src="<?php echo esc_url( $img . 'about-water.png' ); ?>" alt="<?php esc_attr_e( 'Clean Water Initiative', 'iweref' ); ?>" loading="lazy">
                    </div>
                    <div class="project-card-body">
                        <div class="project-meta">
                            <span class="project-category"><?php esc_html_e( 'Water Access', 'iweref' ); ?></span>
                            <span class="project-location"><?php esc_html_e( 'Multiple Communities', 'iweref' ); ?></span>
                        </div>
                        <h3 class="project-card-title"><?php esc_html_e( 'Clean Water for All Initiative', 'iweref' ); ?></h3>
                        <p class="project-card-desc"><?php esc_html_e( 'Providing rural and underserved communities with sustainable access to clean, safe drinking water through community-managed water points.', 'iweref' ); ?></p>
                    </div>
                </div>

                <!-- Project Card 2 -->
                <div class="project-action-card scroll-reveal fade-up" style="--delay:200ms;">
                    <div class="project-card-image">
                        <img src="<?php echo esc_url( $img . 'about-tree.png' ); ?>" alt="<?php esc_attr_e( 'Green Communities Program', 'iweref' ); ?>" loading="lazy">
                    </div>
                    <div class="project-card-body">
                        <div class="project-meta">
                            <span class="project-category"><?php esc_html_e( 'Community & Environment', 'iweref' ); ?></span>
                            <span class="project-location"><?php esc_html_e( 'Urban & Peri-Urban', 'iweref' ); ?></span>
                        </div>
                        <h3 class="project-card-title"><?php esc_html_e( 'Green Communities Program', 'iweref' ); ?></h3>
                        <p class="project-card-desc"><?php esc_html_e( 'Combining tree planting drives, waste management awareness, and adoption of eco-friendly practices at the community level.', 'iweref' ); ?></p>
                    </div>
                </div>

                <!-- Project Card 3 -->
                <div class="project-action-card scroll-reveal fade-up" style="--delay:300ms;">
                    <div class="project-card-image">
                        <img src="<?php echo esc_url( $img . 'about-outreach.png' ); ?>" alt="<?php esc_attr_e( 'Environmental Leadership Workshops', 'iweref' ); ?>" loading="lazy">
                    </div>
                    <div class="project-card-body">
                        <div class="project-meta">
                            <span class="project-category"><?php esc_html_e( 'Education & Leadership', 'iweref' ); ?></span>
                            <span class="project-location"><?php esc_html_e( 'Regional', 'iweref' ); ?></span>
                        </div>
                        <h3 class="project-card-title"><?php esc_html_e( 'Environmental Leadership Workshops', 'iweref' ); ?></h3>
                        <p class="project-card-desc"><?php esc_html_e( 'Training youth and local leaders on sustainable development, environmental advocacy, and practical conservation techniques.', 'iweref' ); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
