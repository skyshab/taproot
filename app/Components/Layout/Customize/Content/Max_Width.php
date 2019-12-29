<?php
/**
 * Branding logo width.
 *
 * This class handles the customizer control for the branding logo width.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Layout\Customize\Content;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Max_Width extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'max-width';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Max Container Width';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '640px';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max'   => 1600,
            'default' => 980
        ],
        'rem' => [
            'max'   => 50,
            'default' => 42
        ]
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->customProperty([
            'name'  => $this->id,
            'value' => Mod::get( $this->id )
        ]);
    }

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles($styles) {
        $this->styles( $styles );
    }
}
