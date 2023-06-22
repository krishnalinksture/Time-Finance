<?php
/**
 *
 * Get header();
 *
 * @package TIMEFINANCE
 */

get_header( root_template_base() );

/**
 * INCLUDE PAGE BODY CONTENT
 */

require root_template_path();

/**
 * Get footer();
 */

get_footer( root_template_base() );
