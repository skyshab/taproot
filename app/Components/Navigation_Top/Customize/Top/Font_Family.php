<?php
/**
 * Font Family
 *
 * This class handles the customizer control for the font family.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Top\Customize\Top;

use Taproot\Customize\Controls\Select\Select;
use function Taproot\Tools\theme_mod;
use function Hybrid\app;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Font_Family extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'font-family';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Font Family';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'default';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return app('fonts')->get_font_choices();
    }

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.menu--top__link',
            'styles' => [
                'font-family' => app('fonts')->get_font_family( theme_mod( $this->id ) ),
            ],
        ]);
    }
}
