<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Hybrid\app('featured-image')->display(['class' => 'entry_image'], 'post'); ?>

    <?php Hybrid\View\display( 'entry/header', 'post' );?>

    <div class="entry__content entry__content--single">
        <?php the_content() ?>
        <?php Hybrid\View\display( 'nav/pagination', 'post' ) ?>
    </div>

    <footer class="entry__footer entry__footer--single">
        <?php Hybrid\View\display( 'partials/post-meta', 'post', [
            'author' => false,
            'date' => false,
            'taxonomies' => ['category', 'post_tag'],
            'className' => 'taproot-meta entry__footer__taxonomies',
        ]); ?>
        <?php Hybrid\View\display( 'nav/postnav' ) ?>
    </footer>

</article>
