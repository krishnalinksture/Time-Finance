<?php
/**
 * Index Page Template.
 *
 * @package TIMEFINANCE
 */

if ( have_posts() ) :
	get_template_part( 'template-parts/content', 'post' );
endif;
