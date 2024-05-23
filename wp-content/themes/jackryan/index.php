<?php 

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();
$item = get_option('posts_per_page');
$query = jackryan_posts_loop($item);

$sidebar_stat = jackryan_sidebar_check();
$cont_class = $sidebar_stat['1'];
$cont_col = $sidebar_stat['0'];
?>

<div class="margin-top-xl"></div>
<section class="hero hero--overlay-layer hero-default">
	<div class="container">
		<div class="hero__content text-left">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<p><?php echo get_bloginfo( 'description'); ?></p>
		</div>
	</div>
</section>

<div class="margin-bottom-xl"></div>

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

		<?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
			<div class="pl-lg-5 col-lg-4">
		        <div class="ms-sidebar">
		        	<?php get_sidebar(); ?>
		        </div>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>