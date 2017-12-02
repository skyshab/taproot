<?php
/**
 * The default content template
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>

 	<header class="entry-header">
        <?php
        // print post title
 		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

        // print post meta        
		taproot_post_details(); 
		?>
    </header><!-- .entry-header -->

 	<div class="entry-content">
        <?php
        $content = apply_filters( 'the_content', get_the_content() );
	    preg_match( '/<blockquote>(.+?)<\/blockquote>/is', $content, $matches );
	    $quote = array_key_exists(1, $matches) ? $matches[1] : FALSE;
	    
	    if( $quote ):
	    	echo '<div class="entry-quote">';
            	printf( '<blockquote>%s</blockquote>', $quote );
			echo '</div>';	
	    endif;    
        ?>
 	</div><!-- .entry-content -->

</article><!-- .post-box -->
