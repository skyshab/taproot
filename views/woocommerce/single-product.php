<?php
/**
 * The Template for displaying all single products
 */

defined( 'ABSPATH' ) || exit;

// Get the view template engine
$engine = Hybrid\App::resolve( 'view/engine' );

// Load header template
$engine->display( 'header', 'woocommerce' );

// Load the archive content
$engine->display( 'single', 'woocommerce' );

// Load footer template
$engine->display( 'footer', 'woocommerce' );
