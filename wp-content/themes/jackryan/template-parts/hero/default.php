<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

if( class_exists('acf') ) {
    $hero_title = get_field('hero_title');
    $hero_align = get_field('text_align');
    $hero_desc = get_field('hero_description');
} else {
    $hero_align = 'left';
}

?>
<div class="margin-top-lg"></div>
<section class="hero hero--overlay-layer hero-default">
    <div class="container">
        <div class="hero__content text-<?php echo esc_attr($hero_align); ?>">
            <?php if ( is_single() && 'portfolio' != get_post_type() ) :
                $album_cat = jackryan_work_category(get_the_ID());
                $string = str_replace('-', ' ', $album_cat); 
                $album_cat = esc_html($string);                     
            ?>
                <span><?php  echo esc_html($album_cat); ?></span>
                <?php the_title( '<h1>', '</h1>' ); ?>
            <?php else: ?>
                <?php echo jackryan_hero_title(); ?>
            <?php endif; ?>
            <?php if( class_exists('acf') && !empty($hero_title) ) : ?>
                <h1><?php echo esc_html($hero_title); ?></h1>
            <?php else: ?>
                <?php the_title( '<h1>', '</h1>' ); ?>
            <?php endif; ?>
            <?php if( class_exists('acf') && !empty($hero_desc) ) : ?>
                <p><?php echo esc_html($hero_desc); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
