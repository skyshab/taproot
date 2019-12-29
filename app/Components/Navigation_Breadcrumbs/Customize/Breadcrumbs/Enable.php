<?php
/**
 * Hide Logo When Fixed Header.
 *
 * This class handles the customizer control for hiding the logo in the fixed header.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Breadcrumbs\Customize\Breadcrumbs;

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
    public $label = 'Enable Breadcrumbs';

    /**
     * Default
     *
     * @since 2.0.0
     * @var bool
     */
    public $default = TRUE;
}
