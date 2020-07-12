<header <?php Hybrid\Attr\display( 'post__header', 'page' ) ?> >
    <?php Hybrid\app('breadcrumbs/template')->breadcrumbs() ?>
    <?php Hybrid\app('images/template')->the_featured_image( ['class' => 'post__image'] ) ?>
    <?php Hybrid\app('post-title/template')->the_post_title() ?>
</header>
