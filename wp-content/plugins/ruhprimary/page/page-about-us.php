<?php

/**
 * Description: A custom Elementor widget designed to create a comprehensive "About Us" page layout. Includes sections for The Story, Our Campuses, About Us, Roles of the Future, About the Classroom, Friends Gallery, and a Call-to-Action. Fully customizable via the Elementor editor.
 * Author: ruhprimary
 * Version: 1.0.0
 * Text Domain: ruhprimary
 */


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (! defined('ABSPATH')) exit;

class Elementor_About_Us_Page extends Widget_Base
{

    public function get_name()
    {
        return 'about_page';
    }

    public function get_title()
    {
        return __('About Page Builder', 'about-page-widget');
    }

    public function get_icon()
    {
        return 'eicon-info-circle-o';
    }

    public function get_categories()
    {
        return ['fos'];
    }

    protected function register_controls()
    {

        /* === The Story === */
        $this->start_controls_section('section_story', [
            'label' => __('The Story', 'about-page-widget'),
        ]);

        $this->add_control('story_image', [
            'label' => __('Image', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('story_content', [
            'label' => __('Content', 'about-page-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->end_controls_section();

        /* === Our Campuses === */
        $this->start_controls_section('section_campuses', [
            'label' => __('Our Campuses', 'about-page-widget'),
        ]);

        $this->add_control('campuses_title', [
            'label' => __('Title', 'about-page-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('campuses_content', [
            'label' => __('Content', 'about-page-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $campus_repeater = new Repeater();

        $campus_repeater->add_control('campus_title', [
            'label' => __('Campus Title', 'about-page-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $campus_repeater->add_control('campus_content', [
            'label' => __('Campus Content', 'about-page-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $campus_repeater->add_control('campus_image', [
            'label' => __('Campus Image', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('campus_list', [
            'label' => __('Campuses', 'about-page-widget'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $campus_repeater->get_controls(),
            'title_field' => '{{{ campus_title }}}',
        ]);

        $this->end_controls_section();

        /* === About Us === */
        $this->start_controls_section('section_about_us', [
            'label' => __('About Us', 'about-page-widget'),
        ]);

        $this->add_control('about_image', [
            'label' => __('Image', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('about_content', [
            'label' => __('Content', 'about-page-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->end_controls_section();

        /* === Roles of Future === */
        $this->start_controls_section('section_roles', [
            'label' => __('Roles of Future', 'about-page-widget'),
        ]);

        $this->add_control('roles_image_mobile', [
            'label' => __('Image Mobile', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('roles_image_desktop', [
            'label' => __('Image Desktop', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('roles_title', [
            'label' => __('Title', 'about-page-widget'),
            'type' => Controls_Manager::TEXT,
        ]);

        $this->add_control('roles_content', [
            'label' => __('Content', 'about-page-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->end_controls_section();

        /* === About Classroom === */
        $this->start_controls_section('section_classroom', [
            'label' => __('About Classroom', 'about-page-widget'),
        ]);

        $this->add_control('classroom_image', [
            'label' => __('Image', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
        ]);

        $this->add_control('classroom_content', [
            'label' => __('Content', 'about-page-widget'),
            'type' => Controls_Manager::WYSIWYG,
        ]);

        $this->end_controls_section();

        /* === Friends Section (Gallery) === */
        $this->start_controls_section('section_friends', [
            'label' => __('Friends Gallery', 'about-page-widget'),
        ]);

        $this->add_control('friends_title', [
            'label' => __('Gallery Title', 'about-page-widget'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Our Friends', 'about-page-widget'),
        ]);

        $this->add_control('friends_gallery', [
            'label' => __('Gallery Images', 'about-page-widget'),
            'type' => Controls_Manager::GALLERY,
        ]);

        $this->end_controls_section();

        /* === Curious To Know === */
        $this->start_controls_section('section_cta', [
            'label' => __('Curious To Know', 'about-page-widget'),
        ]);

        $this->add_control('cta_image', [
            'label' => __('Image', 'about-page-widget'),
            'type' => Controls_Manager::MEDIA,
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

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <!-- The Story Section -->
        <?php if (!empty($settings['story_image']['url']) || !empty($settings['story_content'])) : ?>
            <section class="about-page__section about-page__section--story">
                <div class="container">
                    <div class="about-page__content about-page__content--story">
                        <?= wp_kses_post($settings['story_content']); ?>
                    </div>
                    <?php if (!empty($settings['story_image']['url'])) : ?>
                        <div class="about-page__image--storyWrapper">
                            <div class="divider top">
                                <svg width="395" height="46" viewBox="0 0 395 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M394 1L0.5 45V1H394Z" fill="#505C44" stroke="#505C44" />
                                </svg>
                            </div>
                            <img class="about-page__image--story" src="<?= esc_url($settings['story_image']['url']); ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="divider bottom">
                    <svg width="393" height="69" viewBox="0 0 393 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M393 68V1.5L0 56.5V68H393Z" fill="#FFF2DD" stroke="#FFF2DD" />
                    </svg>

                </div>
            </section>
        <?php endif; ?>


        <!-- Our Campuses -->
        <section class="about-page__campuses container">
            <div>
                <?php if (!empty($settings['campuses_title'])) : ?>
                    <h2 class="about-page__title about-page__title--campuses"><?= wp_kses_post($settings['campuses_title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($settings['campuses_content'])) : ?>
                    <div class="about-page__text about-page__text--campuses">
                        <?= wp_kses_post($settings['campuses_content']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($settings['campus_list'])) : ?>
                <!-- <div class="about-page__campus-list container"> -->
                <?php foreach ($settings['campus_list'] as $campus) : ?>
                    <div class="about-page__campus">
                        <?php if (!empty($campus['campus_image']['url'])) : ?>
                            <img class="about-page__campus-image" src="<?= esc_url($campus['campus_image']['url']); ?>" alt="<?= esc_attr($campus['campus_image']['alt']); ?>">
                        <?php endif; ?>
                        <h3 class="about-page__campus-title"><?= wp_kses_post($campus['campus_title']); ?></h3>
                        <div class="about-page__campus-content"><?= wp_kses_post($campus['campus_content']); ?></div>
                    </div>
                <?php endforeach; ?>
                <!-- </div> -->
            <?php endif; ?>
        </section>

        <!-- About Us -->
        <section class="about-page__detail">
            <div class="about-page__detail-container container">
                <?php if (!empty($settings['about_image']['url'])) : ?>
                    <img
                        class="about-page__detail-image"
                        src="<?= esc_url($settings['about_image']['url']); ?>"
                        alt="">
                <?php endif; ?>

                <div class="about-page__detail-content">
                    <?= wp_kses_post($settings['about_content']); ?>
                </div>
            </div>
        </section>


        <!-- Roles of Future -->
        <section class="about-page__role-future">
            <?php if (!empty($settings['roles_image_mobile']['url'])) : ?>
                <img
                    class="about-page__image--roles mobile"
                    src="<?= esc_url($settings['roles_image_mobile']['url']); ?>"
                    alt="<?= esc_attr($settings['roles_image_mobile']['alt']); ?>">

            <?php endif; ?>
            <?php if (!empty($settings['roles_image_desktop']['url'])) : ?>
                <img
                    class="about-page__image--roles desktop"
                    src="<?= esc_url($settings['roles_image_desktop']['url']); ?>"
                    alt="<?= esc_attr($settings['roles_image_desktop']['alt']); ?>">

            <?php endif; ?>
            <div class="content">
                <h3 class="about-page__title about-page__title--roles"><?= esc_html($settings['roles_title']); ?></h3>
                <div class="about-page__content about-page__content--roles">
                    <?= wp_kses_post($settings['roles_content']); ?>
                </div>
            </div>
        </section>


        <!-- About Classroom -->
        <section class="about-page__classroom">
            <div class="about-page__classroom-container container">

                <div class="about-page__classroom-content">
                    <?= wp_kses_post($settings['classroom_content']); ?>
                </div>
                <?php if (!empty($settings['classroom_image']['url'])) : ?>
                    <img
                        class="about-page__classroom-image"
                        src="<?= esc_url($settings['classroom_image']['url']); ?>"
                        alt="<?= esc_attr($settings['classroom_image']['alt']); ?>">

                <?php endif; ?>
            </div>
        </section>



        <!-- Friends Gallery -->
        <?php if (!empty($settings['friends_gallery'])) : ?>
            <div class="about-page__gallery">
                <div class="container about-page__gallery-container">
                    <?php if (!empty($settings['friends_title'])) : ?>
                        <h2 class="about-page__gallery-title"><?= esc_html($settings['friends_title']); ?><svg width="124" height="46" viewBox="0 0 124 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_548_720)">
                                    <path d="M10.9668 24.536C10.9668 19.3056 29.664 20.0252 29.664 10.5192C29.664 5.21963 24.3041 2.78432 17.3377 2.77048C13.1828 2.77048 9.98352 5.20579 9.96967 8.66503V30.1261C9.91427 39.1063 10.2467 41.763 11.7978 41.763V41.8737H4.19434V41.7492C5.7455 41.7492 6.07789 39.0925 6.09174 30.1123V13.591C6.09174 4.56929 5.7732 1.89876 4.22203 1.89876V1.78806C9.09713 1.8019 14.4154 0.97168 17.3516 0.97168C25.0105 0.97168 33.7219 3.8636 33.7219 10.3946C33.6665 19.2641 13.7091 21.1321 13.7091 23.5259C13.7091 24.6467 21.0217 20.9661 25.3983 21.0906C28.0159 21.0906 29.7886 22.3636 31.3398 26.4732C34.179 33.959 35.9379 41.7769 38.4447 41.7769V41.8876H30.8412V41.7769C32.6832 41.7769 30.8966 36.7402 27.3511 27.2481C26.063 23.9825 25.6891 23.014 23.3485 23.014C20.7724 23.014 10.9668 27.76 10.9668 24.5222" fill="#FFF2DD" />
                                    <mask id="mask0_548_720" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="4" y="0" width="35" height="42">
                                        <path d="M10.9668 24.536C10.9668 19.3056 29.664 20.0252 29.664 10.5192C29.664 5.21963 24.3041 2.78432 17.3377 2.77048C13.1828 2.77048 9.98352 5.20579 9.96967 8.66503V30.1261C9.91427 39.1063 10.2467 41.763 11.7978 41.763V41.8737H4.19434V41.7492C5.7455 41.7492 6.07789 39.0925 6.09174 30.1123V13.591C6.09174 4.56929 5.7732 1.89876 4.22203 1.89876V1.78806C9.09713 1.8019 14.4154 0.97168 17.3516 0.97168C25.0105 0.97168 33.7219 3.8636 33.7219 10.3946C33.6665 19.2641 13.7091 21.1321 13.7091 23.5259C13.7091 24.6467 21.0217 20.9661 25.3983 21.0906C28.0159 21.0906 29.7886 22.3636 31.3398 26.4732C34.179 33.959 35.9379 41.7769 38.4447 41.7769V41.8876H30.8412V41.7769C32.6832 41.7769 30.8966 36.7402 27.3511 27.2481C26.063 23.9825 25.6891 23.014 23.3485 23.014C20.7724 23.014 10.9668 27.76 10.9668 24.5222" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_548_720)">
                                        <path d="M38.4309 0.97168H4.19434V41.8876H38.4309V0.97168Z" fill="#FFF2DD" />
                                    </g>
                                    <path d="M47.1285 0.97168H54.6766V1.08238C53.4024 1.08238 53.2362 2.52142 53.2362 5.01207C53.2362 26.8468 51.5742 39.2447 64.3298 39.2447C71.5317 39.2447 76.199 34.6785 76.199 23.4152C76.199 12.9406 75.2711 1.06854 71.6009 1.06854V0.97168H79.2044V1.08238C76.8777 1.08238 78.7058 12.9406 78.7058 23.4291C78.7058 37.4044 72.9582 41.8876 63.9559 41.8876C46.9207 41.8876 49.1367 27.0267 49.1921 5.85613C49.1921 2.7013 49.1367 1.08238 47.0869 1.08238L47.1285 0.97168Z" fill="#FFF2DD" />
                                    <mask id="mask1_548_720" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="47" y="0" width="33" height="42">
                                        <path d="M47.1285 0.97168H54.6766V1.08238C53.4024 1.08238 53.2362 2.52142 53.2362 5.01207C53.2362 26.8468 51.5742 39.2447 64.3298 39.2447C71.5317 39.2447 76.199 34.6785 76.199 23.4152C76.199 12.9406 75.2711 1.06854 71.6009 1.06854V0.97168H79.2044V1.08238C76.8777 1.08238 78.7058 12.9406 78.7058 23.4291C78.7058 37.4044 72.9582 41.8876 63.9559 41.8876C46.9207 41.8876 49.1367 27.0267 49.1921 5.85613C49.1921 2.7013 49.1367 1.08238 47.0869 1.08238L47.1285 0.97168Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask1_548_720)">
                                        <path d="M79.2048 0.97168H46.9072V41.8876H79.2048V0.97168Z" fill="#FFF2DD" />
                                    </g>
                                    <path d="M121.266 29.7249C121.21 38.7051 121.501 41.3618 123.108 41.3618L123.052 41.4725H115.504V41.3618C117.055 41.3618 117.388 38.7051 117.388 29.3375V13.2036C117.388 4.16803 117.069 1.51133 115.504 1.51133V1.40063H123.052L123.108 1.51133C121.501 1.51133 121.266 4.16803 121.266 13.1482V29.7249ZM93.414 29.7249C93.3586 38.7051 93.691 41.3618 95.2422 41.3618V41.4725H87.6387V41.3618C89.1898 41.3618 89.5222 38.7051 89.5222 29.3375V13.2036C89.5222 4.16803 89.1898 1.51133 87.6387 1.51133V1.40063H95.2422V1.51133C93.691 1.51133 93.414 4.16803 93.414 13.1482V20.2742C94.5081 17.493 97.3335 16.1093 99.9095 16.1093C106.502 16.1093 112.624 23.8027 117 23.8027V24.6191C112.457 24.6191 105.352 19.3195 99.9095 19.3195C95.2006 19.3195 93.414 23.9549 93.414 26.1826V29.7249Z" fill="#FFF2DD" />
                                    <mask id="mask2_548_720" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="87" y="1" width="37" height="41">
                                        <path d="M121.266 29.7249C121.21 38.7051 121.501 41.3618 123.108 41.3618L123.052 41.4725H115.504V41.3618C117.055 41.3618 117.388 38.7051 117.388 29.3375V13.2036C117.388 4.16803 117.069 1.51133 115.504 1.51133V1.40063H123.052L123.108 1.51133C121.501 1.51133 121.266 4.16803 121.266 13.1482V29.7249ZM93.414 29.7249C93.3586 38.7051 93.691 41.3618 95.2422 41.3618V41.4725H87.6387V41.3618C89.1898 41.3618 89.5222 38.7051 89.5222 29.3375V13.2036C89.5222 4.16803 89.1898 1.51133 87.6387 1.51133V1.40063H95.2422V1.51133C93.691 1.51133 93.414 4.16803 93.414 13.1482V20.2742C94.5081 17.493 97.3335 16.1093 99.9095 16.1093C106.502 16.1093 112.624 23.8027 117 23.8027V24.6191C112.457 24.6191 105.352 19.3195 99.9095 19.3195C95.2006 19.3195 93.414 23.9549 93.414 26.1826V29.7249Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask2_548_720)">
                                        <path d="M123.094 1.40063H87.6387V41.4863H123.094V1.40063Z" fill="#FFF2DD" />
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_548_720">
                                        <rect width="122.721" height="44.94" fill="white" transform="translate(0.373047 0.97168)" />
                                    </clipPath>
                                </defs>
                            </svg></h2>
                    <?php endif; ?>
                    <div class="about-page__gallery-imageWrapper">
                        <?php foreach ($settings['friends_gallery'] as $img) : ?>
                            <img
                                class="about-page__gallery-image"
                                src="<?= esc_url($img['url']); ?>"
                                alt="<?= esc_attr($img['alt']); ?>">

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>



        <!-- Curious To Know (CTA) -->
        <section class="info-section container-fluid">
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


        </div>
<?php

    }
}
