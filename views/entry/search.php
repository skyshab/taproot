<article <?php Hybrid\Attr\display( 'entry', 'archive', ['class' => 'entry--archive'] ) ?>>

    <?php Hybrid\app('images/template')->the_featured_image([
        'class' => 'entry__image',
        'size'  => 'large',
        'link'  => true,
    ]) ?>

    <?php $engine->display( 'entry/header', $view->slugs() ) ?>

    <?php $engine->display( 'entry/summary', $view->slugs() ) ?>

    <footer class="entry__footer">
        <?php Hybrid\app('post-type/post/template')->the_entry_link(
            [
                'class'     => 'entry__link',
                'text'      => __('View Result', 'taproot'),
                'position'  => 'right',
                'type'      => 'button',
            ]
        ) ?>
    </footer>

</article>
