<?php
/**
 * Preview Editor Styles.
 *
 * This trait contains a method to add custom properties in the editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/Taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Customize\Traits;

use Taproot\Tools\Mod;

/**
 * Trait for custom property method.
 *
 * @since  2.0.0
 * @access public
 */
trait CustomPropertyEditor {

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {

        // Mobile
        $styles->customProperty([
            'name'  => $this->id,
            'value' => Mod::get( $this->id ),
        ]);

        // Tablet
        if( isset( $this->devices ) && in_array( 'tablet', $this->devices ) ) {

            $styles->customProperty([
                'name'      => "{$this->id}--tablet",
                'value'     => Mod::get("{$this->id}--tablet"),
                'screen'    => 'editor-tablet'
            ]);
        }

        // Desktop
        if( isset( $this->devices ) && in_array( 'desktop', $this->devices ) ) {

            $styles->customProperty([
                'name'      => "{$this->id}--desktop",
                'value'     => Mod::get("{$this->id}--desktop"),
                'screen'    => 'editor-desktop'
            ]);
        }
    }
}
