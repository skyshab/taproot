<?php
/**
 * Font Size.
 *
 * This class handles the customizer control for the taglin font size.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Post_Types\Customize\Single\Title;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Font_Size extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'font-size';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Font Size';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = [
        'mobile'    => '2em',
        'tablet'    => '2.5em',
        'desktop'   => '2.5em'
    ];

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'em' => [
            'min' => 0.8,
            'max' => 4,
        ],
        'rem' => [
            'min' => 0.8,
            'max' => 4,
        ],
        'px' => [
            'min' => 14,
            'max' => 72,
        ]
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'      => 'entry--title--font-size',
            'value'     => theme_mod( $this->id ),
            'selector'  => ".entry--type-{$this->post_type}"
        ]);

        $styles->customProperty([
            'name'      => 'entry--title--font-size',
            'value'     => theme_mod( "{$this->id}--tablet" ),
            'screen'    => 'tablet-and-up',
            'selector'  => ".entry--type-{$this->post_type}"
        ]);

        $styles->customProperty([
            'name'      => 'entry--title--font-size',
            'value'     => theme_mod( "{$this->id}--desktop" ),
            'screen'    => 'desktop',
            'selector'  => ".entry--type-{$this->post_type}"
        ]);
    }

    /**
     * Editor styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {

        $styles->customProperty([
            'name'      => 'entry--title--font-size',
            'value'     => Mod::get( $this->id ),
            'selector'  => ".post-type-{$this->post_type}"
        ]);

        $styles->customProperty([
            'name'      => 'entry--title--font-size',
            'value'     => Mod::get( "{$this->id}--tablet" ),
            'screen'    => 'editor-tablet',
            'selector'  => ".post-type-{$this->post_type} .edit-post-layout:not(.is-sidebar-opened)"
        ]);

        $styles->customProperty([
            'name'      => 'entry--title--font-size',
            'value'     => Mod::get( "{$this->id}--tablet" ),
            'screen'    => 'editor-desktop',
            'selector'  => ".post-type-{$this->post_type}"
        ]);

        $styles->customProperty([
            'name'      => 'entry--title--font-size',
            'value'     => Mod::get( "{$this->id}--desktop" ),
            'screen'    => 'editor-desktop',
            'selector'  => ".post-type-{$this->post_type} .edit-post-layout:not(.is-sidebar-opened)"
        ]);
    }
}