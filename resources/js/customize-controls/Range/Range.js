/**
 * Range with Unit Selector
 *
 * This file handles the JavaScript for the custom range control
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

class Range {
    constructor(control) {
        if (!control) {
            return false;
        }

        document
            .querySelector(control.selector)
            .querySelectorAll('.customize-control-taproot-range__wrapper')
            .forEach((control) => {
                this.handlers(control);
            });
    }

    // event handlers for our control
    handlers(control) {
        const range = control.querySelector('.taproot-range');
        const rangeInput = control.querySelector('.taproot-range-input');
        const unit = control.querySelector('.taproot-unit');
        const reset = control.querySelector('.taproot-reset-slider');
        const val = control.querySelector('.taproot-range-value');
        const enable = control.querySelector('.taproot-range-enable');

        range.addEventListener('mousedown', () => {
            const stepPlaces = this.decimalPlaces(range.getAttribute('step'));

            range.addEventListener('input', () => {
                rangeInput.value = parseFloat(range.value).toFixed(stepPlaces);
                this.updateValue(val, range, unit);
            });
        });

        rangeInput.addEventListener('change', () => {
            this.adjustRangeValue(rangeInput, 1000);
            this.updateValue(val, range, unit);

            rangeInput.addEventListener('focusout', () => {
                this.adjustRangeValue(rangeInput, 0);
                this.updateValue(val, range, unit);
            });
        });

        reset.addEventListener('click', () => {
            this.reset(range, rangeInput, unit);
            this.updateValue(val, range, unit);
        });

        enable.addEventListener('change', () => {
            this.reset(range, rangeInput, unit);
            this.updateValue(val, range, unit);
        });

        unit.addEventListener('change', () => {
            const option = unit.querySelector(
                'option[value="' + unit.value + '"]'
            );

            const defaultVal = parseFloat(option.getAttribute('default'));

            range.setAttribute('min', parseFloat(option.getAttribute('min')));
            range.setAttribute('max', parseFloat(option.getAttribute('max')));
            range.setAttribute('step', parseFloat(option.getAttribute('step')));
            range.value = defaultVal;

            rangeInput.setAttribute(
                'min',
                parseFloat(option.getAttribute('min'))
            );
            rangeInput.setAttribute(
                'max',
                parseFloat(option.getAttribute('max'))
            );
            rangeInput.setAttribute(
                'step',
                parseFloat(option.getAttribute('step'))
            );
            rangeInput.value = defaultVal;
            this.updateValue(val, range, unit);
        });
    }

    // get number of decimal places
    decimalPlaces(value) {
        if (Math.floor(value) == value) {
            return 0;
        }

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
    updateValue(val, range, unit) {
        unit = 'unitless' === unit.value ? '' : unit.value;
        val.value = range.value + unit;
        this.change(val);
    }

    // handle range adjustments
    adjustRangeValue(rangeInput, timeout) {
        const range = rangeInput.parentElement.querySelector('.taproot-range');
        const reset = parseFloat(range.dataset.reset_value);
        const step = parseFloat(rangeInput.getAttribute('step'));
        const min = parseFloat(rangeInput.getAttribute('min'));
        const max = parseFloat(rangeInput.getAttribute('max'));
        var val = parseFloat(rangeInput.value);

        clearTimeout(this.rangeTimeout);

        this.rangeTimeout = setTimeout(function() {
            if (isNaN(val)) {
                rangeInput.value = reset;
                range.value = reset;
                this.change(range);
                return;
            }

            if (1 <= step && 0 !== val % 1) {
                val = Math.round(val);
                rangeInput.value = val;
                range.value = val;
                this.change(range);
            }

            if (val > max) {
                rangeInput.value = max;
                range.value = max;
                this.change(range);
            }

            if (val < min) {
                rangeInput.value = min;
                range.value = min;
                this.change(range);
            }
        }, timeout);

        range.value = val;
        this.change(range);
    }

    // trigger change on an input
    change(el) {
        var change = new Event('change');
        el.dispatchEvent(change);
    }
}

export default Range;
