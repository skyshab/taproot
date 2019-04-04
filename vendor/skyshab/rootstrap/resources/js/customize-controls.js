"use strict";

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Scripts for working with customizer control actions
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2018, Sky Shabatura
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Main Rootstrap Class
 */
var Rootstrap =
/*#__PURE__*/
function () {
  function Rootstrap() {
    _classCallCheck(this, Rootstrap);

    // define api attribute
    this.api = wp.customize; // if wp.customize is not defined, return

    if (!this.api) return false; // define registered devices

    this.devices = rootstrapData.devices; // initialize tab functionality

    this.initializeNavLinks(); // initialize sequence devices

    this.initializeDeviceLinks(); // setup device data

    this.bindDevices();
  }
  /**
   * Get list of device names
   */


  _createClass(Rootstrap, [{
    key: "getDeviceList",
    value: function getDeviceList() {
      return Object.keys(this.devices);
    }
    /**
     * Get a device id from a specified width
     */

  }, {
    key: "getDevice",
    value: function getDevice(width) {
      var device = false;

      var _arr = Object.entries(this.devices);

      for (var _i = 0; _i < _arr.length; _i++) {
        var _arr$_i = _slicedToArray(_arr[_i], 2),
            name = _arr$_i[0],
            data = _arr$_i[1];

        if (!name || !data) continue;
        var min = parseInt(data.min, 10) ? parseInt(data.min, 10) : 0;
        var max = parseInt(data.max, 10) ? parseInt(data.max, 10) : 9999;
        if (width >= min && width <= max) device = name;
        return false;
      }

      return device;
    }
    /**
     * Get the device id that matches the current preview screen width
     */

  }, {
    key: "getCurrentDevice",
    value: function getCurrentDevice() {
      return getDevice(this.getPreviewWidth());
    }
    /**
     * Get the current preview screen width
     */

  }, {
    key: "getPreviewWidth",
    value: function getPreviewWidth() {
      var iframe = document.querySelector("#customize-preview iframe");
      var iframeDoc = iframe.contentDocument ? iframe.contentDocument : iframe.contentWindow.document;
      return iframeDoc.body.offsetWidth();
    }
    /**
     * When opening a section, open the associated device in preview.
     */

  }, {
    key: "bindDevices",
    value: function bindDevices() {
      var api = this.api;
      var devices = this.getDeviceList();
      api.section.each(function (section) {
        var type = section.params.type;
        devices.forEach(function (device) {
          if (type && type === "rootstrap-device--".concat(device)) section.expanded.bind(function () {
            api.previewedDevice.set(device);
          });
        });
      });
    }
    /**
     * Add click handler to tabs and sequence navigation
     */

  }, {
    key: "initializeNavLinks",
    value: function initializeNavLinks() {
      var api = this.api;
      document.querySelectorAll('.rootstrap-nav-link').forEach(function (link) {
        var section = link.dataset.section;
        link.addEventListener("click", function (e) {
          if (api.section(section)) api.section(section).focus();
        });
      });
    }
    /**
     * Add click handler to sequence navigation for devices
     */

  }, {
    key: "initializeDeviceLinks",
    value: function initializeDeviceLinks() {
      var api = this.api;
      document.querySelectorAll('.rootstrap-nav-link').forEach(function (link) {
        var device = link.dataset.device;
        link.addEventListener("click", function (e) {
          if (device) api.previewedDevice.set(device);
        });
      });
    }
  }]);

  return Rootstrap;
}();
/**
 * Create our Rootstrap Instance on customize ready
 */


wp.customize.bind('ready', function () {
  var rootstrap = new Rootstrap();
});