<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Taproot\Template\featured_image([
        'class' => 'entry__image entry__image--archive',
        'size'  => 'large',
        'link'  => true,
    ],  'archive'); ?>

	<header class="entry__header entry__header--archive">
		<?php Hybrid\Post\display_title(['class' => 'entry__title entry__title--archive']) ?>

		<div class="entry__byline entry__byline--archive">

			<?php Hybrid\Post\display_author([
                'class' => 'entry__author entry__author--archive',
                'before' => '<span class="entry__byline__item">' . Taproot\Template\Icons\location( 'author', ['icon' => 'user'] ),
                'after' => '</span>'
            ])?>

			<?php Hybrid\Post\display_date([
                'before' => '<span class="entry__byline__item">' . Taproot\Template\Icons\location( 'date', ['icon' => 'calendar'] ),
                'after' => '</span>',
                'class' => 'entry__published entry__published--archive'
            ])?>

			<?php Hybrid\Post\display_comments_link([
                'before' => '<span class="entry__byline__item">' . Taproot\Template\Icons\location( 'comments', ['icon' => 'comments'] ),
                'after' => '</span>',
                'class' => 'entry__comments entry__comments--archive'
            ])?>

        </div>
	</header>

	<div class="entry__summary entry__summary--archive">
		<?php the_excerpt() ?>
    </div>

	<div class="entry__footer entry__footer--archive">
		<?php Taproot\Template\archive_link() ?>
	</div>

</article>
