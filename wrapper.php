<?php
/**
 * The primary template wrapper
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

	<?php get_template_part('partials/head'); ?>

	<body <?php body_class(); ?> >

		<?php do_action( 'taproot_body_alpha' ); ?>

		<div id="wrapper" class="main-wrapper">

			<?php get_header(); ?>

			<div id="torso" class="torso">

				<?php do_action( 'taproot_torso_alpha' ); ?>

			        <?php do_action( 'taproot_template' ); ?>

				<?php do_action( 'taproot_torso_omega' ); ?>

			</div> <!-- end #torso -->

		</div> <!-- end #wrapper -->

		<?php get_footer(); ?>

	</body>
</html>
