<?php
/**
 * Title Font Styles
 *
 * This class handles the customizer control for the title font styles.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Navbar\Customize\Navbar_Fixed;

use Taproot\Customize\Controls\Font_Styles\Font_Styles as FontStylesAbstract;
use function Hybrid\app;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Font_Styles extends FontStylesAbstract {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'font-styles';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Font Styles';

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__link',
            'styles' => app('typography')->get_font_styles( $this->id ),
            'screen' => 'desktop',
        ]);
    }

    /**
     * Preview Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function previewStyles() {

        return <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.style({
                    id: "{$this->id}",
                    selector: '.app-header--fixed .menu--navbar__link',
                    screen: 'desktop',
                    styles: taprootFontStyles( to ),
                });
            });
        });
        JS;
    }
}
