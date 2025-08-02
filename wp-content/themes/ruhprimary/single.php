<?php
/**
 * Template: Single Post
 * Used for standard WP posts
 */

get_header(); ?>

<main id="primary" class="site-main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
            <span class="byline">
                <?php
                printf(
                    esc_html__( 'by %s', 'textdomain' ),
                    esc_html( get_the_author() )
                );
                ?>
            </span>

            <span class="categories">
                <?php the_category( ', ' ); ?>
            </span>

            <span class="tags">
                <?php the_tags( '', ', ' ); ?>
            </span>
        </div>

        <?php if ( has_post_thumbnail() ) : ?>
            <figure class="entry-thumbnail">
                <?php the_post_thumbnail( 'large' ); ?>
            </figure>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'textdomain' ),
            'after'  => '</div>',
        ) );
        ?>
    </div>

    <footer class="entry-footer">
        <nav class="post-navigation">
            <div class="nav-previous">
                <?php previous_post_link( '%link', '← %title' ); ?>
            </div>
            <div class="nav-next">
                <?php next_post_link( '%link', '%title →' ); ?>
            </div>
        </nav>
    </footer>

    <?php comments_template(); ?>

</article>

<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
