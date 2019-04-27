/**
 * Range with Unit Selector
 *
 * This file handles the JavaScript for the custom range control
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


class TaprootRange {

    constructor( control ) {

        if ( ! control ) {
            return false;
        }

        // Set up our attributes
        $control = jQuery(control.selector);
        this.$range = $control.find('.taproot-range');
        this.$rangeInput = $control.find('.taproot-range-input');
        this.$unit = $control.find('.taproot-unit');
        this.$reset = $control.find('.taproot-reset-slider');
        this.$value = $control.find('.taproot-range-value');
        this.$enable = $control.find( '.taproot-range-enable' );
        this.$disable = $control.find( '.taproot-range-disable' );

        // Set up event handlers
        this.handlers();
    }


    // event handlers for our control
    handlers() {

        const self = this;

        self.$range.on( 'mousedown', function() {

            var stepPlaces = self.decimalPlaces( $( this ).attr('step') );

            // using 'input' instead of 'mousemove' prevents
            // the value changing after releasing control
            // Are there other repercussions to this?
            $( this ).on('input', function() {

                // check range step attribute, and adjust input
                // to display using appropriate number of decimal places
                self.$rangeInput.val( parseFloat( $( this ).attr( 'value' ) ).toFixed(stepPlaces) );
                self.updateValue();
            });

        });

        self.$rangeInput.on( 'change keyup', function() {
            self.adjustRangeValue( $(this), 1000 );
            self.updateValue();
        }).on( 'focusout', function() {
            self.adjustRangeValue( $(this), 0 );
            self.updateValue();
        });

        self.$reset.click( function() {
            self.reset();
        });

        self.$enable.on( 'change', function() {
            self.reset();
        });

        self.$unit.on( 'change', function() {
            const value = $(this).val();
            const $option = $(this).find('option[value="' + value + '"]');
            const defaultVal   = parseFloat( $option.attr('default') );

            self.$range.attr('min',  parseFloat( $option.attr('min')  ));
            self.$range.attr('max',  parseFloat( $option.attr('max')  ));
            self.$range.attr('step', parseFloat( $option.attr('step') ));
            self.$range.val( defaultVal );

            self.$rangeInput.attr('min',  parseFloat( $option.attr('min')  ));
            self.$rangeInput.attr('max',  parseFloat( $option.attr('max')  ));
            self.$rangeInput.attr('step', parseFloat( $option.attr('step') ));
            self.$rangeInput.val( defaultVal );
            self.updateValue();
        });

        self.$disable.on( 'click',  function() {
            self.$enable.prop('checked', false).change();
            self.$value.val('').change();
        });

    }


    // get number of decimal places
    decimalPlaces( value ) {
        if (Math.floor(value) == value) {
            return 0;
        }
        return value.toString().split('.')[1].length || 0;
    }


    // reset the values to default
    reset() {
        const rangeDefault = this.$range.data( 'reset_value' );
        const unitDefault = this.$unit.data( 'reset_value' );
        this.$unit.val( unitDefault ).change();
        this.$range.val( rangeDefault ).change();
        this.$rangeInput.val( rangeDefault ).change();

        this.updateValue();
    }


    // update the hidden control that stores the value
    updateValue() {
        const unit = ( 'unitless' === this.$unit.val() ) ? '' : this.$unit.val();
        this.$value.val( this.$range.val() + unit ).change();
    }


    // handle range adjustments
    adjustRangeValue( $rangeInput, timeout ) {
        const $range  = $rangeInput.parent().find('.taproot-range');
        var   value   = parseFloat( $rangeInput.val() );
        const reset   = parseFloat( $range.attr('data-reset_value') );
        const step    = parseFloat( $rangeInput.attr('step') );
        const min     = parseFloat( $rangeInput.attr('min') );
        const max     = parseFloat( $rangeInput.attr('max') );

        clearTimeout( this.rangeTimeout );

        this.rangeTimeout = setTimeout( function() {
            if ( isNaN( value ) ) {
                $rangeInput.val( reset );
                $range.val( reset ).change();
                return;
            }

            if ( 1 <=  step && 0 !== value % 1 ) {
                value = Math.round( value );
                $rangeInput.val( value );
                $range.val( value ).change();
            }

            if ( value > max ) {
                $rangeInput.val( max );
                $range.val( max ).change();
            }

            if ( value < min ) {
                $rangeInput.val( min );
                $range.val( min ).change();
            }
        }, timeout );

        $range.val( value ).change();
    }
}


/**
 * Initiate Range
 */
wp.customize.controlConstructor['taproot-range'] = wp.customize.Control.extend( {
	ready: function() {
        let range = new TaprootRange( this );
	}
});
