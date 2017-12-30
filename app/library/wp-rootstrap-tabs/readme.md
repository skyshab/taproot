=== WP Rootstrap Tabs ===
Contributors: Sky Shabatura
Requires at least: WordPress 4.6
Tested up to: WordPress 4.9
Version: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==
WP Rootstrap Tabs provides a tabbed interface within the customizer.  

== Usage ==

1. Include wp-rootstrap-tabs.php in your theme or plugin. 
2. Define the location to the WP Rootstrap Tabs js and css files using the "wp-rootstrap-tabs-scripts" and "wp-rootstrap-tabs-styles" filters, or concatentate those files into your minified plugin or theme files.
3. When defining your customizer controls, create a tab group using rootstrap_tabs() function.  
4. Each tab is just a section. Assign customizer controls to the tabs as you would default sections.  

== Examples ==

#Defining script and stylesheet locations

```php

	add_filter( 'wp-rootstrap-tabs-scripts', 'my_rootstrap_tabs_script_location_callback' );
	function my_rootstrap_tabs_script_location_callback( $uri ) {

		return get_template_directory_uri() . '/app/library/wp-rootstrap-tabs/js/wp-rootstrap-tabs.js';

	}


	add_filter( 'wp-rootstrap-tabs-styles', 'my_rootstrap_tabs_styles_location_callback' );
	function my_rootstrap_tabs_styles_location_callback( $uri ) {

		return get_template_directory_uri() . '/app/library/wp-rootstrap-tabs/js/wp-rootstrap-tabs.css';

	}	

```

#Defining and using a tab group example

```php

	// include the main plugin file
	include_once( 'path/to/plugin/location/wp-rootstrap-tabs/wp-rootstrap-tabs.php');

	// add tabs and controls in the customizer
	add_action( 'customize_register', 'my_rootstrap_tabs_example', 100 );
	function my_rootstrap_tabs_example( $wp_customize ) {

		// roostrap_tabs( $wp_customize, string $root_tab_id, array $tab_args );

		// Define tabs and create sections
		rootstrap_tabs( $wp_customize, 'example_tab_section_1', array(
		    'priority' => 10,
		    'panel' => 'my_panel',
		    'title' => esc_html__( 'Tabs Sections Title', 'rootstrap' ),
		    'tabs' => array(
		        'example_tab_section_1' => 'Tab 1',
		        'example_tab_section_2' => 'Tab 2',
		        'example_tab_section_3' => 'Tab 3',
		    ),
		));

        // Setting: Example Text Setting for Tab 1   
        $wp_customize->add_setting( 'example_setting_1', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'example_setting_1', array(
            'type' => 'text',
            'section' => 'example_tab_section_1',
            'label' => esc_html__( 'Example Setting Label', 'rootstrap' ),        
        ));


        // Setting: Example Text Setting for Tab 2   
        $wp_customize->add_setting( 'example_setting_2', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'example_setting_2', array(
            'type' => 'text',
            'section' => 'example_tab_section_2',
            'label' => esc_html__( 'Example Setting Label', 'rootstrap' ),        
        ));


        // Setting: Example Text Setting for Tab 3   
        $wp_customize->add_setting( 'example_setting_3', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'example_setting_3', array(
            'type' => 'text',
            'section' => 'example_tab_section_3',
            'label' => esc_html__( 'Example Setting Label', 'rootstrap' ),        
        ));        

	}

```

== Copyright ==

WP Rootstrap Tabs, Copyright 2017 Sky Shabatura
WP Rootstrap Tabs is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.


== Changelog ==

= 1.0.0 =
* 12/23/17 *
* Initial release as stand alone plugin.
