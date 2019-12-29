<div class="archive-header <?php printf( 'archive-header--%s', esc_attr( get_post_type() ) ) ?>" >

    <h1 class="archive-header__title <?php printf( 'archive-header__title--%s', esc_attr( get_post_type() ) ) ?>">
        <?php the_archive_title() ?>
    </h1>

    <?php if ( ! is_paged() && get_the_archive_description() ) : ?>

        <div class="archive-header__description">
            <?php the_archive_description() ?>
        </div>

    <?php endif ?>

</div>