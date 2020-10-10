<?php
// This file is being used for the single events, with the default events templates

// Load header template.
Hybrid\View\display( 'header', Hybrid\Template\hierarchy() );
?>
<div class="app-content">

    <div class="app-content__container container">

        <main <?php Hybrid\Attr\display( 'app-main', 'tribe' ) ?>>
            <?php tribe_events_before_html(); ?>
            <?php tribe_get_view(); ?>
            <?php tribe_events_after_html(); ?>
        </main>

        <?php Hybrid\View\display( 'sidebar', 'primary', [ 'sidebar' => 'primary' ] ) ?>

    </div>

</div>
<?php
// Load footer template.
Hybrid\View\display( 'footer', Hybrid\Template\hierarchy() );
