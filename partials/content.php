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
        if( get_theme_mod('taproot_post_show_all') ):
            the_content();
        else:
            the_excerpt();
        endif; 
        ?>
 	</div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php taproot_post_box_link(); ?>
        
    </footer><!-- .entry-footer -->

</article><!-- .post-box -->
