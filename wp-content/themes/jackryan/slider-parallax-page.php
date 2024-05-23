<?php 
/**
 * Template Name: Slider Full Page Parallax
 *
 * @package JackRyan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header(); ?>

<?php if( class_exists('acf') ) : ?><?php wp_footer(); ?>

<div class="swiper-container swiper-full-parallax"> 

    <div class="swiper-wrapper">

        <?php
            $i = 1;
            $counter = 1;
            $autoplay = get_field('parallax_autoplay');
            $delay = get_field('parallax_delay');
            $slider = get_field('slider_parallax_content');
            foreach($slider as $slide) :
                $slide_type = ($slide['slide_parallax_content']['slide_type']);
                $slide_img_url = ($slide['slide_parallax_content']['slide_image']);
                $slide_video_url = ($slide['slide_parallax_content']['slide_video']);
                $slide_info = ($slide['slide_parallax_content']['slide_info']);
        ?>
        

        <?php if ($autoplay == '1') : ?>
        <div class="swiper-slide" data-swiper-autoplay="<?php echo esc_attr($delay); ?>" data-autoplay="true">
        <?php else: ?>
        <div class="swiper-slide" data-autoplay="false">
        <?php endif; ?>
            <div class="swiper-slide__inner">
                <?php if ($slide_type == 'Image') : ?>
                    <div class="slide-image" data-swiper-parallax="100%" data-swiper-parallax-scale="1.15" style="background-image: url('<?php echo esc_url( $slide_img_url );?>');"></div>
                <?php endif; ?>
                <?php if ($slide_type == 'Video') : ?>
                    <div class="slide-inner--video slide-image media-wrapper media-wrapper--4:3" data-swiper-parallax="100%">
                        <video loop muted autoplay class="fullscreen-bg__video">
                            <source src="<?php echo esc_url( $slide_video_url );?>">
                        </video>
                    </div>
                <?php endif; ?>
                <div class="slide-title-container" data-swiper-parallax="100%">
                    <div class="slide-info-left">
                        <div class="slider-nav">
                            <div class="swiper-button-prev">
                                <svg version="1.1" viewBox="0 0 36 36" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polyline class="st0" points="11,18 16,13 21,18 "/>
                                    <path class="st0" d="M21,29H11c-4.4,0-8-3.6-8-8V11c0-4.4,3.6-8,8-8h10c4.4,0,8,3.6,8,8v10C29,25.4,25.4,29,21,29z"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg version="1.1" viewBox="0 0 36 36" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polyline class="st0" points="21,14 16,19 11,14 "/>
                                    <path class="st0" d="M21,29H11c-4.4,0-8-3.6-8-8V11c0-4.4,3.6-8,8-8h10c4.4,0,8,3.6,8,8v10C29,25.4,25.4,29,21,29z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="slide-title">
                            <?php if (!empty($slide_info['category'])) : ?>
                                <div class="slide-cat"><?php echo esc_html($slide_info['category']); ?></div>
                            <?php endif; ?>
                            <?php if (!empty($slide_info['title'])) : ?>
                                <h3><?php echo wp_kses_post($slide_info['title']); ?></h3>
                            <?php endif; ?>
                            <?php 
                            if ($slide_info['link']) :
                                $slide_link_url = $slide_info['link']['url'];
                                $slide_link_title = $slide_info['link']['title'];
                                $slide_link_target = $slide_info['link']['target'];
                                if ($slide_link_target == null) {
                                    $slide_link_target = '_self';
                                }
                             ?>
                                <a href="<?php echo esc_url(  $slide_link_url ) ?>" target="<?php echo esc_attr( $slide_link_target ); ?>" class="slide-link" rel="noreferrer">
                                    <?php echo esc_html( $slide_link_title ); ?>
                                    <span></span>
                                </a>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="ms-slide-count">
                        <span><?php if ($i > 10) { echo esc_html($i++); } else { echo esc_html('0'. $i++); } ?></span>
                        <span class="total-count"></span>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $total_count = $counter++;
            endforeach;
        ?>
    </div>
    <div class="swiper-counter" data-counter="/ <?php if ($total_count > 10) { echo esc_attr($total_count); } else { echo esc_attr('0'.$total_count);}?>">
    </div>
    <?php if ( is_active_sidebar( 'socials' )) : ?>
        <?php dynamic_sidebar( 'socials' ); ?>
    <?php endif; ?>
    <div class="slider footer-copyright">
        <?php if ( get_theme_mod( 'footer_text' ) ) : ?>
            <p><?php echo get_theme_mod( 'footer_text' ); ?></p>
        <?php else: ?>
            <p><?php esc_html_e( 'Copyright &copy; 2020. Developed by MadSparrow', 'jackryan'); ?></p>
        <?php endif; ?>
    </div>
    <div class="scroll-sign"><span></span><div><?php esc_html_e('Scroll', 'jackryan'); ?></div></div>
</div>

<div class="scroll-lock"></div>

<?php endif; ?>

<?php wp_footer(); ?>