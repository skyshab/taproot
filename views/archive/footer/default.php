<footer <?php Hybrid\Attr\display( 'archive__footer', get_post_type() ) ?> >

    <?php if ( have_posts() ) : ?>
        <?php $engine->display( 'nav/pagination', 'posts' ) ?>
    <?php endif ?>

</footer>
