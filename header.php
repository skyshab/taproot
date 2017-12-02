<?php
/**
 * The base header template and action hooks
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<header id="header" <?php taproot_class( 'header',  'main-header static' ); ?>>

	<?php do_action( 'taproot_header_before' ); ?>

	<div id="header-content" <?php taproot_class( 'header-content' ); ?>>
		<?php do_action( 'taproot_header_search' ); ?>
		<div class="container header-content-container">
			<?php do_action( 'taproot_header' ); ?>
		</div>
	</div>

	<?php do_action( 'taproot_header_after' ); ?>

</header>
