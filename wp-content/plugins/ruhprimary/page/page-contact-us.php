<?php

/**
 * Description: A custom Elementor widget that displays a contact section with a customizable heading, a Contact Form 7 form selector, and an Admissions information block with optional image. Ideal for education websites or admission-focused landing pages.
 * Author: ruhprimary
 * Version: 1.0.0
 * Text Domain: ruhprimary
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
        $settings = $this->get_settings_for_display();
?>

        <div class="contact-us-widget">
            <div class="container">

                <?php if (!empty($settings['main_heading'])) : ?>
                    <div>
                        <?php echo wp_kses_post($settings['main_heading']); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($settings['selected_form_id']) && intval($settings['selected_form_id']) > 0) : ?>
                    <?php echo do_shortcode('[contact-form-7 id="' . intval($settings['selected_form_id']) . '"]'); ?>
                <?php endif; ?>

            </div>

            <?php if (!empty($settings['admissions_text']) || !empty($settings['admissions_image']['url'])) : ?>
                <div class="admissions-section" data-aos="fade-up">
                    <div class="container">
                        <?php if (!empty($settings['admissions_image']['url'])) : ?>
                            <img
                                src="<?php echo esc_url($settings['admissions_image']['url']); ?>"
                                alt="<?php echo esc_attr($settings['admissions_image']['alt']); ?>">

                        <?php endif; ?>

                        <?php if (!empty($settings['admissions_text'])) : ?>
                            <div class="admissions-text">
                                <?php echo wp_kses_post($settings['admissions_text']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

<?php
    }
}
