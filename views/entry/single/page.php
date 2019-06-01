<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Taproot\Template\featured_image(['class' => 'entry_image'], 'page'); ?>

    <?php Hybrid\View\display( 'entry/header', 'page' );?>
    
	<div class="entry__content entry__content--page">
		<?php the_content() ?>
		<?php Hybrid\View\display( 'nav/pagination', 'page' ) ?>
	</div>

</article>
