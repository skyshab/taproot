<?php
/**
 * Is fullwidth footer
 *
 * This class handles the customize control for enabling fullwidth footer.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer\Customize\Footer;

use Taproot\Customize\Controls\Checkbox\Checkbox;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Is_Fullwidth extends Checkbox {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'footer--is-fullwidth';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Enable Fullwidth Footer';
}
