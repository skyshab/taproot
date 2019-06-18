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

/***/ "./resources/js/editor/sidebar/HeaderImagePicker.js":
/*!**********************************************************!*\
  !*** ./resources/js/editor/sidebar/HeaderImagePicker.js ***!
  \**********************************************************/
/*! exports provided: HeaderImagePicker */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeaderImagePicker", function() { return HeaderImagePicker; });
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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
var compose = wp.compose.compose;
var _wp$data = wp.data,
    withSelect = _wp$data.withSelect,
    withDispatch = _wp$data.withDispatch;
var SelectControl = wp.components.SelectControl;
var _wp$editor = wp.editor,
    MediaUpload = _wp$editor.MediaUpload,
    PostTypeSupportCheck = _wp$editor.PostTypeSupportCheck;
var __ = wp.i18n.__;
var doAction = wp.hooks.doAction;
var HeaderImagePicker = compose(withDispatch(function (dispatch, props) {
  return {
    setMetaFieldValue: function setMetaFieldValue(value) {
      dispatch('core/editor').editPost({
        meta: _defineProperty({}, props.fieldName, value)
      });
    },
    setSelectValue: function setSelectValue(value) {
      dispatch('core/editor').editPost({
        meta: {
          taproot_custom_header_image_type: value
        }
      });

      if ('custom' !== value) {
        dispatch('core/editor').editPost({
          meta: _defineProperty({}, props.fieldName, '')
        });
      }
    }
  };
}), withSelect(function (select, props) {
  var _select = select('core'),
      getMedia = _select.getMedia;

  var _select2 = select('core/editor'),
      getEditedPostAttribute = _select2.getEditedPostAttribute;

  var featuredImageSrc = 0;

  if (getEditedPostAttribute('featured_media')) {
    featuredImageSrc = getMedia(getEditedPostAttribute('featured_media'));
  }

  return {
    metaFieldValue: select('core/editor').getEditedPostAttribute('meta')[props.fieldName],
    featuredImage: featuredImageSrc,
    selectValue: select('core/editor').getEditedPostAttribute('meta')['taproot_custom_header_image_type']
  };
}))(function (props) {
  // create image select
  var imageSelect = React.createElement(PostTypeSupportCheck, {
    supportKeys: "thumbnail"
  }, React.createElement(SelectControl, {
    label: __('Custom Header Image'),
    value: props.selectValue,
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
      props.setSelectValue(content);
    }
  })); // create the image preview element

  var preview = function preview() {
    var imageSource = false;

    if ('featured' === props.selectValue) {
      if (props.featuredImage) imageSource = props.featuredImage.source_url;
    } else if ('default' === props.selectValue) {
      if (typeof taprootDefaultHeaderImage !== 'undefined') {
        imageSource = taprootDefaultHeaderImage;
      }
    } else if ('custom' === props.selectValue && props.metaFieldValue) {
      imageSource = props.metaFieldValue;
    } // action that fires whenever changing the preview.
    // passes in image url.
    // Used to change hero content background image in our plugin.


    doAction('taproot.plugin.headerImageChange', imageSource);
    if (imageSource) return React.createElement("div", {
      className: "media-preview-wrapper"
    }, React.createElement("img", {
      src: imageSource,
      class: "media-preview"
    }));
  }; // create the button to add an image


  var addImage = function addImage(open) {
    if ('custom' === props.selectValue) return React.createElement("button", {
      class: "components-button is-button is-default",
      style: {
        marginRight: '10px'
      },
      onClick: open
    }, __('Select Image'));
  }; // clear the saved image value


  var reset = function reset() {
    props.setMetaFieldValue('');
  }; // button to clear the saved image value


  var imageReset = 'custom' === props.selectValue && props.metaFieldValue ? React.createElement("button", {
    class: "components-button is-button is-default",
    onClick: reset
  }, __('Clear')) : null; // return the custom header image picker component

  return React.createElement(MediaUpload, {
    type: "image",
    label: __('Custom Header Image'),
    value: props.metaFieldValue,
    onSelect: function onSelect(imageObject) {
      if (imageObject.sizes) props.setMetaFieldValue(imageObject.sizes.full.url);
    },
    render: function render(_ref) {
      var open = _ref.open;
      return [imageSelect, preview(), addImage(open), imageReset];
    }
  });
});

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
      label: __('Show in Custom Header'),
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
/* harmony import */ var _HeaderImagePicker_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./HeaderImagePicker.js */ "./resources/js/editor/sidebar/HeaderImagePicker.js");
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




(function (wp) {
  var _wp$editPost = wp.editPost,
      PluginSidebar = _wp$editPost.PluginSidebar,
      PluginSidebarMoreMenuItem = _wp$editPost.PluginSidebarMoreMenuItem;
  var registerPlugin = wp.plugins.registerPlugin;
  var Fragment = wp.element.Fragment;
  var PanelBody = wp.components.PanelBody;
  var __ = wp.i18n.__;
  var PostTypeSupportCheck = wp.editor.PostTypeSupportCheck;
  var _wp$hooks = wp.hooks,
      applyFilters = _wp$hooks.applyFilters,
      addFilter = _wp$hooks.addFilter,
      doAction = _wp$hooks.doAction;
  addFilter('taproot.plugin.hook', 'skyshab/taproot/layout', function (components) {
    return [components, React.createElement(_LayoutPicker_js__WEBPACK_IMPORTED_MODULE_0__["LayoutPicker"], {
      fieldName: "taproot_page_layout"
    })];
  }, 10);
  addFilter('taproot.plugin.hook', 'skyshab/taproot/postTitle', function (components) {
    return [components, React.createElement(_PostTitleOptions_js__WEBPACK_IMPORTED_MODULE_1__["PostTitleOptions"], {
      fieldName: "taproot_post_title_display"
    })];
  }, 20);
  addFilter('taproot.plugin.hook', 'skyshab/taproot/customHeader', function (components) {
    return [components, React.createElement(_HeaderImagePicker_js__WEBPACK_IMPORTED_MODULE_2__["HeaderImagePicker"], {
      fieldName: "taproot_custom_header_image"
    })];
  }, 30);
  doAction('taproot.plugin.defaultsLoaded'); // register our sidebar panel

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
      }, React.createElement(PanelBody, null, applyFilters('taproot.plugin.hook')))));
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