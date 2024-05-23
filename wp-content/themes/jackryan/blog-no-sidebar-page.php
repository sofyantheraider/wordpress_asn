<?php 
/**
 * Template Name: Blog No Sidebar
 *
 * @package JackRyan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();
if( class_exists('acf') ) {
    if (get_field('posts_per_page')) {
        $items = get_field('posts_per_page');
    } else {
        $items = get_option('posts_per_page');
    }  
} else {
    $items = get_option('posts_per_page');
}


$query = jackryan_posts_loop($items);

?>

<?php get_template_part( 'template-parts/hero/'. jackryan_hero_style() .'', '' ); ?>

<div class="container ms-content">
    <div class="no-sidebar">
        <div class="grid-content blog-list">
            <div class="grid-sizer col-lg-12"></div>
            <?php if(have_posts()) :
                while($query->have_posts()) : $query->the_post();
                    get_template_part( 'template-parts/post/default', get_post_format() );
                endwhile;
                wp_reset_postdata();
            endif; ?>
            <?php if ( $query->max_num_pages > 1 ) : ?>
                <div class="grid-item ms-pagination col-12 pb-5">
                    <?php echo jackryan_posts_pagination( $query ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="margin-bottom-xl"></div>
</div>


<?php get_footer(); ?>