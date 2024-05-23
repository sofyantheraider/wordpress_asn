<?php 
/**
 * Template Name: Contact
 *
 * @package JackRyan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();
?>

<?php get_template_part( 'template-parts/hero/'. jackryan_hero_style() .'', '' ); ?>

<section class="container ms-content">
  <div class="row">
    <?php if ( class_exists( 'acf' ) ): ?>
      <div class="col-12 col-md-6 col-lg-6 contact__list pr-lg-5 pr-md-3">
          <div class="contact__item">
            <h4><?php esc_html_e('Address', 'jackryan'); ?></h4>
            <p class="text-sm"><?php echo wp_kses_post(get_field('contacts_address')); ?></p>
          </div>
          <div class="contact__item">
            <h4><?php esc_html_e('Email', 'jackryan'); ?></h4>
            <p class="text-sm"><a href="mailto:webmaster@example.com"><?php echo esc_html(get_field('contacts_email')); ?></a></p>
          </div>
          <div class="contact__item">
            <h4><?php esc_html_e('Phone', 'jackryan'); ?></h4>
            <?php $tel = str_replace(' ', '', get_field('contacts_phone')['phone_number']); ?>
            <p class="text-sm"><a href="tel:<?php echo esc_url($tel);?>"><?php echo esc_html(get_field('contacts_phone')['phone_number']); ?></a>
              <br><small class="color-contrast-medium"><?php echo esc_html(get_field('contacts_phone')['schedule']); ?></small></p>
          </div>
          <?php if ( is_active_sidebar( 'socials' ) ) : ?>
            <div class="contact__item">
              <h4><?php esc_html_e('Socials', 'jackryan'); ?></h4>
              <?php dynamic_sidebar( 'socials' ); ?>
            </div>
          <?php endif; ?>
      </div>
        <div class="col-12 col-md-6 col-lg-6 pb-3">
      <?php else: ?>
    <div class="col-12">
      <?php endif; ?>
      <?php while( have_posts() ): the_post();
      the_content();
      endwhile; ?>
    </div>
  </div>
  <div class="margin-bottom-xl"></div>
</section>

<?php get_footer(); ?>