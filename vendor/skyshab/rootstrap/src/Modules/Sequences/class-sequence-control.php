<?php
/**
 * Sequence Customize Control
 *
 * Custom control that adds sequence markup to the the customizer. 
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


/**
 * Sequence Customize Control class.
 *
 * @since  1.0.0
 * @access public
 */
class Sequence_Control extends WP_Customize_Control {


    /**
     * Stores the control type
     *
     * @since 1.0.0
     * @var string
     */ 
    public $type = 'rootstrap-sequence';

    /**
     * Stores current device id
     * 
     * @since 1.0.0
     * @var string
     */ 
    public $device;

    /**
     * Stores next section data
     * 
     * @since 1.0.0
     * @var array
     */ 
    public $next;    

    /**
     * Stores previous section data
     * 
     * @since 1.0.0
     * @var array
     */ 
    public $prev;

   
    /**
     * Renders the content of our custom control
     * 
     * @since 1.0.0
     */ 
    public function render_content() {

        if( isset( $this->prev['section'] ) && $this->prev['section'] ) {

            $class = 'rootstrap-nav-link rootstrap-nav-link__sequence rootstrap-nav-link__sequence--previous alignleft';
            $target_section = sprintf( 'data-section="%s"', $this->prev['section'] );
            $label = ( isset( $this->prev['label'] ) ) ? $this->prev['label'] : '';
            $device = ( isset( $this->prev['device'] ) ) ? sprintf( 'data-device="%s"', $this->prev['device'] ) : '';    

            printf( '<a href="#" class="%s" %s %s><span>%s</span></a>',
                $class,
                $target_section, 
                $device,
                $label
            );
        }

        if( isset( $this->next['section'] ) && $this->next['section'] ) {
            
            $class = 'rootstrap-nav-link rootstrap-nav-link__sequence rootstrap-nav-link__sequence--next alignright';
            $target_section = sprintf( 'data-section="%s"', $this->next['section'] );
            $label = ( isset( $this->next['label'] ) ) ? $this->next['label'] : '';
            $device = ( isset( $this->next['device'] ) ) ? sprintf( 'data-device="%s"', $this->next['device'] ) : '';    
                
            printf( '<a href="#" class="%s" %s %s><span>%s</span></a>',
                $class,
                $target_section, 
                $device,
                $label
            );
        }
    }

 } 
