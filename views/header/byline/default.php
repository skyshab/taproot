<p class="app-header__content__byline">

    <?php Hybrid\app( 'header/template' )->the_author([
        'class'  => 'app-header__content__byline__author',
        'before' => '<span class="app-header__content__byline__item">' . Hybrid\app('icons')->render( ['icon' => 'user'] ),
        'after'  => '</span>'
    ]) ?>

    <?php Hybrid\Post\display_date([
        'class'  => 'app-header__content__byline__published',
        'before' => '<span class="app-header__content__byline__item">' . Hybrid\app( 'icons' )->render( ['icon' => 'calendar'] ),
        'after'  => '</span>'
    ]) ?>

</p>