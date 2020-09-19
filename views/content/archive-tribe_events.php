<?php
// this template is used for the calendar pages when we have "default page template" selected

use Tribe\Events\Views\V2\Template_Bootstrap;
?>

<div class="app-content">
    <div class="app-content__container container tribe-archive">
        <main <?php // Hybrid\Attr\display( 'app-main', 'archive', ['id' => 'main'] ) ?>  class="app-main app-main--has-no-sidebar">
            <?php echo tribe( Template_Bootstrap::class )->get_view_html() ?>
        </main>
    </div>
</div>
