<header class="entry__header">
    <?php Hybrid\Post\display_title(['class' => 'entry__title']) ?>
    <?php $engine->display( 'entry/byline', $view->slugs() ) ?>
</header>