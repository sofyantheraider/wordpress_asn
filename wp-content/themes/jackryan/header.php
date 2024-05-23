<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-theme="<?php esc_attr(jackryan_theme_mode()); ?>" data-transition="<?php esc_attr(jackryan_theme_transition())?>">
  <?php wp_body_open(); ?>
    <header <?php jackryan_header_class(); ?>>
        <div class="main-header__layout">
          <div class="main-header__logo">
            <div class="logo-dark">
              <?php if (get_theme_mod( 'logo_dark' )): ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <img src="<?php echo esc_url( get_theme_mod( 'logo_dark' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
                </a>
              <?php else: ?>
                <div class="ms-logo__default">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <h3><?php bloginfo( 'name' ); ?></h3>
                  </a>
                </div>
              <?php endif; ?>
            </div>
            <div class="logo-light">
            <?php if (get_theme_mod( 'logo_light' )): ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( get_theme_mod( 'logo_light' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
              </a>
            <?php else: ?>
              <div class="ms-logo__default">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <h3><?php bloginfo( 'name' ); ?></h3>
                </a>
              </div>
            <?php endif; ?>
            </div>
          </div>
          <?php if (get_theme_mod( 'type_menu' )): ?>
            <?php get_template_part( 'template-parts/header/' . get_theme_mod( 'type_menu' ), get_post_format() ); ?>
          <?php else: ?>
            <?php get_template_part( 'template-parts/header/default', get_post_format() ); ?>
          <?php endif; ?>
        </div> 
    </header>