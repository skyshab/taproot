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
        // if post has a featured image
        if( has_post_thumbnail() ):
        ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php the_post_thumbnail( 'large' ); ?>
            </a>
        <?php endif; ?>
 	</div><!-- .entry-content -->

</article><!-- .post-box -->
