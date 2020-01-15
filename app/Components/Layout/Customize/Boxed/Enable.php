<?php
/**
 * Enable Boxed Layout.
 *
 * This class handles the customizer control for enabling a boxed layout.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Layout\Customize\Boxed;

use Taproot\Customize\Controls\Checkbox\Checkbox;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Enable extends Checkbox {

    /**
     * Stores control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'enable';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Use a boxed layout';

    /**
     * Transport
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'refresh';
}
