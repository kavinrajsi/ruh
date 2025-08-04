<?php
/**
 * Plugin Name: Ruhprimary Addon
 * Description: A simple addon adding Hello‑World widgets.
 * Version:     1.0.0
 * Author:      ruhprimary
 * Requires Plugins: elementor
 */

// Avoid direct file access
if (! defined('ABSPATH')) exit;

/**
 * Register Custom Elementor Category
 */
add_action('elementor/elements/categories_registered', function($elements_manager) {
    $elements_manager->add_category(
        'fos',
        [
            'title' => __('FOS Widgets', 'ruhprimary'),
            'icon'  => 'eicon-folder',
        ]
    );
});

/**
 * Register Scripts & Styles
 */
add_action('elementor/frontend/after_register_scripts', function () {
    wp_register_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['jquery'], '2.3.4', true);
    wp_register_script('ruh-parent-community-js', plugin_dir_url(__FILE__) . 'assets/js/ruh-parent-community.js', ['jquery', 'slick-js'], '1.0', true);
});

add_action('elementor/frontend/after_register_styles', function () {
    wp_register_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], '2.3.4');
    wp_register_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], '2.3.4');
});

/**
 * Load and Register Custom Widgets
 */
add_action('elementor/widgets/register', function($widgets_manager) {

    // Widget file paths
    $widget_files = [
        'page/page-home.php',
        'page/page-parent-community.php',
        'page/page-curriculum.php',
        'page/page-about-us.php',
        'page/page-school-life.php',
        'page/page-sports-curricular.php',
        'page/page-contact-us.php',
        'page/page-quick-links.php',
    ];

    // Require each widget file
    foreach ($widget_files as $file) {
        $path = __DIR__ . '/' . $file;
        if (file_exists($path)) {
            require_once $path;
        }
    }

    // Register each widget class
    $widgets_manager->register(new \Elementor_Home_Page_Widget());
    $widgets_manager->register(new \Elementor_Ruh_Parent_Community());
    $widgets_manager->register(new \Elementor_Ruh_Curriculum());
    $widgets_manager->register(new \Elementor_About_Us_Page());
    $widgets_manager->register(new \Elementor_Life_At_RUH_Page());
    $widgets_manager->register(new \Elementor_Ruh_Sports_Widget());
    $widgets_manager->register(new \Elementor_Contact_Us_Page());
    $widgets_manager->register(new \Elementor_Quick_Links_Page());

});
