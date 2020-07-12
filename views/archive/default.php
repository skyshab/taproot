<div <?php Hybrid\Attr\display( 'archive', get_post_type() ) ?>>

    <?php $engine->display( 'archive/header', $view->slugs() ) ?>

    <?php if ( have_posts() ) : ?>
        <div <?php Hybrid\Attr\display( 'archive__entries', get_post_type() ) ?>>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php $engine->display( 'entry', $view->slugs() ) ?>
            <?php endwhile ?>

        </div>
    <?php endif ?>

    <?php $engine->display( 'archive/footer', $view->slugs() ) ?>

</div>