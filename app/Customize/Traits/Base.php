<?php
/**
 * Base control methods.
 *
 * This trait contains common methods for our control classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Traits;

/**
 * Class for checkbox controls
 *
 * @since  2.0.0
 * @access public
 */
trait Base {

    /**
     * Stores section ID
     *
     * @since 2.0.0
     * @var string
     */
    public $section;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct( $section = '' ) {

        $this->section = $section;

        // If controls name not provided, generate automatically
        if( '' === $this->id ) {
            $this->id = "{$this->section}--{$this->name}";
        }

        // Set up any attributes
        if( method_exists( $this, 'setup' ) ) {
            $this->setup();
        }
    }
}
