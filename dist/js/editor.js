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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/editor.js":
/*!********************************!*\
  !*** ./resources/js/editor.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _editor_sidebar_index_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./editor/sidebar/index.js */ "./resources/js/editor/sidebar/index.js");
/* harmony import */ var _editor_blocks_buttons_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./editor/blocks/buttons/index.js */ "./resources/js/editor/blocks/buttons/index.js");
/* harmony import */ var _editor_blocks_buttons_index_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_editor_blocks_buttons_index_js__WEBPACK_IMPORTED_MODULE_1__);
/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */



/***/ }),

/***/ "./resources/js/editor/blocks/buttons/index.js":
/*!*****************************************************!*\
  !*** ./resources/js/editor/blocks/buttons/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Buttons Block Customization
 *
 * This file handles the JavaScript for modifying the core buttons block
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
wp.domReady(function () {
  // remove the "outline" style option
  wp.blocks.unregisterBlockStyle('core/button', 'outline'); // add a "rounded" style option

  wp.blocks.registerBlockStyle('core/button', {
    name: 'rounded',
    label: 'Rounded'
  });
});

/***/ }),

/***/ "./resources/js/editor/controls/colorPicker.js":
/*!*****************************************************!*\
  !*** ./resources/js/editor/controls/colorPicker.js ***!
  \*****************************************************/
/*! exports provided: ColorPickerControlEdit, ColorPickerControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ColorPickerControlEdit", function() { return ColorPickerControlEdit; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ColorPickerControl", function() { return ColorPickerControl; });
function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }

/**
 * WordPress dependencies
 */
var _wp$compose = wp.compose,
    ifCondition = _wp$compose.ifCondition,
    compose = _wp$compose.compose;
var _wp$components = wp.components,
    BaseControl = _wp$components.BaseControl,
    ColorPalette = _wp$components.ColorPalette,
    ColorIndicator = _wp$components.ColorIndicator;
var __ = wp.i18n.__; // translators: first %s: The type of color (e.g. background color), second %s: the color name or value (e.g. red or #ff0000)

var colorIndicatorAriaLabel = __('(current %s: %s)');

function ColorPickerControlEdit(_ref) {
  var colors = _ref.colors,
      disableCustomColors = _ref.disableCustomColors,
      label = _ref.label,
      onChange = _ref.onChange,
      value = _ref.value;
  var colorObject = wp.blockEditor.getColorObjectByColorValue(colors, value);
  var colorName = colorObject && colorObject.name;
  var ariaLabel = sprintf(colorIndicatorAriaLabel, label.toLowerCase(), colorName || value);
  var labelElement = React.createElement(React.Fragment, null, label, value && React.createElement(ColorIndicator, {
    colorValue: value,
    "aria-label": ariaLabel
  }));
  return React.createElement(BaseControl, {
    className: "editor-color-palette-control",
    label: labelElement
  }, React.createElement(ColorPalette, _extends({
    className: "editor-color-palette-control__color-palette",
    value: value,
    onChange: onChange
  }, {
    colors: colors,
    disableCustomColors: disableCustomColors
  })));
}
var ColorPickerControl = compose([wp.blockEditor.withColorContext, ifCondition(function (_ref2) {
  var hasColorsToChoose = _ref2.hasColorsToChoose;
  return hasColorsToChoose;
})])(ColorPickerControlEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeroImage.js":
/*!**************************************************!*\
  !*** ./resources/js/editor/sidebar/HeroImage.js ***!
  \**************************************************/
/*! exports provided: HeroImage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeroImage", function() { return HeroImage; });
/* harmony import */ var _HeroPreview__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HeroPreview */ "./resources/js/editor/sidebar/HeroPreview.js");
/**
 * Header Image Picker Component
 *
 * This file handles the JavaScript for creating an image
 * picker control in the block editor theme sidebar panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var compose = wp.compose.compose;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var SelectControl = wp.components.SelectControl;
var PostTypeSupportCheck = wp.editor.PostTypeSupportCheck;
var MediaUpload = wp.blockEditor.MediaUpload;
var __ = wp.i18n.__;
/**
 * Internal dependencies
 */



function HeroImageEdit(_ref) {
  var heroImage = _ref.heroImage,
      heroImageType = _ref.heroImageType,
      setHeroImage = _ref.setHeroImage,
      setHeroImageType = _ref.setHeroImageType;
  // create image select
  var imageSelect = React.createElement(PostTypeSupportCheck, {
    supportKeys: "thumbnail"
  }, React.createElement(SelectControl, {
    label: __('Hero Header Image'),
    value: heroImageType,
    options: [{
      label: __('None'),
      value: 'none'
    }, {
      label: __('Default'),
      value: 'default'
    }, {
      label: __('Use Featured Image'),
      value: 'featured'
    }, {
      label: __('Custom'),
      value: 'custom'
    }],
    onChange: function onChange(content) {
      setHeroImageType(content);
    }
  })); // create the button to add an image

  var addImage = function addImage(open) {
    if ('custom' === heroImageType) return React.createElement("button", {
      "class": "components-button is-button is-default",
      style: {
        marginRight: '10px'
      },
      onClick: open
    }, __('Select Image'));
  }; // clear the saved image value


  var reset = function reset() {
    setHeroImage('');
  }; // button to clear the saved image value


  var imageReset = 'custom' === heroImageType && heroImage ? React.createElement("button", {
    "class": "components-button is-button is-default",
    onClick: reset
  }, __('Clear')) : null; // return the custom header image picker component

  return React.createElement(MediaUpload, {
    type: "image",
    label: __('Custom Header Image'),
    value: heroImage,
    onSelect: function onSelect(imageObject) {
      if (imageObject.sizes) {
        setHeroImage(imageObject.sizes.full.url);
      }
    },
    render: function render(_ref2) {
      var open = _ref2.open;
      return [React.createElement(_HeroPreview__WEBPACK_IMPORTED_MODULE_0__["HeroPreview"], null), imageSelect, addImage(open), imageReset];
    }
  });
}

var HeroImage = compose([withSelect(function (select) {
  return {
    heroImage: select('core/editor').getEditedPostAttribute('meta')['taproot_custom_header_image'],
    heroImageType: select('core/editor').getEditedPostAttribute('meta')['taproot_custom_header_image_type']
  };
}), withDispatch(function (dispatch) {
  return {
    setHeroImage: function setHeroImage(value) {
      dispatch('core/editor').editPost({
        meta: {
          taproot_custom_header_image: value
        }
      });
    },
    setHeroImageType: function setHeroImageType(value) {
      dispatch('core/editor').editPost({
        meta: {
          taproot_custom_header_image_type: value
        }
      });

      if ('custom' !== value) {
        dispatch('core/editor').editPost({
          meta: {
            taproot_custom_header_image: ''
          }
        });
      }

      if ('none' === value) {
        dispatch('core/editor').editPost({
          meta: {
            taprooot_hero_overlay_type: 'default',
            taprooot_hero_overlay_color: '',
            taprooot_hero_overlay_color_name: '',
            taprooot_hero_overlay_opacity: 50,
            taprooot_hero_default_color: '',
            taprooot_hero_default_hover_color: ''
          }
        });
      }
    }
  };
})])(HeroImageEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeroOverlay.js":
/*!****************************************************!*\
  !*** ./resources/js/editor/sidebar/HeroOverlay.js ***!
  \****************************************************/
/*! exports provided: HeroOverlay */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeroOverlay", function() { return HeroOverlay; });
/* harmony import */ var _controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../controls/colorPicker */ "./resources/js/editor/controls/colorPicker.js");
/**
 * Hero Overlay
 *
 * This file handles the JavaScript for the hero overlay settings in the editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var compose = wp.compose.compose;
var _wp$components = wp.components,
    RangeControl = _wp$components.RangeControl,
    SelectControl = _wp$components.SelectControl;
var __ = wp.i18n.__;
/**
 * Internal dependencies
 */



function HeroOverlayEdit(_ref) {
  var imageType = _ref.imageType,
      colors = _ref.colors,
      overlayType = _ref.overlayType,
      overlayColor = _ref.overlayColor,
      overlayOpacity = _ref.overlayOpacity,
      updateOverlayType = _ref.updateOverlayType,
      updateOverlayColor = _ref.updateOverlayColor,
      updateOverlayOpacity = _ref.updateOverlayOpacity;
  return 'none' !== imageType && React.createElement(React.Fragment, null, React.createElement(SelectControl, {
    label: __('Hero Overlay'),
    value: overlayType,
    options: [{
      label: __('Default'),
      value: 'default'
    }, {
      label: __('Custom'),
      value: 'custom'
    }, {
      label: __('None'),
      value: 'none'
    }],
    onChange: function onChange(value) {
      return updateOverlayType(value);
    }
  }), 'custom' === overlayType && React.createElement(_controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__["ColorPickerControl"], {
    label: __('Hero Overlay Color'),
    value: overlayColor,
    onChange: function onChange(value) {
      return updateOverlayColor(value);
    },
    colors: colors
  }), 'custom' === overlayType && React.createElement(RangeControl, {
    label: __('Hero Overlay Opacity'),
    value: overlayOpacity,
    onChange: function onChange(value) {
      return updateOverlayOpacity(value);
    },
    min: 0,
    max: 100,
    step: 10,
    required: true
  }));
}

var HeroOverlay = compose([withSelect(function (select) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var settings = select('core/block-editor').getSettings();
  return {
    imageType: getEditedPostAttribute('meta')['taproot_custom_header_image_type'],
    colors: settings.colors,
    overlayType: getEditedPostAttribute('meta')['taprooot_hero_overlay_type'],
    overlayColor: getEditedPostAttribute('meta')['taprooot_hero_overlay_color'],
    overlayColorName: getEditedPostAttribute('meta')['taprooot_hero_overlay_color_name'],
    overlayOpacity: getEditedPostAttribute('meta')['taprooot_hero_overlay_opacity']
  };
}), withDispatch(function (dispatch, _ref2) {
  var colors = _ref2.colors;
  return {
    updateOverlayType: function updateOverlayType(value) {
      dispatch('core/editor').editPost({
        meta: {
          taprooot_hero_overlay_type: value
        }
      });
    },
    updateOverlayColor: function updateOverlayColor(value) {
      if (!value) {
        value = '';
      }

      dispatch('core/editor').editPost({
        meta: {
          taprooot_hero_overlay_color: value
        }
      });
      var colorObj = wp.blockEditor.getColorObjectByColorValue(colors, value);
      var colorSlug = colorObj && colorObj.slug ? colorObj.slug : '';
      dispatch('core/editor').editPost({
        meta: {
          taprooot_hero_overlay_color_name: colorSlug
        }
      });
    },
    updateOverlayOpacity: function updateOverlayOpacity(value) {
      dispatch('core/editor').editPost({
        meta: {
          taprooot_hero_overlay_opacity: value
        }
      });
    }
  };
})])(HeroOverlayEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeroPreview.js":
/*!****************************************************!*\
  !*** ./resources/js/editor/sidebar/HeroPreview.js ***!
  \****************************************************/
/*! exports provided: HeroPreview */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeroPreview", function() { return HeroPreview; });
/**
 * Hero Preview
 *
 * This file handles the JavaScript for the hero image preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var withSelect = wp.data.withSelect;
var compose = wp.compose.compose;
var __ = wp.i18n.__;

function HeroPreviewEdit(_ref) {
  var imageSource = _ref.imageSource,
      overlayType = _ref.overlayType,
      overlayColor = _ref.overlayColor,
      overlayOpacity = _ref.overlayOpacity,
      defaultColor = _ref.defaultColor,
      defaultHoverColor = _ref.defaultHoverColor;
  return imageSource && React.createElement(React.Fragment, null, React.createElement("style", null, ".taproot-overlay-preview-text:hover {color: ".concat(defaultHoverColor, "!important;}")), React.createElement("div", {
    className: "media-preview-wrapper"
  }, React.createElement("img", {
    src: imageSource,
    "class": "media-preview"
  }), 'none' !== overlayType && React.createElement("div", {
    className: "taproot-overlay",
    style: {
      backgroundColor: overlayColor,
      opacity: overlayOpacity
    }
  }), React.createElement("a", {
    href: "#",
    "class": "taproot-overlay-preview-text",
    style: {
      color: defaultColor
    }
  }, __('Hero Preview'))));
}

var HeroPreview = compose([withSelect(function (select) {
  var _select = select('core'),
      getMedia = _select.getMedia;

  var _select2 = select('core/editor'),
      getEditedPostAttribute = _select2.getEditedPostAttribute;

  var imageSource = false;
  var imageType = getEditedPostAttribute('meta')['taproot_custom_header_image_type'];
  var customImage = getEditedPostAttribute('meta')['taproot_custom_header_image'];
  var featuredImage = 0;

  if (getEditedPostAttribute('featured_media')) {
    featuredImage = getMedia(getEditedPostAttribute('featured_media'));
  }

  if ('featured' === imageType) {
    if (featuredImage) {
      imageSource = featuredImage.source_url;
    }
  } else if ('default' === imageType) {
    if (typeof taprootEditorData !== 'undefined') {
      imageSource = taprootEditorData.headerImage;
    }
  } else if ('custom' === imageType && customImage) {
    imageSource = customImage;
  }

  var overlayType = getEditedPostAttribute('meta')['taprooot_hero_overlay_type'];
  var overlayColor = getEditedPostAttribute('meta')['taprooot_hero_overlay_color'];
  var overlayOpacity = getEditedPostAttribute('meta')['taprooot_hero_overlay_opacity'];
  var defaultColor = getEditedPostAttribute('meta')['taprooot_hero_default_color'];
  var defaultHoverColor = getEditedPostAttribute('meta')['taprooot_hero_default_hover_color'];

  if (typeof taprootEditorData !== 'undefined') {
    if (!overlayType || 'default' === overlayType) {
      overlayColor = taprootEditorData.headerOverlayColor;
      overlayOpacity = taprootEditorData.headerOverlayOpacity;
    }

    if (!defaultColor) {
      defaultColor = taprootEditorData.headerHeroDefaultColor;
    }

    if (!defaultHoverColor) {
      defaultHoverColor = taprootEditorData.headerHeroHoverColor;
    }
  }

  return {
    imageSource: imageSource,
    overlayType: overlayType,
    overlayColor: overlayColor,
    overlayOpacity: parseInt(overlayOpacity, 10) / 100,
    defaultColor: defaultColor,
    defaultHoverColor: defaultHoverColor
  };
})])(HeroPreviewEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeroTextColors.js":
/*!*******************************************************!*\
  !*** ./resources/js/editor/sidebar/HeroTextColors.js ***!
  \*******************************************************/
/*! exports provided: HeroTextColors */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeroTextColors", function() { return HeroTextColors; });
/* harmony import */ var _controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../controls/colorPicker */ "./resources/js/editor/controls/colorPicker.js");
/**
 * Hero Overlay
 *
 * This file handles the JavaScript for the hero overlay settings in the editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var compose = wp.compose.compose;
var __ = wp.i18n.__;
/*
 * Internal Dependencies
 */



function HeroTextColorsEdit(_ref) {
  var imageType = _ref.imageType,
      colors = _ref.colors,
      heroDefaultColor = _ref.heroDefaultColor,
      heroDefaultHoverColor = _ref.heroDefaultHoverColor,
      updateDefaultColor = _ref.updateDefaultColor,
      updateDefaultHoverColor = _ref.updateDefaultHoverColor;
  return 'none' !== imageType && React.createElement(React.Fragment, null, React.createElement(_controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__["ColorPickerControl"], {
    label: __('Hero Text Color'),
    value: heroDefaultColor,
    onChange: function onChange(value) {
      return updateDefaultColor(value);
    },
    colors: colors
  }), React.createElement(_controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__["ColorPickerControl"], {
    label: __('Hero Link Hover Color'),
    value: heroDefaultHoverColor,
    onChange: function onChange(value) {
      return updateDefaultHoverColor(value);
    },
    colors: colors
  }));
}

var HeroTextColors = compose([withSelect(function (select) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var settings = select('core/block-editor').getSettings();
  return {
    imageType: getEditedPostAttribute('meta')['taproot_custom_header_image_type'],
    colors: settings.colors,
    heroDefaultColor: getEditedPostAttribute('meta')['taprooot_hero_default_color'],
    heroDefaultHoverColor: getEditedPostAttribute('meta')['taprooot_hero_default_hover_color']
  };
}), withDispatch(function (dispatch) {
  return {
    updateDefaultColor: function updateDefaultColor(value) {
      if (!value) {
        value = '';
      }

      dispatch('core/editor').editPost({
        meta: {
          taprooot_hero_default_color: value
        }
      });
    },
    updateDefaultHoverColor: function updateDefaultHoverColor(value) {
      if (!value) {
        value = '';
      }

      dispatch('core/editor').editPost({
        meta: {
          taprooot_hero_default_hover_color: value
        }
      });
    }
  };
})])(HeroTextColorsEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/LayoutPicker.js":
/*!*****************************************************!*\
  !*** ./resources/js/editor/sidebar/LayoutPicker.js ***!
  \*****************************************************/
/*! exports provided: LayoutPicker */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LayoutPicker", function() { return LayoutPicker; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Layout Picker Component
 *
 * This file handles the JavaScript for creating a layout picker
 * control in the block editor theme sidebar panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var compose = wp.compose.compose;
var SelectControl = wp.components.SelectControl;
var __ = wp.i18n.__;
var LayoutPicker = compose(withDispatch(function (dispatch, props) {
  return {
    setMetaFieldValue: function setMetaFieldValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  return {
    metaFieldValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
  };
}))(function (props) {
  return React.createElement(SelectControl, {
    label: __('Page Layout'),
    value: props.metaFieldValue,
    options: [{
      label: __('Default'),
      value: 'default'
    }, {
      label: __('Full (No Sidebar)'),
      value: 'full'
    }, {
      label: __('Sidebar on Right'),
      value: 'right'
    }, {
      label: __('Sidebar on Left'),
      value: 'left'
    }],
    onChange: function onChange(content) {
      props.setMetaFieldValue(content);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/LayoutSlot.js":
/*!***************************************************!*\
  !*** ./resources/js/editor/sidebar/LayoutSlot.js ***!
  \***************************************************/
/*! exports provided: LayoutSlot */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "LayoutSlot", function() { return LayoutSlot; });
/**
 * Layout Slot
 *
 * This file handles the JavaScript for creating a slot for adding
 * additional controls to the layout section.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var createSlotFill = wp.components.createSlotFill;

var _createSlotFill = createSlotFill('LayoutSlot'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

var LayoutSlot = function LayoutSlot(_ref) {
  var children = _ref.children;
  return React.createElement(Fill, null, children);
};

LayoutSlot.Slot = Slot;


/***/ }),

/***/ "./resources/js/editor/sidebar/PostTitleOptions.js":
/*!*********************************************************!*\
  !*** ./resources/js/editor/sidebar/PostTitleOptions.js ***!
  \*********************************************************/
/*! exports provided: PostTitleOptions */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PostTitleOptions", function() { return PostTitleOptions; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Post Title Component
 *
 * This file handles the JavaScript for creating a select control
 * for post title options in the block editor theme sidebar panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
var compose = wp.compose.compose;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var SelectControl = wp.components.SelectControl;
var __ = wp.i18n.__;
var PostTitleOptions = compose(withDispatch(function (dispatch, props) {
  return {
    setMetaFieldValue: function setMetaFieldValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  return {
    metaFieldValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
  };
}))(function (props) {
  return React.createElement(SelectControl, {
    label: __('Post Title'),
    value: props.metaFieldValue,
    options: [{
      label: __('Show in Content'),
      value: 'content'
    }, {
      label: __('Show in Hero Area'),
      value: 'header'
    }, {
      label: __('Hide'),
      value: 'hide'
    }],
    onChange: function onChange(content) {
      props.setMetaFieldValue(content);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/index.js":
/*!**********************************************!*\
  !*** ./resources/js/editor/sidebar/index.js ***!
  \**********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _LayoutPicker_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./LayoutPicker.js */ "./resources/js/editor/sidebar/LayoutPicker.js");
/* harmony import */ var _PostTitleOptions_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PostTitleOptions.js */ "./resources/js/editor/sidebar/PostTitleOptions.js");
/* harmony import */ var _HeroImage_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./HeroImage.js */ "./resources/js/editor/sidebar/HeroImage.js");
/* harmony import */ var _HeroOverlay_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./HeroOverlay.js */ "./resources/js/editor/sidebar/HeroOverlay.js");
/* harmony import */ var _HeroTextColors_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./HeroTextColors.js */ "./resources/js/editor/sidebar/HeroTextColors.js");
/* harmony import */ var _LayoutSlot_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./LayoutSlot.js */ "./resources/js/editor/sidebar/LayoutSlot.js");
/**
 * Block Editor Custom Settings Panel.
 *
 * This file handles the JavaScript for creating a custom panel
 * in the block editor for post level settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */





 // Action for adding items to the layout section slot

wp.hooks.doAction('taproot-single-layout-slot', _LayoutSlot_js__WEBPACK_IMPORTED_MODULE_5__["LayoutSlot"]);

(function (wp) {
  var _wp$editPost = wp.editPost,
      PluginSidebar = _wp$editPost.PluginSidebar,
      PluginSidebarMoreMenuItem = _wp$editPost.PluginSidebarMoreMenuItem;
  var registerPlugin = wp.plugins.registerPlugin;
  var Fragment = wp.element.Fragment;
  var _wp$components = wp.components,
      Panel = _wp$components.Panel,
      PanelBody = _wp$components.PanelBody;
  var __ = wp.i18n.__;
  var PostTypeSupportCheck = wp.editor.PostTypeSupportCheck; // register our sidebar panel

  registerPlugin('tr-theme-sidebar', {
    render: function render() {
      return React.createElement(PostTypeSupportCheck, {
        supportKeys: "custom-fields"
      }, React.createElement(Fragment, null, React.createElement(PluginSidebarMoreMenuItem, {
        target: "taproot-theme-sidebar",
        icon: "carrot"
      }, __('Taproot Theme Settings')), React.createElement(PluginSidebar, {
        name: "taproot-theme-sidebar",
        className: "taproot-theme-sidebar",
        icon: "carrot",
        title: __('Taproot Page Settings')
      }, React.createElement(Panel, null, React.createElement(PanelBody, {
        title: __('Layout'),
        initialOpen: false
      }, React.createElement(_LayoutPicker_js__WEBPACK_IMPORTED_MODULE_0__["LayoutPicker"], {
        fieldName: "taproot_page_layout"
      }), React.createElement(_LayoutSlot_js__WEBPACK_IMPORTED_MODULE_5__["LayoutSlot"].Slot, null, function (fills) {
        return React.createElement(React.Fragment, null, fills);
      })), React.createElement(PanelBody, {
        title: __('Post Title'),
        initialOpen: false
      }, React.createElement(_PostTitleOptions_js__WEBPACK_IMPORTED_MODULE_1__["PostTitleOptions"], {
        fieldName: "taproot_post_title_display"
      })), React.createElement(PanelBody, {
        title: __('Hero Area'),
        initialOpen: false
      }, React.createElement(_HeroImage_js__WEBPACK_IMPORTED_MODULE_2__["HeroImage"], null), React.createElement(_HeroOverlay_js__WEBPACK_IMPORTED_MODULE_3__["HeroOverlay"], null), React.createElement(_HeroTextColors_js__WEBPACK_IMPORTED_MODULE_4__["HeroTextColors"], null))))));
    }
  });
})(window.wp);

/***/ }),

/***/ 3:
/*!**************************************!*\
  !*** multi ./resources/js/editor.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/sky/Repos/skyshab/taproot/resources/js/editor.js */"./resources/js/editor.js");


/***/ })

/******/ });
//# sourceMappingURL=editor.js.map