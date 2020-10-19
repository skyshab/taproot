<div class="app-content">
    <div class="app-content__container container">
        <main <?php Hybrid\Attr\display( 'app-main', 'archive', ['id' => 'main'] ) ?>>
            <?php $engine->display( 'archive', $view->slugs() ) ?>
        </main>
        <?php $engine->display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ) ?>
    </div>
</div>
