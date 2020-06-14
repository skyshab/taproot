<?php
/**
 * Footer bottom bar content.
 *
 * This class handles the customizer control for the footer bottom bar content.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Fonts\Customize\Fonts;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Google extends Control {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'taproot-google-fonts';

    /**
     * Control type
     *
     * @since 2.0.0
     * @var string
     */
    public $type = 'textarea';

    /**
     * Sanitization callback
     *
     * @since 2.0.0
     * @var string
     */
    public $sanitize_callback = 'Taproot\Components\Fonts\Functions::sanitize_google_fonts';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Google Fonts Code';

    /**
     * Transport method
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'postMessage';
}
