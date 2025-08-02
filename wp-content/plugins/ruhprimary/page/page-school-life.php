<?php

/**
 * Description: A custom Elementor widget that builds a full About page layout with sections like "The Story", "Our Campuses", "Roles of Future", "Friends", and more.
 * Author: Your Name
 * Version: 1.0.0
 * Text Domain: curriculum-widget
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined('ABSPATH')) exit;

class Elementor_Life_At_RUH_Page extends Widget_Base
{

    public function get_name()
    {
        return 'life_at_ruh';
    }

    public function get_title()
    {
        return __('Life@RUH', 'life-at-ruh-widget');
    }

    public function get_icon()
    {
        return 'eicon-posts-ticker';
    }

    public function get_categories()
    {
        return ['fos']; // Replace with your Elementor category if needed
    }

    protected function register_controls()
    {
        $this->add_section_controls('ruh_life', 'Ruh’ler’s Life', true, false, true, true, true);
        $this->add_section_controls('piazza', 'The Piazza', true, false, true, true, false);
        $this->add_section_controls('playloft', 'The Playloft', true, true, true, true, false);

        $this->start_controls_section('section_best_place', [
            'label' => __('Best Place – Libraries', 'life-at-ruh-widget'),
        ]);
        foreach (['ey' => 'EY Library', 'py' => 'PY Library'] as $key => $label) {
            $this->add_control("{$key}_title", [
                'label' => __("$label Title", 'life-at-ruh-widget'),
                'type' => Controls_Manager::TEXT,
            ]);
            $this->add_control("{$key}_content", [
                'label' => __("$label Content", 'life-at-ruh-widget'),
                'type' => Controls_Manager::WYSIWYG,
            ]);
            $this->add_control("{$key}_image", [
                'label' => __("$label Image", 'life-at-ruh-widget'),
                'type' => Controls_Manager::MEDIA,
            ]);
        }
        $this->end_controls_section();

        $this->add_section_controls('about', 'About', true, false, true, true, true);
        $this->add_section_controls('sandpit', 'The Sandpit', true, true, true, true, false);
        $this->add_section_controls('dance', 'Dance Studio', true, false, true, true, false);
        $this->add_section_controls('cta', 'Curious to Know', true, false, true, true, true);
    }

    protected function render()
    {
        $s = $this->get_settings_for_display();
        echo '<div class="life-at-ruh-widget">';
        $this->render_ruh_life($s);
        $this->render_piazza($s);
        $this->render_playloft($s);
        $this->render_best_place($s);
        $this->render_about($s);
        $this->render_sandpit($s);
        $this->render_dance($s);
        $this->render_cta($s);
        echo '</div>';
    }

    private function add_section_controls($prefix, $label, $has_title = true, $has_subtitle = false, $has_content = true, $has_image = true, $has_button = false)
    {
        $this->start_controls_section("section_{$prefix}", [
            'label' => __($label, 'life-at-ruh-widget'),
        ]);

        if ($has_title) {
            $this->add_control("{$prefix}_title", [
                'label' => __('Title', 'life-at-ruh-widget'),
                'type' => Controls_Manager::TEXTAREA,
            ]);
            $this->add_control("{$prefix}_title_tag", [
                'label' => __('Title HTML Tag', 'life-at-ruh-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
            ]);
        }

        if ($has_content) {
            $this->add_control("{$prefix}_content", [
                'label' => __('Content', 'life-at-ruh-widget'),
                'type' => Controls_Manager::WYSIWYG,
            ]);
        }
        if ($has_button) {
            $this->add_control("{$prefix}_button_text", [
                'label' => __('Button Text', 'life-at-ruh-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
            ]);
            $this->add_control("{$prefix}_button_url", [
                'label' => __('Button URL', 'life-at-ruh-widget'),
                'type' => Controls_Manager::URL,
            ]);
        }
        if ($has_image) {
            $this->add_control("{$prefix}_image", [
                'label' => __('Image', 'life-at-ruh-widget'),
                'type' => Controls_Manager::MEDIA,
            ]);
        }

        $this->end_controls_section();
    }

    public function render_ruh_life($s)
    {
        echo "<section class='ruh_life-section ruh_life-section__detail'>";
        echo "<div class='container'>";
        echo "<div class='content'>";
        if (!empty($s['ruh_life_title'])) {
            $tag = !empty($s['ruh_life_title_tag']) ? $s['ruh_life_title_tag'] : 'h2';
            echo '<' . $tag . '>' . ($s['ruh_life_title']) . '</' . $tag . '>';
        }
        if (!empty($s['ruh_life_content'])) echo '<div>' . wp_kses_post($s['ruh_life_content']) . '</div>';
        if (!empty($s['ruh_life_button_url']['url'])) echo '<a href="' . esc_url($s['ruh_life_button_url']['url']) . '" class="button">' . esc_html($s['ruh_life_button_text']) . '</a>';
        echo '</div>';
        echo "<div class='image'>";
        if (!empty($s['ruh_life_image']['url'])) echo '<img src="' . esc_url($s['ruh_life_image']['url']) . '" alt="">';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }

    public function render_piazza($s)
    {
        echo "<section class='piazza-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($s['piazza_image']['url'])) echo '<img src="' . esc_url($s['piazza_image']['url']) . '" alt="">';
        echo "</div>";
        echo "<div class='content width-300'>";
        if (!empty($s['piazza_title'])) {
            $tag = !empty($s['piazza_title_tag']) ? $s['piazza_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($s['piazza_title']) . '</' . $tag . '>';
        }
        if (!empty($s['piazza_content'])) echo '<div>' . wp_kses_post($s['piazza_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_playloft($s)
    {
        echo "<section class='playloft-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($s['playloft_image']['url'])) echo '<img src="' . esc_url($s['playloft_image']['url']) . '" alt="">';
        echo "</div>";
        echo "<div class='content width-686'>";
        if (!empty($s['playloft_title'])) {
            $tag = !empty($s['playloft_title_tag']) ? $s['playloft_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($s['playloft_title']) . '</' . $tag . '>';
        }
        if (!empty($s['playloft_content'])) echo '<div>' . wp_kses_post($s['playloft_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_best_place($s)
    {
        echo '<section class="best-place">';
        echo "<div class='container'>";
        foreach (['ey' => 'EY Library', 'py' => 'PY Library'] as $key => $label) {
            if ($s["{$key}_title"] || $s["{$key}_content"] || $s["{$key}_image"]['url']) {
                echo "<div class='library {$key}'>";
                echo "<div class='image'>";
                if (!empty($s["{$key}_image"]['url'])) echo '<img src="' . esc_url($s["{$key}_image"]['url']) . '" alt="">';
                echo "</div>";
                echo "<div class='content'>";
                if (!empty($s["{$key}_title"])) echo '<h2>' . esc_html($s["{$key}_title"]) . '</h2>';
                if (!empty($s["{$key}_content"])) echo '<div>' . wp_kses_post($s["{$key}_content"]) . '</div>';
                echo "</div>";
                echo '</div>';
            }
        }
        echo "</div>";
        echo '</section>';
    }

    public function render_about($s)
    {
        echo "<section class='about-section'>";
        echo "<div class='container'>";
        echo "<div class='content'>";
        if (!empty($s['about_title'])) {
            $tag = !empty($s['about_title_tag']) ? $s['about_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($s['about_title']) . '</' . $tag . '>';
        }
        if (!empty($s['about_content'])) echo '<div>' . wp_kses_post($s['about_content']) . '</div>';
        if (!empty($s['about_button_url']['url'])) echo '<a href="' . esc_url($s['about_button_url']['url']) . '" class="button">' . esc_html($s['about_button_text']) . '</a>';
        echo "</div>";
        if (!empty($s['about_image']['url'])) echo '<img class="image" src="' . esc_url($s['about_image']['url']) . '" alt="">';
        echo "</div>";
        echo "</section>";
    }

    public function render_sandpit($s)
    {
        echo "<section class='sandpit-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($s['sandpit_image']['url'])) echo '<img src="' . esc_url($s['sandpit_image']['url']) . '" alt="">';
        echo "</div>";
        echo "<div class='content width-686'>";
        if (!empty($s['sandpit_title'])) {
            $tag = !empty($s['sandpit_title_tag']) ? $s['sandpit_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($s['sandpit_title']) . '</' . $tag . '>';
        }
        if (!empty($s['sandpit_content'])) echo '<div>' . wp_kses_post($s['sandpit_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_dance($s)
    {
        echo "<section class='dance-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($s['dance_image']['url'])) echo '<img src="' . esc_url($s['dance_image']['url']) . '" alt="">';
        echo "</div>";
        echo "<div class='content width-300'>";
        if (!empty($s['dance_title'])) {
            $tag = !empty($s['dance_title_tag']) ? $s['dance_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($s['dance_title']) . '</' . $tag . '>';
        }
        if (!empty($s['dance_content'])) echo '<div>' . wp_kses_post($s['dance_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_cta($s)
    {
        echo "<section class='info-section container-fluid'>";
        echo "<div class='info-section__container container'>";

        if (!empty($s['cta_image']['url'])) echo '<img class="info-section__image" src="' . esc_url($s['cta_image']['url']) . '" alt="">';
        echo "<div class='info-section__content'>";
        if (!empty($s['cta_title'])) {
            $tag = !empty($s['cta_title_tag']) ? $s['cta_title_tag'] : 'h2';
            echo '<' . $tag . ' class="info-section__title">' . esc_html($s['cta_title']) . '</' . $tag . '>';
        }
        if (!empty($s['cta_content'])) echo '<div class="info-section__text">' . wp_kses_post($s['cta_content']) . '</div>';
        if (!empty($s['cta_button_url']['url'])) echo '<a href="' . esc_url($s['cta_button_url']['url']) . '" class="info-section__link">' . esc_html($s['cta_button_text']) . '</a>';
        echo "</div>"; 
        echo "</div>";
        echo "</section>";
    }
}
