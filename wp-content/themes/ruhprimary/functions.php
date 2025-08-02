<?php
/**
 * Ruhprimary theme functions and definitions
 */

/**
 * Set up theme defaults and register support for WordPress features.
 */
function ruhprimary_setup() {
    // Add support for block styles
    add_theme_support( 'wp-block-styles' );

    // Add support for Elementor
    add_theme_support( 'editor-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    // Add support for core WordPress features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Register navigation menu
    register_nav_menus( array(
        'home' => esc_html__( 'Home', 'ruhprimary' ),
        'curriculum' => esc_html__( 'Curriculum', 'ruhprimary' ),
        'life-ruh' => esc_html__( 'Life Ruh', 'ruhprimary' ),
        'admissions' => esc_html__( 'Admissions', 'ruhprimary' ),
    ) );

    // Remove wpemoji support
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action( 'after_setup_theme', 'ruhprimary_setup' );

/**
 * Enqueue theme styles and scripts
 */
function ruhprimary_enqueue_styles_scripts() {
    // Enqueue CSS in the head
    wp_enqueue_style( 'ruhprimary-style', get_stylesheet_uri(), array(), '1.0.3' );

    // Enqueue JavaScript in the footer
    wp_enqueue_script( 'ruhprimary-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.3', true );

    // Preload custom fonts for performance
    $font_preload = array(
        'causten-bold' => array(
            'woff' => get_template_directory_uri() . '/fonts/causten-bold-webfont.woff',
            'woff2' => get_template_directory_uri() . '/fonts/causten-bold-webfont.woff2'
        ),
        'ps-aelyn-regular' => array(
            'woff' => get_template_directory_uri() . '/fonts/ps-aelyn-regular-webfont.woff',
            'woff2' => get_template_directory_uri() . '/fonts/ps-aelyn-regular-webfont.woff2'
        )
    );

    foreach ( $font_preload as $font ) {
        echo '<link rel="preload" href="' . esc_url( $font['woff2'] ) . '" as="font" type="font/woff2" crossorigin>';
        echo '<link rel="preload" href="' . esc_url( $font['woff'] ) . '" as="font" type="font/woff" crossorigin>';
    }
}
add_action( 'wp_head', 'ruhprimary_enqueue_styles_scripts', 5 ); // Early priority for CSS and preload

/**
 * Add Elementor compatibility
 */
function ruhprimary_elementor_support() {
    // Ensure Elementor recognizes the theme
    add_theme_support( 'elementor' );
}
add_action( 'elementor/init', 'ruhprimary_elementor_support' );

/**
 * Disable admin bar for non-admin users
 */
 add_filter( 'show_admin_bar', '__return_false' );


/**
 * Remove WordPress generator meta tag
 */
remove_action( 'wp_head', 'wp_generator' );

function add_page_slug_to_body_class($classes) {
    if (is_singular()) {
        global $post;
        $classes[] = 'page-' . $post->post_name; // Adds 'page-your-page-slug'
    }
    return $classes;
}
add_filter('body_class', 'add_page_slug_to_body_class');
add_filter('post_class', 'add_page_slug_to_body_class');

function custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');


function add_aos_library() {
    // AOS CSS
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css');

    // AOS JS
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), null, true);

    // Initialize AOS
    wp_add_inline_script('aos-js', 'AOS.init();');
}
add_action('wp_enqueue_scripts', 'add_aos_library');


/**
 * Description: Adds a "Blog" custom post type with /blogs archive, /blog/{post-name} singles, and custom Tag & Collection taxonomies.
 */
if ( ! function_exists( 'mysite_register_blog_cpt' ) ) {

    add_action( 'init', 'mysite_register_blog_cpt' );
    add_action( 'init', 'mysite_register_blog_taxonomies' );

    function mysite_register_blog_cpt() {
        $labels = array(
            'name'               => __( 'Blogs', 'ruhprimary' ),
            'singular_name'      => __( 'Blog', 'ruhprimary' ),
            'menu_name'          => __( 'Blogs', 'ruhprimary' ),
            'add_new'            => __( 'Add New', 'ruhprimary' ),
            'add_new_item'       => __( 'Add New Blog', 'ruhprimary' ),
            'edit_item'          => __( 'Edit Blog', 'ruhprimary' ),
            'new_item'           => __( 'New Blog', 'ruhprimary' ),
            'view_item'          => __( 'View Blog', 'ruhprimary' ),
            'all_items'          => __( 'All Blogs', 'ruhprimary' ),
            'search_items'       => __( 'Search Blogs', 'ruhprimary' ),
            'not_found'          => __( 'No blogs found.', 'ruhprimary' ),
            'not_found_in_trash' => __( 'No blogs found in Trash.', 'ruhprimary' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'show_in_rest'       => true,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'has_archive'        => 'blog',
            'rewrite'            => array( 'slug' => 'blog', 'with_front' => false ),
            'menu_icon'          => 'dashicons-welcome-write-blog',
        );

        register_post_type( 'blog', $args );
    }

    function mysite_register_blog_taxonomies() {
        register_taxonomy( 'blog_tag', 'blog', array(
            'label'        => 'Blog Tags',
            'rewrite'      => array( 'slug' => 'blog-tag', 'with_front' => false ),
            'hierarchical' => false,
            'public'       => true,
            'show_in_rest' => true,
        ) );

        register_taxonomy( 'collection', 'blog', array(
            'label'        => 'Collections',
            'rewrite'      => array( 'slug' => 'collection', 'with_front' => false ),
            'hierarchical' => true,
            'public'       => true,
            'show_in_rest' => true,
        ) );
    }
}


