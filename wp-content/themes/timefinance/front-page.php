<?php
/**
 * Template name: Front page
 *
 * @package TIMEFINANCE
 */

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
endif;
