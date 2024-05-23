<?php 
/**
 * Template Name: Blog Sidebar
 *
 * @package JackRyan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();

if (get_field('posts_per_page')) {
    $items = get_field('posts_per_page');
} else {
    $items = get_option('posts_per_page');
}

$query = jackryan_posts_loop($items);
$sidebar_stat = jackryan_sidebar_check();
$cont_class = $sidebar_stat['1'];
$cont_col = $sidebar_stat['0'];
?>


<?php get_template_part( 'template-parts/hero/'. jackryan_hero_style() .'', '' ); ?>

<div class="container ms-content">
	<div class="row justify-content-between">
		<div class="<?php echo esc_attr($cont_class); ?> grid-content col-lg-<?php echo esc_attr($cont_col); ?>">
			<div class="grid-sizer"></div>
			<?php if(have_posts()) :
				while($query->have_posts()) : $query->the_post();
					get_template_part( 'template-parts/post/default', get_post_format() );
				endwhile;
				wp_reset_postdata();
			endif; ?>
            <?php if ( $query->max_num_pages > 1 ) : ?>
                <div class="grid-item ms-pagination col pb-lg-3 pt-lg-3">
                    <?php echo jackryan_posts_pagination( $query ); ?>
                    <div class="margin-bottom-xl"></div>
                </div>
            <?php endif; ?>
		</div>
		<div class="pl-lg-5 col-lg-4">
            <div class="ms-sidebar">
			    <?php get_sidebar(); ?>
            </div>
		</div>
	</div>
</div>


<?php get_footer(); ?>