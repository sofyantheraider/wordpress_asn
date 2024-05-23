<?php 
/**
 * Template Name: Slider Carousel
 *
 * @package JackRyan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header(); ?>

<?php if( class_exists('acf') ) : ?>

    <div class="swiper-container swiper-carousel">

        <div class="swiper-wrapper">

            <?php 
                $slider = get_field('slider_carousel');
                foreach($slider as $slide) :
                    $slide_img_url = ($slide['slide_carousel_content']['slide_image']);
                    $slide_info = ($slide['slide_carousel_content']['slide_info']);
                    $slide_link_target = $slide_info['link']['target'];
                    if ($slide_link_target == null) {
                        $slide_link_target = '_self';
                    }
            ?>

            <div class="swiper-slide">
                <div class="swiper-slide__inner">
                    <div class="slide-image swiper-lazy" style="background-image: url('<?php echo esc_url( $slide_img_url );?>');"></div>
                    <div class="swiper-slide__info">
                        <div class="slide-title text-component">
                            <h2><?php echo esc_html($slide_info['title']); ?></h2>
                            <p><?php echo esc_html($slide_info['description']); ?></p>
                        </div>
                        <a href="<?php echo esc_url( $slide_info['link']['url'] ) ?>" target="<?php echo esc_attr( $slide_link_target ); ?>" rel="noreferrer" class="btn btn--primary">
                        <?php echo esc_html($slide_info['link']['title']); ?>
                        </a>
                        </div>
                </div>
            </div>

        <?php endforeach;?>
        </div>
    </div>
<?php endif ?>

<?php wp_footer(); ?>