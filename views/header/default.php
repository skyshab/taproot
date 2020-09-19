<!DOCTYPE html>
<html <?php Hybrid\Attr\display( 'html' ) ?>>

<head>
<?php wp_head() ?>
</head>

<body <?php Hybrid\Attr\display( 'body' ) ?>>

<?php do_action( 'wp_body_open' ) ?>

<div class="app">

    <header <?php Hybrid\Attr\display( 'app-header' ) ?> >

        <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'taproot' ) ?></a>

        <?php do_action( 'app-header-before' ) ?>

        <?php $engine->display( 'header/image', $view->slugs() ) ?>

        <?php $engine->display( 'nav/menu', 'top', [ 'location' => 'top' ] ) ?>

        <?php $engine->display( 'header/main', $view->slugs() ) ?>

        <?php $engine->display( 'header/content', $view->slugs() ) ?>

        <?php $engine->display( 'nav/menu', 'navbar', [ 'location' => 'navbar' ] ) ?>

        <?php do_action( 'app-header-after' ) ?>

    </header>
