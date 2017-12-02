<?php
/**
 * Blank template wrapper, used with blank.php template.
 * For use with page builders when no header/footer are desired.
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

	<?php get_template_part('partials/head'); ?>

	<body <?php body_class(); ?> >

		<div id="wrapper" class="main-wrapper">

			<?php do_action( 'taproot_template' ); ?>

		</div> <!-- end #wrapper -->

		<?php wp_footer(); ?>

	</body>
</html>
