<?php

/**
 * Description: A flexible and feature-rich Elementor widget to design the homepage layout of an educational institution. Includes sections such as Legacy Story, Co-Founders’ Notes, Campus Story with video support, Learning Styles, SSVM Institution Stats, Campus & Friends Galleries, Dynamic Testimonials, Latest Blogs, and a Call-to-Action. Fully customizable using the Elementor editor.
 * Author: ruhprimary
 * Version: 1.0.0
 * Text Domain: ruhprimary
 */


use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Elementor_Home_Page_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'home_page_widget';
    }

    public function get_title()
    {
        return __('Home Page Builder', 'home-page-widget');
    }

    public function get_icon()
    {
        return 'eicon-home';
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
        /* === Legacy Story Section === */
        $this->start_controls_section('section_legacy_story', [
            'label' => __('Legacy Story Section', 'home-page-widget'),
        ]);

        $this->add_control('legacy_story_title', [
            'label'   => __('Title', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'Stories of community & continuity.',
        ]);

        $this->add_control('legacy_story_content', [
            'label'   => __('Content', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'This space, rich with history...',
        ]);

        $this->add_control('legacy_gallery', [
            'label' => __('Gallery Images', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::GALLERY,
        ]);

        $this->end_controls_section();

        /* === Co-Founder Note (Second) === */
        $this->start_controls_section('section_cofounder_note_two', [
            'label' => __('Co-Founder Note (Second)', 'home-page-widget'),
        ]);

        $this->add_control('cofounder_two_image', [
            'label' => __('Co-Founder Image', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('cofounder_two_quote', [
            'label'   => __('Quote', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Education is the most powerful tool...',
        ]);

        $this->add_control('cofounder_two_name', [
            'label'   => __('Name', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Second Co-Founder Name',
        ]);

        $this->add_control('cofounder_two_title', [
            'label'   => __('Title', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Title of Second Co-Founder',
        ]);

        $this->end_controls_section();

        /* === Campus Story Section === */
        $this->start_controls_section('section_campus_story', [
            'label' => __('Campus Story Section', 'home-page-widget'),
        ]);

        $this->add_control('campus_title', [
            'label'   => __('Title', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Every space tells a story',
        ]);

        $this->add_control('campus_description', [
            'label'   => __('Description', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Our intentionally designed campus nurtures creativity, curiosity...',
        ]);

        $this->add_control('campus_button_text', [
            'label'   => __('Button Text', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Book campus tour',
        ]);

        $this->add_control('campus_button_url', [
            'label' => __('Button URL', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::URL,
        ]);

        $this->add_control('campus_video_local', [
            'label'       => __('Video', 'home-page-widget'),
            'type'        => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['video'],
        ]);

        $this->add_control('campus_video_youtube', [
            'label'       => __('Video URL (YouTube or MP4)', 'home-page-widget'),
            'type'        => \Elementor\Controls_Manager::URL,
            'input_type'  => 'url',
            'placeholder' => __('https://www.youtube.com/watch?v=xxxxx or https://example.com/video.mp4', 'home-page-widget'),
            'show_label'  => true,
        ]);

        $this->add_control('campus_poster', [
            'label' => __('Poster Image', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->end_controls_section();

        /* === Learning Styles Section === */
        $this->start_controls_section('section_learning_styles', [
            'label' => __('Learning Styles Section', 'home-page-widget'),
        ]);

        $this->add_control('learning_image', [
            'label' => __('Child Image', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('learning_text', [
            'label'   => __('Content', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::WYSIWYG,
            'default' => 'We celebrate the uniqueness of every learner through diverse methodologies...',
        ]);

        $this->add_control('learning_cta_button_text', [
            'label'   => __('Button Text', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Contact now',
        ]);

        $this->add_control('learning_cta_url', [
            'label' => __('Button URL', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::URL,
        ]);

        $this->end_controls_section();

        /* === SSVM Institutions === */
        $this->start_controls_section('section_ssvm_institutions', [
            'label' => __('SSVM Institutions', 'home-page-widget'),
        ]);

        $this->add_control('ssvm_intro_text', [
            'label'   => __('Intro Text', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Ruh Continuum School is an initiative by SSVM Institutions...',
        ]);

        $this->add_control('campuses_icon', [
            'label' => __('Campuses Icon', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('ssvm_campuses_text', [
            'label'   => __('Campuses Text', 'home-page-widget'),
            'type'    => Controls_Manager::TEXT,
            'default' => '10+ Campuses',
        ]);

        $this->add_control('curricula_icon', [
            'label' => __('Curricula Icon', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('ssvm_curricula_text', [
            'label'   => __('Curricula Text', 'home-page-widget'),
            'type'    => Controls_Manager::TEXT,
            'default' => '6+ Curricula',
        ]);

        $this->add_control('faculty_icon', [
            'label' => __('Faculty Icon', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('ssvm_faculty_text', [
            'label'   => __('Faculty Text', 'home-page-widget'),
            'type'    => Controls_Manager::TEXT,
            'default' => '500+ Trained Faculty',
        ]);

        $this->add_control('students_icon', [
            'label' => __('Students Icon', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('ssvm_students_text', [
            'label'   => __('Students Text', 'home-page-widget'),
            'type'    => Controls_Manager::TEXT,
            'default' => '10,000+ Students Lives Impacted',
        ]);

        $this->end_controls_section();

        /* === Campuses Gallery === */
        $this->start_controls_section('section_campuses', [
            'label' => __('Campuses Gallery', 'home-page-widget'),
        ]);

        $this->add_control('campuses_title', [
            'label'   => __('Gallery Title', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => __('Our Campuses', 'home-page-widget'),
        ]);

        $this->add_control('campuses_gallery', [
            'label' => __('Gallery Images', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::GALLERY,
        ]);

        $this->end_controls_section();

        /* === Co-Founder Note === */
        $this->start_controls_section('section_cofounder_note', [
            'label' => __('Co-Founder Note', 'home-page-widget'),
        ]);

        $this->add_control('cofounder_image', [
            'label' => __('Co-Founder Image', 'home-page-widget'),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ]);

        $this->add_control('cofounder_quote', [
            'label'   => __('Quote', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Education is an ever-evolving field...',
        ]);

        $this->add_control('cofounder_name', [
            'label'   => __('Name', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Dr. Manimekalai Mohan',
        ]);

        $this->add_control('cofounder_title', [
            'label'   => __('Title', 'home-page-widget'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Founder & Managing Trustee, SSVM Group of Institutions',
        ]);

        $this->end_controls_section();

        /* === Friends Gallery Section === */
        $this->start_controls_section('section_friends', [
            'label' => __('Friends Gallery', 'home-page-widget'),
        ]);

        $this->add_control('friends_title', [
            'label'   => __('Gallery Title', 'home-page-widget'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('Our Friends', 'home-page-widget'),
        ]);

        $this->add_control('friends_gallery', [
            'label' => __('Gallery Images', 'home-page-widget'),
            'type'  => Controls_Manager::GALLERY,
        ]);

        $this->end_controls_section();

        /* === Latest Blogs Section === */
        $this->start_controls_section('latest_blogs_section', [
            'label' => __('Latest Blogs', 'home-page-widget'),
        ]);

        $this->add_control('latest_blogs_count', [
            'label'   => __('Number of Blog Posts', 'home-page-widget'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 3,
            'min'     => 1,
            'max'     => 20,
        ]);

        $this->end_controls_section();

        /* === Testimonials Section (Dynamic) === */
        $this->start_controls_section('testimonials_section', [
            'label' => __('Testimonials (Dynamic)', 'home-page-widget'),
        ]);

        $this->add_control('show_testimonials', [
            'label'   => __('Show Testimonials', 'home-page-widget'),
            'type'    => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]);

        $this->add_control('testimonial_count', [
            'label'   => __('Number of Testimonials', 'home-page-widget'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 3,
        ]);

        $this->add_control('testimonial_orderby', [
            'label'   => __('Order By', 'home-page-widget'),
            'type'    => Controls_Manager::SELECT,
            'default' => 'date',
            'options' => [
                'date'  => __('Date', 'home-page-widget'),
                'title' => __('Title', 'home-page-widget'),
                'rand'  => __('Random', 'home-page-widget'),
            ],
        ]);

        $this->add_control('testimonial_order', [
            'label'   => __('Order', 'home-page-widget'),
            'type'    => Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
                'ASC'  => __('Ascending', 'home-page-widget'),
                'DESC' => __('Descending', 'home-page-widget'),
            ],
        ]);

        $this->end_controls_section();

        /* === Curious To Know (CTA) === */
        $this->start_controls_section('section_cta', [
            'label' => __('Curious To Know', 'home-page-widget'),
        ]);

        $this->add_control('cta_image', [
            'label' => __('Image', 'home-page-widget'),
            'type'  => Controls_Manager::MEDIA,
        ]);

        $this->add_control('cta_title', [
            'label' => __('Title', 'home-page-widget'),
            'type'  => Controls_Manager::TEXT,
        ]);

        $this->add_control('cta_content', [
            'label' => __('Content', 'home-page-widget'),
            'type'  => Controls_Manager::WYSIWYG,
        ]);

        $this->add_control('cta_button_text', [
            'label'   => __('Button Text', 'home-page-widget'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('Learn More', 'home-page-widget'),
        ]);

        $this->add_control('cta_button_url', [
            'label' => __('Button URL', 'home-page-widget'),
            'type'  => Controls_Manager::URL,
        ]);

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <!-- legacy-story -->
        <section class="legacy-story">
            <div class="container legacy-story__wrapper">
                <div class="legacy-story__gallery">
                    <div class="gallery-frame">
                        <?php foreach ($settings['legacy_gallery'] as $img) : ?>
                            <img src="<?= esc_url($img['url']); ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="legacy-story__text">
                    <?= ($settings['legacy_story_title']); ?>
                    <?= ($settings['legacy_story_content']); ?>
                </div>
            </div>
        </section>

        <!-- Co-Founder Note (Second) -->
        <section class="cofounder-note cofounder-note--second container">
            <div class="cofounder-note__wrapper">
                <div class="cofounder-note__text">
                    <h2><?php esc_html_e('Co-Founder’s Note', 'home-page-widget'); ?></h2>
                    <p class="quote"><?= esc_html($settings['cofounder_two_quote']); ?></p>
                    <p class="name"><?= esc_html($settings['cofounder_two_name']); ?></p>
                    <p class="title"><?= esc_html($settings['cofounder_two_title']); ?></p>
                </div>
                <div class="cofounder-note__image">
                    <div class="photo-frame">
                        <?php if (!empty($settings['cofounder_two_image']['url'])) : ?>
                            <img src="<?= esc_url($settings['cofounder_two_image']['url']); ?>" alt="<?= esc_attr($settings['cofounder_two_name']); ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- campus-story -->
        <section class="campus-story">
            <div class="container">
                <?php if (!empty($settings['campus_title'])) : ?>
                    <h2><?= esc_html($settings['campus_title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($settings['campus_description'])) : ?>
                    <p><?= esc_html($settings['campus_description']); ?></p>
                <?php endif; ?>

                <?php if (!empty($settings['campus_button_url']['url'])) : ?>
                    <a href="<?= esc_url($settings['campus_button_url']['url']); ?>" class="cta-button">
                        <?= esc_html($settings['campus_button_text']); ?>
                    </a>
                <?php endif; ?>

                <div class="campus-media">
                    <?php
                    $youtube_url = $settings['campus_video_youtube']['url'] ?? '';
                    $local_video_url = $settings['campus_video_local']['url'] ?? '';
                    $poster = $settings['campus_poster']['url'] ?? '';

                    // YouTube or Vimeo (iframe)
                    if (!empty($youtube_url) && (strpos($youtube_url, 'youtube.com') !== false || strpos($youtube_url, 'youtu.be') !== false)) {
                        $youtube_id = '';
                        if (preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $youtube_url, $matches)) {
                            $youtube_id = $matches[1];
                        }
                        if ($youtube_id) :
                    ?>
                            <div class="video-embed">
                                <iframe width="100%" height="450"
                                    src="https://www.youtube.com/embed/<?= esc_attr($youtube_id); ?>"
                                    title="YouTube video"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        <?php
                        endif;

                        // External or self-hosted video file (mp4, etc.)
                    } elseif (!empty($youtube_url) && (str_ends_with($youtube_url, '.mp4') || str_ends_with($youtube_url, '.webm'))) {
                        ?>
                        <video controls poster="<?= esc_url($poster); ?>">
                            <source src="<?= esc_url($youtube_url); ?>" type="video/mp4">
                            <?= esc_html__('Your browser does not support the video tag.', 'home-page-widget'); ?>
                        </video>
                    <?php

                        // Local video uploaded via media control
                    } elseif (!empty($local_video_url)) {
                    ?>
                        <video controls poster="<?= esc_url($poster); ?>">
                            <source src="<?= esc_url($local_video_url); ?>" type="video/mp4">
                            <?= esc_html__('Your browser does not support the video tag.', 'home-page-widget'); ?>
                        </video>
                    <?php

                        // Poster fallback
                    } elseif (!empty($poster)) {
                    ?>
                        <img src="<?= esc_url($poster); ?>" alt="<?= esc_attr__('Campus Poster', 'home-page-widget'); ?>">
                    <?php } ?>
                </div>


            </div>
        </section>

        <!-- learning styles -->
        <section class="learning-styles">
            <div class="container learning-styles__wrapper">
                <div class="learning-styles__left">
                    <?php if (!empty($settings['learning_image']['url'])) : ?>
                        <img src="<?= esc_url($settings['learning_image']['url']); ?>" alt="Child" class="child-img">
                    <?php endif; ?>
                </div>

                <div class="learning-styles__right">
                    <?= ($settings['learning_text']); ?>
                    <?php if (!empty($settings['learning_cta_url']['url'])) : ?>
                        <a href="<?= esc_url($settings['learning_cta_url']['url']); ?>"
                            class="cta-button"
                            target="<?= esc_attr($settings['learning_cta_url']['is_external'] ? '_blank' : '_self'); ?>">
                            <?= esc_html($settings['learning_cta_button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- ssvm-institutions -->
        <section class="ssvm-institutions">
            <div class="container ssvm-institutions__wrapper">
                <div class="ssvm-institutions__text">
                    <h2>
                        <svg width="508" height="196" viewBox="0 0 508 196" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_74_1331)">
                                <path d="M42.103 41.6671L75.7001 50.3877C88.7926 53.7811 98.7669 59.2346 105.627 66.7398C112.463 74.2472 115.892 83.4916 115.892 94.4482V113.436H0L6.6008 98.3986H99.3992C99.4507 98.0279 99.5063 97.6366 99.531 97.1584C99.5578 96.7112 99.5578 96.0051 99.5578 95.0776C99.5578 87.5206 97.2799 81.2804 92.6975 76.3548C88.115 71.4583 81.1517 67.7461 71.8035 65.216L26.6895 53.7066C18.7768 51.6506 12.8618 48.5181 8.98574 44.2758C5.08498 40.0087 3.14696 34.5842 3.14696 27.9485C3.14696 20.3895 5.76669 14.4598 10.9752 10.1968C16.1879 5.93174 23.4663 3.79714 32.8434 3.79714H107.31L97.0163 22.5199H96.1019L96.2605 21.1493V20.8346C96.2605 20.1783 96.0257 19.6255 95.5273 19.2031C95.0577 18.8097 94.4028 18.5985 93.5892 18.5985H32.8392C28.333 18.5985 25.0068 19.3356 22.8608 20.7828C20.7127 22.259 19.6418 24.551 19.6418 27.6318C19.6418 33.1888 26.813 37.7954 41.1886 41.4331C41.6067 41.5387 41.8991 41.6174 42.1051 41.6692M172.817 41.6671L206.415 50.3877C219.507 53.7811 229.481 59.2346 236.342 66.7398C243.177 74.2472 246.606 83.4916 246.606 94.4482V113.436H130.714L137.315 98.3986H230.111C230.161 98.0279 230.217 97.6366 230.239 97.1584C230.264 96.7112 230.264 96.0051 230.264 95.0776C230.264 87.5206 227.988 81.2804 223.406 76.3548C218.819 71.4583 211.856 67.7461 202.512 65.216L157.394 53.7066C149.485 51.6506 143.566 48.5181 139.694 44.2758C135.789 40.0087 133.853 34.5842 133.853 27.9485C133.853 20.3895 136.475 14.4598 141.688 10.1968C146.894 5.93174 154.172 3.79714 163.549 3.79714H238.02L227.727 22.5199H226.812L226.969 21.1493V20.8346C226.969 20.1783 226.732 19.6255 226.235 19.2031C225.766 18.8097 225.109 18.5985 224.297 18.5985H163.549C159.045 18.5985 155.721 19.3356 153.575 20.7828C151.425 22.259 150.352 24.551 150.352 27.6318C150.352 33.1888 157.529 37.7954 171.903 41.4331C172.321 41.5387 172.609 41.6174 172.819 41.6692L172.817 41.6671ZM311.83 83.4108L347.966 13.1968C348.539 12.0643 348.957 11.0912 349.245 10.2734C349.507 9.45973 349.665 8.79719 349.665 8.35205C349.665 7.98352 349.585 7.6419 349.453 7.34997C349.321 7.0332 349.142 6.74334 348.879 6.50732L347.363 4.87583V3.79714H369.906L311.7 117.072L253.541 3.79507H277.083V4.87376L275.724 6.26922C275.409 6.55908 275.17 6.90276 274.991 7.2713C274.803 7.63983 274.727 7.92762 274.727 8.19056C274.727 8.66676 274.859 9.34999 275.172 10.2713C275.483 11.1927 275.905 12.1927 276.484 13.2755L311.832 83.4108H311.83ZM427.563 84.3322L466.237 0L496.215 113.436H476.267V112.355L478.201 110.436C478.442 110.171 478.676 109.8 478.86 109.353C479.014 108.879 479.121 108.407 479.121 107.881C479.121 107.616 479.07 107.252 478.967 106.722C478.86 106.221 478.703 105.614 478.493 104.958L461.866 40.4538L426.803 117.072L390.224 41.222L374.958 104.877C374.802 105.434 374.699 105.956 374.619 106.405C374.542 106.881 374.489 107.326 374.489 107.724C374.489 108.301 374.569 108.802 374.726 109.277C374.88 109.722 375.117 110.119 375.407 110.436L377.187 112.355V113.436H357.388L387.843 0L427.563 84.3322Z" fill="#FFF2DD" />
                                <path d="M3.19434 141.38H7.80151V194.977H3.19434V141.38ZM20.6036 194.977V141.38H25.0666L64.0844 188.163V141.38H68.3785V194.977H64.4098L24.8997 147.592V194.977H20.6036ZM105.992 149.004C103.778 147.5 101.685 146.389 99.6834 145.67C97.6877 144.95 95.7105 144.598 93.7643 144.598C90.5349 144.598 87.8967 145.55 85.8248 147.451C83.7714 149.36 82.7417 151.751 82.7417 154.633C82.7417 156.985 83.409 158.898 84.7229 160.387C86.0472 161.863 88.8832 163.536 93.2535 165.397C93.5151 165.501 93.894 165.658 94.4007 165.865C99.3456 167.882 102.635 169.832 104.288 171.687C105.434 172.942 106.303 174.368 106.9 175.979C107.501 177.6 107.8 179.302 107.8 181.118C107.8 185.395 106.315 188.901 103.362 191.646C100.408 194.391 96.6229 195.768 92.0281 195.768C89.7153 195.768 87.423 195.373 85.1493 194.576C82.8714 193.778 80.5833 192.588 78.2643 190.994V185.787C80.7872 187.751 83.1721 189.217 85.4067 190.17C87.6598 191.124 89.845 191.609 91.9498 191.609C95.4243 191.609 98.184 190.652 100.229 188.731C102.258 186.822 103.271 184.221 103.271 180.923C103.271 178.493 102.581 176.501 101.193 174.96C99.8111 173.416 96.662 171.613 91.7315 169.546C86.6321 167.428 83.1453 165.283 81.2588 163.124C79.3826 160.966 78.4455 158.202 78.4455 154.861C78.4455 150.699 79.8748 147.298 82.7231 144.643C85.59 142.001 89.3239 140.683 93.9167 140.683C95.9948 140.683 98.0275 140.97 100.019 141.546C101.996 142.119 103.986 143.012 105.992 144.227V149.01V149.004ZM130.751 194.977V145.225H110.92V141.38H155.184V145.225H135.357V194.977H130.751ZM162.209 141.38H166.818V194.977H162.209V141.38ZM193.746 194.977V145.225H173.919V141.38H218.179V145.225H198.351V194.977H193.746ZM228.874 172.757C228.874 178.499 230.476 183.066 233.679 186.451C236.879 189.84 241.159 191.526 246.52 191.526C251.881 191.526 256.156 189.84 259.361 186.451C262.561 183.066 264.162 178.499 264.162 172.757V141.38H268.61V172.521C268.61 179.729 266.625 185.431 262.627 189.656C258.632 193.88 253.263 196 246.507 196C239.752 196 234.422 193.89 230.449 189.681C226.483 185.468 224.503 179.753 224.503 172.521V141.38H228.874V172.757ZM294.748 194.977V145.225H274.921V141.38H319.184V145.225H299.353V194.977H294.748ZM326.207 141.38H330.812V194.977H326.207V141.38ZM345.177 168.153C345.177 171.306 345.762 174.354 346.949 177.296C348.131 180.25 349.795 182.855 351.96 185.103C354.116 187.3 356.655 189.016 359.541 190.232C362.445 191.46 365.425 192.077 368.51 192.077C371.595 192.077 374.672 191.486 377.498 190.296C380.321 189.103 382.832 187.379 385.046 185.105C387.258 182.857 388.934 180.267 390.108 177.362C391.278 174.445 391.863 171.387 391.863 168.155C391.863 164.923 391.29 161.904 390.131 159.039C388.973 156.173 387.285 153.61 385.048 151.335C382.834 149.086 380.297 147.345 377.438 146.13C374.583 144.898 371.605 144.285 368.512 144.285C365.419 144.285 362.473 144.886 359.627 146.101C356.773 147.318 354.225 149.057 351.964 151.335C349.778 153.532 348.106 156.084 346.936 158.987C345.767 161.877 345.182 164.935 345.182 168.155L345.177 168.153ZM340.492 167.944C340.492 164.345 341.209 160.865 342.63 157.505C344.059 154.142 346.075 151.173 348.691 148.6C351.387 145.973 354.427 143.97 357.827 142.585C361.221 141.208 364.788 140.519 368.522 140.519C372.256 140.519 375.897 141.211 379.294 142.585C382.688 143.97 385.707 145.973 388.347 148.6C391.043 151.254 393.082 154.236 394.464 157.546C395.856 160.855 396.546 164.385 396.546 168.143C396.546 170.954 396.141 173.673 395.348 176.302C394.54 178.931 393.354 181.389 391.783 183.666C389.126 187.563 385.787 190.582 381.724 192.716C377.675 194.851 373.265 195.919 368.52 195.919C364.757 195.919 361.153 195.213 357.706 193.814C354.256 192.402 351.249 190.414 348.689 187.836C346.024 185.155 343.993 182.105 342.589 178.718C341.194 175.317 340.49 171.735 340.49 167.942L340.492 167.944ZM405.82 194.977V141.38H410.283L449.301 188.163V141.38H453.595V194.977H449.627L410.112 147.592V194.977H405.82ZM491.211 149.004C489.001 147.5 486.9 146.389 484.898 145.67C482.909 144.95 480.929 144.598 478.979 144.598C475.752 144.598 473.111 145.55 471.042 147.451C468.984 149.36 467.958 151.751 467.958 154.633C467.958 156.985 468.622 158.898 469.936 160.387C471.264 161.863 474.1 163.536 478.47 165.397C478.73 165.501 479.107 165.658 479.618 165.865C484.56 167.882 487.854 169.832 489.503 171.687C490.65 172.942 491.522 174.368 492.119 175.979C492.716 177.6 493.015 179.302 493.015 181.118C493.015 185.395 491.534 188.901 488.581 191.646C485.627 194.391 481.842 195.768 477.247 195.768C474.934 195.768 472.642 195.373 470.364 194.576C468.088 193.778 465.802 192.588 463.483 190.994V185.787C466.01 187.751 468.387 189.217 470.626 190.17C472.877 191.124 475.064 191.609 477.169 191.609C480.643 191.609 483.399 190.652 485.444 188.731C487.471 186.822 488.49 184.221 488.49 180.923C488.49 178.493 487.8 176.501 486.408 174.96C485.026 173.416 481.881 171.613 476.946 169.546C471.847 167.428 468.36 165.283 466.474 163.124C464.601 160.966 463.662 158.202 463.662 154.861C463.662 150.699 465.096 147.298 467.946 144.643C470.807 142.001 474.541 140.683 479.136 140.683C481.214 140.683 483.246 140.97 485.234 141.546C487.209 142.119 489.203 143.012 491.209 144.227V149.01L491.211 149.004Z" fill="#FFF2DD" />
                                <path d="M491.046 12.762H493.874C495.225 12.762 496.149 12.5612 496.638 12.1554C497.126 11.7537 497.375 11.2175 497.375 10.5612C497.375 10.1368 497.253 9.74959 497.023 9.41625C496.78 9.07463 496.46 8.82825 496.038 8.65848C495.61 8.49698 494.833 8.40796 493.697 8.40796H491.046V12.762ZM488.721 20.9153V6.43692H493.684C495.375 6.43692 496.605 6.56943 497.36 6.83444C498.125 7.10566 498.726 7.56944 499.183 8.24025C499.626 8.90486 499.85 9.61294 499.85 10.3583C499.85 11.4163 499.476 12.3376 498.72 13.1202C497.964 13.9049 496.965 14.3438 495.719 14.4432C496.226 14.6544 496.64 14.9091 496.942 15.2155C497.523 15.7786 498.234 16.7352 499.072 18.0789L500.833 20.9153H498.007L496.724 18.6379C495.717 16.8387 494.897 15.7082 494.279 15.2569C493.853 14.9318 493.235 14.7662 492.42 14.7724H491.046V20.9153H488.719H488.721ZM494.607 2.22984C492.724 2.22984 490.887 2.71431 489.104 3.68534C487.324 4.65636 485.926 6.04354 484.921 7.84894C483.92 9.65228 483.409 11.5281 483.409 13.4784C483.409 15.4287 483.912 17.2797 484.9 19.0623C485.891 20.8429 487.269 22.2363 489.044 23.228C490.821 24.2176 492.679 24.7166 494.607 24.7166C496.535 24.7166 498.392 24.2197 500.172 23.228C501.943 22.2342 503.325 20.8429 504.305 19.0623C505.29 17.2818 505.782 15.4267 505.782 13.4784C505.782 11.5301 505.275 9.65228 504.281 7.84894C503.278 6.04561 501.883 4.65843 500.098 3.68534C498.308 2.71431 496.473 2.22984 494.607 2.22984ZM494.607 0C496.862 0 499.053 0.581787 501.199 1.74329C503.335 2.90065 505.016 4.56112 506.208 6.72264C507.399 8.88415 508.002 11.1368 508.002 13.4784C508.002 15.82 507.413 18.0395 506.233 20.1803C505.053 22.3274 503.405 23.9858 501.28 25.168C499.15 26.3585 496.928 26.9506 494.611 26.9506C492.294 26.9506 490.07 26.3585 487.938 25.168C485.809 23.9858 484.155 22.3294 482.977 20.1803C481.788 18.0395 481.197 15.8055 481.197 13.4784C481.197 11.1513 481.799 8.88415 482.999 6.72264C484.204 4.56112 485.881 2.90065 488.016 1.74329C490.164 0.581787 492.358 0 494.611 0L494.607 0Z" fill="#FFF2DD" />
                            </g>
                            <defs>
                                <clipPath id="clip0_74_1331">
                                    <rect width="508" height="196" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </h2>
                    <p><?= esc_html($settings['ssvm_intro_text']); ?></p>
                </div>
                <div class="ssvm-institutions__highlights">
                    <div class="highlight">
                        <img src="<?= esc_url($settings['campuses_icon']['url']); ?>" alt="Campuses">
                        <p><?= esc_html($settings['ssvm_campuses_text']); ?></p>
                    </div>
                    <div class="highlight">
                        <img src="<?= esc_url($settings['curricula_icon']['url']); ?>" alt="Curricula">
                        <p><?= esc_html($settings['ssvm_curricula_text']); ?></p>
                    </div>
                    <div class="highlight">
                        <img src="<?= esc_url($settings['faculty_icon']['url']); ?>" alt="Faculty">
                        <p><?= esc_html($settings['ssvm_faculty_text']); ?></p>
                    </div>
                    <div class="highlight">
                        <img src="<?= esc_url($settings['students_icon']['url']); ?>" alt="Students">
                        <p><?= esc_html($settings['ssvm_students_text']); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Campuses Gallery -->
        <?php if (!empty($settings['campuses_gallery'])) : ?>
            <div class="campuses-gallery container-fluid">
                <div class="campuses-gallery__container">
                    <?php if (!empty($settings['campuses_title'])) : ?>
                        <h2 class="campuses-gallery__title"><?= esc_html($settings['campuses_title']); ?></h2>
                    <?php endif; ?>
                    <div class="campuses-gallery__containerWrapper owl-carousel">
                        <?php foreach ($settings['campuses_gallery'] as $img) : ?>
                            <div><img class="campuses-gallery__image" src="<?= esc_url($img['url']); ?>" alt=""></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Co-Founder Note -->
        <section class="cofounder-note container">
            <div class="cofounder-note__wrapper">
                <div class="cofounder-note__text">
                    <h2><?php esc_html_e('Co-Founder’s Note', 'home-page-widget'); ?></h2>
                    <p class="quote"><?= esc_html($settings['cofounder_quote']); ?></p>
                    <p class="name"><?= esc_html($settings['cofounder_name']); ?></p>
                    <p class="title"><?= esc_html($settings['cofounder_title']); ?></p>
                </div>
                <div class="cofounder-note__image">
                    <div class="photo-frame">
                        <?php if (!empty($settings['cofounder_image']['url'])) : ?>
                            <img src="<?= esc_url($settings['cofounder_image']['url']); ?>" alt="<?= esc_attr($settings['cofounder_name']); ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Friends Gallery -->
        <?php if (!empty($settings['friends_gallery'])) : ?>
            <div class="about-page__gallery">
                <div class="container about-page__gallery-container">
                    <?php if (!empty($settings['friends_title'])) : ?>
                        <h2 class="about-page__gallery-title">
                            <?= esc_html($settings['friends_title']); ?>
                            <!-- Decorative SVG -->
                        </h2>
                    <?php endif; ?>
                    <div class="about-page__gallery-imageWrapper">
                        <?php foreach ($settings['friends_gallery'] as $img) : ?>
                            <img class="about-page__gallery-image" src="<?= esc_url($img['url']); ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Testimonials -->
        <?php if ($settings['show_testimonials'] === 'yes') : ?>
            <section class="home-testimonials ">
                <div class="container">
                    <h2>What our lovely <strong>parents say about us</strong></h2>
                </div>
                <div class=" home-testimonialsWrapper container-fluid">
                    <div class="owl-carousel">
                        <?php
                        $args = [
                            'post_type'      => 'testimonial',
                            'posts_per_page' => !empty($settings['testimonial_count']) ? (int)$settings['testimonial_count'] : 3,
                            'orderby'        => sanitize_text_field($settings['testimonial_orderby']),
                            'order'          => sanitize_text_field($settings['testimonial_order']),
                            'post_status'    => 'publish',
                        ];

                        $testimonial_query = new WP_Query($args);

                        if ($testimonial_query->have_posts()) :
                            while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                                $image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                                // Get custom meta fields
                                $parent_name = get_post_meta(get_the_ID(), '_testimonial_parent_name', true);
                                $child_name = get_post_meta(get_the_ID(), '_testimonial_child_name', true);
                                $star_rating = get_post_meta(get_the_ID(), '_testimonial_star_rating', true);

                        ?>
                                <div class="testimonial">
                                    <?php if ($star_rating) : ?>
                                        <div class="testimonial-rating">
                                            <?php
                                            for ($i = 0; $i < (int)$star_rating; $i++) :
                                            ?>
                                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_71_689)">
                                                        <path d="M10.4612 1.60996C10.632 1.19932 11.2137 1.19932 11.3845 1.60996L13.4506 6.57744C13.5226 6.75056 13.6854 6.86885 13.8723 6.88383L19.2351 7.31376C19.6784 7.3493 19.8582 7.90256 19.5204 8.19189L15.4345 11.6919C15.2921 11.8139 15.23 12.0053 15.2735 12.1876L16.5218 17.4208C16.625 17.8534 16.1543 18.1954 15.7748 17.9635L11.1835 15.1592C11.0235 15.0615 10.8222 15.0615 10.6622 15.1592L6.07091 17.9635C5.69136 18.1954 5.22073 17.8534 5.32393 17.4208L6.57224 12.1876C6.61574 12.0053 6.55355 11.8139 6.41116 11.6919L2.32526 8.19189C1.9875 7.90256 2.16726 7.3493 2.61059 7.31376L7.9734 6.88383C8.16029 6.86885 8.3231 6.75056 8.3951 6.57744L10.4612 1.60996Z" fill="#FFFCFC" />
                                                        <g clip-path="url(#clip1_71_689)">
                                                            <path d="M10.4612 1.60996C10.632 1.19932 11.2137 1.19932 11.3845 1.60996L13.4506 6.57744C13.5226 6.75056 13.6854 6.86885 13.8723 6.88383L19.2351 7.31376C19.6784 7.3493 19.8582 7.90256 19.5204 8.19189L15.4345 11.6919C15.2921 11.8139 15.23 12.0053 15.2735 12.1876L16.5218 17.4208C16.625 17.8534 16.1543 18.1954 15.7748 17.9635L11.1835 15.1592C11.0235 15.0615 10.8222 15.0615 10.6622 15.1592L6.07091 17.9635C5.69136 18.1954 5.22073 17.8534 5.32393 17.4208L6.57224 12.1876C6.61574 12.0053 6.55355 11.8139 6.41116 11.6919L2.32526 8.19189C1.9875 7.90256 2.16726 7.3493 2.61059 7.31376L7.9734 6.88383C8.16029 6.86885 8.3231 6.75056 8.3951 6.57744L10.4612 1.60996Z" fill="#FEC84B" />
                                                        </g>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_71_689">
                                                            <rect width="20" height="20" fill="white" transform="translate(0.922852)" />
                                                        </clipPath>
                                                        <clipPath id="clip1_71_689">
                                                            <rect width="20" height="20" fill="white" transform="translate(0.922852)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            <?php
                                            endfor;
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="testimonial--content">
                                        <?= wp_kses_post(get_the_content()); ?>
                                    </div>
                                    <?php if ($parent_name || $child_name) : ?>
                                        <p class="testimonial--parent">
                                            <?php if ($parent_name) : ?>
                                                — <?php echo esc_html($parent_name); ?>
                                            <?php endif; ?>
                                        </p>
                                        <p class="testimonial--child">
                                            <?php if ($child_name) : ?>
                                                <?php echo esc_html($child_name); ?>
                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>

                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<p>' . esc_html__('No testimonials found.', 'home-page-widget') . '</p>';
                        endif;
                        ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- Latest Blogs Section -->
        <section class="home-latest-blogs container">
            <div class="content">
                <h2>The Ruh'lington Post</h2>
                <p>Explore perspectives, reflections, and learning adventures from Ruh'lers. The Ruh’lington Post is your gateway to engaging stories, academic insights, and campus highlights.</p>
                <a href="/blog" class="button">View all posts</a>
            </div>
            <div class="bloglist">
                <?php
                $blog_args = [
                    'post_type'      => 'blog',
                    'posts_per_page' => !empty($settings['latest_blogs_count']) ? (int)$settings['latest_blogs_count'] : 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'post_status'    => 'publish',
                ];

                $blog_query = new WP_Query($blog_args);

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                ?>
                        <div class="blog-post">
                            <?php if (has_post_thumbnail()) : ?>
                                <a class="archive-thumb" href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                            <?php endif; ?>
                            <div>
                                <div class="entry-taxonomies">
                                    <?php
                                    $collections = get_the_term_list(get_the_ID(), 'collection', '<span class="collections">', ', ', '</span>');
                                    $tags        = get_the_term_list(get_the_ID(), 'blog_tag', '<span class="tags">', ', ', '</span>');
                                    if ($collections) echo wp_kses_post($collections);
                                    if ($tags)        echo wp_kses_post($tags);
                                    ?>
                                </div>
                                <h3 class="entry-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <span><?php the_title(); ?></span>
                                        <span class="entry-icon">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </h3>
                                <div class="entry-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </div>
                                <div class="entry-meta">
                                    <span class="byline">
                                        <?php
                                        printf(
                                            esc_html__('by %s', 'textdomain'),
                                            esc_html(get_the_author())
                                        );
                                        ?>
                                    </span>
                                    <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
                                        <?php echo esc_html(get_the_date()); ?>
                                    </time>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>' . esc_html__('No blog posts found.', 'home-page-widget') . '</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- Curious To Know (CTA) -->
        <section class="info-section container-fluid">
            <div class="info-section__container container">
                <?php if (!empty($settings['cta_image']['url'])) : ?>
                    <img class="info-section__image" src="<?= esc_url($settings['cta_image']['url']); ?>" alt="">
                <?php endif; ?>

                <div class="info-section__content">
                    <?php if (!empty($settings['cta_title'])) : ?>
                        <h2 class="info-section__title"><?= esc_html($settings['cta_title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['cta_content'])) : ?>
                        <div class="info-section__text">
                            <?= wp_kses_post($settings['cta_content']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($settings['cta_button_url']['url'])) : ?>
                        <a href="<?= esc_url($settings['cta_button_url']['url']); ?>" class="info-section__link">
                            <?= esc_html($settings['cta_button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

<?php
    }
}
