<?php
/**
 * Template: Index
 * Acts as fallback for all WordPress content types.
 */

get_header(); ?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php endif; ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                        <?php the_post_thumbnail( 'medium' ); ?>
                    </a>
                <?php endif; ?>

                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="entry-meta">
                        <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>
                        <span class="byline">
                            <?php echo esc_html( get_the_author() ); ?>
                        </span>
                    </div>
                </header>

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>

                <footer class="entry-footer">
                    <a href="<?php the_permalink(); ?>" class="read-more">
                        <?php esc_html_e( 'Read More →', 'textdomain' ); ?>
                    </a>
                </footer>

            </article>
        <?php endwhile; ?>

        <nav class="pagination">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '← Previous', 'textdomain' ),
                'next_text' => __( 'Next →', 'textdomain' ),
            ) );
            ?>
        </nav>

    <?php else : ?>

        <section class="no-results not-found">
            <h2><?php esc_html_e( 'Nothing Found', 'textdomain' ); ?></h2>
            <p><?php esc_html_e( 'It looks like nothing was found here.', 'textdomain' ); ?></p>
        </section>

    <?php endif; ?>

</main>

<?php get_footer(); ?>
