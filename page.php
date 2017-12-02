<?php
/**
 * The template for displaying page content
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<div <?php taproot_class( 'main-container', 'container' ); ?>>

    <?php do_action( 'taproot_main_before' ); ?>

    <main id="main" <?php taproot_class( 'main' ); ?>>

		<?php while ( have_posts() ) : the_post();

			get_template_part( 'partials/content', 'page' );

		endwhile; ?>

    </main>

    <?php do_action( 'taproot_main_after' ); ?>

</div>
