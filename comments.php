<?php
/**
 * The template for displaying post comments
 *
 * @package taproot
 * @since 0.8.0
 */

if ( ! comments_open() ) return; ?>

<section id="comments" class="post-comments">

    <h2 class="comments-title"> <?php do_taproot_icon('comments_title', true); esc_html_e( 'Comments', 'taproot' );?></h2>

    <?php 
    if( have_comments() ) 
    {
        do_action( 'taproot_comments'); 

    	if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : 
            do_action( 'taproot_comments_nav');
    	endif; 
    } 
    else do_action( 'taproot_comments_none');

    do_action( 'taproot_comment_form'); ?>

</section>
