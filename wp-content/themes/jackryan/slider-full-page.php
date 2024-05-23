<?php 
/**
 * Template Name: Slider Full Page
 *
 * @package JackRyan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();

?>
<?php if( class_exists('acf') ) : ?>
    <div class="swiper-container swiper-full-page">
        <div class="swiper-wrapper">
            <?php
            $i = 1;
            $counter = 1;
            $autoplay = get_field('full_autoplay');
            $delay = get_field('full_delay_number');
            $slider = get_field('slider_full');
            foreach($slider as $slide) :
                $slide_type = ($slide['slide_full_content']['slide_type']);
                $slide_cat = ($slide['slide_full_content']['category']);
                $slide_title = ($slide['slide_full_content']['title']);
                $slide_img_url = ($slide['slide_full_content']['slide_image']);
                $slide_video_url = ($slide['slide_full_content']['slide_video']);
            ?>
                <?php if ($autoplay == '1') : ?>
                <div class="swiper-slide" data-swiper-autoplay="<?php echo esc_attr($delay); ?>" data-autoplay="true">
                <?php else: ?>
                <div class="swiper-slide" data-autoplay="false">
                <?php endif; ?>
                <div class="swiper-slide__inner">
                    <?php if ($slide_type == 'Image') : ?>
                        <div class="slide-image" style="background-image: url('<?php echo esc_url( $slide_img_url );?>');"></div>
                    <?php endif; ?>
                    <?php if ($slide_type == 'Video') : ?>
                        <div class="slide-inner--video slide-image media-wrapper" data-swiper-parallax="100%">
                            <video loop muted autoplay class="fullscreen-bg__video media-wrapper--4:3">
                                <source src="<?php echo esc_url( $slide_video_url );?>">
                            </video>
                        </div>
                    <?php endif; ?>
                    <div class="slide-title-container row">
                        <div class="slide-title--inner">
                            <div class="slide-info__left">
                                <div class="ms-slide-count">
                                    <span><?php if ($i > 10) { echo esc_html($i++); } else { echo esc_html('0'.$i++); } ?></span>
                                    <span class="total-count"></span>
                                </div>
                                <div class="slide-title">
                                    <?php if ($slide_cat) : ?>
                                    <div class="slide-cat"><?php echo esc_html($slide_cat); ?></div>
                                    <?php endif; ?>
                                    <h3><?php echo wp_kses_post($slide_title); ?></h3>
                                    <?php 
                                    if ($slide['slide_full_content']['link']) :
                                        $slide_link_url = ($slide['slide_full_content']['link']['url']);
                                        $slide_link_title = ($slide['slide_full_content']['link']['title']);
                                        $slide_link_target = ($slide['slide_full_content']['link']['target']);
                                        if ($slide_link_target == null) {
                                            $slide_link_target = '_self';
                                        }
                                     ?>
                                        <a href="<?php echo esc_url( $slide_link_url ) ?>" target="<?php echo esc_attr( $slide['slide_full_content']['link']['target'] ); ?>" class="slide-link" rel="noreferrer">
                                            <?php echo esc_html($slide_link_title); ?>
                                            <span></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="slider-nav">
                            <div class="swiper-button-prev">
                                <svg version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polyline class="st0" points="11,18 16,13 21,18 " />
                                    <path class="st0" d="M21,29H11c-4.4,0-8-3.6-8-8V11c0-4.4,3.6-8,8-8h10c4.4,0,8,3.6,8,8v10C29,25.4,25.4,29,21,29z"/>
                                </svg>
                            </div>
                            <div class="swiper-button-next">
                                <svg version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <polyline class="st0" points="21,14 16,19 11,14 " />
                                    <path class="st0" d="M21,29H11c-4.4,0-8-3.6-8-8V11c0-4.4,3.6-8,8-8h10c4.4,0,8,3.6,8,8v10C29,25.4,25.4,29,21,29z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php 
            $total_count = $counter++;
            endforeach;
            ?>

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
    </div>
    <div class="swiper-counter" data-counter="/ <?php if ($total_count > 10) { echo esc_html($total_count); } else { echo esc_html('0'.$total_count);}?>">
    </div>
<?php else: ?>
    <div class="slider-not-active">
        <p>
        <?php printf( wp_kses( __( 'Please Instal or Activate the necessary plug-ins ( <a href="%1$s">Advanced Custom Fields PRO</a> ).', 'jackryan' ), array( 'a' => array( 'href' => array(), ), ) ), esc_url( admin_url( 'plugins.php' ) ) );?>
        </p>
    </div>
    
<?php endif; ?>

<?php wp_footer(); ?>