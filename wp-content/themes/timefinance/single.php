<?php
/**
 * SINGLE POST TEMPLATE.
 *
 * @package TIMEFINANCE
 */

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'single' );
	endwhile;
endif;
