<?php

/**
 * @author: MadSparrow
 * @version: 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

?>

<?php get_template_part( 'template-parts/hero/'. jackryan_hero_style() .'', '' ); ?>

<div class="container single-page">
	<div class="ms-page text-component">
		<div class="text-component__inner">
			<?php the_content(); ?>
		</div>
		<div class="clearfix"></div>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'jackryan' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'jackryan' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
		<?php if ( get_edit_post_link() ) : ?>
			<span class="admin-edit feed-btn margin-bottom-md margin-top-md">
			<?php edit_post_link( sprintf( wp_kses( __( '<span class="dashicons dashicons-edit"></span>Edit <span class="screen-reader-text">%s</span>', 'jackryan' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">', '</span>' );
			?>
			</span>
		<?php endif; ?>
	</div>
	<?php if ( comments_open() || get_comments_number() ) : ?>
		<div class="ms-section__comments">
			<?php comments_template(); ?>
		</div>	
	<?php endif; ?>
</div>