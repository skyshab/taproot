<?php
/**
 * Creates a tabbed interface for Customizer sections.
 * If section doesn't exist, this method will create it,
 * making it available to add controls to.
 *
 * @package wp-rootstrap
 * @since 0.8.0
 */

/**
 * Creates tabbed interface for customizer sections
 *
 * @param  object $wp_customize - WordPress customizer object
 * @param  string $root_id - id of section that will display as default tab
 * @param  array $group_args - settings for the tab group
 */
if( !function_exists('rootstrap_tabs') )
{
    function rootstrap_tabs( $wp_customize, $root_id, $group_args )
    {
		// set up tab group
		$tabs = $group_args['tabs'];
		$priority = ( isset( $group_args['priority'] ) ) ? $group_args['priority'] : '';
		$panel = ( isset( $group_args['panel'] ) ) ? $group_args['panel'] : '';
		$cb = ( isset( $group_args['active_callback'] ) ) ? $group_args['active_callback'] : '';
		$type = ( isset( $group_args['type'] ) ) ? $group_args['type'] : 'default';


		// create placeholder section for hiding tab sections in the interface
		$hider_id = sprintf( '%s-tab-hider', $panel );
		$wp_customize->add_section( $hider_id, array(
			'priority' => 999,
			'panel' => $panel,
		));

		// get root section title
		$root_title = ( $wp_customize->get_section( $root_id ) && $wp_customize->get_section( $root_id )->title ) ? $wp_customize->get_section( $root_id )->title : false;

		// create sections and add tab conrols for each tab
		foreach( $tabs as $section_id => $tab_args )
		{
			$setting_id = sprintf( '%s-tabs', str_replace( array( '[', ']' ), '', $section_id ) );
			$root = ( $section_id === $root_id ) ? true : false;
			$is_existing_section = ( $wp_customize->get_section( $section_id ) ) ? true : false;

			// if not an existing section, create it
			if( !$is_existing_section )
			{
				$wp_customize->add_section( $section_id, array(
					'priority' => $priority,
					'panel' => $panel,
					'type' => $type,
				));
			}

			// assign the title
			if( isset( $group_args['title'] ) ) $title = $group_args['title'];
			elseif( $root_title ) $title = $root_title;
			else $title = '';

			// set the title
			$wp_customize->get_section( $section_id )->title = $title;

			// if not the root tab section, move to priority where sections aren't visible
			if( !$root ) $wp_customize->get_section( $section_id )->priority = 1000;

			// Setting: create tabs control
			$wp_customize->add_setting( $setting_id, array(
				'capability' => 'edit_theme_options',
				'transport' => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			));

			// Control: create tabs control
			$wp_customize->add_control( new WP_Rootstrap_Customizer_Tabs_Control ( $wp_customize, $setting_id, array(
				'section' => $section_id,
				'tabs' => $tabs,
				'default' => $root_id,
				'priority' => -10,
				'active_callback' => $cb,
			)));

		} // end foreach tab

    } // end rootstrap_tabs

} // end if function doesn't exist