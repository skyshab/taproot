<?php
/**
 * Customize control Group Title
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Controls;

use WP_Customize_Control;


/**
 * Adds Title for a group of controls.
 * 
 * @since 1.0.0
 */
class Group_Title extends WP_Customize_Control {


    /**
     * Stores control type.
     *
     * @since 1.0.0
     * @var string
     */     
    public $type = 'taproot-option-group';


    /**
     * Render control markup.
     *
     * @since 1.0.0
     */ 
    public function render_content() {
        if( !empty( $this->label ) ) :
            printf( '<label class="taproot-group-title">%s</label>', esc_html( $this->label ) );
        endif;
    }

}
