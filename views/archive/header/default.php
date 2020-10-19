<header <?php Hybrid\Attr\display( 'archive__header', get_post_type() ) ?> >

    <?php Hybrid\app('post-title/template')->the_archive_title() ?>

    <?php if ( ! is_paged() && get_the_archive_description() ) : ?>
        <div <?php Hybrid\Attr\display( 'archive__description', get_post_type() ) ?>>
            <?php the_archive_description() ?>
        </div>
    <?php endif ?>

</header>

