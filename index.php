<?php
/**
 * The default template for the index page
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<div <?php taproot_class( 'main-container', 'container' ); ?>>

    <?php do_action( 'taproot_main_before' ); ?>

    <main id="main" <?php taproot_class( 'main' ); ?>>
		<?php 
		if ( have_posts() ):

			taproot_title();

			while ( have_posts() ) : the_post();
				get_template_part( 'partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format() );
			endwhile;

			taproot_pagination();
			
		else:
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
    </main>

    <?php do_action( 'taproot_main_after' ); ?>

</div>
