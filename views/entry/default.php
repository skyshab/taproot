<article <?php Hybrid\Attr\display( 'entry', 'archive', ['class' => 'entry--archive'] ) ?>>

    <?php Hybrid\app('images/template')->the_featured_image([
        'class' => 'entry__image',
        'size'  => 'large',
        'link'  => true,
    ]) ?>

    <?php $engine->display( 'entry/header', $view->slugs() ) ?>

    <?php $engine->display( $data['entry_content_template'], $view->slugs() ) ?>

    <?php $engine->display( 'entry/footer', $view->slugs() ) ?>

</article>
