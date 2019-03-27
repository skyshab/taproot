<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Taproot\Template\featured_image([
        'class' => 'entry__image entry__image--archive',
        'size'  => 'taproot-medium',
        'link'  => true,
    ],  'archive') ?>

	<header class="entry__header entry__header--archive">
		<?php Hybrid\Post\display_title() ?>
	</header>

	<div class="entry__summary entry__summary--archive">
		<?php the_excerpt() ?>
	</div>

</article>
