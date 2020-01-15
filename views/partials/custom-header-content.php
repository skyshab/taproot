
<div class="additional-header-content__container container has-text-align-center">

    <?php Hybrid\Post\display_title([
        'class' => 'additional-header-content__title'
    ]) ?>

    <?php if( is_single() ) : ?>

        <p class="additional-header-content__meta">

            <?php Hybrid\app( 'header/template' )->display_author([
                'class'  => 'additional-header-content__author',
                'before' => Hybrid\app('icons')->location( 'author', ['icon' => 'user'] ),
            ]) ?>

            <?php Hybrid\Post\display_date([
                'class'  => 'additional-header-content__published',
                'before' => Hybrid\app( 'icons' )->location( 'date', ['icon' => 'calendar'] )
            ]) ?>
        </p>

    <?php endif ?>

</div>
