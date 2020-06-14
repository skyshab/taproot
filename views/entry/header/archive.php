<div class="archive-header <?php printf( 'archive-header--%s', esc_attr( get_post_type() ) ) ?>" >

    <?php Hybrid\app('entry/template')->the_title( ['class' => sprintf( 'archive-header__title archive-header__title--%s', get_post_type() )] ) ?>

    <?php if ( ! is_paged() && get_the_archive_description() ) : ?>

        <div class="archive-header__description">
            <?php the_archive_description() ?>
        </div>

    <?php endif ?>

</div>