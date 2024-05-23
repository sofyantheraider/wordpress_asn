<?php 
/**
 * Template Name: About
 *
 * @package JackRyan
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();
?>


<?php get_template_part( 'template-parts/hero/'. jackryan_hero_style() .'', '' ); ?>

<div class="container">

    <div class="ms-page ms-page--about text-component">
      <div class="text-component__inner">
        <?php if( have_posts() ): while( have_posts() ): the_post();
            the_content();
          endwhile;
        endif; ?>
      </div>

        <?php if( get_field('service_item') ): ?>
          <div class="ms_services">
            <?php
              $s_item = get_field('service_item');
              $s_title = get_field('services_title');
              ?>
              <h2 class="text-align-<?php echo esc_attr($s_title['title_alignt'])?>"><?php echo esc_html($s_title['title_text']); ?></h2>
              <div class="row ms-p2">
                <div class="grid-sizer col-sm-6 col-md-4 col-lg-4"></div>
                <?php foreach($s_item as $item) : ?>
                    <div class="grid-item col-sm-6 col-md-4 col-lg-4 pb-5">
                      <div class="ms_services--heading">
                        <?php if ($item['icon']): ?>
                          <img src="<?php echo esc_url($item['icon']) ?>">
                        <?php endif; ?>
                        <h4><?php echo esc_html($item['service_title']); ?></h4>
                      </div>
                        <p><?php echo esc_html($item['service_description']); ?></p>
                    </div>
                <?php endforeach;?>
                </div>
          </div>
        <?php endif; ?>

        <?php if( get_field('timeline') ): ?>
          <div class="ms_experience">
            <?php
            $t_item = get_field('timeline');
            $t_title = get_field('timeline_title');
            ?>
            <h2 class="text-align-<?php echo esc_attr($t_title['title_alignt'])?>"><?php echo esc_html($t_title['title_text']); ?></h2>
           
              <?php foreach($t_item as $item) : ?>
                 <div class="row">
                  <div class="grid-sizer col-sm-6 col-md-3 col-lg-3"></div>

                  <div class="grid-item col-sm-6 col-md-3 col-lg-3">
                    <?php if( $item['company_name'] ): ?>
                        <p class="company_name"><?php esc_html_e($item['company_name'], 'jackryan'); ?></p>
                    <?php endif; ?>
                    <?php if( $item['year'] ): ?>
                        <p class="year"><?php esc_html_e($item['year'], 'jackryan'); ?></p>
                    <?php endif; ?>
                  </div>

                    <div class="grid-item col-sm-6 col-md-9 col-lg-9">
                      <div class="experience-text">
                        <p><?php esc_html_e($item['text'], 'jackryan' ); ?></p>
                      </div>
                    </div>

                  </div>
              <?php endforeach;?>
            </div>
        <?php endif; ?>

        <?php if( get_field('members') ): ?>
          <div class="ms_our-team">
            <?php
              $team = get_field('members');
              $team_title = get_field('team_title');
              $m_size = 'jackryan-member-team';
            ?>
            <h2 class="text-align-<?php echo esc_attr($team_title['title_alignt'])?>"><?php echo esc_html($team_title['title_text']); ?></h2>
            <div class="row ms-p2">
                <div class="grid-sizer col-sm-6 col-md-3 col-lg-3"></div>
                    <?php foreach($team as $member) : ?>
                      <div class="grid-item col-sm-6 col-md-3 col-lg-3 pb-lg-5 pb-4">
                        <?php echo wp_get_attachment_image( $member['photo'], $m_size ); ?>
                        <h4><?php echo esc_html($member['name']); ?></h4>
                        <p><?php echo esc_html($member['position']); ?></p>
                      </div>
                    <?php endforeach;?>
            </div>
          </div>
        <?php endif; ?>

        <?php if( get_field('clients_gallery') ): 
          $l_size = '0'; ?>
          <div class="ms_clients-gallery">
            <hr class="wp-block-separator is-style-wide">
            <div class="row ms-p2 justify-center">
              <?php $c_logos = get_field('clients_gallery'); ?>
              <div class="grid-sizer col-sm-4 col-md-2 col-lg-3"></div>              
              <?php foreach($c_logos as $logo) : ?>
                <div class="c_logo grid-item col-4 col-md-3 col-lg-2">
                  <?php echo wp_get_attachment_image( $logo, $l_size ); ?>
                </div>
              <?php endforeach;?>
            </div>
          </div>
        <?php endif; ?>
      
    </div>
</div>

<?php get_footer(); ?>