<?php
/**
 * This file returns an array of rootstrap modules.
 *
 * @package rootstrap/modules
 * @since 1.0.0
 */


// define rootstrap modules array 
$rootstrap_modules = [];


// Configure Screens Module 
$rootstrap_modules['Devices'] = [
    'boot' => ['Manager'],
    'includes' => ['functions-devices'],
    'instances' => ['Devices']
];


// Configure Screens Module 
$rootstrap_modules['Screens'] = [
    'boot' => ['Manager'],
    'includes' => ['functions-screens'],
    'instances' => ['Screens']
];


// Configure Customize Defaults Module 
$rootstrap_modules['Customize_Defaults'] = [
    'boot' => ['Manager'],
    'includes' => ['functions-customize-defaults'],
    'instances' => ['Customize_Defaults'],
];


// Configure Post Mods Module 
$rootstrap_modules['Post_Mods'] = [
    'boot' => ['Post_Mods'],  
    'includes' => ['functions-post-mods'],
];


// Configure Tabs Module 
$rootstrap_modules['Tabs'] = [
    'boot' => ['Manager']
];


// Configure Sequences Module 
$rootstrap_modules['Sequences'] = [
    'boot' => ['Manager']
];


return $rootstrap_modules;
