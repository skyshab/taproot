<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Hybrid\app('images/template')->the_featured_image( ['class' => 'entry_image'], Hybrid\Post\hierarchy() ) ?>

    <?php Hybrid\View\display( 'entry/header', Hybrid\Post\hierarchy() ) ?>

    <div class="entry__content entry__content--single">
        <?php the_content() ?>
        <?php Hybrid\View\display( 'nav/pagination', Hybrid\Post\hierarchy() ) ?>
    </div>

    <footer class="entry__footer entry__footer--single">
        <?php Hybrid\View\display( 'nav/postnav' ) ?>
    </footer>

</article>
