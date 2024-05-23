<?php

/**
 * @author: MadSparrow
 * @version: 1.0
 */

get_header();

$a_id = $post->post_author;

?>

<div class="single-post__content article ms-content container">

	<header class="text-component__block text-component__block--meta">
		<?php the_title( '<h1 class="text-component__block--header">', '</h1>' ); ?>
		<div class="post-info__single">
			<div class="post-meta">				
				<span class="post-author__name"><?php the_author_meta( 'display_name', $a_id ); ?></span>
				<span role="separator"></span>
				<span class="post__date"><?php echo get_the_date(); ?></span>
				<span role="separator"></span>
				<span class="post__category link"><?php echo the_category(',&nbsp;'); ?></span>
			</div>
		</div>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="post_feautured media-wrapper media-wrapper--21:9">
			<?php the_post_thumbnail('jackryan-featured-single-post'); ?>
		</figure>
		<div class="margin-bottom-lg"></div>
	<?php endif; ?>

	<article class="article text-component">
		<div class="text-component__inner entry-content js-sticky-sharebar-target">
			<?php while ( have_posts() ) : the_post();
							the_content( sprintf(
			__( 'Continue reading %s', 'jackryan' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );
				jackryan_link_pages();
			endwhile; ?>
		</div>
		<div class="clearfix"></div>
		<?php if ( get_edit_post_link() ) : ?>
			<div class="admin-edit__area">
				<span class="admin-edit feed-btn">
				<?php edit_post_link( sprintf( wp_kses( __( '<span class="dashicons dashicons-edit"></span>Edit <span class="screen-reader-text">%s</span>', 'jackryan' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">', '</span>' );
				?>
				</span>
			</div>
		<?php endif; ?>	
	</article>

	<div class="single-post__tags"><?php the_tags( '', '', '' ); ?></div>

	<?php jackryan_posts_navigation(); ?>

</div>

<?php $related = jackryan_related_posts(); ?>
<section class="ms-related-posts">
	<div class="container">
		<div class="ms-title"><?php esc_html_e('Related Posts', 'jackryan'); ?></div>
		<div class="row">
			<?php if( $related ) foreach( $related as $post ) {
				setup_postdata($post); ?>
				<article class="col-md-4 col-lg-4">
					<div class="card card--is-link work-card__img">
						<?php if( has_post_thumbnail() ):?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="card__link">
								<figure class="card__img media-wrapper media-wrapper--16:9">
									<?php the_post_thumbnail($size = 'jackryan-card-post-thumb'); ?>
									<span class="overlay"></span>
									<div class="glow-wrap"><i class="glow"></i></div>
								</figure>
							</a>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute (); ?>" class="card__link link-overlay">
								<div class="card__content--sm text-overlay">
									<span class="card__date"><?php echo get_the_date(); ?></span>
									<h3 class="card__title--sm">
										<span class="ms-text-bg"><?php the_title(); ?></span>
									</h3>
								</div>
							</a>
						<?php else: ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute (); ?>" class="card__link no-thumb">
								<div class="card__content--text">
									<div class="card__content--sm">
										<span class="card__date"><?php echo get_the_date(); ?></span>
										<h3 class="card__title--sm">
											<span class="ms-text-bg"><?php the_title(); ?></span>
										</h3>
									</div>
								</div>
							</a>
						<?php endif; ?>
					</div>
				</article>
			<?php } wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<?php if ( comments_open() || get_comments_number() ) : ?>
	<div class="container">
		<div class="ms-section__comments">
			<?php comments_template(); ?>
		</div>
	</div>
<?php endif; ?>

<?php if ( function_exists( 'portfolios_register' ) ) : ?>
	<?php echo jackryan_socials_share_custom(); ?>
<?php endif?>


<?php get_footer(); ?>