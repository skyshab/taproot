<?php
/**
 * Tabs Customize Control
 *
 * Custom control that adds tabs markup to the the customizer. 
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


/**
 * Tabs Customize Control class.
 *
 * @since  1.0.0
 * @access public
 */
class Tabs_Control extends WP_Customize_Control {


    /**
     * Stores the control type
     *
     * @since 1.0.0
     * @var string
     */ 
    public $type = 'rootstrap-tabs';

    /**
     * Stores tabs data
     * 
     * @since 1.0.0
     * @var array
     */ 
    public $tabs = array();

    /**
     * Stores default tab section id
     * 
     * @since 1.0.0
     * @var string
     */ 
    public $default;


    /**
     * Renders the content of our custom control
     * 
     * @since 1.0.0
     */ 
    public function render_content() {

        if( empty( $this->tabs ) ) return;

        // open tabs wrapper
        echo '<div class="rootstrap-tabs-wrapper">';

        // print out each tab
         foreach( $this->tabs as $section => $tab ) {

             $id = sprintf( 'rootstrap-tab-%s', $this->id );
             $current = ( $this->section === $section ) ? ' current-tab' : '';
             $root = ( $section === $this->default ) ? ' root-tab' : '';

             if( is_array( $tab ) ) {

                 $callback = ( isset( $tab['active_callback'] ) && '' !== $tab['active_callback'] ) ? $tab['active_callback'] : false;
                 
                 if( $callback && function_exists( $callback ) && false === $callback() ) continue;

                 $label = ( isset( $tab['label'] ) &&  $tab['label'] ) ? $tab['label'] : '';
             }
             else $label = ( $tab ) ? $tab : 'Tab';

             printf( '<a id="%s" data-section="%s" class="rootstrap-nav-link rootstrap-nav-link__tabs rootstrap-tab%s%s" href="#">%s</a>',
                 esc_attr( $id ),
                 esc_attr( $section ),
                 esc_attr( $current ),
                 esc_attr( $root ),
                 esc_html( $label )
             );
         }

         // close tabs wrapper
         echo '</div>';
     }

 } 
