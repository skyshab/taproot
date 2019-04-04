<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Taproot\Template\featured_image(['class' => 'entry_image'], 'post'); ?>

    <?php Hybrid\View\display( 'entry/header', 'post' );?>

	<div class="entry__content entry__content--single">
		<?php the_content() ?>
		<?php Hybrid\View\display( 'nav/pagination', 'post' ) ?>
	</div>

	<footer class="entry__footer entry__footer--single">
        <p class="entry__footer__taxonomies">
		    <?php Hybrid\Post\display_terms([ 
                'taxonomy' => 'category', 
                'before' => sprintf( '<span class="entry-term-group"><span class="entry-term-before">%s: </span>', __( 'Categories', 'taproot' ) ),
                'after' => '</span>'
            ]) ?>
		    <?php Hybrid\Post\display_terms([ 
                'taxonomy' => 'post_tag', 
                'before' => sprintf( '<span class="entry-term-group"><span class="entry-term-before">%s: </span>', __( 'Tags', 'taproot' ) ),
                'after' => '</span>'
            ]) ?>        
        </p>
        <?php Hybrid\View\display( 'nav/postnav' ) ?>
	</footer>

</article>
