<?php

/**
 * @author: MadSparrow
 * @version: 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

$cat = jackryan_filter_category();
$query = jackryan_portfolio_loop($cat);
$terms = get_terms('portfolios_categories');
jackryan_infinity_load( $query );
$media_wrapper = get_field('thumbnail_style');
$col = get_field('number_of_columns');
if ( get_field('text_style') == 'overlay' ) {
	$card_style = 'text-overlay';
	$card_overlay = '<span class="overlay"></span>';
} else {
	$card_style = null;
	$card_overlay = null;
}
?>
<div class="container ms-content">

	<?php if ( $terms && !is_wp_error( $terms ) ): ?>
	<div class="subnav margin-bottom--lg">
		<div class="subnav__container">
			<div class="filter-nav filter-nav--expanded js-filter-nav">
			<button class="reset btn btn--subtle is-hidden js-filter-nav__control" aria-label="<?php esc_attr_e('Select a filter option', 'jackryan'); ?>" aria-controls="filter-nav">
		    	<span class="js-filter-nav__placeholder" aria-hidden="true"><?php esc_html_e('All Products', 'jackryan'); ?></span>
		    	<svg class="icon icon--xxs margin-left-xxs" aria-hidden="true" viewBox="0 0 12 12"><polyline points="0.5 3.5 6 9.5 11.5 3.5" fill="none" stroke-width="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></polyline></svg>
		  	</button>

			<div class="filter-nav__wrapper js-filter-nav__wrapper" id="filter-nav">
			<nav class="filter-nav__nav js-filter-nav__nav">
				<ul class="filtr-btn filter-nav__list js-filter-nav__list">
					<li class="filter-nav__item subnav__link" data-filter="*">
						<button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus active" aria-current="true" ><?php esc_html_e('All', 'jackryan'); ?></button>
					</li>
					<?php foreach ( $terms as $term ) { ?>
						<li class="filter-nav__item subnav__link" data-filter=".<?php echo esc_attr($term->slug); ?>">
							<button class="reset filter-nav__btn js-filter-nav__btn js-tab-focus" ><?php echo esc_html($term->name); ?></button>
						</li>
					<?php } ?>
					<li class="filter-nav__marker js-filter-nav__marker" aria-hidden="true"></li>
				</ul>

			  <button class="reset filter-nav__close-btn is-hidden js-filter-nav__close-btn js-tab-focus" aria-label="Close navigation">
			    <svg class="icon" viewBox="0 0 16 16" aria-hidden="true"><g stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line><line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line></g></svg>
			  </button>
			</nav>
		  </div>
			</div>
		</div>
	</div>
	<?php endif;?>

    <div class="work-grid row grid-content portfolio-feed ms-p2">
		<span class="load_filter">
			<svg class="load-filter-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45px" height="45px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
		    <circle cx="50" cy="50" r="30" stroke="" stroke-width="0" fill="none"></circle>
		    <circle cx="50" cy="50" r="30" stroke="" stroke-width="6" stroke-linecap="round" fill="none" transform="rotate(307.62 50 50)">
		      <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;180 50 50;720 50 50" keyTimes="0;0.5;1"></animateTransform>
		      <animate attributeName="stroke-dasharray" repeatCount="indefinite" dur="1s" values="18.84955592153876 169.64600329384882;94.2477796076938 94.24777960769377;18.84955592153876 169.64600329384882" keyTimes="0;0.5;1"></animate>
		    </circle>
		</svg></span>
        <div class="grid-sizer col-sm-12 col-md-<?php echo esc_attr($col); ?> col-sm-6"></div>
        <?php if ( $query->have_posts() ):
        	while ( $query->have_posts() ): $query->the_post(); ?>
			<div class="grid-item col-sm-12 col-md-<?php echo esc_attr($col); ?> col-sm-6 pb-5">
				<div class="work-card card--is-link">
				<a href="<?php echo esc_url(the_permalink()); ?>" class="work-card__img-link" aria-label="<?php the_title_attribute(); ?>">
				    <?php if( has_post_thumbnail() ):?>
				        <figure class="work-card__img media-wrapper media-wrapper--<?php echo esc_attr($media_wrapper); ?>">
				            <img src="<?php the_post_thumbnail_url($size = 'jackryan-portfolio-thumb'); ?>" alt="<?php the_title_attribute(); ?>">
				            <?php echo wp_kses_post($card_overlay); ?>
				          <div class="glow-wrap"><i class="glow vertical"></i></div>
				        </figure>
				    <?php endif; ?>
				</a>
				<div class="work-card__content <?php echo esc_attr($card_style); ?>">
				    <?php $album_cat = jackryan_work_category(get_the_ID());
				    $string = str_replace('-', ' ', $album_cat); 
				    $album_cat = esc_html($string); ?>
				    <span class="work-card__badge margin-bottom-xxs"><?php echo esc_html($album_cat); ?></span>
				    <a href="<?php echo esc_url(the_permalink()); ?>" class="work-card__title">
				        <h3><?php the_title(); ?></h3>
				    </a>
				    <a href="<?php echo esc_url(the_permalink()); ?>" class="work-card__link"><?php esc_html_e('Show Project', 'jackryan'); ?><svg class="icon" viewBox="0 0 12 12">
				        <g stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="11.5" y1="6" x2="0.5" y2="6"></line><polyline points="7.5 2 11.5 6 7.5 10"></polyline>
				        </g>
				        </svg>
				    </a>
				</div>
				</div>
			</div>
		<?php endwhile;
		endif; 
		wp_reset_postdata(); ?>

    </div>

	<?php if ( $query->max_num_pages > 1 ) : ?>
		<div class="ms-pagination works-pagination">
			<?php echo jackryan_portfolio_pagination($query->max_num_pages); ?>
		</div>
	<?php endif; ?>

</div>











