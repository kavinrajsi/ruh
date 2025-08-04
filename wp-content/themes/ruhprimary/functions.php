<?php

/**
 * Ruhprimary theme functions and definitions
 */

/**
 * Set up theme defaults and register support for WordPress features.
 */
function ruhprimary_setup()
{
    // Add support for block styles
    add_theme_support('wp-block-styles');

    // Add support for Elementor
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    // Add support for core WordPress features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');

    // Register navigation menu
    register_nav_menus(array(
        'home' => esc_html__('Home', 'ruhprimary'),
        'curriculum' => esc_html__('Curriculum', 'ruhprimary'),
        'life-ruh' => esc_html__('Life Ruh', 'ruhprimary'),
        'admissions' => esc_html__('Admissions', 'ruhprimary'),
    ));

    // Remove wpemoji support
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('after_setup_theme', 'ruhprimary_setup');

/**
 * Enqueue theme styles and scripts
 */
function ruhprimary_enqueue_styles_scripts()
{
    // Enqueue CSS in the head
    wp_enqueue_style('ruhprimary-style', get_stylesheet_uri(), array(), '1.0.5');

    // Enqueue JavaScript in the footer
    wp_enqueue_script('ruhprimary-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.5', true);

    // Preload custom fonts for performance
    // List of custom fonts to preload (WOFF & WOFF2)
    $fonts_to_preload = array(
        'causten-black-webfont',
        'causten-blackoblique-webfont',
        'causten-bold-webfont',
        'causten-boldoblique-webfont',
        'causten-extrabold-webfont',
        'causten-extraboldoblique-webfont',
        'causten-extralight-webfont',
        'causten-extralightoblique-webfont',
        'causten-light-webfont',
        'causten-lightoblique-webfont',
        'causten-medium-webfont',
        'causten-mediumoblique-webfont',
        'causten-regular-webfont',
        'causten-regularoblique-webfont',
        'causten-semibold-webfont',
        'causten-semiboldoblique-webfont',
        'causten-thin-webfont',
        'causten-thinoblique-webfont',
        'ps-aelyn-regular-webfont',
        'gilroy-semibold-webfont',
    );

    // Output preload tags in <head> for performance
    foreach ($fonts_to_preload as $font_name) {
        $base_uri = get_template_directory_uri() . '/fonts/' . $font_name;

        // Preload WOFF2
        echo '<link rel="preload" href="' . esc_url($base_uri . '.woff2') . '" as="font" type="font/woff2" crossorigin>' . "\n";

        // Preload WOFF
        echo '<link rel="preload" href="' . esc_url($base_uri . '.woff') . '" as="font" type="font/woff" crossorigin>' . "\n";
    }
}
add_action('wp_head', 'ruhprimary_enqueue_styles_scripts', 5); // Early priority for CSS and preload

/**
 * Add Elementor compatibility
 */
function ruhprimary_elementor_support()
{
    // Ensure Elementor recognizes the theme
    add_theme_support('elementor');
}
add_action('elementor/init', 'ruhprimary_elementor_support');

/**
 * Disable admin bar for non-admin users
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Remove generator meta tags added by Elementor and Performance Lab
 */
function ruhprimary_remove_generator_meta_tags() {
    // Remove default WordPress generator tag (just in case)
    remove_action( 'wp_head', 'wp_generator' );

    // Remove Elementor's generator meta tag
    remove_action( 'wp_head', [ \Elementor\Plugin::instance(), 'print_generator_meta' ], 20 );

    // Remove Performance Lab plugin generator meta tag if available
    // Check if the function exists to avoid breaking anything
    if ( has_action( 'wp_head', 'performance_lab_print_generator_meta_tag' ) ) {
        remove_action( 'wp_head', 'performance_lab_print_generator_meta_tag' );
    }
}
add_action( 'init', 'ruhprimary_remove_generator_meta_tags' );

/**
 * Add the page/post slug to the body and post class arrays
 *
 * This helps target specific pages or posts in your CSS by adding a class like:
 * 'page-about-us' or 'page-blog-post-title' to the <body> or post container.
 *
 * Applies to all singular post types (pages, posts, custom posts).
 *
 * @param array $classes Existing classes for body or post.
 * @return array Modified class array with page slug added.
 */
function add_page_slug_to_body_class($classes)
{
    if (is_singular()) {
        global $post;
        $classes[] = 'page-' . $post->post_name; // Adds 'page-your-page-slug'
    }
    return $classes;
}

// Apply slug to <body> tag classes
add_filter('body_class', 'add_page_slug_to_body_class');
// Apply slug to individual post container classes
add_filter('post_class', 'add_page_slug_to_body_class');

/**
 * Customize the excerpt "read more" text
 *
 * By default, WordPress appends '[...]' to automatically generated excerpts.
 * This function replaces it with a cleaner ellipsis '...'.
 *
 * @param string $more The default excerpt more text.
 * @return string Modified excerpt more text.
 */
function custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

/**
 * Enqueue AOS (Animate On Scroll) library for scroll animations
 */
function add_aos_library()
{
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
if (! function_exists('mysite_register_blog_cpt')) {

    add_action('init', 'mysite_register_blog_cpt');
    add_action('init', 'mysite_register_blog_taxonomies');

    function mysite_register_blog_cpt()
    {
        $labels = array(
            'name'               => __('Blogs', 'ruhprimary'),
            'singular_name'      => __('Blog', 'ruhprimary'),
            'menu_name'          => __('Blogs', 'ruhprimary'),
            'add_new'            => __('Add New', 'ruhprimary'),
            'add_new_item'       => __('Add New Blog', 'ruhprimary'),
            'edit_item'          => __('Edit Blog', 'ruhprimary'),
            'new_item'           => __('New Blog', 'ruhprimary'),
            'view_item'          => __('View Blog', 'ruhprimary'),
            'all_items'          => __('All Blogs', 'ruhprimary'),
            'search_items'       => __('Search Blogs', 'ruhprimary'),
            'not_found'          => __('No blogs found.', 'ruhprimary'),
            'not_found_in_trash' => __('No blogs found in Trash.', 'ruhprimary'),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'show_in_rest'       => true,
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
            'has_archive'        => 'blog',
            'rewrite'            => array('slug' => 'blog', 'with_front' => false),
            'menu_icon'          => 'dashicons-welcome-write-blog',
        );

        register_post_type('blog', $args);
    }

    function mysite_register_blog_taxonomies()
    {
        register_taxonomy('blog_tag', 'blog', array(
            'label'        => __('Blog Tags', 'ruhprimary'),
            'rewrite'      => array('slug' => 'blog-tag', 'with_front' => false),
            'hierarchical' => false,
            'public'       => true,
            'show_in_rest' => true,
        ));

        register_taxonomy('collection', 'blog', array(
            'label'        => __('Collections', 'ruhprimary'),
            'rewrite'      => array('slug' => 'collection', 'with_front' => false),
            'hierarchical' => true,
            'public'       => true,
            'show_in_rest' => true,
        ));
    }
}

/**
 * Register Testimonial Custom Post Type
 */
function mysite_register_testimonial_cpt()
{
    $labels = array(
        'name'               => __('Testimonials', 'ruhprimary'),
        'singular_name'      => __('Testimonial', 'ruhprimary'),
        'menu_name'          => __('Testimonials', 'ruhprimary'),
        'add_new'            => __('Add New', 'ruhprimary'),
        'add_new_item'       => __('Add New Testimonial', 'ruhprimary'),
        'edit_item'          => __('Edit Testimonial', 'ruhprimary'),
        'new_item'           => __('New Testimonial', 'ruhprimary'),
        'view_item'          => __('View Testimonial', 'ruhprimary'),
        'all_items'          => __('All Testimonials', 'ruhprimary'),
        'search_items'       => __('Search Testimonials', 'ruhprimary'),
        'not_found'          => __('No testimonials found.', 'ruhprimary'),
        'not_found_in_trash' => __('No testimonials found in Trash.', 'ruhprimary'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'testimonials', 'with_front' => false),
        'menu_icon'          => 'dashicons-testimonial',
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'mysite_register_testimonial_cpt');


/**
 * Add Meta Boxes for Testimonial Fields
 */
function testimonial_custom_meta_boxes()
{
    add_meta_box(
        'testimonial_meta_box',
        __('Testimonial Details', 'ruhprimary'),
        'testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'testimonial_custom_meta_boxes');

/**
 * Callback to render meta fields
 */
function testimonial_meta_box_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'testimonial_nonce');

    $star_rating = get_post_meta($post->ID, '_testimonial_star_rating', true);
    $parent_name = get_post_meta($post->ID, '_testimonial_parent_name', true);
    $child_name  = get_post_meta($post->ID, '_testimonial_child_name', true);
?>

    <p>
        <label for="testimonial_star_rating"><?php _e('Star Rating (1–5)', 'ruhprimary'); ?></label><br>
        <select name="testimonial_star_rating" id="testimonial_star_rating">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <option value="<?php echo $i; ?>" <?php selected($star_rating, $i); ?>><?php echo $i; ?> <?php echo _n('Star', 'Stars', $i, 'ruhprimary'); ?></option>
            <?php endfor; ?>
        </select>
    </p>

    <p>
        <label for="testimonial_parent_name"><?php _e('Parent Name', 'ruhprimary'); ?></label><br>
        <input type="text" name="testimonial_parent_name" id="testimonial_parent_name" value="<?php echo esc_attr($parent_name); ?>" class="regular-text" />
    </p>

    <p>
        <label for="testimonial_child_name"><?php _e('Child Name', 'ruhprimary'); ?></label><br>
        <input type="text" name="testimonial_child_name" id="testimonial_child_name" value="<?php echo esc_attr($child_name); ?>" class="regular-text" />
    </p>

<?php
}

/**
 * Save custom testimonial fields
 */
function save_testimonial_meta($post_id)
{
    if (! isset($_POST['testimonial_nonce']) || ! wp_verify_nonce($_POST['testimonial_nonce'], basename(__FILE__))) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['testimonial_star_rating'])) {
        update_post_meta($post_id, '_testimonial_star_rating', intval($_POST['testimonial_star_rating']));
    }

    if (isset($_POST['testimonial_parent_name'])) {
        update_post_meta($post_id, '_testimonial_parent_name', sanitize_text_field($_POST['testimonial_parent_name']));
    }

    if (isset($_POST['testimonial_child_name'])) {
        update_post_meta($post_id, '_testimonial_child_name', sanitize_text_field($_POST['testimonial_child_name']));
    }
}
add_action('save_post', 'save_testimonial_meta');
