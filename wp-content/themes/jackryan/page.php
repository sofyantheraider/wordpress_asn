<?php

/**
 * @author: MadSparrow
 * @version: 1.0
 */

get_header();
?>

<?php if( have_posts() ):

	while( have_posts() ): the_post();

	   get_template_part( 'template-parts/page/page', 'content' );
	   endwhile;

	endif; ?>

<?php get_footer(); ?>