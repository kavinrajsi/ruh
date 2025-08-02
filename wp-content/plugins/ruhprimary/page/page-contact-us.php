<?php

/**
 * Description: An Elementor widget with a heading, CF7 form selector, and an Admissions info section with image.
 * Author: Your Name
 * Version: 1.1.0
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) {
    exit;
}

class Elementor_Contact_Us_Page extends Widget_Base
{

    public function get_name()
    {
        return 'contact_us';
    }

    public function get_title()
    {
        return __('Contact Us', 'contact-us-widget');
    }

    public function get_icon()
    {
        return 'eicon-mail';
    }

    public function get_categories()
    {
        return ['fos'];
    }

    protected function register_controls()
    {

        /* === Section: Header === */
        $this->start_controls_section('section_header', [
            'label' => __('Left Side Content', 'contact-us-widget'),
        ]);

        $this->add_control('main_heading', [
            'label' => __('Main Heading', 'contact-us-widget'),
            'type' => Controls_Manager::WYSIWYG,
            'default' => "Let's make learning personal\nfor your Ruh'ler",
            'rows' => 3,
        ]);

        $this->add_control('divider_image', [
            'label' => __('Divider Image Below Heading', 'contact-us-widget'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => '',
            ],
        ]);

        $this->end_controls_section();

        /* === Section: Contact Form 7 === */
        $this->start_controls_section('section_form', [
            'label' => __('Contact Form', 'contact-us-widget'),
        ]);

        $forms = get_posts([
            'post_type'   => 'wpcf7_contact_form',
            'numberposts' => -1,
        ]);

        $form_options = [];
        if ($forms) {
            foreach ($forms as $form) {
                $form_options[$form->ID] = $form->post_title;
            }
        } else {
            $form_options[0] = __('No Contact Form 7 forms found', 'contact-us-widget');
        }

        $this->add_control('selected_form_id', [
            'label'   => __('Choose Form', 'contact-us-widget'),
            'type'    => Controls_Manager::SELECT,
            'options' => $form_options,
            'default' => array_key_first($form_options),
        ]);

        $this->end_controls_section();

        /* === Section: Admissions Info === */
        $this->start_controls_section('section_admissions', [
            'label' => __('Admissions Info', 'contact-us-widget'),
        ]);

        $this->add_control('admissions_text', [
            'label' => __('Admissions Notice Text', 'contact-us-widget'),
            'type' => Controls_Manager::WYSIWYG,
            'default' => "Admissions open for 2025–26\n+91 73958 05531",
            'rows' => 4,
        ]);

        $this->add_control('admissions_image', [
            'label' => __('Admissions Image', 'contact-us-widget'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => '',
            ],
        ]);

        $this->end_controls_section();
    }

    protected function render()
    {
        $s = $this->get_settings_for_display();

        echo '<div class="contact-us-widget">';

        echo '<div class="container">';
        // Main Heading
        if (!empty($s['main_heading'])) {
            echo '<div>' . wp_kses_post($s['main_heading']) . '';
        }

        // Divider Image (below heading)
        if (!empty($s['divider_image']['url'])) {
            echo '<div class="divider-image">';
            echo '<img src="' . esc_url($s['divider_image']['url']) . '" alt="Divider">';
            echo '</div></div>';
        }

        // Contact Form
        if (!empty($s['selected_form_id']) && intval($s['selected_form_id']) > 0) {
            echo do_shortcode('[contact-form-7 id="' . intval($s['selected_form_id']) . '"]');
        }
        echo '</div>';

        // Admissions Section
        if (!empty($s['admissions_text']) || !empty($s['admissions_image']['url'])) {
            echo '<div class="admissions-section" data-aos="fade-up">';
            echo '<div class="container">';
            if (!empty($s['admissions_image']['url'])) {
                echo '<img src="' . esc_url($s['admissions_image']['url']) . '" alt="Admissions Image">';
            }
            if (!empty($s['admissions_text'])) {
                echo '<div class="admissions-text">' . wp_kses_post($s['admissions_text']) . '</div>';
            }
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    }
}
