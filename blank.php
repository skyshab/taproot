<?php 
/* Template Name: Blank Template */ 

/**
 * The template for displaying just the content
 *
 * @package taproot
 * @since 0.8.0
 */

while ( have_posts() ) : the_post();

	the_content(); 
	
endwhile;