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

add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
    $elements_manager->add_category(
        'fos',
        [
            'title' => __( 'FOS Widgets', 'about-page-widget' ),
            'icon' => 'eicon-folder',
        ]
    );
});

// ✅ Register Slick and custom scripts/styles
add_action('elementor/frontend/after_register_scripts', function () {
    wp_register_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', ['jquery'], '1.8.1', true);
    wp_register_script('ruh-parent-community-js', plugin_dir_url(__FILE__) . 'assets/js/ruh-parent-community.js', ['jquery', 'slick-js'], '1.0', true);
});

add_action('elementor/frontend/after_register_styles', function () {
    wp_register_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', [], '1.8.1');
    wp_register_style('slick-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', [], '1.8.1');
});

// ✅ Load custom widget class
function ruh_register_custom_widgets($widgets_manager) {
    require_once(__DIR__ . '/page/page-parent-community.php');
    $widgets_manager->register(new \Elementor_Ruh_Parent_Community());
}
add_action('elementor/widgets/register', 'ruh_register_custom_widgets');


add_action('elementor/widgets/register', 'register_hello_widgets');
function register_hello_widgets($widgets_manager)
{
    require_once(__DIR__ . '/page/page-quick-links.php');
    require_once(__DIR__ . '/page/page-contact-us.php');
    require_once(__DIR__ . '/page/page-sports-curricular.php');
    require_once(__DIR__ . '/page/page-about-us.php');
    require_once(__DIR__ . '/page/page-school-life.php');
    require_once(__DIR__ . '/page/page-parent-community.php');
    require_once(__DIR__ . '/page/page-curriculum.php');
    require_once(__DIR__ . '/page/page-home.php');

    $widgets_manager->register(new \Elementor_Quick_Links_Page());
    $widgets_manager->register(new \Elementor_Contact_Us_Page());
    $widgets_manager->register(new \Elementor_Ruh_Sports_Widget());
    $widgets_manager->register(new \Elementor_About_Us_Page());
    $widgets_manager->register(new \Elementor_Life_At_RUH_Page());
    $widgets_manager->register(new \Elementor_Ruh_Parent_Community());
    $widgets_manager->register(new \Elementor_Ruh_Curriculum());
    $widgets_manager->register(new \Elementor_Home_Page_Widget());

    
}
