<?php
/**
 * Bootstrap file for rootstrap.
 *
 * This file loads all of our functions files necessary for using the Rootstrap
 * that aren't loaded via the autoloader.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


// Define the directory path to the src directory
if ( ! defined( 'ROOTSTRAP_DIR' ) ) {
    define( 'ROOTSTRAP_DIR', __DIR__ );
}

// Check if the framework has been bootstrapped.
// If not, define the roostrapped constant and load functions files.
if ( ! defined( 'ROOTSTRAPPED' ) ) {

    // Load our custom functions files that are not loaded via the module loader.
    require_once( 'functions-rootstrap.php');
    require_once( 'Devices/functions-devices.php');
    require_once( 'Screens/functions-screens.php');
    require_once( 'Styles/functions-styles.php');

    define( 'ROOTSTRAPPED', true );
}
