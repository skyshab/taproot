<article <?php Hybrid\Attr\display( 'entry' ) ?>>

	<?php the_post_thumbnail( 'taproot-medium', [ 'class' => 'entry__image entry__image--archive' ] ) ?>

	<header class="entry__header entry__header--archive">
		<?php Hybrid\Post\display_title() ?>
	</header>

	<div class="entry__summary entry__summary--archive">
		<?php the_excerpt() ?>
	</div>

</article>
