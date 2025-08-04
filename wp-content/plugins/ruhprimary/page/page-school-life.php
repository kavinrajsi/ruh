<?php

/**
 * Description: A custom Elementor widget that renders the full "Life at RUH" page layout, including modular sections like Ruh’ler’s Life, Piazza, Playloft, Libraries, About, Sandpit, Dance Studio, and a CTA. Ideal for creating an engaging and informative campus life showcase using Elementor.
 * Author: ruhprimary
 * Version: 1.0.0
 * Text Domain: ruhprimary
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
        return ['fos'];
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
        $settings = $this->get_settings_for_display();
        echo '<div class="life-at-ruh-widget">';
        $this->render_ruh_life($settings);
        $this->render_piazza($settings);
        $this->render_playloft($settings);
        $this->render_best_place($settings);
        $this->render_about($settings);
        $this->render_sandpit($settings);
        $this->render_dance($settings);
        $this->render_cta($settings);
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

    public function render_ruh_life($settings)
    {
        echo "<section class='ruh_life-section ruh_life-section__detail'>";
        echo "<div class='container'>";
        echo "<div class='content'>";
        if (!empty($settings['ruh_life_title'])) {
            $tag = !empty($settings['ruh_life_title_tag']) ? $settings['ruh_life_title_tag'] : 'h2';
            echo '<' . $tag . '>' . ($settings['ruh_life_title']) . '</' . $tag . '>';
        }
        if (!empty($settings['ruh_life_content'])) echo '<div>' . wp_kses_post($settings['ruh_life_content']) . '</div>';
        if (!empty($settings['ruh_life_button_url']['url'])) echo '<a href="' . esc_url($settings['ruh_life_button_url']['url']) . '" class="button">' . esc_html($settings['ruh_life_button_text']) . '</a>';
        echo '</div>';
        echo "<div class='image'>";
        if (!empty($settings['ruh_life_image']['url'])) {
            echo '<img src="' . esc_url($settings['ruh_life_image']['url']) . '" alt="' . esc_attr($settings['ruh_life_image']['alt']) . '">';
        }
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }

    public function render_piazza($settings)
    {
        echo "<section class='piazza-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($settings['piazza_image']['url'])) echo '<img src="' . esc_url($settings['piazza_image']['url']) . '" alt="' . esc_attr($settings['piazza_image']['alt']) . '">';
        echo "</div>";
        echo "<div class='content width-300'>";
        if (!empty($settings['piazza_title'])) {
            $tag = !empty($settings['piazza_title_tag']) ? $settings['piazza_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($settings['piazza_title']) . '</' . $tag . '>';
        }
        if (!empty($settings['piazza_content'])) echo '<div>' . wp_kses_post($settings['piazza_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_playloft($settings)
    {
        echo "<section class='playloft-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($settings['playloft_image']['url'])) echo '<img src="' . esc_url($settings['playloft_image']['url']) . '" alt="' . esc_attr($settings['playloft_image']['alt']) . '">';
        echo "</div>";
        echo "<div class='content width-686'>";
        if (!empty($settings['playloft_title'])) {
            $tag = !empty($settings['playloft_title_tag']) ? $settings['playloft_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($settings['playloft_title']) . '</' . $tag . '>';
        }
        if (!empty($settings['playloft_content'])) echo '<div>' . wp_kses_post($settings['playloft_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_best_place($settings)
    {
        echo '<section class="best-place">';
        echo "<div class='container'>";
        foreach (['ey' => 'EY Library', 'py' => 'PY Library'] as $key => $label) {
            if ($settings["{$key}_title"] || $settings["{$key}_content"] || $settings["{$key}_image"]['url']) {
                echo "<div class='library {$key}'>";
                echo "<div class='image'>";
                if (!empty($settings["{$key}_image"]['url'])) {
                    $img = $settings["{$key}_image"];
                    $alt = !empty($img['alt']) ? $img['alt'] : $label . ' Image';
                    echo '<img src="' . esc_url($img['url']) . '" alt="' . esc_attr($alt) . '">';
                }
                echo "</div>";
                echo "<div class='content'>";
                if (!empty($settings["{$key}_title"])) echo '<h2>' . esc_html($settings["{$key}_title"]) . '</h2>';
                if (!empty($settings["{$key}_content"])) echo '<div>' . wp_kses_post($settings["{$key}_content"]) . '</div>';
                echo "</div>";
                echo '</div>';
            }
        }
        echo "</div>";
        echo '</section>';
    }

    public function render_about($settings)
    {
        echo "<section class='about-section'>";
        echo "<div class='container'>";
        echo "<div class='content'>";
        if (!empty($settings['about_title'])) {
            $tag = !empty($settings['about_title_tag']) ? $settings['about_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($settings['about_title']) . '</' . $tag . '>';
        }
        if (!empty($settings['about_content'])) echo '<div>' . wp_kses_post($settings['about_content']) . '</div>';
        if (!empty($settings['about_button_url']['url'])) echo '<a href="' . esc_url($settings['about_button_url']['url']) . '" class="button">' . esc_html($settings['about_button_text']) . '</a>';
        echo "</div>";
        if (!empty($settings['about_image']['url'])) echo '<img class="image" src="' . esc_url($settings['about_image']['url']) . '" alt="' . esc_attr($settings['about_image']['alt']) . '">';
        echo "</div>";
        echo "</section>";
    }

    public function render_sandpit($settings)
    {
        echo "<section class='sandpit-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($settings['sandpit_image']['url'])) echo '<img src="' . esc_url($settings['sandpit_image']['url']) . '" alt="' . esc_attr($settings['sandpit_image']['alt']) . '">';
        echo "</div>";
        echo "<div class='content width-686'>";
        if (!empty($settings['sandpit_title'])) {
            $tag = !empty($settings['sandpit_title_tag']) ? $settings['sandpit_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($settings['sandpit_title']) . '</' . $tag . '>';
        }
        if (!empty($settings['sandpit_content'])) echo '<div>' . wp_kses_post($settings['sandpit_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_dance($settings)
    {
        echo "<section class='dance-section'>";
        echo "<div class='container'>";
        echo "<div class='image'>";
        if (!empty($settings['dance_image']['url'])) echo '<img src="' . esc_url($settings['dance_image']['url']) . '" alt="' . esc_attr($settings['dance_image']['alt']) . '">';
        echo "</div>";
        echo "<div class='content width-300'>";
        if (!empty($settings['dance_title'])) {
            $tag = !empty($settings['dance_title_tag']) ? $settings['dance_title_tag'] : 'h2';
            echo '<' . $tag . '>' . esc_html($settings['dance_title']) . '</' . $tag . '>';
        }
        if (!empty($settings['dance_content'])) echo '<div>' . wp_kses_post($settings['dance_content']) . '</div>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    public function render_cta($settings)
    {
        echo "<section class='info-section container-fluid'>";
        echo "<div class='info-section__container container'>";

        if (!empty($settings['cta_image']['url'])) echo '<img class="info-section__image" src="' . esc_url($settings['cta_image']['url']) . '" alt="' . esc_attr($settings['cta_image']['alt']) . '">';
        echo "<div class='info-section__content'>";
        if (!empty($settings['cta_title'])) {
            $tag = !empty($settings['cta_title_tag']) ? $settings['cta_title_tag'] : 'h2';
            echo '<' . $tag . ' class="info-section__title">' . esc_html($settings['cta_title']) . '</' . $tag . '>';
        }
        if (!empty($settings['cta_content'])) echo '<div class="info-section__text">' . wp_kses_post($settings['cta_content']) . '</div>';
        if (!empty($settings['cta_button_url']['url'])) echo '<a href="' . esc_url($settings['cta_button_url']['url']) . '" class="info-section__link">' . esc_html($settings['cta_button_text']) . '</a>';
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }
}
