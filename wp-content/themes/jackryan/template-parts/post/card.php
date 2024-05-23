<?php 

/**
 * @author: MadSparrow
 * @version: 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item col-sm-12 col-md-6 col-lg-4 pb-5'); ?>>
  <div class="work-card card--is-link">
    
    <?php if ( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
        <figure class="work-card__img media-wrapper media-wrapper--4:3">
          <img src="<?php the_post_thumbnail_url($size = 'jackryan-card-post-thumb'); ?>" alt="<?php the_title_attribute() ?>">
          <div class="glow-wrap"><i class="glow"></i></div>
          <?php if ( is_sticky() ) : ?>
          <figcaption class="bc sticky">
            <svg class="sticky-icon" viewBox="0 0 12 12"><title><?php esc_html_e( 'Featured', 'jackryan' ); ?></title>
              <g><path d="M2.5,0A1.5,1.5,0,0,0,1,1.5V12L6,9l5,3V1.5A1.5,1.5,0,0,0,9.5,0Z"></path></g>
            </svg>
            <svg class="sticky-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
          </figcaption>
          <?php endif;?>
        </figure>
      </a>
    <?php endif; ?>
    
    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
    <div class="card__content--sm">
        <h3 class="card__title--sm"><span class="ms-text-bg"><?php the_title(); ?></span></h3>
        <span class="card__date"><?php echo get_the_date(); ?></span>
    </div>
    </a>
  </div>
</article>
