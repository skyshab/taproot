<?php
/**
 * Customize class.
 *
 * This file implements the primary theme customizer functionality.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize;

use WP_Customize_Manager;
use Hybrid\Contracts\Bootable;
use Hybrid\App;
use function Taproot\Tools\asset;

/**
 * Primary customizer class.
 *
 * @since  2.0.0
 * @access public
 */
class Customize implements Bootable {

    /**
     * Stores panels
     *
     * @since 2.0.0
     * @var array
     */
    public $panels = [];

    /**
     * Stores sections
     *
     * @since 2.0.0
     * @var array
     */
    public $sections = [];

    /**
     * Stores controls
     *
     * @since 2.0.0
     * @var array
     */
    public $controls = [];

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        add_filter( 'init', [ $this, 'setup' ], 100 );

        // Register panels
        add_action('rootstrap/customize-register/panels', [$this, 'panels']);

        // Register sections
        add_action("rootstrap/customize-register/sections", [$this, 'sections']);

        // Register settings
        add_action("rootstrap/customize-register/settings", [$this, 'settings']);

        // Register controls
        add_action("rootstrap/customize-register/controls", [$this, 'controls']);

        // Register partials
        add_action("rootstrap/customize-register/partials", [$this, 'partials']);

        // Add any customizer modifications
        add_action( 'customize_register', [$this, 'customize_register_after'], PHP_INT_MAX );

        // Register defaults
        add_action( 'rootstrap/defaults', [$this, 'defaults'] );

        // Register Tabs
        add_filter( 'rootstrap/tabs', [ $this, 'tabs' ] );

        // Register Sequences
        add_filter( 'rootstrap/sequences', [ $this, 'sequences' ] );

        // Editor styles
        add_action( 'taproot/editor/styles', [$this, 'editorStyles'] );

        // Enqueue scripts and styles.
        add_action( 'customize_controls_enqueue_scripts', [ $this, 'controlsEnqueue'] );

        // Enqueue preview scripts.
        add_action( 'customize_preview_init', [ $this, 'previewEnqueue' ] );

        // Add preview live style scripts
        add_action( 'customize_preview_init', [ $this, 'previewStyles' ], 100 );
    }

    /**
     * Setup
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function setup() {

        // Get panels collection
        $panels = App::resolve( 'customize/components' );

        // Loop through the panels
        foreach( $panels->all() as $id => $panel ) {

            // Store panel
            $this->panels[] = $panel;

            // Loop through the sections
            foreach( $panel->section_objects as $section ) {

                // Store section
                $this->sections[] = $section;

                // Loop through the controls
                foreach( $section->control_objects as $control ) {

                    // Store control
                    $this->controls[] = $control;
                }
            }
        }

        // Theme stylesheet handle
        $handle = App::resolve( 'styles/handle' );

        // Front End styles
        add_action( "rootstrap/styles/{$handle}", [$this, 'styles'] );
    }

    /**
     * Panels
     *
     * @since  2.0.0
     * @access public
     * @param  object  $manager - Instance of WP_Customize_Manager
     * @return void
     */
    public function panels( WP_Customize_Manager $manager ) {

        foreach( $this->panels as $panel ) {
            if( method_exists( $panel, 'panels') ) {
                $panel->panels($manager);
            }
        }
    }

    /**
     * Sections
     *
     * @since  2.0.0
     * @access public
     * @param  object  $manager - Instance of WP_Customize_Manager
     * @return void
     */
    public function sections( WP_Customize_Manager $manager ) {

        foreach( $this->sections as $section ) {
            if( method_exists( $section, 'sections') ) {
                $section->sections($manager);
            }
        }
    }

    /**
     * Settings
     *
     * @since  2.0.0
     * @access public
     * @param  object  $manager - Instance of WP_Customize_Manager
     * @return void
     */
    public function settings( WP_Customize_Manager $manager ) {

        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'settings') ) {
                $control->settings($manager);
            }
        }
    }

    /**
     * Controls
     *
     * @since  2.0.0
     * @access public
     * @param  object  $manager - Instance of WP_Customize_Manager
     * @return void
     */
    public function controls( WP_Customize_Manager $manager ) {

        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'controls') ) {
                $control->controls($manager);
            }
        }
    }

    /**
     * Partials
     *
     * @since  2.0.0
     * @access public
     * @param  object  $manager - Instance of WP_Customize_Manager
     * @return void
     */
    public function partials( WP_Customize_Manager $manager ) {

        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'partials') ) {
                $control->partials($manager);
            }
        }
    }

    /**
     * Customize register after
     *
     * This provides a hook for adding modifications to core or third-party
     * customizer components that may not have been added yet.
     *
     * @since  2.0.0
     * @access public
     * @param  object  $manager - Instance of WP_Customize_Manager
     * @return void
     */
    public function customize_register_after( WP_Customize_Manager $manager ) {

        // Panels
        foreach( $this->panels as $panel ) {
            if( method_exists( $panel, 'customize_register_after') ) {
                $panel->customize_register_after( $manager );
            }
        }

        // Sections
        foreach( $this->sections as $section ) {
            if( method_exists( $section, 'customize_register_after') ) {
                $section->customize_register_after( $manager );
            }
        }

        // Controls
        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'customize_register_after') ) {
                $control->customize_register_after( $manager );
            }
        }
    }

    /**
     * Defaults
     *
     * @since  2.0.0
     * @access public
     * @param  object  $defaults - Instance of defaults manager
     * @return void
     */
    public function defaults( $defaults ) {

        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'defaults') ) {
                $control->defaults( $defaults );
            }
        }
    }

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @param  object  $styles - Instance of rootstrap styles
     * @return void
     */
    public function styles( $styles ) {

        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'styles') ) {
                $control->styles( $styles );
            }
        }
    }

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @param  object  $styles - Instance of rootstrap styles
     * @return void
     */
    public function editorStyles( $styles ) {

        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'editorStyles') ) {
                $control->editorStyles( $styles );
            }
        }
    }

    /**
     * Preview JS
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function previewStyles() {

        foreach( $this->controls as $control ) {
            if( method_exists( $control, 'previewStyles') ) {
                wp_add_inline_script( 'taproot-customize-preview', $control->previewStyles() );
            }
        }
    }

    /**
     * Tabs
     *
     * @since  2.0.0
     * @access public
     * @param  object  $tabs - Instance of tabs manager
     * @return void
     */
    public function tabs( $tabs ) {

        foreach( $this->panels as $panel ) {
            if( method_exists( $panel, 'tabs') ) {
                $tabs = $panel->tabs($tabs);
            }
        }

        return $tabs;
    }

    /**
     * Sequences
     *
     * @since  2.0.0
     * @access public
     * @param  object  $sequences - Instance of sequences manager
     * @return void
     */
    public function sequences( $sequences ) {

        foreach( $this->panels as $panel ) {
            if( method_exists( $panel, 'sequences') ) {
                $sequences = $panel->sequences($sequences);
            }
        }

        return $sequences;
    }

    /**
     * Enqueue scripts and styles for the customize controls.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function controlsEnqueue() {
        wp_enqueue_script( 'taproot-customize-controls', asset( 'js/customize-controls.js' ), [ 'customize-controls' ], null, true );
        wp_enqueue_style( 'taproot-customize-controls', asset( 'css/customize-controls.css' ), [], null );
    }

    /**
     * Enqueue scripts and styles for the customize preview.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function previewEnqueue() {
        wp_enqueue_script( 'taproot-customize-preview', asset( 'js/customize-preview.js' ), ['customize-preview'], filemtime( get_template_directory().'/style.css' ), true );
    }
}
