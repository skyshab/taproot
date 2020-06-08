<article <?php Hybrid\Attr\display( 'entry' ) ?>>

    <?php Hybrid\View\display( 'entry/header', 'post' ) ?>

    <div class="entry__content entry__content--single">
        <?php the_content() ?>
        <?php Hybrid\View\display( 'nav/pagination', 'post' ) ?>
    </div>

    <?php Hybrid\View\display( 'entry/footer', 'single' ) ?>

</article>
