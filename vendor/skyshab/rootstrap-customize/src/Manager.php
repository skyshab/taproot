<?php
/**
 * Manager class.
 *
 * This class handles loading the customize register actions for the extension.
 *
 * @package   Rootstrap\Customize
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Customize;

use Rootstrap\Abstracts\Bootable;
use function Rootstrap\Customize\Sequences\sequence;
use function Rootstrap\Customize\Tabs\tabs;

/**
 * Creates a new Rootstrap_Custom_Sections object.
 *
 * @since  1.0.0
 * @access public
 */
class Manager extends Bootable {


    /**
     * Stores Resources Path
     *
     * @since 1.0.0
     * @var array
     */
    private $resources;


    /**
     * Load resources.
     *
     * @since 1.0.0
     * @return object
     */
    public function boot() {

        // get the vendor path and create a reference to this package's resource directory
        $vendor = apply_filters( 'rootstrap/resources/vendor', false );
        if ( !$vendor ) return;
        $this->resources = $vendor . '/skyshab/rootstrap-customize/resources';

        add_action( 'customize_controls_enqueue_scripts', [ $this, 'customize_resources' ] );
        add_action( 'customize_register', [ $this, 'sequences' ], PHP_INT_MAX );
        add_action( 'customize_register', [ $this, 'tabs' ], PHP_INT_MAX );
    }


    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    public function sequences($manager) {

        // The file that contains our custom control.
        require_once ROOTSTRAP_CUSTOMIZE_DIR . '/Controls/class-sequence-control.php';

        // The file that contains helper function for creating sequences.
        require_once ROOTSTRAP_CUSTOMIZE_DIR . '/Sequences/functions-sequences.php';

        $sequences = apply_filters( 'rootstrap/sequences', [] );

        foreach( $sequences as $args ) {
            sequence( $manager, $args );
        }
    }


    /**
     * Load Rootstrap Modules when required
     *
     * @since 1.0.0
     * @return void
     */
    public function tabs($manager) {

        // The file that contains our customizer control.
        require_once ROOTSTRAP_CUSTOMIZE_DIR . '/Controls/class-tabs-control.php';

        // The file that contains helper function for creating tabs.
        require_once ROOTSTRAP_CUSTOMIZE_DIR . '/Tabs/functions-tabs.php';

        $tabs = apply_filters( 'rootstrap/tabs', [] );

        foreach( $tabs as $args ) {
            tabs( $manager, $args );
        }
    }


    /**
     * Enqueue scripts and styles.
     *
     *  If filters are applied defining file locations, load scripts and styles.
     *
     * @since 1.0.0
     */
    public function customize_resources() {
        wp_enqueue_script( 'rootstrap-customize-customize-controls', $this->resources . '/js/customize-controls.min.js', ['customize-controls', 'jquery'], "1.2", true );
        wp_enqueue_style( 'rootstrap-customize-customize-controls', $this->resources . '/css/customize-controls.min.css' );
    }

}
