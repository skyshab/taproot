<div <?php Hybrid\Attr\display( 'archive', 'search', ['class' => 'archive archive--search archive--center'] ) ?>>

    <header <?php Hybrid\Attr\display( 'archive__header', 'search' ) ?> >
        <?php Hybrid\app('post-title/template')->the_search_title() ?>
    </header>

    <?php if ( have_posts() ) : ?>
        <div <?php Hybrid\Attr\display( 'archive__entries', 'search' ) ?>>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php $engine->display( 'entry', 'search' ) ?>
            <?php endwhile ?>

        </div>
    <?php endif ?>

    <footer <?php Hybrid\Attr\display( 'archive__footer', 'search' ) ?> >
        <?php if ( have_posts() ) : ?>
            <?php $engine->display( 'nav/pagination', 'posts' ) ?>
        <?php endif ?>
    </footer>

</div>