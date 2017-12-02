<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<div <?php taproot_class( 'main-container', 'container' ); ?>>

    <?php do_action( 'taproot_main_before' ); ?>

    <main id="main" <?php taproot_class( 'main' ); ?>>

		<div class="entry-content">

			<?php do_action( 'taproot_content_alpha' ); ?>
			<?php get_template_part( 'partials/content', 'none' ); ?>
			<?php do_action( 'taproot_content_omega' ); ?>

		</div>

    </main>

    <?php do_action( 'taproot_main_after' ); ?>

</div>
