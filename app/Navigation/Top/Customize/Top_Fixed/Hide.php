<?php
/**
 * Hide.
 *
 * This class handles the customizer control for hiding an element.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2021, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Top\Customize\Top_Fixed;

use Taproot\Customize\Controls\Checkbox\Checkbox;

/**
 * Class for checkbox control
 *
 * @since  2.1.0
 * @access public
 */
class Hide extends Checkbox {

    /**
     * Stores control ID
     *
     * @since 2.1.0
     * @var string
     */
    public $name = 'hide';

    /**
     * Stores control label
     *
     * @since 2.1.0
     * @var string
     */
    public $label = 'Hide When Not Fixed';

    /**
     * Transport
     *
     * @since 2.1.0
     * @var string
     */
    public $transport = 'refresh';
}
