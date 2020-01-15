<?php
/**
 * Excerpt Length.
 *
 * This class handles the customizer control for the excerpt length.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types\Customize\Archive_Entry\Excerpt;

use Taproot\Customize\Controls\Range\Range;
/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Length extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'length';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Excerpt Length';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '80';

    /**
     * Transport
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'refresh';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'unitless' => [
            'min'  => 0,
            'max'  => 250,
            'step' => 1,
            'default' => 80
        ]
    ];
}
