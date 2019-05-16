# Rootstrap Customize Defaults

Version: 1.0.0
Released: 05/16/2019

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


Define the default values to be used for customizer control defaults, and use these values as
the fallback value when using Rootstrap's custom get_theme_mod function. This allows defaults
for both to be managed from a single place.



### Installation

Use the following command from your command line to install the package.

```
composer require skyshab/rootstrap-customize-defaults
```

## Documentation

Read the project wiki: https://github.com/skyshab/rootstrap/wiki

Quick screencast of devices, tabs and section sequences: https://youtu.be/htPsjFDnnXQ


## Notes

Thanks to Justin Tadlock for the Collections class.

## Copyright and License

This project is licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2014-2019 &copy; [Sky Shabatura]
