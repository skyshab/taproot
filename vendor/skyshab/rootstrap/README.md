# Rootstrap: a WordPress Development Toolkit

Version: 1.0.1
Released: 05/02/2019

## Description
Rootstrap is a collection of utilities for managing WordPress Customizer controls, settings, responsive breakpoints and styles.

## Requirements

* WordPress 4.9.6+.
* PHP 5.6+ (7.0+ recommended).
* [Composer](https://getcomposer.org/) for managing PHP dependencies.


## Features

Rootstrap is a collection of tools for use when implementing the WordPress Customize API in
your theme or plugin. Certain project variables can be defined and then utilized
when creating customizer sections and controls or rendering out the related styles.

* Devices

  In the WordPress customizer, there are three device buttons for the Customize Preview,
  mobile, tablet and desktop. Rootstrap devices lets you easily register new devices to
  the Cusomtizer Control bar, and set the minimum and maximum screen widths for each device.

* Screens

  Screens represent the responsive breakpoints that a website uses to determine when
  changes occur with layouts, components and other styles. Screens are generated from
  the registered devices into all possible combinations, but custom screens can also
  be defined. Screens can then have styles associated with them and output when needed.

* Styles

  Styles for customizer settings can be created cleanly within PHP, organized by screen,
  and stored in a variable or echoed out when needed. Each style can be associated with a Screen,
  and all styles of each screen will be output together in a single media query. There is also a
  javascript api for controlling responsive styles in the customize preview.
  The Styles module also has full support for CSS variables.

* Customizer defaults

  Define the default values to be used for customizer control defaults, and use these values as
  the fallback value when using Rootstrap's custom get_theme_mod function. This allows defaults
  for both to be managed from a single place.

* Post Mods

  The Post Mods will check within the post meta for matching Customizer setting ids. If found,
  the post mod values will supercede the customizer settings that are rendered with Rootstrap/get_theme_mod.
  This functionality is disabled by default, but can be enabled for any registered post types.

* Customizer Section Tabs

  Allows you to create a tabbed interface within sections in the customizer control panel,
  with the option to add a preview device trigger when opening a tab.

* Customizer Section Sequences

  Allows you to add a navigation bar with arrow navigation to the top of customizer sections.
  Has options to show or hide the sections in the panel, reverse the order of the navigation, display
  prev/next labels, and add a preview device trigger.


### Installation

Use the following command from your command line to install the package.

```
composer require skyshab/rootstrap
```

## Documentation

Read the project wiki: https://github.com/skyshab/rootstrap/wiki

Quick screencast of devices, tabs and section sequences: https://youtu.be/htPsjFDnnXQ


## Notes

Thanks to Justin Tadlock for the Collections class.

## Copyright and License

This project is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2014-2019 &copy; [Sky Shabatura]
