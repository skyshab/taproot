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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
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
/**
 * Editor script.
 *
 * Primary JavaScript file for theme editor functionality.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


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

/***/ "./resources/js/editor/sidebar/ContentLayout.js":
/*!******************************************************!*\
  !*** ./resources/js/editor/sidebar/ContentLayout.js ***!
  \******************************************************/
/*! exports provided: ContentLayout */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ContentLayout", function() { return ContentLayout; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Entry Header Layout
 *
 * Adds a setting to the block editor theme sidebar panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var compose = wp.compose.compose;
var SelectControl = wp.components.SelectControl;
var __ = wp.i18n.__;
var ContentLayout = compose(withDispatch(function (dispatch, props) {
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
    label: __('Content Layout'),
    value: props.metaFieldValue,
    options: [{
      label: __('Default'),
      value: 'default'
    }, {
      label: __('Left'),
      value: 'left'
    }, {
      label: __('Center'),
      value: 'center'
    }, {
      label: __('Wide'),
      value: 'wide'
    }, {
      label: __('Wide/Left'),
      value: 'wide-left'
    }, {
      label: __('Wide/Center'),
      value: 'wide-center'
    }],
    onChange: function onChange(content) {
      props.setMetaFieldValue(content);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/DisableBottomPadding.js":
/*!*************************************************************!*\
  !*** ./resources/js/editor/sidebar/DisableBottomPadding.js ***!
  \*************************************************************/
/*! exports provided: DisableBottomPadding */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DisableBottomPadding", function() { return DisableBottomPadding; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Disable Main Bottom Padding Component
 *
 * This file handles the JavaScript for the setting that disables Main bottom padding.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var __ = wp.i18n.__;
var compose = wp.compose.compose;
var ToggleControl = wp.components.ToggleControl;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var DisableBottomPadding = compose(withDispatch(function (dispatch, props) {
  return {
    setCheckboxValue: function setCheckboxValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  return {
    checkboxValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
  };
}))(function (props) {
  // return the component
  return React.createElement(ToggleControl, {
    label: __('Disable Bottom Padding'),
    checked: props.checkboxValue,
    onChange: function onChange(isChecked) {
      isChecked = isChecked ? 1 : 0;
      props.setCheckboxValue(isChecked);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/DisableTopPadding.js":
/*!**********************************************************!*\
  !*** ./resources/js/editor/sidebar/DisableTopPadding.js ***!
  \**********************************************************/
/*! exports provided: DisableTopPadding */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DisableTopPadding", function() { return DisableTopPadding; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Disable Main Top Padding Component
 *
 * This file handles the JavaScript for the setting that disables Main top padding.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var __ = wp.i18n.__;
var compose = wp.compose.compose;
var ToggleControl = wp.components.ToggleControl;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var DisableTopPadding = compose(withDispatch(function (dispatch, props) {
  return {
    setCheckboxValue: function setCheckboxValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  return {
    checkboxValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
  };
}))(function (props) {
  // return the component
  return React.createElement(ToggleControl, {
    label: __('Disable Top Padding'),
    checked: props.checkboxValue,
    onChange: function onChange(isChecked) {
      isChecked = isChecked ? 1 : 0;
      props.setCheckboxValue(isChecked);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/HeaderImage.js":
/*!****************************************************!*\
  !*** ./resources/js/editor/sidebar/HeaderImage.js ***!
  \****************************************************/
/*! exports provided: HeaderImage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeaderImage", function() { return HeaderImage; });
/* harmony import */ var _HeaderPreview__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./HeaderPreview */ "./resources/js/editor/sidebar/HeaderPreview.js");
/**
 * Header Image Picker Component
 *
 * This file handles the JavaScript for creating an image
 * picker control in the block editor theme sidebar panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
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



function HeaderImageEdit(_ref) {
  var headerImage = _ref.headerImage,
      headerImageType = _ref.headerImageType,
      setHeaderImage = _ref.setHeaderImage,
      setHeaderImageType = _ref.setHeaderImageType;
  // create image select
  var imageSelect = React.createElement(PostTypeSupportCheck, {
    supportKeys: "thumbnail"
  }, React.createElement(SelectControl, {
    label: __('Header Image'),
    value: headerImageType,
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
      setHeaderImageType(content);
    }
  })); // create the button to add an image

  var addImage = function addImage(open) {
    if ('custom' === headerImageType) return React.createElement("button", {
      "class": "components-button is-button is-default",
      style: {
        marginRight: '10px'
      },
      onClick: open
    }, __('Select Image'));
  }; // clear the saved image value


  var reset = function reset() {
    setHeaderImage('');
  }; // button to clear the saved image value


  var imageReset = 'custom' === headerImageType && headerImage ? React.createElement("button", {
    "class": "components-button is-button is-default",
    onClick: reset
  }, __('Clear')) : null; // return the custom header image picker component

  return React.createElement(MediaUpload, {
    type: "image",
    label: __('Custom Header Image'),
    value: headerImage,
    onSelect: function onSelect(imageObject) {
      if (imageObject.sizes) {
        setHeaderImage(imageObject.sizes.full.url);
      }
    },
    render: function render(_ref2) {
      var open = _ref2.open;
      return [React.createElement(_HeaderPreview__WEBPACK_IMPORTED_MODULE_0__["HeaderPreview"], null), imageSelect, addImage(open), imageReset];
    }
  });
}

var HeaderImage = compose([withSelect(function (select) {
  return {
    headerImage: select('core/editor').getEditedPostAttribute('meta')['_taproot_header_image'],
    headerImageType: select('core/editor').getEditedPostAttribute('meta')['_taproot_header_image_type']
  };
}), withDispatch(function (dispatch) {
  return {
    setHeaderImage: function setHeaderImage(value) {
      dispatch('core/editor').editPost({
        meta: {
          _taproot_header_image: value
        }
      });
    },
    setHeaderImageType: function setHeaderImageType(value) {
      dispatch('core/editor').editPost({
        meta: {
          _taproot_header_image_type: value
        }
      });

      if ('custom' !== value) {
        dispatch('core/editor').editPost({
          meta: {
            _taproot_header_image: ''
          }
        });
      }

      if ('none' === value) {
        dispatch('core/editor').editPost({
          meta: {
            _taproot_header_overlay_type: 'default',
            _taproot_header_overlay_color: '',
            _taproot_header_overlay_color_name: '',
            _taproot_header_overlay_opacity: 50,
            _taproot_header_text_color: ''
          }
        });
      }
    }
  };
})])(HeaderImageEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeaderOverlay.js":
/*!******************************************************!*\
  !*** ./resources/js/editor/sidebar/HeaderOverlay.js ***!
  \******************************************************/
/*! exports provided: HeaderOverlay */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeaderOverlay", function() { return HeaderOverlay; });
/* harmony import */ var _controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../controls/colorPicker */ "./resources/js/editor/controls/colorPicker.js");
/**
 * Header Image Overlay
 *
 * This file handles the JavaScript for the header image overlay settings in the editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
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



function HeaderOverlayEdit(_ref) {
  var imageType = _ref.imageType,
      colors = _ref.colors,
      overlayType = _ref.overlayType,
      overlayColor = _ref.overlayColor,
      overlayOpacity = _ref.overlayOpacity,
      updateOverlayType = _ref.updateOverlayType,
      updateOverlayColor = _ref.updateOverlayColor,
      updateOverlayOpacity = _ref.updateOverlayOpacity;
  return 'none' !== imageType && React.createElement(React.Fragment, null, React.createElement(SelectControl, {
    label: __('Overlay'),
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
    label: __('Overlay Color'),
    value: overlayColor,
    onChange: function onChange(value) {
      return updateOverlayColor(value);
    },
    colors: colors
  }), 'custom' === overlayType && React.createElement(RangeControl, {
    label: __('Overlay Opacity'),
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

var HeaderOverlay = compose([withSelect(function (select) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var settings = select('core/block-editor').getSettings(); // Make sure default image type is 'none'

  var imageType = getEditedPostAttribute('meta')['_taproot_header_image_type'];

  if (!imageType) {
    imageType = 'none';
  }

  return {
    imageType: imageType,
    colors: settings.colors,
    overlayType: getEditedPostAttribute('meta')['_taproot_header_overlay_type'],
    overlayColor: getEditedPostAttribute('meta')['_taproot_header_overlay_color'],
    overlayColorName: getEditedPostAttribute('meta')['_taproot_header_overlay_color_name'],
    overlayOpacity: getEditedPostAttribute('meta')['_taproot_header_overlay_opacity']
  };
}), withDispatch(function (dispatch, _ref2) {
  var colors = _ref2.colors;
  return {
    updateOverlayType: function updateOverlayType(value) {
      dispatch('core/editor').editPost({
        meta: {
          _taproot_header_overlay_type: value
        }
      });
    },
    updateOverlayColor: function updateOverlayColor(value) {
      if (!value) {
        value = '';
      }

      dispatch('core/editor').editPost({
        meta: {
          _taproot_header_overlay_color: value
        }
      });
      var colorObj = wp.blockEditor.getColorObjectByColorValue(colors, value);
      var colorSlug = colorObj && colorObj.slug ? colorObj.slug : '';
      dispatch('core/editor').editPost({
        meta: {
          _taproot_header_overlay_color_name: colorSlug
        }
      });
    },
    updateOverlayOpacity: function updateOverlayOpacity(value) {
      dispatch('core/editor').editPost({
        meta: {
          _taproot_header_overlay_opacity: value
        }
      });
    }
  };
})])(HeaderOverlayEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeaderPreview.js":
/*!******************************************************!*\
  !*** ./resources/js/editor/sidebar/HeaderPreview.js ***!
  \******************************************************/
/*! exports provided: HeaderPreview */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeaderPreview", function() { return HeaderPreview; });
/**
 * Header Image Preview
 *
 * This file handles the JavaScript for the header image preview.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var withSelect = wp.data.withSelect;
var compose = wp.compose.compose;
var __ = wp.i18n.__;

function HeaderPreviewEdit(_ref) {
  var imageSource = _ref.imageSource,
      overlayType = _ref.overlayType,
      overlayColor = _ref.overlayColor,
      overlayOpacity = _ref.overlayOpacity,
      defaultColor = _ref.defaultColor;
  return imageSource && React.createElement(React.Fragment, null, React.createElement("div", {
    className: "taproot-header-image-preview"
  }, React.createElement("img", {
    src: imageSource,
    "class": "taproot-header-image"
  }), 'none' !== overlayType && React.createElement("div", {
    className: "taproot-overlay",
    style: {
      backgroundColor: overlayColor,
      opacity: overlayOpacity
    }
  }), React.createElement("p", {
    "class": "taproot-overlay-preview-text",
    style: {
      color: defaultColor
    }
  }, __('Header Preview'))));
}

var HeaderPreview = compose([withSelect(function (select) {
  var _select = select('core'),
      getMedia = _select.getMedia;

  var _select2 = select('core/editor'),
      getEditedPostAttribute = _select2.getEditedPostAttribute;

  var imageType = getEditedPostAttribute('meta')['_taproot_header_image_type'];
  var customImage = getEditedPostAttribute('meta')['_taproot_header_image'];
  var imageSource = false;
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

  var overlayType = getEditedPostAttribute('meta')['_taproot_header_overlay_type'];
  var overlayColor = getEditedPostAttribute('meta')['_taproot_header_overlay_color'];
  var overlayOpacity = getEditedPostAttribute('meta')['_taproot_header_overlay_opacity'];
  var defaultColor = getEditedPostAttribute('meta')['_taproot_header_text_color'];

  if (typeof taprootEditorData !== 'undefined') {
    if (!overlayType || 'default' === overlayType) {
      overlayColor = taprootEditorData.headerOverlayColor;
      overlayOpacity = taprootEditorData.headerOverlayOpacity;
    }

    if (!defaultColor) {
      defaultColor = taprootEditorData.headerHeaderDefaultColor;
    }
  }

  return {
    imageSource: imageSource,
    overlayType: overlayType,
    overlayColor: overlayColor,
    overlayOpacity: parseInt(overlayOpacity, 10) / 100,
    defaultColor: defaultColor
  };
})])(HeaderPreviewEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeaderTextColors.js":
/*!*********************************************************!*\
  !*** ./resources/js/editor/sidebar/HeaderTextColors.js ***!
  \*********************************************************/
/*! exports provided: HeaderTextColors */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeaderTextColors", function() { return HeaderTextColors; });
/* harmony import */ var _controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../controls/colorPicker */ "./resources/js/editor/controls/colorPicker.js");
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Header Text Color
 *
 * This file handles the JavaScript for the header text color settings in the editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
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



function HeaderTextColorsEdit(_ref) {
  var colors = _ref.colors,
      headerDefaultColor = _ref.headerDefaultColor,
      updateDefaultColor = _ref.updateDefaultColor;
  return React.createElement(React.Fragment, null, React.createElement(_controls_colorPicker__WEBPACK_IMPORTED_MODULE_0__["ColorPickerControl"], {
    label: __('Header Text Color'),
    value: headerDefaultColor,
    onChange: function onChange(value) {
      return updateDefaultColor(value);
    },
    colors: colors
  }));
}

var HeaderTextColors = compose([withDispatch(function (dispatch, props) {
  return {
    updateDefaultColor: function updateDefaultColor(value) {
      if (!value) {
        value = '';
      }

      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var settings = select('core/block-editor').getSettings();
  return {
    colors: settings.colors,
    headerDefaultColor: getEditedPostAttribute('meta')[props.fieldName]
  };
})])(HeaderTextColorsEdit);

/***/ }),

/***/ "./resources/js/editor/sidebar/HeaderTitleDisplay.js":
/*!***********************************************************!*\
  !*** ./resources/js/editor/sidebar/HeaderTitleDisplay.js ***!
  \***********************************************************/
/*! exports provided: HeaderTitleDisplay */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeaderTitleDisplay", function() { return HeaderTitleDisplay; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Enable Header Title
 *
 * This file handles the JavaScript for the setting that adds the title to the header content.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var __ = wp.i18n.__;
var compose = wp.compose.compose;
var ToggleControl = wp.components.ToggleControl;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var HeaderTitleDisplay = compose(withDispatch(function (dispatch, props) {
  return {
    setCheckboxValue: function setCheckboxValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  return {
    checkboxValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
  };
}))(function (props) {
  // return the component
  return React.createElement(ToggleControl, {
    label: __('Display title in header'),
    checked: props.checkboxValue,
    onChange: function onChange(isChecked) {
      isChecked = isChecked ? 1 : 0;
      props.setCheckboxValue(isChecked);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/HideFeaturedImage.js":
/*!**********************************************************!*\
  !*** ./resources/js/editor/sidebar/HideFeaturedImage.js ***!
  \**********************************************************/
/*! exports provided: HideFeaturedImage */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HideFeaturedImage", function() { return HideFeaturedImage; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Display Featured Image.
 *
 * This file handles the JavaScript for the setting in the editor theme panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var __ = wp.i18n.__;
var compose = wp.compose.compose;
var ToggleControl = wp.components.ToggleControl;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var HideFeaturedImage = compose(withDispatch(function (dispatch, props) {
  return {
    setCheckboxValue: function setCheckboxValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  return {
    checkboxValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
  };
}))(function (props) {
  // return the component
  return React.createElement(ToggleControl, {
    label: __('Hide Featured Image'),
    checked: props.checkboxValue,
    onChange: function onChange(isChecked) {
      isChecked = isChecked ? 1 : 0;
      props.setCheckboxValue(isChecked);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/HidePostTitle.js":
/*!******************************************************!*\
  !*** ./resources/js/editor/sidebar/HidePostTitle.js ***!
  \******************************************************/
/*! exports provided: HidePostTitle */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HidePostTitle", function() { return HidePostTitle; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Display Featured Image.
 *
 * This file handles the JavaScript for the setting in the editor theme panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var __ = wp.i18n.__;
var compose = wp.compose.compose;
var ToggleControl = wp.components.ToggleControl;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var HidePostTitle = compose(withDispatch(function (dispatch, props) {
  return {
    setCheckboxValue: function setCheckboxValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    }
  };
}), withSelect(function (select, props) {
  return {
    checkboxValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName]
  };
}))(function (props) {
  // return the component
  return React.createElement(ToggleControl, {
    label: __('Hide Title'),
    checked: props.checkboxValue,
    onChange: function onChange(isChecked) {
      isChecked = isChecked ? 1 : 0;
      props.setCheckboxValue(isChecked);
    }
  });
});

/***/ }),

/***/ "./resources/js/editor/sidebar/SidebarLayout.js":
/*!******************************************************!*\
  !*** ./resources/js/editor/sidebar/SidebarLayout.js ***!
  \******************************************************/
/*! exports provided: SidebarLayout */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SidebarLayout", function() { return SidebarLayout; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

/**
 * Layout Picker Component
 *
 * This file handles the JavaScript for creating a layout picker
 * control in the block editor theme sidebar panel.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var compose = wp.compose.compose;
var SelectControl = wp.components.SelectControl;
var __ = wp.i18n.__;
var SidebarLayout = compose(withDispatch(function (dispatch, props) {
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
    label: __('Sidebar Layout'),
    value: props.metaFieldValue,
    options: [{
      label: __('Default'),
      value: 'default'
    }, {
      label: __('No Sidebar'),
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

/***/ "./resources/js/editor/sidebar/SidebarSlot.js":
/*!****************************************************!*\
  !*** ./resources/js/editor/sidebar/SidebarSlot.js ***!
  \****************************************************/
/*! exports provided: SidebarSlot */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SidebarSlot", function() { return SidebarSlot; });
/**
 * Sidebar Slot
 *
 * This file handles the JavaScript for creating a slot for adding
 * additional controls to the layout section.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * WordPress dependencies
 */
var createSlotFill = wp.components.createSlotFill;

var _createSlotFill = createSlotFill('SidebarSlot'),
    Fill = _createSlotFill.Fill,
    Slot = _createSlotFill.Slot;

var SidebarSlot = function SidebarSlot(_ref) {
  var children = _ref.children;
  return React.createElement(Fill, null, children);
};

SidebarSlot.Slot = Slot;


/***/ }),

/***/ "./resources/js/editor/sidebar/index.js":
/*!**********************************************!*\
  !*** ./resources/js/editor/sidebar/index.js ***!
  \**********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SidebarLayout_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SidebarLayout.js */ "./resources/js/editor/sidebar/SidebarLayout.js");
/* harmony import */ var _HeaderImage_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HeaderImage.js */ "./resources/js/editor/sidebar/HeaderImage.js");
/* harmony import */ var _HeaderOverlay_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./HeaderOverlay.js */ "./resources/js/editor/sidebar/HeaderOverlay.js");
/* harmony import */ var _HeaderTextColors_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./HeaderTextColors.js */ "./resources/js/editor/sidebar/HeaderTextColors.js");
/* harmony import */ var _DisableTopPadding_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./DisableTopPadding.js */ "./resources/js/editor/sidebar/DisableTopPadding.js");
/* harmony import */ var _DisableBottomPadding_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./DisableBottomPadding.js */ "./resources/js/editor/sidebar/DisableBottomPadding.js");
/* harmony import */ var _SidebarSlot_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./SidebarSlot.js */ "./resources/js/editor/sidebar/SidebarSlot.js");
/* harmony import */ var _ContentLayout_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./ContentLayout.js */ "./resources/js/editor/sidebar/ContentLayout.js");
/* harmony import */ var _HeaderTitleDisplay_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./HeaderTitleDisplay.js */ "./resources/js/editor/sidebar/HeaderTitleDisplay.js");
/* harmony import */ var _HideFeaturedImage_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./HideFeaturedImage.js */ "./resources/js/editor/sidebar/HideFeaturedImage.js");
/* harmony import */ var _HidePostTitle_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./HidePostTitle.js */ "./resources/js/editor/sidebar/HidePostTitle.js");
/**
 * Block Editor Custom Settings Panel.
 *
 * This file handles the JavaScript for creating a custom panel
 * in the block editor for post level settings.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */










 // Action for adding items to the sidebar section slot

wp.hooks.doAction('taproot-editor-sidebar-slot', _SidebarSlot_js__WEBPACK_IMPORTED_MODULE_6__["SidebarSlot"]);

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
        title: __('Custom Header'),
        initialOpen: false
      }, React.createElement(_HeaderImage_js__WEBPACK_IMPORTED_MODULE_1__["HeaderImage"], null), React.createElement(_HeaderOverlay_js__WEBPACK_IMPORTED_MODULE_2__["HeaderOverlay"], null), React.createElement(_HeaderTextColors_js__WEBPACK_IMPORTED_MODULE_3__["HeaderTextColors"], {
        fieldName: "_taproot_header_text_color"
      }), React.createElement(_HeaderTitleDisplay_js__WEBPACK_IMPORTED_MODULE_8__["HeaderTitleDisplay"], {
        fieldName: "_taproot_header_display_title"
      })), React.createElement(PanelBody, {
        title: __('Sidebar'),
        initialOpen: false
      }, React.createElement(_SidebarLayout_js__WEBPACK_IMPORTED_MODULE_0__["SidebarLayout"], {
        fieldName: "_taproot_page_layout"
      }), React.createElement(_SidebarSlot_js__WEBPACK_IMPORTED_MODULE_6__["SidebarSlot"].Slot, null, function (fills) {
        return React.createElement(React.Fragment, null, fills);
      })), React.createElement(PanelBody, {
        title: __('Content'),
        initialOpen: false
      }, React.createElement(_ContentLayout_js__WEBPACK_IMPORTED_MODULE_7__["ContentLayout"], {
        fieldName: "_taproot_post_content_layout"
      }), React.createElement(_HidePostTitle_js__WEBPACK_IMPORTED_MODULE_10__["HidePostTitle"], {
        fieldName: "_taproot_post_title_hide"
      }), React.createElement(_HideFeaturedImage_js__WEBPACK_IMPORTED_MODULE_9__["HideFeaturedImage"], {
        fieldName: "_taproot_post_featured_image_hide"
      }), React.createElement(_DisableTopPadding_js__WEBPACK_IMPORTED_MODULE_4__["DisableTopPadding"], {
        fieldName: "_taproot_disable_main_top_padding"
      }), React.createElement(_DisableBottomPadding_js__WEBPACK_IMPORTED_MODULE_5__["DisableBottomPadding"], {
        fieldName: "_taproot_disable_main_bottom_padding"
      }))))));
    }
  });
})(window.wp);

/***/ }),

/***/ 2:
/*!**************************************!*\
  !*** multi ./resources/js/editor.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/sky/Repos/skyshab/taproot/resources/js/editor.js */"./resources/js/editor.js");


/***/ })

/******/ });
//# sourceMappingURL=editor.js.map