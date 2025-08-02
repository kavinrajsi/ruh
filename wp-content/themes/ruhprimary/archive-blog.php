<?php

/**
 * Archive template for CPT: blog
 * File: archive-blog.php
 */

get_header(); ?>

<main id="primary" class="site-main">
    <header class="ruh-blog-archive page-header">
        <div class="container">
            <h1 class="page-title">The Ruh’lington Post</h1>
            <p class="page-description">Explore perspectives, reflections, and learning adventures from Ruh'lers. The Ruh’lington Post is your gateway to engaging stories, academic insights, and campus highlights.</p>
        </div>
    </header>
    <?php if (have_posts()) : ?>
        <div class="container posts-list">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('archive-item'); ?> <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <a class="archive-thumb" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <div class="entry-taxonomies">
                        <?php
                        $collections = get_the_term_list(get_the_ID(), 'collection', '<span class="collections">', ', ', '</span>');
                        $tags        = get_the_term_list(get_the_ID(), 'blog_tag', '<span class="tags">', ', ', '</span>');
                        if ($collections) echo wp_kses_post($collections);
                        if ($tags)        echo wp_kses_post($tags);
                        ?>
                    </div>
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <span><?php the_title(); ?></span>
                            <span class="entry-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </h2>
                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
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
                </article>
            <?php endwhile; ?>
        </div>
        <nav class="pagination">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('← Previous', 'textdomain'),
                'next_text' => __('Next →', 'textdomain'),
            ));
            ?>
        </nav>
    <?php else : ?>
        <section class="no-results not-found">
            <h2><?php esc_html_e('Nothing found', 'textdomain'); ?></h2>
            <p><?php esc_html_e('Sorry, there are no posts here yet.', 'textdomain'); ?></p>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>