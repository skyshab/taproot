# WP Rootstrap

## Synopsis

Utility for managing responsive styles devices and breakpoints when working with the Customizer in a WordPress project.

This package works with the Rootstrap configuration file to keep project media queries in sync between CSS, PHP, and Javascript environments. Rootstrap is a LESS based framework for managing media queries and device specific styles within your LESS/CSS environment. A configuration file defines the devices and breakpoints. Wp-rootstrap imports these device sizes into the WordPress environment, adds them to the customizer control panel, and provides utilities for adding styles within the context of the defined devices.

For information on the related projects, see https://github.com/skyshab/rootstrap-library/ and https://github.com/skyshab/less-plugin-rootstrap/ and https://github.com/skyshab/wp-rootstrap-tabs/

## Code Examples

This example shows how to create customizer controls for each device. This would be added to the 'customize_register' action hook.

```
<?php
// load WP Rootstrap classes
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/wp-rootstrap/src/wp-rootstrap.php';

// import config file and create rootstrap object
$rootstrap = new WP_Rootstrap( plugin_dir_path( dirname( __FILE__ ) ) . "rootstrap-config.json" );

// define devices array
$devices = $rootstrap->get_devices();

// add a customizer setting for each device
foreach ( $devices as $device => $args )
{    
    // Setting: Hide Title in Fixed Header
    $wp_customize->add_setting( sprintf( 'my_setting_%s', $device), array(
        'type' => 'option',
    ));

    $wp_customize->add_control( sprintf( 'my_setting_%s', $device ), array(
        'label'     => __( 'My Control', '' ),
        'section'   => 'my-section',
    ));
}
?>

```

This example shows how to output styles for custom controls to specific screens. This would be added to the 'wp_head' action hook.

```php
<?php
// create a new style object
$my_styles = $rootstrap->new_styles();

// define mobile only styles
$my_styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.my-selector',
    'styles' => array( 
        'height: %spx;' => get_theme_mod( 'my_setting_mobile', '42' ),
    ),
));

$my_styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.my-selector',
    'styles' => array( 
        'height: %spx; display: block;' => get_theme_mod( 'my_setting_tablet', '108' ),
    ),
));

...

// print out our styles in the header adding specified id to style-block
$my_styles->print_screens('my-style-id');

?>

```

This example shows how to control live styles for the customizer preview. This script would be enqueued at the 'customize_preview_init' hook

```

( function( $ ) {

    // define rootstrap preview object
    var rootstrap = rootstrapPreview;

    wp.customize( 'my_setting_mobile', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'my-pseudo-thing-height-mobile',
                device: 'mobile',
                styles: '.my-selector:before {height: {{value}}px;}',
                value: to
            });
        } );
    } );

    wp.customize( 'my_setting_tablet', function( value ) {
        value.bind( function( to ) {
            rootstrap.style({
                id: 'my-pseudo-thing-height-tablet-and-up',
                device: 'tablet-and-up',
                styles: '.my-selector:before {height: {{value}}px;}',
                value: to
            });
        } );
    } );

} )( jQuery );

```

## Motivation

It can be hard to manage the min and max breakpoints used in a project. These breakpoints need to be consistent across multiple environments within a project. If a change is required, the values need to be replaced across all of those environments. This package allows you to define the device dimensions in one place, and have access to the variables throughout your project.


## Installation

Use Composer to install in your project as a dependency:

```
{
    "require": {
        "skyshab/wp-rootstrap": "0.0.*"
    }
}
```

Or manually download and include 'wp-rootstrap/src/includes/class-wp-rootstrap.php' in your path.


## API Reference

Coming Soon


## Contributors

Right now the focus is on refining the functionality related to device sizes and responsive styles, but would like to expand the scope of wp-rootstrap to include image sizes and aspect ratios as well. If you find any bugs, have questions or feature requests. Let me know!


## License

This package is published under a GPL license.


## Releases

== 0.9.0 ==

* 12/23/17
* Refactored, adjusted scope and once again spinning off of main project.


== 0.9.1 ==

* 12/25/17
* Fixed: composer.json syntax error.
* Updated: Readme examples. 


