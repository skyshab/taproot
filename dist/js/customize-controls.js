/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/customize-controls.js":
/*!********************************************!*\
  !*** ./resources/js/customize-controls.js ***!
  \********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _customize_controls_Color_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./customize-controls/Color.js */ "./resources/js/customize-controls/Color.js");
/* harmony import */ var _customize_controls_Color_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_customize_controls_Color_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _customize_controls_Range_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./customize-controls/Range.js */ "./resources/js/customize-controls/Range.js");
/* harmony import */ var _customize_controls_Range_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_customize_controls_Range_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _customize_controls_FontStyles_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./customize-controls/FontStyles.js */ "./resources/js/customize-controls/FontStyles.js");
/* harmony import */ var _customize_controls_FontStyles_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_customize_controls_FontStyles_js__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Customize controls script.
 *
 * This file handles the JavaScript for the controls panel in the customizer.
 * Any includes or imports should be handled in this file. The final result gets
 * saved back into `dist/js/customize-controls.js`.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */




/***/ }),

/***/ "./resources/js/customize-controls/Color.js":
/*!**************************************************!*\
  !*** ./resources/js/customize-controls/Color.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Alpha Color Picker
 *
 * This file handles the JavaScript for the custom color picker control
 * that adds an opacity slider and allows for RGBA color values
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

/**
 * Add support to the stock color.js toString() for RGBa
 */
Color.prototype.toString = function (flag) {
  var hex = parseInt(this._color, 10).toString(16); // If our no-alpha flag has been passed in, output RGBa value with 100% opacity

  if ('no-alpha' == flag) {
    return this.toCSS('rgba', '1').replace(/\s+/g, '');
  } // If we have a proper opacity value, output RGBa


  if (1 > this._alpha) {
    return this.toCSS('rgba', this._alpha).replace(/\s+/g, '');
  } // Proceed with stock color.js hex output


  if (this.error) {
    return '';
  }

  if (6 > hex.length) {
    for (var i = 6 - hex.length - 1; i >= 0; i--) {
      hex = '0' + hex;
    }
  }

  return '#' + hex;
};
/**
 * Alpha Color Picker Class
 */


var AlphaColor =
/*#__PURE__*/
function () {
  function AlphaColor(control) {
    _classCallCheck(this, AlphaColor);

    if (!control) {
      return false;
    } // Set up our attributes


    this.control = jQuery(control.selector).find('.alpha-color-control');
    this.startingColor = this.control.val().replace(/\s+/g, '');
    this.defaultColor = this.control.attr('data-default-color');
    this.paletteInput = this.control.attr('data-palette');
    this.palette = this.paletteSettings();
    this.hideAlpha = this.control.attr('data-hide-alpha') && 'false' !== this.control.attr('data-hide-alpha') ? true : false; // Initialize control

    this.setupControl(); // Initialize alpha slider

    this.addAlpha(); // Set up event handlers

    this.handlers();
  }
  /**
   * Get palette settings
   */


  _createClass(AlphaColor, [{
    key: "paletteSettings",
    value: function paletteSettings() {
      if (-1 !== this.paletteInput.indexOf('|')) {
        return this.paletteInput.split('|');
      } else if ('false' == this.paletteInput) {
        return false;
      } else {
        return true;
      }
    }
    /**
     * Get control container
     */

  }, {
    key: "getContainer",
    value: function getContainer() {
      return this.control.parents('.wp-picker-container:first');
    }
    /**
     * Setup color picker control
     */

  }, {
    key: "setupControl",
    value: function setupControl() {
      var self = this;
      var colorPickerOptions = {
        change: function change(e, ui) {
          var key, value, alpha;
          key = self.control.attr('data-customize-setting-link');
          value = self.control.wpColorPicker('color'); // Update slider handle when the default button is clicked

          if (value == self.defaultColor) {
            alpha = self.getAlpha(value);
            var $container = self.getContainer();
            var $alphaSlider = $container.find('.alpha-slider');
            $alphaSlider.find('.ui-slider-handle').text(alpha);
          } // Send ajax request to wp.customize to trigger the Save action


          wp.customize(key, function (obj) {
            obj.set(value);
          }); // Set the background color of the opacity slider with 100% opacity

          self.getContainer().find('.transparency').css('background-color', ui.color.toString('no-alpha'));
        },
        palettes: self.palette
      }; // Create the colorpicker

      this.control.wpColorPicker(colorPickerOptions);
    }
    /**
     * Setup alpha slider control
     */

  }, {
    key: "addAlpha",
    value: function addAlpha() {
      if (this.hideAlpha) {
        return false;
      }

      var startingColor = this.startingColor;
      var colorObject = new Color(startingColor);
      var container = this.getContainer();
      var alphaVal = this.getAlpha(startingColor) / 100; // Insert our opacity slider

      $('<div class="alpha-color-picker-wrapper">' + '<div class="alpha-slider"></div>' + '<div class="transparency"></div>' + '</div>').appendTo(container.find('.iris-picker-inner')); // Create alpha slider using jquery ui

      container.find('.alpha-slider').slider({
        orientation: 'vertical',
        create: function create() {
          var value = $(this).slider('value');
          $(this).find('.ui-slider-handle').text(Math.round(value * 100));
          $(this).siblings('.transparency ').css('background-color', colorObject.toString('no-alpha'));
        },
        value: alphaVal,
        range: 'max',
        step: 0.01,
        min: 0,
        max: 1,
        animate: 300
      });
    }
    /**
     * Setup color picker event handlers
     */

  }, {
    key: "handlers",
    value: function handlers() {
      var _this = this;

      var $container = this.getContainer();
      var $alphaSlider = $container.find('.alpha-slider'); // Bind event handler for clicking on a palette color

      $container.find('.iris-palette').on('click', function (e) {
        var color = $(e.target).css('background-color');

        var alpha = _this.getAlpha(color);

        _this.updateAlphaSlider(alpha, $alphaSlider); // Round the opacity value on RGBa colors and save to the color picker object


        if (100 !== alpha) {
          color = color.replace(/[^,]+(?=\))/, (alpha / 100).toFixed(2));
        }

        _this.control.wpColorPicker('color', color);
      }); // Bind event handler for clicking the 'clear' button

      $container.find('.button.wp-picker-clear').on('click', function () {
        var key = _this.control.attr('data-customize-setting-link'); // Set the color picker to white


        _this.control.wpColorPicker('color', '#ffffff'); // Set the actual option value to empty string


        wp.customize(key, function (obj) {
          obj.set('');
        });

        _this.updateAlphaSlider(100, $alphaSlider);
      }); // Bind event handler for clicking on the 'Default' button

      $container.find('.button.wp-picker-default').on('click', function () {
        var alpha = _this.getAlpha(_this.defaultColor);

        _this.updateAlphaSlider(alpha, $alphaSlider);
      }); // Bind event handler for typing or pasting into the input

      this.control.on('input', function (e) {
        var value = $(e.target).val();

        var alpha = _this.getAlpha(value);

        _this.updateAlphaSlider(alpha, $alphaSlider);
      }); // Update all the things when the slider is interacted with

      $alphaSlider.slider().on('slide', function (event, ui) {
        var alpha = parseFloat(ui.value);
        var $alphaSlider = $container.find('.alpha-slider');

        _this.updateControl(alpha, _this.control, $alphaSlider, false);

        $alphaSlider.find('.ui-slider-handle').text(Math.round(ui.value * 100));
      });
    }
    /**
     * Get alpha value from RGBa, RGB, or hex colors
     */

  }, {
    key: "getAlpha",
    value: function getAlpha(value) {
      var alphaVal; // Remove all spaces from the passed in value to help our RGBa regex

      value = value.replace(/ /g, '');

      if (value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)) {
        alphaVal = parseFloat(value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1]).toFixed(2) * 100;
        alphaVal = parseInt(alphaVal);
      } else {
        alphaVal = 100;
      }

      return alphaVal;
    }
    /**
     * Update the color picker object and maybe the alpha slider
     */

  }, {
    key: "updateControl",
    value: function updateControl(alpha, $control, $alphaSlider, updateSlider) {
      var iris = $control.data('a8cIris');
      var colorPicker = $control.data('wpWpColorPicker'); // Set the alpha value on the Iris object

      iris._color._alpha = alpha; // Store the new color value

      var color = iris._color.toString(); // Set the value of the input


      $control.val(color); // Update the background color of the color picker

      colorPicker.toggler.css({
        'background-color': color
      }); // Maybe update the alpha slider

      if (updateSlider) {
        this.updateAlphaSlider(alpha, $alphaSlider);
      } // Update the color picker object


      $control.wpColorPicker('color', color);
    }
    /**
     * Update the slider handle position and label
     */

  }, {
    key: "updateAlphaSlider",
    value: function updateAlphaSlider(alpha, $alphaSlider) {
      $alphaSlider.slider('value', alpha);
      $alphaSlider.find('.ui-slider-handle').text(alpha.toString());
    }
  }]);

  return AlphaColor;
}();
/**
 * Initiate Alpha Color
 */


wp.customize.controlConstructor['alpha-color'] = wp.customize.Control.extend({
  ready: function ready() {
    var alphaControl = new AlphaColor(this);
  }
});

/***/ }),

/***/ "./resources/js/customize-controls/FontStyles.js":
/*!*******************************************************!*\
  !*** ./resources/js/customize-controls/FontStyles.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

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
var TaprootFontStyles =
/*#__PURE__*/
function () {
  // initiate control
  function TaprootFontStyles(control) {
    _classCallCheck(this, TaprootFontStyles);

    if (!control) {
      return false;
    } // Set up our attributes


    $control = jQuery(control.selector);
    this.$fontStyles = $control.find('.taproot-font-styles--item');
    this.$checkboxes = $control.find('.taproot-font-style-checkbox');
    this.$input = $control.find('.taproot-font-styles-input');
    this.$reset = $control.find('.taproot-control-reset'); // Set up event handlers

    this.handlers();
  } // add handlers


  _createClass(TaprootFontStyles, [{
    key: "handlers",
    value: function handlers() {
      var self = this;
      self.$fontStyles.click(function () {
        var checkbox = $(this).find('input');
        $(this).toggleClass('taproot-font-style-checked');

        if (checkbox.is(':checked')) {
          checkbox.prop('checked', false);
        } else {
          checkbox.prop('checked', true);

          if ('uppercase' === checkbox.val()) {
            $(this).siblings('.taproot-font-styles--capitalize').removeClass('taproot-font-style-checked').find('input').prop('checked', false).change();
          } else if ('capitalize' == checkbox.val()) {
            $(this).siblings('.taproot-font-styles--uppercase').removeClass('taproot-font-style-checked').find('input').prop('checked', false).change();
          }
        }

        checkbox.change();
      });
      self.$checkboxes.on('change', function () {
        var currentValue = self.$input.val(),
            value = $(this).val(),
            values = 'false' != currentValue ? currentValue.split('|') : [],
            query = $.inArray(value, values),
            result = '';

        if (true == $(this).prop('checked')) {
          if (currentValue.length) {
            if (0 > query) {
              values.push(value);
              result = values.join('|');
            }
          } else {
            result = value;
          }
        } else {
          if (currentValue.length) {
            if (0 <= query) {
              values.splice(query, 1);
              result = values.join('|');
            } else {
              result = currentValue;
            }
          }
        }

        self.$input.val(result).change();
      });
      self.$reset.click(function () {
        self.$input.val('').change();
        self.$checkboxes.removeAttr('checked');
        self.$fontStyles.removeClass('taproot-font-style-checked');
      });
    }
  }]);

  return TaprootFontStyles;
}();
/**
 * Initiate Control
 */


wp.customize.controlConstructor['taproot-font-styles'] = wp.customize.Control.extend({
  ready: function ready() {
    var fontStyles = new TaprootFontStyles(this);
  }
});

/***/ }),

/***/ "./resources/js/customize-controls/Range.js":
/*!**************************************************!*\
  !*** ./resources/js/customize-controls/Range.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Range with Unit Selector
 *
 * This file handles the JavaScript for the custom range control
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
var TaprootRange =
/*#__PURE__*/
function () {
  function TaprootRange(control) {
    _classCallCheck(this, TaprootRange);

    if (!control) {
      return false;
    } // Set up our attributes


    $control = jQuery(control.selector);
    this.$range = $control.find('.taproot-range');
    this.$rangeInput = $control.find('.taproot-range-input');
    this.$unit = $control.find('.taproot-unit');
    this.$reset = $control.find('.taproot-reset-slider');
    this.$value = $control.find('.taproot-range-value');
    this.$enable = $control.find('.taproot-range-enable');
    this.$disable = $control.find('.taproot-range-disable'); // Set up event handlers

    this.handlers();
  } // event handlers for our control


  _createClass(TaprootRange, [{
    key: "handlers",
    value: function handlers() {
      var self = this;
      self.$range.on('mousedown', function () {
        var stepPlaces = self.decimalPlaces($(this).attr('step')); // using 'input' instead of 'mousemove' prevents
        // the value changing after releasing control
        // Are there other repercussions to this?

        $(this).on('input', function () {
          // check range step attribute, and adjust input
          // to display using appropriate number of decimal places
          self.$rangeInput.val(parseFloat($(this).attr('value')).toFixed(stepPlaces));
          self.updateValue();
        });
      });
      self.$rangeInput.on('change keyup', function () {
        self.adjustRangeValue($(this), 1000);
        self.updateValue();
      }).on('focusout', function () {
        self.adjustRangeValue($(this), 0);
        self.updateValue();
      });
      self.$reset.click(function () {
        self.reset();
      });
      self.$enable.on('change', function () {
        self.reset();
      });
      self.$unit.on('change', function () {
        var value = $(this).val();
        var $option = $(this).find('option[value="' + value + '"]');
        var defaultVal = parseFloat($option.attr('default'));
        self.$range.attr('min', parseFloat($option.attr('min')));
        self.$range.attr('max', parseFloat($option.attr('max')));
        self.$range.attr('step', parseFloat($option.attr('step')));
        self.$range.val(defaultVal);
        self.$rangeInput.attr('min', parseFloat($option.attr('min')));
        self.$rangeInput.attr('max', parseFloat($option.attr('max')));
        self.$rangeInput.attr('step', parseFloat($option.attr('step')));
        self.$rangeInput.val(defaultVal);
        self.updateValue();
      });
      self.$disable.on('click', function () {
        self.$enable.prop('checked', false).change();
        self.$value.val('').change();
      });
    } // get number of decimal places

  }, {
    key: "decimalPlaces",
    value: function decimalPlaces(value) {
      if (Math.floor(value) == value) {
        return 0;
      }

      return value.toString().split('.')[1].length || 0;
    } // reset the values to default

  }, {
    key: "reset",
    value: function reset() {
      var rangeDefault = this.$range.data('reset_value');
      var unitDefault = this.$unit.data('reset_value');
      this.$unit.val(unitDefault).change();
      this.$range.val(rangeDefault).change();
      this.$rangeInput.val(rangeDefault).change();
      this.updateValue();
    } // update the hidden control that stores the value

  }, {
    key: "updateValue",
    value: function updateValue() {
      var unit = 'unitless' === this.$unit.val() ? '' : this.$unit.val();
      this.$value.val(this.$range.val() + unit).change();
    } // handle range adjustments

  }, {
    key: "adjustRangeValue",
    value: function adjustRangeValue($rangeInput, timeout) {
      var $range = $rangeInput.parent().find('.taproot-range');
      var value = parseFloat($rangeInput.val());
      var reset = parseFloat($range.attr('data-reset_value'));
      var step = parseFloat($rangeInput.attr('step'));
      var min = parseFloat($rangeInput.attr('min'));
      var max = parseFloat($rangeInput.attr('max'));
      clearTimeout(this.rangeTimeout);
      this.rangeTimeout = setTimeout(function () {
        if (isNaN(value)) {
          $rangeInput.val(reset);
          $range.val(reset).change();
          return;
        }

        if (1 <= step && 0 !== value % 1) {
          value = Math.round(value);
          $rangeInput.val(value);
          $range.val(value).change();
        }

        if (value > max) {
          $rangeInput.val(max);
          $range.val(max).change();
        }

        if (value < min) {
          $rangeInput.val(min);
          $range.val(min).change();
        }
      }, timeout);
      $range.val(value).change();
    }
  }]);

  return TaprootRange;
}();
/**
 * Initiate Range
 */


wp.customize.controlConstructor['taproot-range'] = wp.customize.Control.extend({
  ready: function ready() {
    var range = new TaprootRange(this);
  }
});

/***/ }),

/***/ 1:
/*!**************************************************!*\
  !*** multi ./resources/js/customize-controls.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/sky/Repos/skyshab/taproot/resources/js/customize-controls.js */"./resources/js/customize-controls.js");


/***/ })

/******/ });
//# sourceMappingURL=customize-controls.js.map