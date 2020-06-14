
<div class="app-header__hero container">

    <?php Hybrid\app( 'header/template' )->the_title([
        'class' => 'app-header__hero__title',
    ]) ?>

    <?php if( is_single() ) : ?>

        <p class="app-header__hero__meta">

            <?php Hybrid\app( 'header/template' )->the_author([
                'class'  => 'app-header__hero__author',
                'before' => Hybrid\app('icons')->location( 'author', ['icon' => 'user'] ),
            ]) ?>

            <?php Hybrid\Post\display_date([
                'class'  => 'app-header__hero__published',
                'before' => Hybrid\app( 'icons' )->location( 'date', ['icon' => 'calendar'] )
            ]) ?>
        </p>

    <?php endif ?>

</div>
