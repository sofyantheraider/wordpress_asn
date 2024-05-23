<?php 

/**
 * @author: MadSparrow
 * @version: 1.0
 */

get_header();

?>

<?php
    $album_cat = jackryan_work_category(get_the_ID());
    $string = str_replace('-', ' ', $album_cat);
    $album_cat = esc_html($string);
    if( class_exists('acf') && (get_field('project_hero_text_align')) ) {
        $hero_align = get_field('project_hero_text_align');
    } else {
        $hero_align = 'left';
    }
    $parallax = get_field('project_parallax_effect');
    
    if ($parallax == 'on') {
        $p_s = '0.7';
    } else {
        $p_s = '1';
    }
?>
<?php if( class_exists('acf') && get_field('project_hero_style') == 'default' ): ?>
<div class="margin-top-xl"></div>
<section class="hero hero--overlay-layer hero-default">
<?php else: ?>
<section class="hero hero--overlay-layer background-image">
    <div class="hero-image jarallax" data-speed="<?php echo esc_attr($p_s); ?>" style="background-image: url('<?php echo esc_url( the_post_thumbnail_url() );?>');"></div>
<?php endif; ?>
    <div class="container">
        <div class="hero__content text-<?php echo esc_attr($hero_align); ?>">
            <span><?php  echo esc_html($album_cat); ?></span>
            <?php the_title( '<h1>', '</h1>' ); ?>
            <p><?php echo esc_html(get_field('project_description')); ?></p>
        </div>
    </div>
</section>

<div class="container ms-content--portfolio text-component">
    <?php while ( have_posts() ) : the_post();
    	the_content();
    endwhile; ?>
    <?php if ( get_edit_post_link() ) : ?>
    <span class="admin-edit">
    <?php edit_post_link( sprintf( wp_kses( __( '<span class="dashicons dashicons-edit"></span>Edit<span class="screen-reader-text">%s</span>', 'jackryan' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">', '</span>' );
    ?>
    </span>
    <?php endif; ?>
</div>

<div class="container ms-next-case">
    <div class="single-portfolio-nav">
        <div class="s-p-next">
            <?php echo jackryan_portfolio_nav_prev(); ?>
        </div>
    </div>
</div>

<div class="container ms-cta">
    <div class="cta-section">
        <span class="line"></span>
        <div class="cta-text">
            <p><?php esc_html_e('Ready to create something amazing?', 'jackryan'); ?></p>
            <h1><?php esc_html_e('Lets Work Together', 'jackryan'); ?></h1>
            <a href="<?php echo esc_url(jackryan_get_in_touch_link()); ?>" class="btn btn--primary"><?php esc_html_e('Get In Touch', 'jackryan') ?></a>
        </div>
    </div>
</div>
<?php get_footer();