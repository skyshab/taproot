<article <?php Hybrid\Attr\display( 'entry' ) ?>>

	<header class="entry__header entry__header--single">
		<?php Hybrid\Post\display_title() ?>
	</header>

	<div class="entry__content entry__content--single">
		<?php the_content() ?>
		<?php Hybrid\View\display( 'nav/pagination', 'post' ) ?>
	</div>

</article>
