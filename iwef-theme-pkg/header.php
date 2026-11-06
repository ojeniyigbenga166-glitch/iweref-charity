<?php
/**
 * IWEREF Theme Header Template
 * Contains the <head> section and top navigation bar.
 *
 * @package iweref
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- NAVBAR -->
<header class="header" id="header">
    <div class="container navbar-container">

        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" id="logo-link" aria-label="<?php bloginfo( 'name' ); ?> Home">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <svg class="logo-icon" width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="50" cy="50" r="46" stroke="currentColor" stroke-width="8"/>
                    <path d="M50 22C50 22 72 48 72 62C72 74.1503 62.1503 84 50 84C37.8497 84 28 74.1503 28 62C28 48 50 22 50 22Z" fill="currentColor"/>
                    <path d="M50 45C58 45 70 52 70 65C70 73 62 78 50 78C53 73 53 62 50 45Z" fill="#65B307"/>
                </svg>
                <div class="logo-text">
                    <span class="logo-title"><?php bloginfo( 'name' ); ?></span>
                    <span class="logo-subtitle">Water &amp; Environment</span>
                </div>
            <?php endif; ?>
        </a>

        <!-- Primary Navigation -->
        <nav class="nav-menu" id="nav-menu" aria-label="<?php esc_attr_e( 'Primary navigation', 'iweref' ); ?>">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'nav-list',
                'fallback_cb'    => 'iweref_fallback_nav',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'link_before'    => '',
                'link_after'     => '',
                'depth'          => 1,
            ) );
            ?>
        </nav>

        <!-- Actions -->
        <div class="nav-actions">
            <a href="#donate" class="btn btn-primary btn-donate" id="nav-donate-btn">
                <?php esc_html_e( 'Donate', 'iweref' ); ?>
            </a>
            <button class="menu-toggle" id="menu-toggle" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'iweref' ); ?>" aria-expanded="false" aria-controls="nav-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>

    </div>
</header>
<?php

/**
 * Fallback navigation when no menu is assigned.
 * Renders the default home/about/programs links.
 */
function iweref_fallback_nav() {
    echo '<ul class="nav-list">';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/' ) ) . '" class="nav-link active">' . esc_html__( 'Home', 'iweref' ) . '</a></li>';
    echo '<li class="nav-item"><a href="#about" class="nav-link">' . esc_html__( 'About Us', 'iweref' ) . '</a></li>';
    echo '<li class="nav-item"><a href="#programs" class="nav-link">' . esc_html__( 'Programs', 'iweref' ) . '</a></li>';
    echo '<li class="nav-item"><a href="#projects" class="nav-link">' . esc_html__( 'Projects', 'iweref' ) . '</a></li>';
    echo '<li class="nav-item"><a href="#stories" class="nav-link">' . esc_html__( 'Stories', 'iweref' ) . '</a></li>';
    echo '<li class="nav-item"><a href="#contact" class="nav-link">' . esc_html__( 'Contact', 'iweref' ) . '</a></li>';
    echo '</ul>';
}
