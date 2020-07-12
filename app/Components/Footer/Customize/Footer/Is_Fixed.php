<?php
/**
 * Hide Logo When Fixed Header.
 *
 * This class handles the customizer control for hiding the logo in the fixed header.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
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
class Is_Fixed extends Checkbox {

    /**
     * Name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'footer--is-fixed';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Enable Fixed Footer';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = TRUE;

    /**
     * Transport
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'refresh';

}
