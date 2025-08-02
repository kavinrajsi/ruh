<?php
/**
 * Single template for CPT: blog
 * File: single-blog.php
 */

get_header(); ?>

<main id="primary" class="site-main site-blog__detail">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
        <?php
        the_content();

        // Pagination for multi-page posts created with <!--nextpage-->
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'textdomain' ),
            'after'  => '</div>',
        ) );
        ?>
    </div>

    <footer class="entry-footer">
        <?php
        // Custom taxonomies
        $collections = get_the_term_list( get_the_ID(), 'collection', '', ', ' );
        $tags        = get_the_term_list( get_the_ID(), 'blog_tag', '', ', ' );

        if ( $collections || $tags ) : ?>
            <div class="post-taxonomies">
                <?php if ( $collections ) : ?>
                    <span class="post-collections">
                        <?php esc_html_e( 'Collections: ', 'textdomain' ); ?>
                        <?php echo wp_kses_post( $collections ); ?>
                    </span>
                <?php endif; ?>

                <?php if ( $tags ) : ?>
                    <span class="post-tags">
                        <?php esc_html_e( 'Tags: ', 'textdomain' ); ?>
                        <?php echo wp_kses_post( $tags ); ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

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

<?php
    /**
     * OPTIONAL: Related posts by Collection (fallback to tags if no collection)
     */
    $tax_for_related = 'collection';
    $terms = wp_get_post_terms( get_the_ID(), $tax_for_related, array( 'fields' => 'ids' ) );

    if ( empty( $terms ) ) {
        $tax_for_related = 'blog_tag';
        $terms = wp_get_post_terms( get_the_ID(), $tax_for_related, array( 'fields' => 'ids' ) );
    }

    if ( ! empty( $terms ) ) :
        $related = new WP_Query( array(
            'post_type'      => 'blog',
            'posts_per_page' => 3,
            'post__not_in'   => array( get_the_ID() ),
            'tax_query'      => array(
                array(
                    'taxonomy' => $tax_for_related,
                    'field'    => 'term_id',
                    'terms'    => $terms,
                ),
            ),
        ) );

        if ( $related->have_posts() ) : ?>
            <section class="related-posts">
                <h2><?php esc_html_e( 'Related Posts', 'textdomain' ); ?></h2>
                <ul>
                    <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </section>
        <?php
        endif;
        wp_reset_postdata();
    endif; ?>

<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
