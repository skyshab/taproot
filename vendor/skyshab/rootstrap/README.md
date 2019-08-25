# Rootstrap: a WordPress Development Toolkit

Version: 1.2.0
Released: 08/25/2019

## Description

Rootstrap is a collection of utilities for managing WordPress Customizer controls, settings, responsive breakpoints and styles.

## Requirements

* WordPress 5.0+.
* PHP 7.0+
* [Composer](https://getcomposer.org/) for managing PHP dependencies.


## Features

Rootstrap is a collection of tools for use when implementing the WordPress Customize API in
your theme or plugin.

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
  The Styles module also has full support for CSS custom properties.


### Installation

Use the following command from your command line to install the package.

```
composer require skyshab/rootstrap
```

## Documentation

Read the project wiki: https://github.com/skyshab/rootstrap/wiki

## Notes

Thanks to Justin Tadlock for the Collections class.

## Copyright and License

This project is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2014-2019 &copy; [Sky Shabatura](https://github.com/skyshab)
