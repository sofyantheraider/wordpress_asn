<?php 
/**
 * Template Name: Portfolio
 *
 * @package Jack Ryan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header(); ?>

<?php get_template_part( 'template-parts/hero/'. jackryan_hero_style() .'', '' ); ?>

<?php if ( function_exists( 'portfolios_register' ) && class_exists( 'acf' ) ) : ?>
	<?php if( have_posts() ):
		while( have_posts() ): the_post();
			get_template_part( 'template-parts/portfolio/feed' );
		endwhile;
	endif; ?>
<?php else : ?>
    <div class="portfolio-not-active">
        <p>Please Instal or Activate the necessary plug-ins( <a href="<?php echo esc_url( admin_url( 'plugins.php' ) )?>"><?php echo jackryan_check_portfolio(); ?></a> )</p>
    </div>
<?php endif; ?>

<?php get_footer(); ?>