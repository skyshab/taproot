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
        // If post has a link
        if( $link = get_url_in_content( apply_filters( 'the_content', get_the_content() ) ) ): 
            echo '<div class="entry-link">';
            	printf('<p><a href="%s">%s</a></p>', esc_url( $link ), esc_html( $link ) );
			echo '</div>';	
        endif; 
        ?>
    </div><!-- .entry-content -->

</article><!-- .post-box -->
    