<?php

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
        $s = $this->get_settings_for_display();

        // Hero Section
        echo '<section class="hero">';
        if (!empty($s['hero_image']['url'])) {
            echo '<img src="' . esc_url($s['hero_image']['url']) . '" alt="" class="hero__image">';
        }
        echo '<div class="container hero__text">';
        echo '<p class="hero__subtext">' . esc_html($s['hero_text_top']) . '</p>';
        echo '<p class="hero__subtext">' . esc_html($s['hero_text_bottom']) . '</p>';
        echo '</div>';
        echo '</section>';

        // Sports Arena Section
        echo '<section class="sports-arena">';

        echo '<h1 class="sports-arena__title">';
        echo '<span class="sports-arena__brand">Ruh<span class="sports-arena__highlight">ftop</span></span>';
        echo '<span class="sports-arena__heading">Sports</span>';
        echo '<span class="sports-arena__heading">Arena</span>';
        echo '</h1>';

        echo '<div class="container">';
        if (!empty($s['arena_logo']['url'])) {
            echo '<img class="sports-arena__logo" src="' . esc_url($s['arena_logo']['url']) . '" alt="Sports Arena Logo">';
        }

        echo '<div class="sports-arena__image-wrapper">';
        if (!empty($s['arena_image']['url'])) {
            echo '<img src="' . esc_url($s['arena_image']['url']) . '" class="sports-arena__image">';
        }
        echo '</div></div>';

        echo '<div class="sports-arena__content"><div class="container">';
        echo '<p class="sports-arena__description">' . esc_html($s['arena_description']) . '</p>';
        echo '<p class="sports-arena__mission">' . esc_html($s['arena_mission']) . '</p>';
        if (!empty($s['arena_group_image']['url'])) {
            echo '<div class="sports-arena__group-photo">';
            echo '<img src="' . esc_url($s['arena_group_image']['url']) . '" class="sports-arena__group-image">';
            echo '</div>';
        }
        echo '</div></div>';
        echo '</section>';

        // Art Studio Section
        echo '<section class="art-studio"><div class="container">';
        echo '<div class="art-studio__gallery">';
        if (!empty($s['art_image_1']['url'])) {
            echo '<img src="' . esc_url($s['art_image_1']['url']) . '" class="art-studio__image">';
        }
        echo '</div>';
        echo '<h2 class="art-studio__title">' . esc_html($s['art_title']) . '</h2>';
        echo '<p class="art-studio__description">' . esc_html($s['art_description']) . '</p>';
        echo '<p class="art-studio__note">' . esc_html($s['art_note']) . '</p>';
        echo '</div></section>';

        // Afterschool Programs Section
        if (!empty($s['program_list'])) {
            echo '<section class="afterschool-programs">';
            echo '<div class="afterschool-programs__container container">';
            echo '<h2 class="afterschool-programs__title">' . esc_html($s['programs_title']) . '</h2>';
            echo '<p class="afterschool-programs__subtitle">' . esc_html($s['programs_subtitle']) . '</p>';
            echo '<ul class="afterschool-programs__list">';

            foreach ($s['program_list'] as $program) {
                echo '<li class="afterschool-programs__item">';
                echo '<p class="afterschool-programs__item-title">' . esc_html($program['title']) . '</p>';
                if (!empty($program['icon']['url'])) {
                    echo '<img class="afterschool-programs__item-icon" src="' . esc_url($program['icon']['url']) . '" alt="' . esc_attr($program['title']) . ' icon">';
                }
                echo '<p class="afterschool-programs__item-desc">' . esc_html($program['description']) . '</p>';
                echo '</li>';
            }

            echo '</ul></div></section>';
        }

        // CTA Section
        echo "<section class='info-section container-fluid'>";
        echo "<div class='info-section__container container'>";

        if (!empty($s['cta_image']['url'])) echo '<img class="info-section__image" src="' . esc_url($s['cta_image']['url']) . '" alt="">';
        echo "<div class='info-section__content'>";
        if (!empty($s['cta_title'])) {
            $tag = !empty($s['cta_title_tag']) ? $s['cta_title_tag'] : 'h2';
            echo '<h2 class="info-section__title">' . esc_html($s['cta_title']) . '</h2>';
        }
        if (!empty($s['cta_content'])) echo '<div class="info-section__text">' . wp_kses_post($s['cta_content']) . '</div>';
        if (!empty($s['cta_button_url']['url'])) echo '<a href="' . esc_url($s['cta_button_url']['url']) . '" class="info-section__link">' . esc_html($s['cta_button_text']) . '</a>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }
}
