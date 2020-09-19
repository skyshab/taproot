
<div class="app-header__main container">

    <?php do_action( 'app-header-main-before' ) ?>

    <?php $engine->display( 'header/branding', $view->slugs() ) ?>
    <?php $engine->display( 'nav/menu', 'header', [ 'location' => 'header' ] ) ?>

    <?php do_action( 'app-header-main-after' ) ?>

</div>
