<?php 
/**
 * @author: MadSparrow
 * @version: 1.0
 */
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();

?>

<div class="margin-top-xl"></div>
<section class="hero hero--overlay-layer hero-default">
    <div class="container">
        <div class="hero__content text-left">
            <?php
                the_archive_title( '<h1>', '</h1>' );
                the_archive_description( '<p>', '</p>' );
            ?>
        </div>
    </div>
</section>

<div class="container ms-content">
    <div class="parent grid">
        <div class="blog-sidebar grid-content col-9@sm">
            <div class="parent grid-gap-lg grid-content auto-sized-grid grid--gap-lg">
                <div class="grid-sizer col-12@sm"></div>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('grid-item col-12@sm'); ?>>
                            <div class="card__content">
                                <a href="<?php the_permalink(); ?>" class="card__title">
                                    <h4 class=""><?php the_title(); ?></h4>
                                </a>
                                <div class="post-meta-default">
                                    <span class="post__date"><?php echo get_the_date(); ?></span>
                                    <span role="separator"></span>
                                    <span class="post__category link"><?php echo the_category(',&nbsp;'); ?></span>
                                </div>
                                <p class="text-sm post-excerpt"><?php echo get_the_excerpt(); ?></p>
                                <div class="post-info__footer">
                                    <span class="post-author__name"><?php esc_html_e( 'By&nbsp;', 'jackryan' ); ?><?php the_author(); ?></span>
                                    <span class="post-info__divider"></span>
                                    <a href="<?php the_permalink(); ?>" class="post-read-more"><?php esc_html_e('Read more', 'jackryan'); ?>
                                        <svg class="icon" viewBox="0 0 12 12">
                                        <g stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="11.5" y1="6" x2="0.5" y2="6"></line><polyline points="7.5 2 11.5 6 7.5 10"></polyline>
                                        </g>
                                        </svg>
                                    </a>
                                </div>       
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <div class="grid-item ms-pagination col-12@sm">
                        <?php the_posts_pagination(); ?> 
                    </div>
            </div>
        </div>
        <div class="ms-sidebar col-3@sm">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>