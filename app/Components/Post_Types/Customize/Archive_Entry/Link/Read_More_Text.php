<?php
/**
 * Footer bottom bar content.
 *
 * This class handles the customizer control for the footer bottom bar content.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types\Customize\Archive_Entry\Link;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Read_More_Text extends Control {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'readmore';

    /**
     * Control type
     *
     * @since 2.0.0
     * @var string
     */
    public $type = 'text';

    /**
     * Sanitization callback
     *
     * @since 2.0.0
     * @var string
     */
    public $sanitize_callback = 'wp_kses_post';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Read More Text';

    /**
     * Transport method
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'postMessage';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'read more';
}
