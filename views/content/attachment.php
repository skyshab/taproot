<div class="app-content">
    <div class="app-content__container container">        <main <?php Hybrid\Attr\display( 'app-main', 'single', ['id' => 'main'] ) ?>>
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php $engine->display( 'single', $view->slugs() ) ?>
                <?php endwhile ?>
            <?php endif ?>
        </main>
    </div>
</div>
