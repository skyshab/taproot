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
/* harmony import */ var _customize_controls_Color_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./customize-controls/Color/index.js */ "./resources/js/customize-controls/Color/index.js");
/* harmony import */ var _customize_controls_DevicePicker_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./customize-controls/DevicePicker/index.js */ "./resources/js/customize-controls/DevicePicker/index.js");
/* harmony import */ var _customize_controls_DevicePicker_index_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_customize_controls_DevicePicker_index_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _customize_controls_FontStyles_index_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./customize-controls/FontStyles/index.js */ "./resources/js/customize-controls/FontStyles/index.js");
/* harmony import */ var _customize_controls_Multicheck_index_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./customize-controls/Multicheck/index.js */ "./resources/js/customize-controls/Multicheck/index.js");
/* harmony import */ var _customize_controls_Multicheck_index_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_customize_controls_Multicheck_index_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _customize_controls_Range_index_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./customize-controls/Range/index.js */ "./resources/js/customize-controls/Range/index.js");
/**
 * Customize controls script.
 *
 * This file handles the JavaScript for the controls panel in the customizer.
 * Any includes or imports should be handled in this file. The final result gets
 * saved back into `dist/js/customize-controls.js`.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */






/***/ }),

/***/ "./resources/js/customize-controls/Color/AlphaColor.js":
/*!*************************************************************!*\
  !*** ./resources/js/customize-controls/Color/AlphaColor.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
var AlphaColor = /*#__PURE__*/function () {
  function AlphaColor() {
    var control = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

    _classCallCheck(this, AlphaColor);

    // Bail if no control
    if (!control) {
      return false;
    } // Set up our attributes


    this.control = jQuery(control.selector).find('.alpha-color-control');
    this.container = this.control.parents('.wp-picker-container:first');
    this.defaultColor = this.control.attr('data-default-color'); // Initiate colorpicker

    this.control.wpColorPicker(this.getOptions()); // Maybe insert alpha control

    this.insertAlpha(); // Set up event handlers

    this.handlers();
  }
  /**
   * Setup color picker control
   */


  _createClass(AlphaColor, [{
    key: "getOptions",
    value: function getOptions() {
      var self = this;
      var container = self.control.parents('.wp-picker-container:first');
      return {
        change: function change(e, ui) {
          var key = self.control.attr('data-customize-setting-link');
          var value = self.control.wpColorPicker('color'); // Update slider handle when the default button is clicked

          if (value == self.defaultColor) {
            container.find('.alpha-slider .ui-slider-handle').text(self.getAlpha(value));
          } // Send ajax request to wp.customize to trigger the Save action


          wp.customize(key, function (obj) {
            obj.set(value);
          }); // Set the background color of the opacity slider with 100% opacity

          container.find('.transparency').css('background-color', ui.color.toString('no-alpha'));
        },
        palettes: function palettes() {
          var paletteInput = self.control.attr('data-palette');

          if (-1 !== paletteInput.indexOf('|')) {
            return paletteInput.split('|');
          } else if ('false' == paletteInput) {
            return false;
          } else {
            return true;
          }
        }
      };
    }
    /**
     * Insert alpha slider control
     */

  }, {
    key: "insertAlpha",
    value: function insertAlpha() {
      if (this.control.attr('data-hide-alpha') && 'false' !== this.control.attr('data-hide-alpha')) {
        return false;
      }

      var startingColor = this.control.val().replace(/\s+/g, '');
      var colorObject = new Color(startingColor);
      var container = this.control.parents('.wp-picker-container:first');
      var alphaVal = this.getAlpha(startingColor) / 100;
      var alphaSlider = jQuery('<div class="alpha-color-picker-wrapper">' + '<div class="alpha-slider"></div>' + '<div class="transparency"></div>' + '</div>');
      alphaSlider.appendTo(container.find('.iris-picker-inner')); // Create alpha slider using jquery ui

      container.find('.alpha-slider').slider({
        orientation: 'vertical',
        create: function create() {
          var value = jQuery(this).slider('value');
          jQuery(this).find('.ui-slider-handle').text(Math.round(value * 100));
          jQuery(this).siblings('.transparency ').css('background-color', colorObject.toString('no-alpha'));
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

      var $container = this.control.parents('.wp-picker-container:first');
      var $alphaSlider = $container.find('.alpha-slider'); // Bind event handler for clicking on a palette color

      $container.find('.iris-palette').on('click', function (e) {
        var color = jQuery(e.target).css('background-color');

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

        _this.updateAlphaSlider(100, $alphaSlider); // Trigger a preview refresh. This is added because the previous color
        // value is loaded in the customize preview via PHP and clearing doesn't
        // have the desired effect. This is not the best way to handle things,
        // but it works for now.


        wp.customize.previewer.refresh();
      }); // Bind event handler for clicking on the 'Default' button

      $container.find('.button.wp-picker-default').on('click', function () {
        var alpha = _this.getAlpha(_this.defaultColor);

        _this.updateAlphaSlider(alpha, $alphaSlider);
      }); // Bind event handler for typing or pasting into the input

      this.control.on('input', function (e) {
        var value = jQuery(e.target).val();

        var alpha = _this.getAlpha(value);

        _this.updateAlphaSlider(alpha, $alphaSlider);
      }); // Update all the things when the slider is interacted with

      $alphaSlider.slider().on('slide', function (event, ui) {
        var alpha = parseFloat(ui.value);

        var iris = _this.control.data('a8cIris');

        var colorPicker = _this.control.data('wpWpColorPicker'); // Set the alpha value on the Iris object


        iris._color._alpha = alpha; // Store the new color value

        var color = iris._color.toString(); // Set the value of the input


        _this.control.val(color); // Update the background color of the color picker


        colorPicker.toggler.css({
          'background-color': color
        }); // Update the color picker object

        _this.control.wpColorPicker('color', color);

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

/* harmony default export */ __webpack_exports__["default"] = (AlphaColor);

/***/ }),

/***/ "./resources/js/customize-controls/Color/ColorToString.js":
/*!****************************************************************!*\
  !*** ./resources/js/customize-controls/Color/ColorToString.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Extend Color object
 *
 * This file handles the JavaScript to extend the Color object to support RGBA
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
Color.prototype.toString = function (flag) {
  // If no-alpha flag is passed in, output with full opacity
  if ('no-alpha' === flag) {
    return this.toCSS('rgba', '1').replace(/\s+/g, '');
  } // If opacity value is set, output RGBa


  if (1 > this._alpha) {
    return this.toCSS('rgba', this._alpha).replace(/\s+/g, '');
  } // Bail if there's an error


  if (this.error) {
    return '';
  } // Proceed with stock color.js hex output


  var hex = parseInt(this._color, 10).toString(16);

  if (6 > hex.length) {
    for (var i = 6 - hex.length - 1; i >= 0; i--) {
      hex = '0' + hex;
    }
  } // Return hex value


  return '#' + hex;
};

/***/ }),

/***/ "./resources/js/customize-controls/Color/index.js":
/*!********************************************************!*\
  !*** ./resources/js/customize-controls/Color/index.js ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ColorToString_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ColorToString.js */ "./resources/js/customize-controls/Color/ColorToString.js");
/* harmony import */ var _ColorToString_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_ColorToString_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _AlphaColor_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AlphaColor.js */ "./resources/js/customize-controls/Color/AlphaColor.js");
/**
 * Customize control - Color
 *
 * This file handles the JavaScript for the color control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


wp.customize.controlConstructor['alpha-color'] = wp.customize.Control.extend({
  ready: function ready() {
    var alphaControl = new _AlphaColor_js__WEBPACK_IMPORTED_MODULE_1__["default"](this);
  }
});

/***/ }),

/***/ "./resources/js/customize-controls/DevicePicker/index.js":
/*!***************************************************************!*\
  !*** ./resources/js/customize-controls/DevicePicker/index.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customizer Responsive Controls
 *
 * This file handles the JavaScript for the responsive controls in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
(function (api) {
  api.bind('ready', function () {
    api.previewer.bind('ready', function () {
      var pickers = document.querySelectorAll('.device-picker');
      var devices = document.querySelectorAll('.device-picker__device');
      devices.forEach(function (device) {
        device.addEventListener('click', function (e) {
          var device = e.target.dataset.device;
          e.target.parentElement.setAttribute('data-current-device', device);
          api.previewedDevice.set(device);
          pickers.forEach(function (picker) {
            picker.dataset.currentDevice = device;
          });
        });
      });
      api.previewedDevice.bind(function () {
        var device = api.previewedDevice.get();
        pickers.forEach(function (picker) {
          picker.dataset.currentDevice = device;
        });
      });
    });
  });
})(wp.customize);

/***/ }),

/***/ "./resources/js/customize-controls/FontStyles/FontStyles.js":
/*!******************************************************************!*\
  !*** ./resources/js/customize-controls/FontStyles/FontStyles.js ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
var FontStyles = /*#__PURE__*/function () {
  function FontStyles(control) {
    _classCallCheck(this, FontStyles);

    if (!control) {
      return false;
    }

    var $control = document.querySelector(control.selector);
    this.fontStyles = $control.querySelectorAll('.taproot-font-styles--item');
    this.checkboxes = $control.querySelectorAll('.taproot-font-style-checkbox');
    this.input = $control.querySelector('.taproot-font-styles-input');
    this.reset = $control.querySelector('.taproot-control-reset');
    this.handlers();
  } // add handlers


  _createClass(FontStyles, [{
    key: "handlers",
    value: function handlers() {
      var _this = this;

      this.fontStyles.forEach(function (fontStyle) {
        fontStyle.addEventListener('click', function () {
          var checkbox = fontStyle.querySelector('input');
          fontStyle.classList.toggle('taproot-font-style-checked');

          if (checkbox.checked) {
            checkbox.checked = false;
          } else {
            checkbox.checked = true;
            var other = false; // If this is the "uppercase" option

            if ('uppercase' === checkbox.value) {
              other = fontStyle.parentNode.querySelector('.taproot-font-styles--capitalize');
            } // Or if the "capitalize" option
            else if ('capitalize' == checkbox.value) {
                other = fontStyle.parentNode.querySelector('.taproot-font-styles--uppercase');
              } // if we need to toggle another option


            if (other) {
              other.classList.remove('taproot-font-style-checked');
              input = other.querySelector('input');
              input.checked = false;
              input.dispatchEvent(new Event('change'));
            }
          }

          checkbox.dispatchEvent(new Event('change'));
        });
      }); // Checkbox handlers

      this.checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
          var value = checkbox.value;
          var currentValue = _this.input.value;
          var values = 'false' != currentValue ? currentValue.split('|') : [];
          var result = '';

          if (checkbox.checked) {
            // Is there already a saved value?
            if (currentValue.length) {
              // If this is not already in the array
              if (!values.includes(value)) {
                // Add to array
                values.push(value); // Define list

                result = values.join('|');
              }
            } // No other values
            else {
                result = value;
              }
          } else {
            // Is there already a saved value?
            if (currentValue.length) {
              // If this is already in the array
              if (values.includes(value)) {
                // Remove option from array
                values = values.filter(function (item) {
                  return item !== value;
                }); // Define the list

                result = values.join('|');
              } // No other values
              else {
                  result = currentValue;
                }
            }
          } // Set input value


          _this.input.value = result; // Trigger a change on the input

          _this.input.dispatchEvent(new Event('change'));
        });
      }); // Reset handler

      this.reset.addEventListener('click', function (e) {
        // Unset the value and trigger change
        _this.input.value = '';

        _this.input.dispatchEvent(new Event('change')); // Uncheck all of the checkboxes


        _this.checkboxes.forEach(function (checkbox) {
          checkbox.checked = false;
        }); // Remove 'checked' classes


        _this.fontStyles.forEach(function (fontStyle) {
          fontStyle.classList.remove('taproot-font-style-checked');
        });
      });
    }
  }]);

  return FontStyles;
}();

/* harmony default export */ __webpack_exports__["default"] = (FontStyles);

/***/ }),

/***/ "./resources/js/customize-controls/FontStyles/index.js":
/*!*************************************************************!*\
  !*** ./resources/js/customize-controls/FontStyles/index.js ***!
  \*************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FontStyles_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FontStyles.js */ "./resources/js/customize-controls/FontStyles/FontStyles.js");
/**
 * Customize control - Color
 *
 * This file handles the JavaScript for the color control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

wp.customize.controlConstructor['taproot-font-styles'] = wp.customize.Control.extend({
  ready: function ready() {
    var fontStyles = new _FontStyles_js__WEBPACK_IMPORTED_MODULE_0__["default"](this);
  }
});

/***/ }),

/***/ "./resources/js/customize-controls/Multicheck/index.js":
/*!*************************************************************!*\
  !*** ./resources/js/customize-controls/Multicheck/index.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Customize control - Multicheck
 *
 * This file handles the JavaScript for the multicheck control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
(function (api) {
  api.bind('ready', function () {
    var multichecks = document.querySelectorAll('.customize-control-checkbox-multiple input[type="checkbox"]');
    multichecks.forEach(function (cb) {
      cb.addEventListener('change', function (e) {
        var control = e.target.closest('.customize-control');
        var input = control.querySelector('input[type="hidden"]');
        var checked = control.querySelectorAll('input[type="checkbox"]:checked');
        var list = [];
        checked.forEach(function (check) {
          list.push(check.value);
        });
        input.value = list.join();
        input.dispatchEvent(new Event('change'));
      });
    });
  });
})(wp.customize);

/***/ }),

/***/ "./resources/js/customize-controls/Range/Range.js":
/*!********************************************************!*\
  !*** ./resources/js/customize-controls/Range/Range.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */
var Range = /*#__PURE__*/function () {
  function Range(control) {
    var _this = this;

    _classCallCheck(this, Range);

    if (!control) {
      return false;
    }

    document.querySelector(control.selector).querySelectorAll('.customize-control-taproot-range__wrapper').forEach(function (control) {
      _this.handlers(control);
    });
  } // event handlers for our control


  _createClass(Range, [{
    key: "handlers",
    value: function handlers(control) {
      var _this2 = this;

      var range = control.querySelector('.taproot-range');
      var rangeInput = control.querySelector('.taproot-range-input');
      var unit = control.querySelector('.taproot-unit');
      var reset = control.querySelector('.taproot-reset-slider');
      var val = control.querySelector('.taproot-range-value');
      var enable = control.querySelector('.taproot-range-enable');
      range.addEventListener('mousedown', function () {
        var stepPlaces = _this2.decimalPlaces(range.getAttribute('step'));

        range.addEventListener('input', function () {
          rangeInput.value = parseFloat(range.value).toFixed(stepPlaces);

          _this2.updateValue(val, range, unit);
        });
      });
      rangeInput.addEventListener('change', function () {
        _this2.adjustRangeValue(rangeInput, 1000);

        _this2.updateValue(val, range, unit);

        rangeInput.addEventListener('focusout', function () {
          _this2.adjustRangeValue(rangeInput, 0);

          _this2.updateValue(val, range, unit);
        });
      });
      reset.addEventListener('click', function () {
        _this2.reset(range, rangeInput, unit);

        _this2.updateValue(val, range, unit);
      });
      enable.addEventListener('change', function () {
        _this2.reset(range, rangeInput, unit);

        _this2.updateValue(val, range, unit);
      });
      unit.addEventListener('change', function () {
        var option = unit.querySelector('option[value="' + unit.value + '"]');
        var defaultVal = parseFloat(option.getAttribute('default'));
        range.setAttribute('min', parseFloat(option.getAttribute('min')));
        range.setAttribute('max', parseFloat(option.getAttribute('max')));
        range.setAttribute('step', parseFloat(option.getAttribute('step')));
        range.value = defaultVal;
        rangeInput.setAttribute('min', parseFloat(option.getAttribute('min')));
        rangeInput.setAttribute('max', parseFloat(option.getAttribute('max')));
        rangeInput.setAttribute('step', parseFloat(option.getAttribute('step')));
        rangeInput.value = defaultVal;

        _this2.updateValue(val, range, unit);
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
    value: function reset(range, rangeInput, unit) {
      var rangeDefault = range.dataset.reset_value;
      range.value = rangeDefault;
      rangeInput.value = rangeDefault;
      unit.value = unit.dataset.reset_value;
      this.change(unit);
      this.change(range);
      this.change(rangeInput);
    } // update the hidden control that stores the value

  }, {
    key: "updateValue",
    value: function updateValue(val, range, unit) {
      unit = 'unitless' === unit.value ? '' : unit.value;
      val.value = range.value + unit;
      this.change(val);
    } // handle range adjustments

  }, {
    key: "adjustRangeValue",
    value: function adjustRangeValue(rangeInput, timeout) {
      var range = rangeInput.parentElement.querySelector('.taproot-range');
      var reset = parseFloat(range.dataset.reset_value);
      var step = parseFloat(rangeInput.getAttribute('step'));
      var min = parseFloat(rangeInput.getAttribute('min'));
      var max = parseFloat(rangeInput.getAttribute('max'));
      var val = parseFloat(rangeInput.value);
      clearTimeout(this.rangeTimeout);
      this.rangeTimeout = setTimeout(function () {
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
    } // trigger change on an input

  }, {
    key: "change",
    value: function change(el) {
      var change = new Event('change');
      el.dispatchEvent(change);
    }
  }]);

  return Range;
}();

/* harmony default export */ __webpack_exports__["default"] = (Range);

/***/ }),

/***/ "./resources/js/customize-controls/Range/index.js":
/*!********************************************************!*\
  !*** ./resources/js/customize-controls/Range/index.js ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Range_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Range.js */ "./resources/js/customize-controls/Range/Range.js");
/**
 * Customize control - Color
 *
 * This file handles the JavaScript for the color control in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2021 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

wp.customize.controlConstructor['taproot-range'] = wp.customize.Control.extend({
  ready: function ready() {
    var range = new _Range_js__WEBPACK_IMPORTED_MODULE_0__["default"](this);
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