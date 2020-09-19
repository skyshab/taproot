<?php
// this template is used for single events when we have "default page template" selected
?>


<div class="app-content">
    <div class="app-content__container container">
        <main <?php Hybrid\Attr\display( 'app-main', 'single', ['id' => 'main'] ) ?>>
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php $engine->display( 'single', 'tribe' ) ?>
                <?php endwhile ?>
            <?php endif ?>
        </main>
        <?php $engine->display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ) ?>
    </div>
</div>
