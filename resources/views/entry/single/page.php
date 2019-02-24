<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Hybrid\Carbon\Image::display( 'featured', [
        'size' => 'full',
        'class' => 'entry__image'
    ]); ?>

	<header class="entry__header entry__header--page">
        <?php Hybrid\Post\display_title(['class' => 'entry__title entry__title--page']) ?>
	</header>

	<div class="entry__content entry__content--page">
		<?php the_content() ?>
		<?php Hybrid\View\display( 'nav/pagination', 'page' ) ?>
	</div>

	<footer class="entry__footer entry__footer--page">
        <p class="entry__footer__taxonomies">
            <?php Hybrid\Post\display_terms([ 
                'taxonomy' => 'category', 
                'before' => sprintf( '<span class="entry-term-group"><span class="entry-term-before">%s: </span>', __( 'Categories', 'taproot' ) ),
                'after' => '</span>'
            ]) ?>       
        </p>       
	</footer>

</article>
