<?php
/**
 * The base footer template and hooks
 *
 * @package taproot
 * @since 0.8.0
 */

do_action( 'taproot_footer_before'); ?>

<footer id="footer" <?php taproot_class( 'footer',  'main-footer' ); ?>>

	<?php do_action( 'taproot_footer_alpha'); ?>

	<div class="container footer-container">
		<?php do_action( 'taproot_footer_widgets' ); ?>
	</div>

	<?php do_action( 'taproot_footer_omega'); ?>

</footer>

<?php do_action( 'taproot_footer_after'); ?>

<?php wp_footer(); ?>
