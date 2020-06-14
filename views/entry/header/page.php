<header class="entry__header entry__header--page">

    <?php Hybrid\app('images/template')->the_featured_image( ['class' => 'entry_image'], 'page' ) ?>

    <?php Hybrid\app('post-types/template')->the_title( ['class' => 'entry__title entry__title--page'] ) ?>

</header>
