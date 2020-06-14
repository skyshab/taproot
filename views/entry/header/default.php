<header class="entry__header entry__header--single">

    <?php Hybrid\app('images/template')->the_featured_image( ['class' => 'entry_image'], 'post' ) ?>

    <?php Hybrid\app('entry/template')->the_title( ['class' => 'entry__title entry__title--single'] ) ?>

    <?php Hybrid\View\display( 'entry/byline' ) ?>

</header>