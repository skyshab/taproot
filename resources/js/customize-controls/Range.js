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

        control = document.querySelector(control.selector);

        this.devicePicker = control.querySelector( '.device-picker' );
        this.devices = control.querySelectorAll( '.device-picker__device' );
        this.controls = control.querySelectorAll( '.customize-control-taproot-range__wrapper' );

        // initiate handlers
        this.controls.forEach( control => {
            this.handlers(control);
        });
    }


    // event handlers for our control
    handlers(control) {

        const self = this;

        // Set up our attributes
        const range = control.querySelector('.taproot-range');
        const rangeInput = control.querySelector('.taproot-range-input');
        const unit = control.querySelector('.taproot-unit');
        const reset = control.querySelector('.taproot-reset-slider');
        const val = control.querySelector('.taproot-range-value');
        const enable = control.querySelector( '.taproot-range-enable' );

        range.addEventListener('mousedown', (e) => {
            const $this = e.target;
            const stepPlaces = self.decimalPlaces( $this.getAttribute('step') );

            // using 'input' instead of 'mousemove' prevents
            // the value changing after releasing control
            $this.addEventListener('input', () => {

                // check range step attribute, and adjust input
                // to display using appropriate number of decimal places
                rangeInput.value = parseFloat($this.value).toFixed(stepPlaces);
                self.updateValue(val, range, unit);
            });
        });

        rangeInput.addEventListener('change', (e) => {
            const $this = e.target;
            self.adjustRangeValue( $this, 1000 );
            self.updateValue(val, range, unit);

            $this.addEventListener('focusout', () => {
                self.adjustRangeValue( $this, 0 );
                self.updateValue(val, range, unit);
            });
        });

        reset.addEventListener('click', () => {
            self.reset(range, rangeInput, unit);
            self.updateValue(val, range, unit);
        });

        enable.addEventListener('change', () => {
            self.reset(range, rangeInput, unit);
            self.updateValue(val, range, unit);
        });

        unit.addEventListener('change', (e) => {
            const $this = e.target;
            const option = $this.querySelector('option[value="' + $this.value + '"]');
            const defaultVal = parseFloat( option.getAttribute('default') );

            range.setAttribute('min',  parseFloat( option.getAttribute('min')  ));
            range.setAttribute('max',  parseFloat( option.getAttribute('max')  ));
            range.setAttribute('step', parseFloat( option.getAttribute('step') ));
            range.value = defaultVal;

            rangeInput.setAttribute('min',  parseFloat( option.getAttribute('min')  ));
            rangeInput.setAttribute('max',  parseFloat( option.getAttribute('max')  ));
            rangeInput.setAttribute('step', parseFloat( option.getAttribute('step') ));
            rangeInput.value = defaultVal;
            self.updateValue(val, range, unit);
        });
    }


    // get number of decimal places
    decimalPlaces( value ) {
        if (Math.floor(value) == value) {
            return 0;
        }

        // There's an error here when unitless and no default?
        return value.toString().split('.')[1].length || 0;
    }


    // reset the values to default
    reset(range, rangeInput, unit) {
        const rangeDefault = range.dataset.reset_value;

        range.value = rangeDefault;
        rangeInput.value = rangeDefault;
        unit.value = unit.dataset.reset_value;

        this.change(unit);
        this.change(range);
        this.change(rangeInput);
    }


    // update the hidden control that stores the value
    updateValue( val, range, unit ) {
        unit = ( 'unitless' === unit.value ) ? '' : unit.value;
        val.value = range.value + unit;
        this.change(val);
    }


    // handle range adjustments
    adjustRangeValue( rangeInput, timeout ) {
        const self = this;
        const range   = rangeInput.parentElement.querySelector('.taproot-range');
        const reset   = parseFloat( range.dataset.reset_value );
        const step    = parseFloat( rangeInput.getAttribute('step') );
        const min     = parseFloat( rangeInput.getAttribute('min') );
        const max     = parseFloat( rangeInput.getAttribute('max') );
        var   val     = parseFloat( rangeInput.value );

        clearTimeout( self.rangeTimeout );

        self.rangeTimeout = setTimeout( function() {
            if ( isNaN( val ) ) {
                rangeInput.value = reset;
                range.value = reset;
                self.change(range);
                return;
            }

            if ( 1 <=  step && 0 !== val % 1 ) {
                val = Math.round( val );
                rangeInput.value = val;
                range.value = val;
                self.change(range);
            }

            if ( val > max ) {
                rangeInput.value = max;
                range.value = max ;
                self.change(range);
            }

            if ( val < min ) {
                rangeInput.value = min;
                range.value = min;
                self.change(range);
            }
        }, timeout );

        range.value = val;
        self.change(range);
    }

    // trigger change on an input
    change(el) {
        var change = new Event('change');
        el.dispatchEvent(change);
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
