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

        <?php the_custom_header_markup() ?>

        <?php Hybrid\View\display( 'nav/menu', 'top', [ 'location' => 'top' ] ) ?>

        <div class="app-header__container container">

            <div class="app-header__branding">
                <?php the_custom_logo() ?>
                <div class="app-header__branding__content">
                    <?php Hybrid\Site\display_title() ?>
                    <?php Hybrid\Site\display_description() ?>
                </div>
            </div>

            <?php Hybrid\View\display( 'nav/menu', 'header', [ 'location' => 'header' ] ) ?>

        </div>

        <div class="additional-header-content">
            <?php do_action('taproot/header/additional-content') ?>
        </div>

        <?php Hybrid\View\display( 'nav/menu', 'navbar', [ 'location' => 'navbar' ] ) ?>

    </header>
