"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * Scripts for working with customizer control actions
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Main Rootstrap Class
 */
var RootstrapCustomize =
/*#__PURE__*/
function () {
  function RootstrapCustomize() {
    _classCallCheck(this, RootstrapCustomize);

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


  _createClass(RootstrapCustomize, [{
    key: "getDeviceList",
    value: function getDeviceList() {
      return Object.keys(this.devices);
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

  return RootstrapCustomize;
}();
/**
 * Create our Rootstrap Instance on customize ready
 */


wp.customize.bind('ready', function () {
  var rootstrapCustomize = new RootstrapCustomize();
});