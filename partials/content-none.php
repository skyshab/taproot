<?php
/**
 * The content template for when posts cannot be found
 *
 * @package taproot
 * @since 0.8.0
 */

if( is_search() ):
	printf( '<p>%s</p>', esc_html__( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'taproot' ) );
else:
	printf( '<p>%s</p>', esc_html__( "It seems we can't find what you're looking for. Perhaps searching can help?", 'taproot' ) );
endif;

get_search_form();
