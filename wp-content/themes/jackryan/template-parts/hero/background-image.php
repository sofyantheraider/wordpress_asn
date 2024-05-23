<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }
if( class_exists('acf') ) {
    $hero_bg = get_field('background_image');
    $hero_title = get_field('hero_title');
    $hero_align = get_field('text_align');
    $hero_desc = get_field('hero_description');
    $h_height = get_field('hero_height');
    $parallax = get_field('parallax_effect');
    
    if ($parallax == 'on') {
        $p_s = '0.7';
    } else {
        $p_s = '1';
    }
    
}

?>
<?php if( class_exists('acf') && !empty($hero_bg) ) : ?>
    <section class="hero hero--overlay-layer background-image">
    <div class="hero-image jarallax" data-speed="<?php echo esc_attr($p_s); ?>" style="background-image: url('<?php echo esc_url( $hero_bg['url'] );?>');"></div>
<?php else: ?>
    <section class="hero hero--overlay-layer background-image">
<?php endif; ?>
    <div class="container">
        <div class="hero__content text-<?php echo esc_attr($hero_align); ?>" style="margin-top: <?php echo esc_attr($h_height); ?>vh">
            <?php if ( is_single() && 'portfolio' != get_post_type() ) :
                $album_cat = jackryan_work_category(get_the_ID());
                $string = str_replace('-', ' ', $album_cat); 
                $album_cat = esc_html($string);                     
                ?>
                <span><?php echo esc_html($album_cat); ?></span>
                <?php the_title( '<h1>', '</h1>' ); ?>
            <?php else: ?>
                <?php the_title( '<span>', '</span>' ); ?>
            <?php endif; ?>

            <?php if( class_exists('acf') && !empty($hero_title) ) : ?>
                <h1><?php echo esc_html($hero_title); ?></h1>
            <?php endif; ?>

            <?php if( class_exists('acf') && !empty($hero_desc) ) : ?>
                <p><?php echo esc_html($hero_desc); ?></p>
            <?php endif; ?>

        </div>
    </div>
</section>