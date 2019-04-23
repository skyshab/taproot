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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/editor/buttons.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addMyCustomBlockControls", function() { return addMyCustomBlockControls; });
/* harmony export (immutable) */ __webpack_exports__["addAttribute"] = addAttribute;
/* harmony export (immutable) */ __webpack_exports__["addSaveProps"] = addSaveProps;
/**
 * Extend the default Button Block
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

var _lodash = lodash,
    assign = _lodash.assign;
var __ = wp.i18n.__;
var Fragment = wp.element.Fragment;
var addFilter = wp.hooks.addFilter;
var _wp$components = wp.components,
    TextControl = _wp$components.TextControl,
    PanelBody = _wp$components.PanelBody;
var createHigherOrderComponent = wp.compose.createHigherOrderComponent;
var InspectorControls = wp.editor.InspectorControls;

/**
 * Override the default edit UI to include a new block inspector control for
 * adding our custom control.
 *
 * @param {function|Component} BlockEdit Original component.
 *
 * @return {string} Wrapped component.
 */

var addMyCustomBlockControls = createHigherOrderComponent(function (BlockEdit) {

  return function (props) {

    // If this block supports scheduling and is currently selected, add our UI
    if (isValidBlockType(props.name) && props.isSelected) {
      return React.createElement(Fragment, null, React.createElement(BlockEdit, props), React.createElement(InspectorControls, null, React.createElement(PanelBody, { title: __('My Custom Panel Heading') }, React.createElement(TextControl, {
        label: __('My Custom Control'),
        help: __('Some help text for my custom control.'),
        value: props.attributes.scheduledStart || '',
        onChange: function onChange(nextValue) {
          props.setAttributes({
            scheduledStart: nextValue
          });
        } }))));
    }

    return React.createElement(BlockEdit, props);
  };
}, 'addMyCustomBlockControls');

addFilter('editor.BlockEdit', 'my-plugin/my-control', addMyCustomBlockControls);

/**
 * Is the passed block name one which supports our custom field?
 *
 * @param {string} name The name of the block.
 */
function isValidBlockType(name) {

  var validBlockTypes = ['core/button'];

  return validBlockTypes.includes(name);
} // end isValidBlockType()


/**
 * Filters registered block settings, extending attributes with our custom data.
 *
 * @param {Object} settings Original block settings.
 *
 * @return {Object} Filtered block settings.
 */
function addAttribute(settings) {

  // If this is a valid block
  if (isValidBlockType(settings.name)) {

    // Use Lodash's assign to gracefully handle if attributes are undefined
    settings.attributes = assign(settings.attributes, {
      scheduledStart: {
        type: 'string'
      }
    });
  }

  return settings;
} // end addAttribute()

/**
 * Override props assigned to save component to inject our custom data.
 * This is only done if the component is a valid block type.
 *
 * @param {Object} extraProps Additional props applied to save element.
 * @param {Object} blockType  Block type.
 * @param {Object} attributes Current block attributes.
 *
 * @return {Object} Filtered props applied to save element.
 */
function addSaveProps(extraProps, blockType, attributes) {

  // If the current block is valid, add our prop.
  if (isValidBlockType(blockType.name)) {
    extraProps.scheduledStart = attributes.scheduledStart;
  }

  return extraProps;
} // end addSaveProps()

addFilter('blocks.registerBlockType', 'my-plugin/add-attr', addAttribute);
addFilter('blocks.getSaveContent.extraProps', 'my-plugin/add-props', addSaveProps);

/***/ }),

/***/ 3:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/js/editor/buttons.js");


/***/ })

/******/ });
//# sourceMappingURL=buttons.js.map