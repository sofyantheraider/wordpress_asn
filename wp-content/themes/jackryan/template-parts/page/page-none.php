<?php 

/**
 * @author: MadSparrow
 * @version: 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

$sidebar_stat = jackryan_sidebar_check();
$cont_class = $sidebar_stat['1'];
$cont_col = $sidebar_stat['0'];

?>

<div class="margin-top-xl"></div>
<section class="hero hero--overlay-layer hero-default">
  <div class="container">
    <div class="hero__content text-left">
        <h1><?php esc_html_e( 'no matches found', 'jackryan' ); ?></h1>
        <p></p>
    </div>
  </div>
</section>

<div class="container no-result">
    <div class="row justify-content-between">
        <div class="<?php echo esc_attr($cont_class); ?> grid-content col-lg-<?php echo esc_attr($cont_col); ?>">
            <div class="grid-sizer"></div>
            <div class="grid-item pb-lg-5 pb-sm-5 pb-5 text-component">
                <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Your search for "', 'jackryan') ?><strong><?php printf( get_search_query() ); ?>"</strong> <?php esc_html_e('didnt return any results.', 'jackryan') ?></p>
                <div class="search-again-block">
                    <p><?php esc_html_e( 'Try a new search:', 'jackryan' ); ?><?php get_search_form(); ?></p>
                </div>
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