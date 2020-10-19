<?php
// this template is used for single events when we have "default page template" selected
?>

<article <?php Hybrid\Attr\display( 'entry', 'post', ['class' => 'post'] ) ?>>

    <?php $engine->display( 'single/header', $view->slugs() ) ?>

    <div <?php Hybrid\Attr\display( 'post__content', get_post_type() ) ?> >
        <?php the_content() ?>
        <?php $engine->display( 'nav/pagination', 'post' ) ?>
    </div>

    <?php $engine->display( 'single/footer', $view->slugs() ) ?>

</article>

