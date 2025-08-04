<?php

/**
 * Description: A custom Elementor widget that builds a dynamic Parent Community section for Ruh Primary. Includes segments such as Community Intro, Mystery Readers, Community Partnerships, Coffee Connections with image gallery, After School programs, and a CTA-style “Curious to Know” block. Designed for engagement and parent participation.
 * Author: ruhprimary
 * Version: 1.0.0
 * Text Domain: ruhprimary
 */


use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Elementor_Ruh_Parent_Community extends Widget_Base
{

    public function get_name()
    {
        return 'ruh_parent_community';
    }

    public function get_title()
    {
        return __('Ruh Parent Community', 'ruh-widget');
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
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

        /**
         * Section: Community Intro
         */
        $this->start_controls_section('section_intro', [
            'label' => __('Community Intro', 'ruh-widget'),
        ]);

        $this->add_control('intro_title', [
            'label' => __('Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('intro_subtitle', [
            'label' => __('Subtitle', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('intro_content', [
            'label' => __('Content', 'ruh-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->add_control('intro_image', [
            'label' => __('Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('intro_button_text', [
            'label' => __('Button Text', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Join the community', 'ruh-widget'),
        ]);

        $this->end_controls_section();

        /**
         * Section: Mystery Readers
         */
        $this->start_controls_section('section_mystery', [
            'label' => __('Mystery Readers', 'ruh-widget'),
        ]);

        $this->add_control('mystery_title', [
            'label' => __('Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('mystery_description', [
            'label' => __('Description', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA,
        ]);

        $this->add_control('mystery_highlight', [
            'label' => __('Highlight', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA,
        ]);

        $this->add_control('mystery_image', [
            'label' => __('Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->end_controls_section();

        /**
         * Section: Community Partnership
         */
        $this->start_controls_section('section_partnership', [
            'label' => __('Community Partnership', 'ruh-widget'),
        ]);

        $this->add_control('partnership_description', [
            'label' => __('Description', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA,
        ]);

        $this->add_control('partnership_highlight', [
            'label' => __('Highlight', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA,
        ]);

        $this->add_control('partnership_image', [
            'label' => __('Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->end_controls_section();

        /**
         * Section: Coffee Connections
         */
        $this->start_controls_section('section_coffee', [
            'label' => __('Coffee Connections', 'ruh-widget'),
        ]);

        $this->add_control('coffee_title', [
            'label' => __('Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('coffee_content', [
            'label' => __('Content', 'ruh-widget'),
            'type' => Controls_Manager::TEXTAREA,
        ]);

        $this->add_control('coffee_gallery', [
            'label' => __('Gallery', 'ruh-widget'),
            'type' => Controls_Manager::GALLERY,
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
         * Section: Curious to Know
         */
        $this->start_controls_section('section_curious_to_know', [
            'label' => __('Curious to Know', 'ruh-widget'),
        ]);

        $this->add_control('curious_image', [
            'label' => __('Image', 'ruh-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('curious_title', [
            'label' => __('Title', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('curious_content', [
            'label' => __('Content', 'ruh-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->add_control('curious_button_text', [
            'label' => __('Button Text', 'ruh-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Learn More', 'ruh-widget'),
        ]);

        $this->add_control('curious_button_url', [
            'label' => __('Button URL', 'ruh-widget'),
            'type' => Controls_Manager::URL,
        ]);

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>

        <!-- Intro Section -->
        <section class="parent-community">
            <div class="parent-community__container container">
                <div class="content">
                    <?php if (!empty($settings['intro_title'])) : ?>
                        <h1 class="parent-community__title"><?php echo esc_html($settings['intro_title']); ?></h1>
                    <?php endif; ?>

                    <?php if (!empty($settings['intro_subtitle'])) : ?>
                        <p class="parent-community__subtitle"><?php echo esc_html($settings['intro_subtitle']); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($settings['intro_content'])) : ?>
                        <div class="parent-community__content"><?php echo wp_kses_post($settings['intro_content']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($settings['intro_button_text'])) : ?>
                        <a class="parent-community__button"><?php echo esc_html($settings['intro_button_text']); ?></a>
                    <?php endif; ?>
                </div>

                <?php if (!empty($settings['intro_image']['url'])) : ?>
                    <img
                        class="parent-community__image"
                        src="<?php echo esc_url($settings['intro_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['intro_image']['alt']); ?>">

                <?php endif; ?>
            </div>
        </section>

        <!-- Mystery Readers Section -->
        <section class="mystery-readers" data-aos="fade-up">
            <div class="mystery-readers__container container">
                <?php if (!empty($settings['mystery_image']['url'])) : ?>
                    <img
                        class="mystery-readers__image"
                        src="<?php echo esc_url($settings['mystery_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['mystery_image']['alt']); ?>">
                <?php endif; ?>

                <div class="content">
                    <?php if (!empty($settings['mystery_title'])) : ?>
                        <h2 class="mystery-readers__title"><?php echo esc_html($settings['mystery_title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['mystery_description'])) : ?>
                        <p class="mystery-readers__description">
                            <?php echo esc_html($settings['mystery_description']); ?>
                            <?php if (!empty($settings['mystery_highlight'])) : ?>
                                <strong class="mystery-readers__highlight"><?php echo esc_html($settings['mystery_highlight']); ?></strong>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Community Partnership Section -->
        <section class="community-partnership" data-aos="fade-up">
            <div class="community-partnership__container container">
                <div class="content">
                    <?php if (!empty($settings['partnership_description'])) : ?>
                        <p class="community-partnership__description">
                            <?php echo esc_html($settings['partnership_description']); ?>
                            <?php if (!empty($settings['partnership_highlight'])) : ?>
                                <strong class="community-partnership__highlight"><?php echo esc_html($settings['partnership_highlight']); ?></strong>
                            <?php endif; ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($settings['partnership_image']['url'])) : ?><img
                        class="community-partnership__image"
                        src="<?php echo esc_url($settings['partnership_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['partnership_image']['alt']); ?>">

                <?php endif; ?>
            </div>
        </section>

        <!-- Coffee Connections Section -->
        <section class="coffee-connections" data-aos="fade-up">
            <div class="coffee-connections__container container">
                <?php if (!empty($settings['coffee_title'])) : ?>
                    <div class="coffee-connections__titleWrapper">
                        <h2 class="coffee-connections__title">
                            <?php echo esc_html($settings['coffee_title']); ?>
                            <!-- SVG Icon -->
                            <svg width="112" height="51" viewBox="0 0 112 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_3117_3283)">
                                    <path d="M85.9872 0.0121631C85.9872 0.535178 81.4833 2.88266 79.3896 2.88266V3.00429C81.0208 3.00429 81.4833 4.96256 81.605 15.9824V23.2194C79.7061 25.1777 78.075 27.3914 76.5169 29.678C74.691 32.4877 73.0599 35.419 71.4166 38.1557V16.2986H71.2827C71.2827 16.8216 66.7788 19.1691 64.6851 19.1691V19.3029H64.8312C66.6449 19.3029 66.8397 19.4853 66.8397 33.6554V45.0036C64.2956 48.2025 61.3499 50.2824 57.5033 50.2824C53.6568 50.2824 48.3617 49.1147 48.4226 34.6892L48.4834 16.2864H48.3495C48.3495 16.8094 43.8457 19.0961 41.752 19.0961V19.2299C43.9065 19.2299 43.9065 19.6191 43.9065 34.1662C43.9065 48.7133 47.96 51 56.8947 51C65.8294 51 70.5402 39.3234 76.9429 29.6659C78.3793 27.513 80.0104 25.4939 81.6416 23.6695C85.3664 19.6921 90.1989 17.2838 94.8975 17.2838C101.617 17.2838 105.281 22.5018 105.281 32.6215L105.22 36.2096C105.025 46.7794 104.891 49.9053 103.065 49.9053L103.126 50.0391H112V49.9053C110.174 49.9053 109.845 46.7794 109.845 36.2096L109.785 32.6215C109.785 20.4219 104.429 16.4446 96.9912 16.4446C89.5537 16.4446 89.0912 17.6122 86.0846 19.5097V0H85.9628L85.9872 0.0121631ZM86.1211 21.5409C84.6847 22.6477 81.6172 25.5182 81.6172 25.652V36.2218C81.6172 46.7916 81.2277 49.9175 79.4018 49.9175V50.0513H88.2878V49.9175C86.4619 49.9175 86.1332 46.7916 86.1332 36.2218V21.5409H86.1211ZM15.4714 1.89745C12.0143 1.89745 5.74546 2.8705 0 2.8705V2.99213C1.82589 2.99213 2.21541 6.11805 2.21541 16.7608V36.1975C2.21541 46.7672 1.82589 49.8932 0 49.8932V50.0269H8.94685V49.8932C7.12097 49.8932 6.73144 46.7672 6.79231 36.1975V7.62628C6.79231 3.38135 9.7259 2.33532 14.6315 2.33532C23.3835 2.33532 29.9811 5.40043 29.9811 13.0997C29.9202 25.0439 7.91218 25.4939 7.97305 29.6051C7.97305 30.5659 8.52081 30.9308 9.42158 30.9308C12.3552 30.9308 19.0501 27.0021 22.4706 27.0021H22.5315C25.2703 27.063 25.7329 28.9604 27.2301 32.804C31.4053 43.9576 33.499 49.8932 31.3444 49.8932V50.0269H40.2913V49.8932C37.3577 49.8932 35.264 40.6978 31.9287 31.8917C30.1028 27.063 28.0091 25.5669 24.9416 25.5669H24.8077C20.5473 25.5669 12.3187 30.4686 9.44593 30.4686C6.5732 30.4686 8.42343 30.2254 8.42343 29.6172C8.42343 26.1629 34.6675 23.4262 34.7284 12.9781C34.7284 5.2788 24.4791 1.88529 15.4714 1.88529V1.89745Z" fill="#913412" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3117_3283">
                                        <rect width="112" height="51" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </h2>
                    </div>
                <?php endif; ?>

                <?php if (!empty($settings['coffee_content'])) : ?>
                    <p class="coffee-connections__content"><?php echo esc_html($settings['coffee_content']); ?></p>
                <?php endif; ?>

                <?php if (!empty($settings['coffee_gallery'])) : ?>
                    <div class="coffee-connections__gallery">
                        <div class="coffee-connections__gallery-track owl-carousel owl-theme">
                            <?php foreach ($settings['coffee_gallery'] as $image) : ?>
                                <?php
                                $alt = !empty($image['alt']) ? $image['alt'] : 'Gallery Image'; // Fallback alt text
                                ?>
                                <div class="item coffee-connections__slide">
                                    <img
                                        class="coffee-connections__image"
                                        src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($alt);  ?>">

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>

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

        <!-- Curious to Know Section -->
        <section class="info-section container-fluid" data-aos="fade-up">
            <div class="info-section__container container">
                <?php if (!empty($settings['curious_image']['url'])) : ?>
                    <img
                        class="info-section__image"
                        src="<?php echo esc_url($settings['curious_image']['url']); ?>"
                        alt="<?php echo esc_attr($settings['curious_image']['alt']); ?>">
                <?php endif; ?>

                <div class="info-section__content">
                    <?php if (!empty($settings['curious_title'])) : ?>
                        <h2 class="info-section__title"><?php echo esc_html($settings['curious_title']); ?></h2>
                    <?php endif; ?>

                    <?php if (!empty($settings['curious_content'])) : ?>
                        <div class="info-section__text"><?php echo wp_kses_post($settings['curious_content']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($settings['curious_button_url']['url'])) : ?>
                        <a href="<?php echo esc_url($settings['curious_button_url']['url']); ?>" class="info-section__link">
                            <?php echo esc_html($settings['curious_button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

<?php
    }
}
