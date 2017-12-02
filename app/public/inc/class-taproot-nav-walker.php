<?php
/**
 * Theme navigation customizations
 *
 * @package Taproot/Public
 * @since 0.8.0
 */

if( !class_exists( 'Taproot_Nav_Walker' ) )
{
    /**
     * Class that customizes navigation menu output.
     *
     * @since 0.8.0
     * @see Walker_Nav_Menu
     */
    class Taproot_Nav_Walker extends Walker_Nav_Menu
    {

        /**
         * Customizes navigation menu items.
         *
         * @since 0.8.0
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
        {
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="'. esc_attr( $class_names ) . '"';
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) . '"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) . '"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) . '"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) . '"' : '';
            $description  = ! empty( $item->description ) ? '<span>'  . esc_attr( $item->description ) . '</span>' : '';

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';

            $item_icon = apply_filters( 'taproot_nav_icon_filter', false, $item->ID );
            
            if( $item_icon )
                $item_output .= $item_icon;

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $description . $args->link_after;
            $item_output .= ( in_array( 'menu-item-has-children' , $classes ) ) ? '<span class="dropdown-target">' . do_taproot_icon('menu_item_dropdown') . '</span></a>' : '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

} // end if class doesn't exist
