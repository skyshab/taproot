/**
 * Font Styles Control
 *
 * This file handles the JavaScript for the custom font styles control
 * 
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

    
class TaprootFontStyles {

    // initiate control
    constructor( control ) {

        if( !control ) return false;

        // Set up our attributes
        $control = jQuery(control.selector);
        this.$fontStyles =  $control.find('.taproot-font-styles--item');
        this.$checkboxes = $control.find('.taproot-font-style-checkbox');
        this.$input = $control.find('.taproot-font-styles-input');
        this.$reset = $control.find('.taproot-control-reset');

        // Set up event handlers
        this.handlers();  
    }

    // add handlers
    handlers() {

        const self = this;

        self.$fontStyles.click( function() {

            var checkbox = $( this ).find( 'input' );

            $( this ).toggleClass( 'taproot-font-style-checked' );

            if( checkbox.is( ':checked' ) ) {
                checkbox.prop( 'checked', false );
            } 
            else {
                checkbox.prop( 'checked', true );

                if( checkbox.val() == 'uppercase' ) {
                    $( this ).siblings('.taproot-font-styles--capitalize').removeClass('taproot-font-style-checked').find('input').prop( 'checked', false ).change();
                } 
                else if( checkbox.val() == 'capitalize' ) {
                    $( this ).siblings('.taproot-font-styles--uppercase').removeClass('taproot-font-style-checked').find('input').prop( 'checked', false ).change();
                }
            }

            checkbox.change();
        }); 

        self.$checkboxes.on('change', function() {

            var current_value = self.$input.val(),
                value         = $(this).val(),
                values        = ( current_value != 'false' ) ? current_value.split( '|' ) : [],
                query         = $.inArray( value, values ),
                result        = '';

            if( $(this).prop('checked' ) == true ) {
                if( current_value.length ) {
                    if( query < 0 ) {
                        values.push( value );
                        result = values.join( '|' );
                    }
                } else {
                    result = value;
                }
            } else {
                if( current_value.length ) {
                    if( query >= 0 ) {
                        values.splice( query, 1 );
                        result = values.join( '|' );
                    } else {
                        result = current_value;
                    }
                }
            }

            self.$input.val( result ).change();
        });


        self.$reset.click( () => {
            self.$input.val('').change();
            self.$checkboxes.removeAttr( 'checked' );
            self.$fontStyles.removeClass( 'taproot-font-style-checked' );
        });        
       
    }
}


/**
 * Initiate Control
 */
wp.customize.controlConstructor['taproot-font-styles'] = wp.customize.Control.extend( {
	ready: function() {
        let fontStyles = new TaprootFontStyles( this );
	}
});
