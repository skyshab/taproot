<header <?php Hybrid\Attr\display( 'post__header', 'attachment' ) ?> >
    <?php Hybrid\app('post-title/template')->the_post_title() ?>
    <?php $engine->display( 'single/byline', $view->slugs() ) ?>
    <?php Hybrid\app('images/template')->the_featured_image( ['class' => 'post__image'] ) ?>
</header>