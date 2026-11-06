<?php
/**
 * IWEREF Theme Functions
 *
 * @package iweref
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// =========================================================
// THEME CONSTANTS
// =========================================================
define( 'IWEREF_VERSION', '1.0.0' );
define( 'IWEREF_DIR', get_template_directory() );
define( 'IWEREF_URI', get_template_directory_uri() );


// =========================================================
// THEME SETUP
// =========================================================
function iweref_setup() {
    // Enable translations
    load_theme_textdomain( 'iweref', IWEREF_DIR . '/languages' );

    // Add theme supports
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'woocommerce' ); // Optional: WooCommerce compatibility
    add_theme_support( 'align-wide' );  // Gutenberg wide/full blocks
    add_theme_support( 'responsive-embeds' );

    // Elementor compatibility
    add_theme_support( 'elementor' );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Navigation', 'iweref' ),
        'footer'  => esc_html__( 'Footer Navigation', 'iweref' ),
    ) );
}
add_action( 'after_setup_theme', 'iweref_setup' );


// =========================================================
// ENQUEUE SCRIPTS & STYLES
// =========================================================
function iweref_enqueue_assets() {
    $version = IWEREF_VERSION;

    // Google Fonts
    wp_enqueue_style(
        'iweref-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Main theme stylesheet
    wp_enqueue_style(
        'iweref-style',
        IWEREF_URI . '/assets/css/main.css',
        array( 'iweref-google-fonts' ),
        $version
    );

    // WordPress theme style.css (required by WP)
    wp_enqueue_style( 'iweref-theme', get_stylesheet_uri(), array(), $version );

    // Main JS (load in footer)
    wp_enqueue_script(
        'iweref-script',
        IWEREF_URI . '/assets/js/script.js',
        array(),
        $version,
        true // Load in footer
    );

    // Pass PHP variables to JS (hero background URL, theme URI, etc.)
    wp_add_inline_script(
        'iweref-script',
        'window.IWEREF = ' . wp_json_encode( array(
            'themeUri' => IWEREF_URI,
            'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        ) ) . ';',
        'before'
    );

    // Inject the hero background as a CSS custom property so it resolves correctly
    $hero_bg_url = IWEREF_URI . '/assets/images/hero-bg.png';
    $inline_css  = ":root { --hero-bg-url: url('{$hero_bg_url}'); }";
    wp_add_inline_style( 'iweref-style', $inline_css );
}
add_action( 'wp_enqueue_scripts', 'iweref_enqueue_assets' );


// =========================================================
// ELEMENTOR COMPATIBILITY
// =========================================================

// Register "Full Width" and "Elementor Canvas" page templates
function iweref_add_elementor_page_templates( $post_templates ) {
    $post_templates['templates/elementor-fullwidth.php'] = esc_html__( 'IWEREF Full Width', 'iweref' );
    return $post_templates;
}
add_filter( 'theme_page_templates', 'iweref_add_elementor_page_templates' );

// Remove admin bar top padding on front-end (cleaner for full-height sections)
function iweref_admin_bar_style() {
    if ( is_admin_bar_showing() ) {
        echo '<style>html { margin-top: 0 !important; } * html body { margin-top: 0 !important; }</style>';
    }
}
add_action( 'wp_head', 'iweref_admin_bar_style' );

// Elementor: allow the theme's custom CSS classes to pass through
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );


// =========================================================
// BODY CLASS ADDITIONS
// =========================================================
function iweref_body_classes( $classes ) {
    if ( is_singular() && ! is_front_page() ) {
        $classes[] = 'iweref-singular';
    }
    if ( is_front_page() ) {
        $classes[] = 'iweref-home';
    }
    return $classes;
}
add_filter( 'body_class', 'iweref_body_classes' );


// =========================================================
// CONTACT FORM AJAX HANDLER (Simple built-in)
// =========================================================
function iweref_handle_contact_form() {
    check_ajax_referer( 'iweref_contact_nonce', 'nonce' );

    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $subject = sanitize_text_field( $_POST['subject'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => 'Please fill all required fields.' ) );
    }

    $to      = get_option( 'admin_email' );
    $headers = array( 'Content-Type: text/html; charset=UTF-8', "Reply-To: {$name} <{$email}>" );
    $body    = "<strong>From:</strong> {$name} ({$email})<br><strong>Subject:</strong> {$subject}<br><br>{$message}";

    $sent = wp_mail( $to, "[IWEREF] {$subject}", $body, $headers );

    if ( $sent ) {
        wp_send_json_success( array( 'message' => 'Message sent successfully. We will get back to you soon!' ) );
    } else {
        wp_send_json_error( array( 'message' => 'Message could not be sent. Please try again.' ) );
    }
}
add_action( 'wp_ajax_iweref_contact',        'iweref_handle_contact_form' );
add_action( 'wp_ajax_nopriv_iweref_contact', 'iweref_handle_contact_form' );


// =========================================================
// CUSTOMIZER OPTIONS
// =========================================================
function iweref_customize_register( $wp_customize ) {

    // ----- Hero Section Panel -----
    $wp_customize->add_panel( 'iweref_hero_panel', array(
        'title'    => __( 'Hero Section', 'iweref' ),
        'priority' => 30,
    ) );

    $wp_customize->add_section( 'iweref_hero', array(
        'title'    => __( 'Hero Content', 'iweref' ),
        'panel'    => 'iweref_hero_panel',
        'priority' => 10,
    ) );

    // Hero Heading
    $wp_customize->add_setting( 'iweref_hero_heading', array(
        'default'           => 'Protecting Water, Preserving Nature',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'iweref_hero_heading', array(
        'label'   => __( 'Hero Heading', 'iweref' ),
        'section' => 'iweref_hero',
        'type'    => 'text',
    ) );

    // Hero Subtext
    $wp_customize->add_setting( 'iweref_hero_subtext', array(
        'default'           => 'Empowering communities to secure clean water, restore vital ecosystems, and build lasting climate resilience.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'iweref_hero_subtext', array(
        'label'   => __( 'Hero Description', 'iweref' ),
        'section' => 'iweref_hero',
        'type'    => 'textarea',
    ) );

    // ----- Contact Info Panel -----
    $wp_customize->add_section( 'iweref_contact_info', array(
        'title'    => __( 'Contact Information', 'iweref' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'iweref_contact_address', array(
        'default'           => '72 Eco-Conservation Boulevard, Suite 300, Capital City',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'iweref_contact_address', array(
        'label'   => __( 'Address', 'iweref' ),
        'section' => 'iweref_contact_info',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'iweref_contact_email', array(
        'default'           => 'contact@iweref.org',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'iweref_contact_email', array(
        'label'   => __( 'Email', 'iweref' ),
        'section' => 'iweref_contact_info',
        'type'    => 'email',
    ) );

    $wp_customize->add_setting( 'iweref_contact_phone', array(
        'default'           => '+1 (800) 456-7890',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'iweref_contact_phone', array(
        'label'   => __( 'Phone', 'iweref' ),
        'section' => 'iweref_contact_info',
        'type'    => 'text',
    ) );

    // Social Links
    $wp_customize->add_section( 'iweref_social', array(
        'title'    => __( 'Social Media Links', 'iweref' ),
        'priority' => 50,
    ) );

    foreach ( array( 'facebook', 'twitter', 'instagram', 'linkedin' ) as $platform ) {
        $wp_customize->add_setting( "iweref_social_{$platform}", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( "iweref_social_{$platform}", array(
            'label'   => ucfirst( $platform ) . ' URL',
            'section' => 'iweref_social',
            'type'    => 'url',
        ) );
    }
}
add_action( 'customize_register', 'iweref_customize_register' );

// =========================================================
// NAV MENU CLASSES FOR CSS INTERACTION
// =========================================================

// Add 'nav-item' class to <li> tags in WP Menu
function iweref_add_menu_li_class( $classes, $item, $args ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'iweref_add_menu_li_class', 10, 3 );

// Add 'nav-link' class to <a> tags in WP Menu
function iweref_add_menu_link_class( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'iweref_add_menu_link_class', 10, 3 );


// =========================================================
// REGISTER CUSTOM POST TYPES (PROJECTS & TEAM MEMBERS)
// =========================================================

function iwef_register_custom_post_types() {
    // 1. Projects Custom Post Type
    $projects_labels = array(
        'name'               => _x( 'Projects', 'post type general name', 'iweref' ),
        'singular_name'      => _x( 'Project', 'post type singular name', 'iweref' ),
        'menu_name'          => _x( 'Projects', 'admin menu', 'iweref' ),
        'add_new'            => _x( 'Add New', 'project', 'iweref' ),
        'add_new_item'       => __( 'Add New Project', 'iweref' ),
        'new_item'           => __( 'New Project', 'iweref' ),
        'edit_item'          => __( 'Edit Project', 'iweref' ),
        'view_item'          => __( 'View Project', 'iweref' ),
        'all_items'          => __( 'All Projects', 'iweref' ),
        'search_items'       => __( 'Search Projects', 'iweref' ),
        'not_found'          => __( 'No projects found.', 'iweref' ),
        'not_found_in_trash' => __( 'No projects found in Trash.', 'iweref' ),
    );

    $projects_args = array(
        'labels'             => $projects_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projects' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'show_in_rest'       => true, // Block Editor / Elementor compatibility
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'projects', $projects_args );

    // 2. Team Members Custom Post Type
    $team_labels = array(
        'name'               => _x( 'Team Members', 'post type general name', 'iweref' ),
        'singular_name'      => _x( 'Team Member', 'post type singular name', 'iweref' ),
        'menu_name'          => _x( 'Team Members', 'admin menu', 'iweref' ),
        'add_new'            => _x( 'Add New', 'team member', 'iweref' ),
        'add_new_item'       => __( 'Add New Team Member', 'iweref' ),
        'new_item'           => __( 'New Team Member', 'iweref' ),
        'edit_item'          => __( 'Edit Team Member', 'iweref' ),
        'view_item'          => __( 'View Team Member', 'iweref' ),
        'all_items'          => __( 'All Team Members', 'iweref' ),
        'search_items'       => __( 'Search Team Members', 'iweref' ),
        'not_found'          => __( 'No team members found.', 'iweref' ),
        'not_found_in_trash' => __( 'No team members found in Trash.', 'iweref' ),
    );

    $team_args = array(
        'labels'             => $team_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-groups',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'team_members', $team_args );
}
add_action( 'init', 'iwef_register_custom_post_types' );


// =========================================================
// CUSTOM POST FIELDS METABOXES (PROJECTS LOCATION/IMPACT & TEAM POSITIONS)
// =========================================================

// Register metaboxes
function iwef_add_custom_metaboxes() {
    add_meta_box(
        'project_details_metabox',
        __( 'Project Details', 'iweref' ),
        'iwef_project_details_callback',
        'projects',
        'normal',
        'high'
    );
    add_meta_box(
        'team_details_metabox',
        __( 'Team Member Details', 'iweref' ),
        'iwef_team_details_callback',
        'team_members',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'iwef_add_custom_metaboxes' );

// Callback for Projects Details Metabox
function iwef_project_details_callback( $post ) {
    wp_nonce_field( 'iwef_save_project_details', 'iwef_project_nonce' );

    $location = get_post_meta( $post->ID, '_project_location', true );
    $category = get_post_meta( $post->ID, '_project_category', true );
    $impact   = get_post_meta( $post->ID, '_project_impact', true );
    $date     = get_post_meta( $post->ID, '_project_date', true );

    echo '<p><label for="project_category" style="display:inline-block;width:120px;font-weight:bold;">' . __( 'Project Category:', 'iweref' ) . '</label>';
    echo '<input type="text" id="project_category" name="project_category" value="' . esc_attr( $category ) . '" size="25" placeholder="e.g. Water Access" /></p>';

    echo '<p><label for="project_location" style="display:inline-block;width:120px;font-weight:bold;">' . __( 'Location:', 'iweref' ) . '</label>';
    echo '<input type="text" id="project_location" name="project_location" value="' . esc_attr( $location ) . '" size="25" placeholder="e.g. Multiple Communities" /></p>';

    echo '<p><label for="project_date" style="display:inline-block;width:120px;font-weight:bold;">' . __( 'Project Date:', 'iweref' ) . '</label>';
    echo '<input type="text" id="project_date" name="project_date" value="' . esc_attr( $date ) . '" size="25" placeholder="e.g. Q3 2026" /></p>';

    echo '<p><label for="project_impact" style="display:inline-block;width:120px;font-weight:bold;">' . __( 'Key Impact Metric:', 'iweref' ) . '</label>';
    echo '<input type="text" id="project_impact" name="project_impact" value="' . esc_attr( $impact ) . '" size="25" placeholder="e.g. 5,000+ Cleaned" /></p>';
}

// Callback for Team Details Metabox
function iwef_team_details_callback( $post ) {
    wp_nonce_field( 'iwef_save_team_details', 'iwef_team_nonce' );

    $position = get_post_meta( $post->ID, '_team_position', true );

    echo '<p><label for="team_position" style="display:inline-block;width:120px;font-weight:bold;">' . __( 'Position:', 'iweref' ) . '</label>';
    echo '<input type="text" id="team_position" name="team_position" value="' . esc_attr( $position ) . '" size="25" placeholder="e.g. Executive Director" /></p>';
}

// Save Custom fields values
function iwef_save_custom_metabox_data( $post_id ) {
    // 1. Save Project values
    if ( isset( $_POST['iwef_project_nonce'] ) && wp_verify_nonce( $_POST['iwef_project_nonce'], 'iwef_save_project_details' ) ) {
        if ( isset( $_POST['project_location'] ) ) {
            update_post_meta( $post_id, '_project_location', sanitize_text_field( $_POST['project_location'] ) );
        }
        if ( isset( $_POST['project_category'] ) ) {
            update_post_meta( $post_id, '_project_category', sanitize_text_field( $_POST['project_category'] ) );
        }
        if ( isset( $_POST['project_impact'] ) ) {
            update_post_meta( $post_id, '_project_impact', sanitize_text_field( $_POST['project_impact'] ) );
        }
        if ( isset( $_POST['project_date'] ) ) {
            update_post_meta( $post_id, '_project_date', sanitize_text_field( $_POST['project_date'] ) );
        }
    }

    // 2. Save Team values
    if ( isset( $_POST['iwef_team_nonce'] ) && wp_verify_nonce( $_POST['iwef_team_nonce'], 'iwef_save_team_details' ) ) {
        if ( isset( $_POST['team_position'] ) ) {
            update_post_meta( $post_id, '_team_position', sanitize_text_field( $_POST['team_position'] ) );
        }
    }
}
add_action( 'save_post', 'iwef_save_custom_metabox_data' );


