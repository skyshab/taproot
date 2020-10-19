<?php
/**
 * Padding.
 *
 * This class handles the customizer control for the component padding.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Pagination\Customize\Pagination;

use Taproot\Customize\Controls\Range\Range;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Spacing extends Range {

    /**
     * Custom control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'spacing';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Spacing';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '0.3em';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 32,
            'default' => 5
        ],
        'em' => [
            'max' => 2,
            'default' => 0.3
        ],
        '%' => [
            'default' => 2
        ],
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.pagination__item',
            'styles' => [
                'margin-left'   => theme_mod( $this->id ),
                'margin-right'  => theme_mod( $this->id )
            ],
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
                    selector: '.pagination__item',
                    styles: {
                        'margin-left': to,
                        'margin-right': to,
                    }
                });
            });
        });
JS;
    }
}
