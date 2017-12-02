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

        <div class="entry-gallery">
            <?php 
            $gallery = get_post_gallery( get_the_ID(), false );

            if( $gallery && isset( $gallery['ids'] ) ):
                $gallery_size = apply_filters( 'taproot_gallery_post_thumb_size', 'thumbnail' );
                echo do_shortcode( sprintf( '[gallery gallerytype="modal" ids="%s" size="%s"]', esc_attr( $gallery['ids'] ), esc_attr( $gallery_size ) ) ); 
            elseif( $gallery ):
                echo get_post_gallery();
            endif;
            ?>
        </div><!-- .entry-gallery -->

 	</div><!-- .entry-content -->

</article><!-- .post-box -->
