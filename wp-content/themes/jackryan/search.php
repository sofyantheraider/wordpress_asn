<?php

/**
 * @author: MadSparrow
 * @version: 1.0
 */

get_header();

$sidebar_stat = jackryan_sidebar_check();
$cont_class = $sidebar_stat['1'];
$cont_col = $sidebar_stat['0'];

?>

<?php if ( have_posts() ) : ?>

    <div class="margin-top-xl"></div>
    <section class="hero hero--overlay-layer hero-default">
      <div class="container">
        <div class="hero__content text-left">
            <h1><?php esc_html_e( 'search results:', 'jackryan' ); ?><i class="search-word"><?php printf( get_search_query() ); ?></i></h1>
        </div>
      </div>
    </section>

    <div class="container ms-content">
        <div class="row justify-content-between">
            <div class="<?php echo esc_attr($cont_class); ?> grid-content col-lg-<?php echo esc_attr($cont_col); ?>">
                <div class="grid-sizer"></div>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="grid-item pb-lg-5 pb-sm-5 pb-5 card__content">
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
                            <a href="<?php the_permalink(); ?>" class="post-read-more"><?php esc_html_e( 'Read more', 'jackryan'); ?> 
                                <svg class="icon" viewBox="0 0 12 12">
                                <g stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="11.5" y1="6" x2="0.5" y2="6"></line><polyline points="7.5 2 11.5 6 7.5 10"></polyline>
                                </g>
                                </svg>
                            </a>
                        </div>       
                    </div>
                <?php endwhile; ?>
                <div class="grid-item ms-pagination col pb-lg-3 pt-lg-3">
                    <?php if ( the_posts_pagination() ) : ?>
                            <?php the_posts_pagination(); ?>                        
                    <?php endif; ?>
                </div>
            </div>
            <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
                <div class="pl-lg-5 col-lg-4">
                    <div class="ms-sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="margin-bottom-xl"></div>
   
<?php else :
    get_template_part( 'template-parts/page/page', 'none' );
endif; ?>

<?php get_footer(); ?>