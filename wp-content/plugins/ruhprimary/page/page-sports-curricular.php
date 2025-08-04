<?php

/**
 * Description: A custom Elementor widget designed to showcase RUH’s sports and enrichment offerings. Includes a dynamic layout with sections like Hero, Sports Arena, Art Studio, Afterschool Programs, After School Highlights, and a Call-to-Action. Built to visually highlight athletic excellence, creative expression, and extended learning through an engaging Elementor interface.
 * Author: ruhprimary
 * Version: 1.0.0
 * Text Domain: ruhprimary
 */


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH')) exit;

class Elementor_Ruh_Sports_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'ruh_sports';
    }

    public function get_title()
    {
        return __('RUH Sports & Enrichment', 'ruh-widget');
    }

    public function get_icon()
    {
        return 'eicon-image-box';
    }

    public function get_categories()
    {
        return ['fos'];
    }

    protected function register_controls()
    {
        /**
         * Hero Section
         */
        $this->start_controls_section('section_hero', [
            'label' => __('Hero Section', 'ruh-widget')
        ]);
        $this->add_control('hero_image', [
            'label' => __('Hero Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA
        ]);
        $this->add_control('hero_text_top', [
            'label' => __('Top Text', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Built for Champions'
        ]);
        $this->add_control('hero_text_bottom', [
            'label' => __('Bottom Text', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Designed for Growth'
        ]);
        $this->end_controls_section();

        /**
         * Sports Arena
         */
        $this->start_controls_section('section_arena', [
            'label' => __('Sports Arena', 'ruh-widget')
        ]);
        $this->add_control('arena_logo', [
            'label' => __('Arena Logo', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA
        ]);
        $this->add_control('arena_image', [
            'label' => __('Main Arena Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA
        ]);
        $this->add_control('arena_tagline', [
            'label' => __('Tagline', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => 'The Pulse of Athletic Excellence'
        ]);
        $this->add_control('arena_description', [
            'label' => __('Description', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA
        ]);
        $this->add_control('arena_mission', [
            'label' => __('Mission', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA
        ]);
        $this->add_control('arena_group_image', [
            'label' => __('Group Photo', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA
        ]);
        $this->end_controls_section();

        /**
         * Art Studio
         */
        $this->start_controls_section('section_art', [
            'label' => __('Art Studio', 'ruh-widget')
        ]);
        $this->add_control('art_image_1', [
            'label' => __('Art Image 1', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA
        ]);
        $this->add_control('art_title', [
            'label' => __('Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => 'The Art Studio'
        ]);
        $this->add_control('art_description', [
            'label' => __('Description', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA
        ]);
        $this->add_control('art_note', [
            'label' => __('Creative Note', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA
        ]);
        $this->end_controls_section();

        /**
         * Afterschool Programs
         */
        $this->start_controls_section('section_programs', [
            'label' => __('Afterschool Programs', 'ruh-widget')
        ]);
        $this->add_control('programs_title', [
            'label' => __('Section Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Afterschool Programs'
        ]);
        $this->add_control('programs_subtitle', [
            'label' => __('Section Subtitle', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => 'From sports to music and theatre, our afterschool programmes spark passion and growth.'
        ]);

        $repeater = new Repeater();
        $repeater->add_control('title', [
            'label' => __('Program Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT
        ]);
        $repeater->add_control('icon', [
            'label' => __('Program Icon', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA
        ]);
        $repeater->add_control('description', [
            'label' => __('Program Description', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA
        ]);

        $this->add_control('program_list', [
            'label' => __('Programs List', 'ruh-widget'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ title }}}'
        ]);
        $this->end_controls_section();


        /**
         * Section: After School
         */
        $this->start_controls_section('section_after_school', [
            'label' => __('After School', 'ruh-widget'),
        ]);

        $this->add_control('after_title', [
            'label' => __('Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('after_button_text', [
            'label' => __('Button Text', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('after_image', [
            'label' => __('Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->end_controls_section();


        /**
         * CTA Section
         */
        $this->start_controls_section('section_cta', [
            'label' => __('CTA Section', 'ruh-widget')
        ]);
        $this->add_control('cta_title', [
            'label' => __('CTA Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => 'After School and Beyond Limits!'
        ]);
        $this->add_control('cta_title_tag', [
            'label' => __('Title HTML Tag', 'ruh-widget'),
            'type' => Controls_Manager::SELECT,
            'options' => ['h1' => 'H1', 'h2' => 'H2', 'h3' => 'H3'],
            'default' => 'h2'
        ]);
        $this->add_control('cta_content', [
            'label' => __('CTA Content', 'ruh-widget'),
            'type' => Controls_Manager::WYSIWYG
        ]);
        $this->add_control('cta_button_text', [
            'label' => __('Button Text', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Enroll Today'
        ]);
        $this->add_control('cta_button_url', [
            'label' => __('Button URL', 'ruh-widget'),
            'type' => Controls_Manager::URL
        ]);
        $this->add_control('cta_image', [
            'label' => __('CTA Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA
        ]);
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <!-- Hero Section -->
        <section class="hero">
            <?php if (!empty($settings['hero_image']['url'])) : ?>
                <img
                    src="<?php echo esc_url($settings['hero_image']['url']); ?>"
                    alt="<?php echo esc_attr($settings['hero_image']['alt']); ?>"
                    class="hero__image">
            <?php endif; ?>

            <div class="container hero__text">
                <p class="hero__subtext"><?php echo esc_html($settings['hero_text_top']); ?></p>
                <p class="hero__subtext"><?php echo esc_html($settings['hero_text_bottom']); ?></p>
            </div>
        </section>

        <!-- Sports Arena Section -->
        <section class="sports-arena">
            <h1 class="sports-arena__title">
                <span class="sports-arena__brand">Ruh<span class="sports-arena__highlight">ftop</span></span>
                <span class="sports-arena__heading">Sports</span>
                <span class="sports-arena__heading">Arena</span>
            </h1>

            <div class="container">
                <?php if (!empty($settings['arena_logo']['url'])) : ?>
                    <img
                        class="sports-arena__logo"
                        src="<?php echo esc_url($settings['arena_logo']['url']); ?>"
                        alt="<?php echo esc_attr($settings['arena_logo']['alt']); ?>">
                <?php endif; ?>

                <?php if (!empty($settings['arena_image']['url'])) : ?>
                    <div class="sports-arena__image-wrapper bouncing-element" data-aos="fade-up" data-aos-once="false">
                        <img
                            src="<?php echo esc_url($settings['arena_image']['url']); ?>"
                            alt="<?php echo esc_attr($settings['arena_image']['alt']); ?>"
                            class="sports-arena__image">
                    </div>
                <?php endif; ?>
            </div>

            <div class="sports-arena__content" data-aos="fade-up">
                <div class="container">
                    <p class="sports-arena__description"><?php echo esc_html($settings['arena_description']); ?></p>
                    <p class="sports-arena__mission"><?php echo esc_html($settings['arena_mission']); ?></p>

                    <?php if (!empty($settings['arena_group_image']['url'])) : ?>
                        <div class="sports-arena__group-photo">
                            <img
                                src="<?php echo esc_url($settings['arena_group_image']['url']); ?>"
                                alt="<?php echo esc_attr($settings['arena_group_image']['alt']); ?>"
                                class="sports-arena__group-image">

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Art Studio Section -->
        <section class="art-studio" data-aos="fade-up">
            <div class="container">
                <div class="art-studio__gallery">
                    <?php if (!empty($settings['art_image_1']['url'])) : ?>
                        <img
                            src="<?php echo esc_url($settings['art_image_1']['url']); ?>"
                            alt="<?php echo esc_attr($settings['art_image_1']['alt']); ?>"
                            class="art-studio__image">

                    <?php endif; ?>
                </div>

                <h2 class="art-studio__title"><?php echo esc_html($settings['art_title']); ?></h2>
                <p class="art-studio__description"><?php echo esc_html($settings['art_description']); ?></p>
                <p class="art-studio__note"><?php echo esc_html($settings['art_note']); ?></p>
            </div>
        </section>

        <!-- Afterschool Programs Section -->
        <?php if (!empty($settings['program_list'])) : ?>
            <section class="afterschool-programs" data-aos="fade-up">
                <div class="afterschool-programs__container container">
                    <h2 class="afterschool-programs__title"><?php echo esc_html($settings['programs_title']); ?></h2>
                    <p class="afterschool-programs__subtitle"><?php echo esc_html($settings['programs_subtitle']); ?></p>

                    <ul class="afterschool-programs__list">
                        <?php $delay = 0; ?>
                        <?php foreach ($settings['program_list'] as $program) : ?>
                            <li class="afterschool-programs__item" data-aos="fade-up" data-aos-delay="<?php echo esc_attr($delay); ?>">
                                <p class="afterschool-programs__item-title"><?php echo esc_html($program['title']); ?></p>

                                <?php if (!empty($program['icon']['url'])) : ?>
                                    <?php
                                    $icon = $program['icon'];
                                    $alt = !empty($icon['alt']) ? $icon['alt'] : $program['title'] . ' icon';
                                    ?>

                                    <img class="afterschool-programs__item-icon" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($alt); ?>">

                                <?php endif; ?>

                                <p class="afterschool-programs__item-desc"><?php echo esc_html($program['description']); ?></p>
                            </li>
                            <?php $delay += 100; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        <?php endif; ?>

        <!-- After School Section -->
        <section class="after-school" data-aos="fade-up">
            <div class="after-school__container container">
                <div class="content">
                    <?php if (!empty($settings['after_title'])) : ?>
                        <h2 class="after-school__title"><?php echo esc_html($settings['after_title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['after_button_text'])) : ?>
                        <button class="after-school__button"><?php echo esc_html($settings['after_button_text']); ?></button>
                    <?php endif; ?>
                </div>

                <?php if (!empty($settings['after_image']['url'])) : ?>
                    <img
                        class="after-school__image"
                        src="<?php echo esc_url($settings['after_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['after_image']['alt']); ?>">

                <?php endif; ?>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="info-section container-fluid" data-aos="fade-up">
            <div class="info-section__container container">

                <?php if (!empty($settings['cta_image']['url'])) : ?>
                    <img
                        class="info-section__image"
                        src="<?php echo esc_url($settings['cta_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['cta_image']['alt']); ?>">

                <?php endif; ?>

                <div class="info-section__content">
                    <?php if (!empty($settings['cta_title'])) : ?>
                        <?php $tag = !empty($settings['cta_title_tag']) ? $settings['cta_title_tag'] : 'h2'; ?>
                        <<?php echo tag_escape($tag); ?> class="info-section__title"><?php echo esc_html($settings['cta_title']); ?></<?php echo tag_escape($tag); ?>>
                    <?php endif; ?>

                    <?php if (!empty($settings['cta_content'])) : ?>
                        <div class="info-section__text"><?php echo wp_kses_post($settings['cta_content']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($settings['cta_button_url']['url'])) : ?>
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
