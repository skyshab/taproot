
<div class="app-header__content container">

    <?php Hybrid\app( 'header/template' )->the_title([
        'class' => 'app-header__content__title',
    ]) ?>

    <?php $engine->display( 'header/byline', $view->slugs() ) ?>

</div>
