<div class="app-content">

    <div class="app-content__container container">

        <main <?php Hybrid\Attr\display( 'app-main' ) ?>>

            <?php Hybrid\View\display( 'partials', 'archive-header' ) ?>

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php Hybrid\View\display( 'entry/archive', Hybrid\Post\hierarchy() ) ?>

                <?php endwhile ?>

                <?php Hybrid\View\display( 'nav/pagination', 'posts' ) ?>

            <?php endif ?>

        </main>

        <?php Hybrid\View\display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ) ?>

    </div>
    
</div>
