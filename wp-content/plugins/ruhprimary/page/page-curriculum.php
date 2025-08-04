<?php

/**
 * Description: A custom Elementor widget that builds a comprehensive curriculum page layout. Includes modular sections such as "Way of Learning", "Years Curriculum", "Primary Years Curriculum", "Learning Methodologies", "Diversity in Learning", and "Experiential Learning". Also includes support for video, image galleries, and a customizable Call-to-Action (CTA).
 * Author: ruhprimary
 * Version: 1.0.0
 * Text Domain: ruhprimary
 */


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit;

class Elementor_Ruh_Curriculum extends Widget_Base
{

    public function get_name()
    {
        return 'ruh_curriculum';
    }

    public function get_title()
    {
        return __('Ruh Curriculum', 'ruh-widget');
    }

    public function get_icon()
    {
        return 'eicon-book-open';
    }

    public function get_categories()
    {
        return ['fos'];
    }

    public function get_script_depends()
    {
        return ['slick-js', 'ruh-parent-community-js'];
    }

    public function get_style_depends()
    {
        return ['slick-css', 'slick-theme-css'];
    }

    protected function register_controls()
    {

        // Header
        $this->start_controls_section('header_section', ['label' => __('Header', 'ruh-widget')]);
        $this->add_control('header_title', ['label' => __('Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);
        $this->add_control('header_image', ['label' => __('Image', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $this->end_controls_section();

        // Way of Learning
        $this->start_controls_section('way_of_learning', ['label' => __('Way of Learning', 'ruh-widget')]);
        $this->add_control('way_image', ['label' => __('Image', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $this->add_control('way_title', ['label' => __('Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);
        $this->add_control('way_content', ['label' => __('Content', 'ruh-widget'), 'type' => Controls_Manager::WYSIWYG]);
        $this->end_controls_section();

        // Years Curriculum
        $this->start_controls_section('years_curriculum', ['label' => __('Years Curriculum', 'ruh-widget')]);
        $this->add_control('years_image', ['label' => __('Image', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $this->add_control('years_title', ['label' => __('Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);
        $this->add_control('years_content', ['label' => __('Content', 'ruh-widget'), 'type' => Controls_Manager::WYSIWYG]);
        $this->end_controls_section();

        // New Way Learning (image or video)
        $this->start_controls_section('new_way_learning', ['label' => __('New Way Learning', 'ruh-widget')]);
        $this->add_control('new_way_image', ['label' => __('Image (Fallback or Poster)', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $this->add_control('new_way_video', ['label' => __('Video', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $this->end_controls_section();

        // Primary Years Curriculum
        $this->start_controls_section('primary_years_curriculum', ['label' => __('Primary Years Curriculum', 'ruh-widget')]);
        $this->add_control('primary_image', ['label' => __('Image', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $this->add_control('primary_title', ['label' => __('Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);
        $this->add_control('primary_content', ['label' => __('Content', 'ruh-widget'), 'type' => Controls_Manager::WYSIWYG]);
        $this->end_controls_section();

        // Learning Methodologies
        $this->start_controls_section('learning_methodologies', ['label' => __('Learning Methodologies', 'ruh-widget')]);
        $this->add_control('methodologies_title', ['label' => __('Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);
        $this->add_control('methodologies_content', ['label' => __('Content', 'ruh-widget'), 'type' => Controls_Manager::WYSIWYG]);

        $repeater = new Repeater();
        $repeater->add_control('method_image', ['label' => __('Method Image', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $repeater->add_control('method_title', ['label' => __('Method Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);

        $this->add_control('methodology_items', [
            'label' => __('Methodologies', 'ruh-widget'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [],
            'title_field' => '{{{ method_title }}}'
        ]);
        $this->end_controls_section();

        // Diversity in Learning
        $this->start_controls_section('diversity_learning', ['label' => __('Diversity in Learning', 'ruh-widget')]);
        $this->add_control('diversity_image', ['label' => __('Image', 'ruh-widget'), 'type' => Controls_Manager::MEDIA]);
        $this->add_control('diversity_title', ['label' => __('Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);
        $this->add_control('diversity_content', ['label' => __('Content', 'ruh-widget'), 'type' => Controls_Manager::WYSIWYG]);
        $this->add_control('diversity_content_2', ['label' => __('Additional Content', 'ruh-widget'), 'type' => Controls_Manager::WYSIWYG]);
        $this->end_controls_section();

        // Experiential Learning
        $this->start_controls_section('experiential_learning', ['label' => __('Experiential Learning', 'ruh-widget')]);
        $this->add_control('experiential_title', ['label' => __('Title', 'ruh-widget'), 'type' => Controls_Manager::TEXT]);
        $this->add_control('experiential_content', ['label' => __('Content', 'ruh-widget'), 'type' => Controls_Manager::WYSIWYG]);
        $this->add_control('experiential_gallery', ['label' => __('Gallery Images', 'ruh-widget'), 'type' => Controls_Manager::GALLERY]);
        $this->end_controls_section();


        /* === Curious To Know === */
        $this->start_controls_section('section_cta', [
            'label' => __('Curious To Know', 'about-page-widget'),
        ]);

        $this->add_control('cta_title', [
            'label' => __('Title', 'about-page-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('cta_content', [
            'label' => __('Content', 'about-page-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->add_control('cta_button_text', [
            'label' => __('Button Text', 'about-page-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Learn More', 'about-page-widget'),
        ]);

        $this->add_control('cta_button_url', [
            'label' => __('Button URL', 'about-page-widget'),
            'type' => Controls_Manager::URL,
        ]);

        $this->add_control('cta_image', [
            'label' => __('Image', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);


        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <!-- Header Section -->
        <section class="curriculum__header">
            <div class="curriculum__header-container">
                <?php if ($settings['header_image']['url']): ?>
                    <img
                        class="curriculum__header-image"
                        src="<?php echo esc_url($settings['header_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['header_image']['alt']); ?>">

                <?php endif; ?>
                <?php if ($settings['header_title']): ?>
                    <h2 class="curriculum__header-title"><?php echo esc_html($settings['header_title']); ?></h2>
                <?php endif; ?>
            </div>
        </section>

        <!-- Way of Learning -->
        <section class="curriculum__way" data-aos="fade-up">
            <div class="container curriculum__way-container">
                <div class="content">
                    <h3 class="curriculum__way-titleWrapper"><svg width="136" height="50" viewBox="0 0 136 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M113.4 23H116.56L114.56 28.24H112.32L113.4 23ZM119.035 45.2L121.115 43.96C121.715 45.6 123.955 47.08 126.835 47.08C129.675 47.08 131.155 46.04 131.155 43.96C131.155 41.64 127.835 41.12 126.115 40.64C124.395 40.16 119.715 39.28 119.715 35.44C119.715 32 122.675 30.24 126.675 30.24C130.395 30.24 132.955 31.88 133.755 33.88L131.715 35.08C131.195 33.76 129.115 32.56 126.595 32.56C123.995 32.56 122.555 33.6 122.555 35.32C122.555 37.48 125.595 37.96 127.315 38.44C129.035 38.92 133.955 39.92 133.955 43.88C133.955 47.56 131.355 49.48 126.795 49.48C122.635 49.48 119.955 47.64 119.035 45.2Z" fill="black" />
                            <path d="M81.3401 0.0173225C81.3401 0.519798 77.0707 2.77228 75.1068 2.77228V2.89356C76.6438 2.89356 77.0878 4.76485 77.2073 15.3688V22.3168C75.4142 24.1881 73.8772 26.3193 72.3915 28.5198C70.6667 31.2054 69.1126 34.0297 67.5756 36.6634V15.6807H67.4561C67.4561 16.1832 63.1867 18.4356 61.2228 18.4356V18.5569H61.3594C63.0843 18.5569 63.255 18.7302 63.255 32.349V43.2475C60.8471 46.3144 58.0635 48.3243 54.426 48.3243C50.7885 48.3243 45.7848 47.198 45.836 33.354L45.9043 15.6807H45.7848C45.7848 16.1832 41.5154 18.3663 39.5515 18.3663V18.4876C41.5837 18.4876 41.5837 18.8688 41.5837 32.8342C41.5837 46.7995 45.4091 49 53.8795 49C62.3499 49 66.7901 37.7896 72.8355 28.5025C74.2017 26.4406 75.7387 24.5 77.2757 22.7327C80.7936 18.9035 85.3704 16.599 89.8105 16.599C96.1634 16.599 99.6301 21.6064 99.6301 31.3267L99.5618 34.7748C99.3739 44.9282 99.2544 47.9257 97.5296 47.9257L97.5979 48.047H106V47.9257C104.275 47.9257 103.968 44.9109 103.968 34.7748L103.899 31.3267C103.899 19.6139 98.8274 15.7846 91.7915 15.7846C84.7556 15.7846 84.3116 16.9109 81.4767 18.7302V0H81.3572L81.3401 0.0173225ZM81.4596 20.7054C80.0934 21.7797 77.1903 24.5173 77.1903 24.6559V34.8094C77.1903 44.9629 76.8146 47.9604 75.0897 47.9604V48.0817H83.4919V47.9604C81.767 47.9604 81.4596 44.9455 81.4596 34.8094V20.7054ZM14.6354 1.83663C11.3565 1.83663 5.43064 2.77228 0 2.77228V2.89356C1.72483 2.89356 2.10053 5.90842 2.10053 16.1139V34.7921C2.10053 44.9455 1.72483 47.9431 0 47.9431V48.0644H8.45336V47.9431C6.72853 47.9431 6.35283 44.9282 6.42114 34.7921V7.34653C6.42114 3.27475 9.20477 2.2698 13.8328 2.2698C22.1154 2.2698 28.3486 5.21534 28.3486 12.6139C28.2803 24.0842 7.47994 24.5173 7.53118 28.4678C7.53118 29.3861 8.0435 29.7327 8.89737 29.7327C11.681 29.7327 17.9997 25.9554 21.2444 25.9554H21.3127C23.9085 26.0248 24.3354 27.8267 25.7529 31.5347C29.6978 42.2426 31.6787 47.9604 29.6465 47.9604V48.0817H38.0999V47.9604C35.3163 47.9604 33.3523 39.1238 30.193 30.6683C28.4682 26.0248 26.4872 24.5866 23.584 24.5866H23.4645C19.4342 24.5866 11.6468 29.2995 8.93153 29.2995C6.21621 29.2995 7.95811 29.0569 7.95811 28.4851C7.95811 25.1584 32.7888 22.5421 32.84 12.5099C32.84 5.11138 23.14 1.85396 14.6183 1.85396L14.6354 1.83663Z" fill="#913412" />
                        </svg><span class="curriculum__way-title">
                            <?php echo esc_html($settings['way_title']); ?></span></h3>
                    <div class="curriculum__way-content"><?php echo wp_kses_post($settings['way_content']); ?></div>
                </div>
                <?php if ($settings['way_image']['url']): ?>
                    <img
                        class="curriculum__way-image"
                        src="<?php echo esc_url($settings['way_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['way_image']['alt']); ?>">

                <?php endif; ?>
            </div>
        </section>

        <!-- Years Curriculum -->
        <section class="curriculum__years" data-aos="fade-up">
            <div class="container curriculum__years-container">
                <?php if ($settings['years_image']['url']): ?>
                    <img
                        class="curriculum__years-image"
                        src="<?php echo esc_url($settings['years_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['years_image']['alt']); ?>">

                <?php endif; ?>
                <div class="content">
                    <h3 class="curriculum__years-title"><?php echo esc_html($settings['years_title']); ?></h3>
                    <div class="curriculum__years-content"><?php echo wp_kses_post($settings['years_content']); ?></div>
                </div>
            </div>
        </section>

        <!-- New Way Learning -->
        <section class="curriculum__new-way" data-aos="fade-up">
            <div class="container curriculum__new-way-container">
                <?php if ($settings['new_way_video']['url']): ?>
                    <video class="curriculum__new-way-video" poster="<?php echo esc_url($settings['new_way_image']['url']); ?>">
                        <source src="<?php echo esc_url($settings['new_way_video']['url']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php elseif ($settings['new_way_image']['url']): ?>
                    <img
                        class="curriculum__new-way-image"
                        src="<?php echo esc_url($settings['new_way_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['new_way_image']['alt']); ?>">

                <?php endif; ?>
            </div>
        </section>

        <!-- Primary Years Curriculum -->
        <section class="curriculum__primary" data-aos="fade-up">
            <div class="container curriculum__primary-container">
                <div class="content">
                    <h3 class="curriculum__primary-title"><?php echo esc_html($settings['primary_title']); ?></h3>
                    <div class="curriculum__primary-content"><?php echo wp_kses_post($settings['primary_content']); ?></div>
                </div>
                <?php if ($settings['primary_image']['url']): ?>
                    <img
                        class="curriculum__primary-image"
                        src="<?php echo esc_url($settings['primary_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['primary_image']['alt']); ?>">

                <?php endif; ?>
            </div>
        </section>

        <!-- Learning Methodologies -->
        <section class="curriculum__methodologies" data-aos="fade-up">
            <div class="curriculum__methodologies-contentWrapper container">
                <h3 class="curriculum__methodologies-title"><?php echo esc_html($settings['methodologies_title']); ?></h3>
                <div class="curriculum__methodologies-content"><?php echo wp_kses_post($settings['methodologies_content']); ?></div>
            </div>
            <div class="curriculum__methodologies-gallery container">
                <?php if (!empty($settings['methodology_items'])): ?>
                    <div class="curriculum__methodologies-items">
                        <?php foreach ($settings['methodology_items'] as $item): ?>
                            <div class="curriculum__methodologies-item">
                                <?php if (!empty($item['method_image']['url'])): ?>
                                    <img
                                        class="curriculum__methodologies-item-image"
                                        src="<?php echo esc_url($item['method_image']['url']); ?>"
                                        alt="<?php echo esc_attr($item['method_image']['alt']); ?>">

                                <?php endif; ?>
                                <h4 class="curriculum__methodologies-item-title"><?php echo esc_html($item['method_title']); ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Diversity in Learning -->
        <section class="curriculum__diversity" data-aos="fade-up">
            <div class="container curriculum__diversity-container">
                <h3 class="curriculum__diversity-container-title"><?php echo wp_kses_post($settings['diversity_title']); ?></h3>
                <p class="curriculum__diversity-container-content"><?php echo wp_kses_post($settings['diversity_content']); ?></p>
            </div>
            <div class="container-fluid curriculum__diversity-container2">
                <div class="container">
                    <?php if ($settings['diversity_image']['url']): ?>
                        <img
                            class="curriculum__diversity-container2-image"
                            src="<?php echo esc_url($settings['diversity_image']['url']); ?>"
                            alt="<?php echo esc_attr($settings['diversity_image']['alt']); ?>">

                    <?php endif; ?>
                    <div class="curriculum__diversity-content-2"><?php echo wp_kses_post($settings['diversity_content_2']); ?></div>
                </div>
            </div>
        </section>

        <!-- Experiential Learning -->
        <section class="curriculum__experiential" data-aos="fade-up">
            <div class="container curriculum__experiential-content">
                <h3 class="curriculum__experiential-title"><?php echo esc_html($settings['experiential_title']); ?></h3>
                <?php echo wp_kses_post($settings['experiential_content']); ?>
            </div>
            <div class="container-fluid curriculum__experiential-gallery">
                <?php if (!empty($settings['experiential_gallery'])): ?>
                    <div class="owl-carousel">
                        <?php foreach ($settings['experiential_gallery'] as $image): ?>
                            <img
                                class="curriculum__experiential-gallery-image"
                                src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>">

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="info-section container-fluid" data-aos="fade-up">
            <div class="info-section__container container">
                <?php if (!empty($settings['cta_image']['url'])): ?>
                    <img
                        class="info-section__image"
                        src="<?php echo esc_url($settings['cta_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['cta_image']['alt']); ?>">
                <?php endif; ?>

                <div class="info-section__content">
                    <?php if (!empty($settings['cta_title'])): ?>
                        <h2 class="info-section__title"><?php echo esc_html($settings['cta_title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['cta_content'])): ?>
                        <div class="info-section__text">
                            <?php echo wp_kses_post($settings['cta_content']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['cta_button_url']['url'])): ?>
                        <a href="<?php echo esc_url($settings['cta_button_url']['url']); ?>" class="info-section__link">
                            <?php echo esc_html($settings['cta_button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>


<?php
    }
}
