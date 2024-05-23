<?php 

/**
 * @author: MadSparrow
 * @version: 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

$sidebar_stat = jackryan_sidebar_check();

if (jackryan_no_sidebar_page() == true ) {
  $thumb_media = '21:9';
  $thumb_size = 'jackryan-no-post-thumb';
} else {
  $thumb_media = $sidebar_stat['2'];
  $thumb_size = $sidebar_stat['3'];
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item pb-lg-5 pb-sm-5 pb-5'); ?>>
  <div class="work-card card--is-link">
    <?php if ( has_post_thumbnail() ) : ?>
      <a href="<?php the_permalink(); ?>" class="post_thumb">
        <figure class="card__img media-wrapper media-wrapper--<?php echo esc_attr($thumb_media)?>">          
          <img src="<?php the_post_thumbnail_url($size = $thumb_size); ?>" alt="<?php the_title_attribute (); ?>">
          <div class="glow-wrap"><i class="glow"></i></div>
          <?php if ( is_sticky() ) : ?>
            <figcaption class="bs sticky">
              <svg class="sticky-icon" viewBox="0 0 12 12"><title><?php esc_html_e( 'Featured', 'jackryan' ); ?></title>
                <g><path d="M2.5,0A1.5,1.5,0,0,0,1,1.5V12L6,9l5,3V1.5A1.5,1.5,0,0,0,9.5,0Z"></path></g>
              </svg>
              <svg class="sticky-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
            </figcaption>
          <?php endif;?>
        </figure>
      </a>
    <?php else: ?>
    <?php if ( is_sticky() ) : ?>
      <figcaption class="bs sticky-no">
        <div class="sticky-no__inner">
          <svg class="sticky-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
          <span><?php esc_html_e( 'Featured', 'jackryan' ); ?></span>
        </div>
      </figcaption>
    <?php endif;?>
    <?php endif; ?>
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
        <span class="post-author__name"><?php esc_html_e( 'By &nbsp;', 'jackryan' ); ?><?php the_author(); ?></span>
        <span class="post-info__divider"></span>
        <a href="<?php the_permalink(); ?>" class="post-read-more"><?php esc_html_e( 'Read more', 'jackryan' ); ?> <svg class="icon" viewBox="0 0 12 12">
            <g stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="11.5" y1="6" x2="0.5" y2="6"></line><polyline points="7.5 2 11.5 6 7.5 10"></polyline>
            </g>
          </svg>
        </a>
      </div>       
    </div>
  </div>
</article>