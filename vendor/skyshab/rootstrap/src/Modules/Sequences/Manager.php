<?php
/**
 * Sequences manager.
 *
 * This class makes sequence functionality available in Customize Register 
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Sequences;

use Rootstrap\Abstracts\Bootable;


/**
 * Sequences manager class.
 *
 * @since  1.0.0
 * @access public
 */
class Manager extends Bootable {


    /**
     * Sets up the sequence manager actions and filters.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function boot() {
        // this needs to fire AFTER customizer sections have been registered
        add_action( 'customize_register', [ $this, 'load' ], 500 );
    }


    /**
     * Load classes and functions in customizer
     *
     * @since 1.0.0
     * @access public
     * @param object $manager - the WordPress customizer object
     */
    public function load( $manager ) {
       
        // The file that contains our custom control. 
        require_once ROOTSTRAP_DIR . '/Modules/Sequences/class-sequence-control.php';

        // The file that contains helper function for creating sequences. 
        require_once ROOTSTRAP_DIR . '/Modules/Sequences/functions-sequence.php';

        $sequences = apply_filters( 'rootstrap/sequences', [] ); 
        
        foreach( $sequences as $args ) {
            sequence( $manager, $args );
        }
    }

}
