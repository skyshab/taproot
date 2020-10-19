<article <?php Hybrid\Attr\display( 'entry', 'post', ['class' => 'post'] ) ?>>

    <?php $engine->display( 'single/header', 'page' ) ?>

    <div <?php Hybrid\Attr\display( 'post__content', 'page' ) ?> >
        <?php the_content() ?>
        <?php $engine->display( 'nav/pagination', 'page' ) ?>
    </div>

</article>
