<div class="app-content">

    <div class="app-content__container container">

        <main <?php Hybrid\Attr\display( 'app-main' ) ?>>

            <?php Taproot\Components\Navigation_Breadcrumbs\Functions::breadcrumbs() ?>

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php Hybrid\View\display( 'entry/single', Hybrid\Post\hierarchy() ) ?>

                    <?php comments_template() ?>

                <?php endwhile ?>

            <?php endif ?>

        </main>

        <?php Hybrid\View\display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ) ?>

    </div>

</div>
