<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Hybrid\View\display( 'entry/header', Hybrid\Post\hierarchy() ) ?>

    <div class="entry__content entry__content--single">
        <?php the_content() ?>
        <?php Hybrid\View\display( 'nav/pagination', Hybrid\Post\hierarchy() ) ?>
    </div>

    <?php Hybrid\View\display( 'entry/footer', Hybrid\Post\hierarchy() ) ?>

</article>
