<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Hybrid\app('featured-image')->display([
        'class' => 'entry__image entry__image--archive',
        'size'  => 'large',
        'link'  => true,
    ],  'archive') ?>

    <header class="entry__header entry__header--archive">
        <?php Hybrid\Post\display_title() ?>
    </header>

    <div class="entry__summary entry__summary--archive">
        <?php the_content() ?>
    </div>

</article>
