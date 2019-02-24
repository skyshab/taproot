<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Hybrid\Carbon\Image::display( 'featured', [
        'size' => 'full',
        'class' => 'entry__image'
    ]); ?>

	<header class="entry__header entry__header--single">

        <?php Hybrid\Post\display_title(['class' => 'entry__title entry__title--single']) ?>
        
		<p class="entry__byline entry__byline--single">
			<?php Hybrid\Post\display_author([
                'class' => 'entry__author entry__author--single',
                'before' => Taproot\Template\Icons\location( 'author', ['icon' => 'user'] ) 
            ])?>

			<?php Hybrid\Post\display_date([
                'before' => Taproot\Template\Icons\location( 'date', ['icon' => 'calendar'] ), 
                'class' => 'entry__published entry__published--single'
            ])?>
        </p>

	</header>

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
