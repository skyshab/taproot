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

        if ( ! control ) {
            return false;
        }

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

            if ( checkbox.is( ':checked' ) ) {
                checkbox.prop( 'checked', false );
            } else {
                checkbox.prop( 'checked', true );

                if ( 'uppercase' === checkbox.val() ) {
                    $( this ).siblings('.taproot-font-styles--capitalize').removeClass('taproot-font-style-checked').find('input').prop( 'checked', false ).change();
                } else if ( 'capitalize' == checkbox.val() ) {
                    $( this ).siblings('.taproot-font-styles--uppercase').removeClass('taproot-font-style-checked').find('input').prop( 'checked', false ).change();
                }
            }

            checkbox.change();
        });

        self.$checkboxes.on('change', function() {

            var currentValue = self.$input.val(),
                value         = $(this).val(),
                values        = ( 'false' != currentValue ) ? currentValue.split( '|' ) : [],
                query         = $.inArray( value, values ),
                result        = '';

            if ( true == $(this).prop('checked' ) ) {
                if ( currentValue.length ) {
                    if ( 0 > query ) {
                        values.push( value );
                        result = values.join( '|' );
                    }
                } else {
                    result = value;
                }
            } else {
                if ( currentValue.length ) {
                    if ( 0 <= query ) {
                        values.splice( query, 1 );
                        result = values.join( '|' );
                    } else {
                        result = currentValue;
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
