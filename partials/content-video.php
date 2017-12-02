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
        $content = apply_filters( 'the_content', get_the_content() );
        $video = false;

        // Only get video from the content if a playlist isn't present.
        if( false === strpos( $content, 'wp-playlist-script' ) ): 
            $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
        endif;

        // print post thumbnail
        taproot_post_thumbnail();

        // print post title
 		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

        // print post meta        
        taproot_post_details(); 
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        // If post has a video, display it
        if( !empty( $video ) ):

            foreach ( $video as $video_html ):
                printf('<div class="entry-video embed-wrap">%s</div>', $video_html );
            endforeach;

        endif; 
        ?>
    </div><!-- .entry-content -->

</article><!-- .post-box -->
