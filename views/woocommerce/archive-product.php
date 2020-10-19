<?php
/**
 * The Template for displaying the shop page and product archives
 */

defined( 'ABSPATH' ) || exit;

// Get the view template engine
$engine = Hybrid\App::resolve( 'view/engine' );

// Load header template
$engine->display( 'header', 'woocommerce' );

// Load the archive content
$engine->display( 'archive', 'woocommerce' );

// Load footer template
$engine->display( 'footer', 'woocommerce' );
