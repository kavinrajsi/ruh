<?php

/**
 * Description: An Elementor widget with a title, intro text, IB mission, and IB resource links for learners and parents.
 * Author: Your Name
 * Version: 1.1.0
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit;

class Elementor_Quick_Links_Page extends Widget_Base {

    public function get_name() {
        return 'quick_links';
    }

    public function get_title() {
        return __( 'Quick Links', 'quick-links-widget' );
    }

    public function get_icon() {
        return 'eicon-link';
    }

    public function get_categories() {
        return [ 'fos' ];
    }

    protected function register_controls() {

        /* === Section: Intro === */
        $this->start_controls_section('section_intro', [
            'label' => __( 'Intro Section', 'quick-links-widget' ),
        ]);

        $this->add_control('title', [
            'label' => __( 'Title', 'quick-links-widget' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'Quick Links',
        ]);

        $this->add_control('intro_text', [
            'label' => __( 'Introduction Text', 'quick-links-widget' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => 'We understand the value of your time, and that\'s why we have curated this section to provide you with instant access to essential student resources. Whether you\'re a student looking for educational materials or a parent seeking important school information, our convenient links are here to make your navigation seamless.',
        ]);

        $this->end_controls_section();

        /* === Section: IB Mission Statement === */
        $this->start_controls_section('section_mission', [
            'label' => __( 'IB Mission Statement', 'quick-links-widget' ),
        ]);

        $this->add_control('mission_heading', [
            'label' => __( 'Heading', 'quick-links-widget' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'The Internation Baccalaureate aims to develop inquiring knowledgeable and caring young people who help to create a better and more peaceful world through intercultural understanding and respect. To this end the organisation works with schools, governments and international organisations to develop challenging programmes of international education and rigorous assessment. These programmes encourage students across the world to become active, compassionate and lifelong learners who understand that other people, with their differences, can also be right.',
        ]);

        $this->add_control('mission_text', [
            'label' => __( 'Description', 'quick-links-widget' ),
            'type' => Controls_Manager::WYSIWYG,
            'default' => 'The International Baccalaureate aims to develop inquiring, knowledgeable and caring young people...',
        ]);

        $this->add_control('mission_link', [
            'label' => __( 'Link', 'quick-links-widget' ),
            'type' => Controls_Manager::URL,
            'default' => [
                'url' => 'https://www.ibo.org/school/062962/',
                'is_external' => true,
                'nofollow' => true,
            ],
        ]);

        $this->add_control('mission_link_text', [
            'label' => __( 'Link Text', 'quick-links-widget' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'Visit the IB Mission Statement',
        ]);

        $this->end_controls_section();

        /* === Section: IB Learner Resources === */
        $this->start_controls_section('section_learner', [
            'label' => __( 'IB Learner Resources', 'quick-links-widget' ),
        ]);

        $learner_repeater = new Repeater();

        $learner_repeater->add_control('link_title', [
            'label' => __( 'Title', 'quick-links-widget' ),
            'type' => Controls_Manager::TEXT,
        ]);

        $learner_repeater->add_control('link_url', [
            'label' => __( 'URL', 'quick-links-widget' ),
            'type' => Controls_Manager::URL,
            'show_external' => true,
        ]);

        $learner_repeater->add_control('link_description', [
            'label' => __( 'Description', 'quick-links-widget' ),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->add_control('learner_heading', [
            'label' => __( 'Heading', 'quick-links-widget' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'IB Learner Resources',
        ]);

        $this->add_control('learner_links', [
            'label' => __( 'Learner Links', 'quick-links-widget' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $learner_repeater->get_controls(),
            'title_field' => '{{{ link_title }}}',
        ]);

        $this->end_controls_section();

        /* === Section: IB Parent Resources === */
        $this->start_controls_section('section_parents', [
            'label' => __( 'IB Parent Resources', 'quick-links-widget' ),
        ]);

        $parent_repeater = new Repeater();

        $parent_repeater->add_control('link_title', [
            'label' => __( 'Title', 'quick-links-widget' ),
            'type' => Controls_Manager::TEXT,
        ]);

        $parent_repeater->add_control('link_url', [
            'label' => __( 'URL', 'quick-links-widget' ),
            'type' => Controls_Manager::URL,
            'show_external' => true,
        ]);

        $this->add_control('parent_heading', [
            'label' => __( 'Heading', 'quick-links-widget' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'IB Parent Resources',
        ]);

        $this->add_control('parent_links', [
            'label' => __( 'Parent Links', 'quick-links-widget' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $parent_repeater->get_controls(),
            'title_field' => '{{{ link_title }}}',
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        echo '<div class="entry-content container quick-links-widget">';

        // Intro Section
        if (!empty($s['title'])) {
            echo '<h1>' . esc_html($s['title']) . '</h1>';
        }
        if (!empty($s['intro_text'])) {
            echo wp_kses_post($s['intro_text']);
        }

        // IB Mission
        if (!empty($s['mission_heading'])) {
            echo '<h2>' . esc_html($s['mission_heading']) . '</h2>';
        }
        if (!empty($s['mission_text'])) {
            echo wp_kses_post($s['mission_text']);
        }
        if (!empty($s['mission_link']['url'])) {
            $target = $s['mission_link']['is_external'] ? ' target="_blank"' : '';
            $rel = $s['mission_link']['nofollow'] ? ' rel="nofollow noopener"' : '';
            echo '<p><a href="' . esc_url($s['mission_link']['url']) . '"' . $target . $rel . '>' . esc_html($s['mission_link_text']) . '</a></p>';
        }

        // IB Learner Resources
        if (!empty($s['learner_heading'])) {
            echo '<h2>' . esc_html($s['learner_heading']) . '</h2>';
        }
        if (!empty($s['learner_links'])) {
            echo '<ul>';
            foreach ($s['learner_links'] as $link) {
                if (!empty($link['link_title']) && !empty($link['link_url']['url'])) {
                    echo '<li><a href="' . esc_url($link['link_url']['url']) . '" target="_blank" rel="noopener">' . esc_html($link['link_title']) . '</a></li>';
                }
                if (!empty($link['link_description'])) {
                    echo '<li>' . esc_html(strip_tags($link['link_description'])) . '</li>';
                }
            }
            echo '</ul>';
        }

        // IB Parent Resources
        if (!empty($s['parent_heading'])) {
            echo '<h2>' . esc_html($s['parent_heading']) . '</h2>';
        }
        if (!empty($s['parent_links'])) {
            echo '<ul>';
            foreach ($s['parent_links'] as $link) {
                if (!empty($link['link_title']) && !empty($link['link_url']['url'])) {
                    echo '<li><a href="' . esc_url($link['link_url']['url']) . '" target="_blank" rel="noopener">' . esc_html($link['link_title']) . '</a></li>';
                }
            }
            echo '</ul>';
        }

        echo '</div>';
    }
}
