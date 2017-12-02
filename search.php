<?php
/**
 * The template for displaying search results pages
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<div <?php taproot_class( 'main-container', 'container' ); ?>>

    <?php do_action( 'taproot_main_before' ); ?>

    <main id="main" <?php taproot_class( 'main' ); ?>>

		<?php 
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();
				get_template_part( 'partials/content', 'search' );
			endwhile;
			else :
				get_template_part( 'partials/content', 'none' );
		endif;
		?>

    </main>

    <?php do_action( 'taproot_main_after' ); ?>

</div>
