<?php 
/* Template Name: Builder Template */ 

/**
 * Fullwidth template that has standard theme header and footer
 *
 * @package taproot
 * @since 0.8.0
 */
?>
<main id="main">

	<?php while ( have_posts() ) : the_post();

		the_content();

	endwhile; ?>

</main>

