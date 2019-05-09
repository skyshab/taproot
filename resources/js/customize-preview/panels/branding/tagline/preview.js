/**
 * Customize controls preview scripts
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */

import * as utils from '../../../functions-customize-preview.js';


// Text Color
wp.customize( 'branding--tagline--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--tagline--color',
            selector: '.app-header__description',
            styles: {
                color: to
            },
        });
    });
});


// Font Family
wp.customize( 'branding--tagline--font-family', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'branding--tagline--color',
            selector: '.app-header__description',
            styles: {
                'font-family': to
            },
        });
    });
});


// Font Styles
wp.customize( 'branding--tagline--font-styles', function( value ) {
    value.bind( function( to ) {
        var taglineStyles = utils.taprootFontStyles(to);
        rootstrap.style({
            id: 'branding--tagline--font-styles',
            selector: '.app-header__description',
            styles: taglineStyles
        });
    });
});


// Mobile/Default Styles

// Font Size
wp.customize( 'branding--tagline--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--font-size',
            value: to,
            screen: 'default'
        });
    });
});

// Line Height
wp.customize( 'branding--tagline--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--line-height',
            value: to,
            screen: 'default'
        });
    });
});

// Gutter
wp.customize( 'branding--tagline--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--gutter',
            value: to,
            screen: 'default'
        });
    });
});

// Hide tagline
wp.customize( 'branding--tagline--hide-tagline', function( value ) {
    value.bind( function( to ) {
        var taglineDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--tagline--hide-tagline',
            selector: '.app-header__description',
            styles: {
                'display': taglineDisplay
            },
            screen: 'mobile'
        });

        // title styles - center title
        var titleStyles = ( to )
            ? {
                'grid-row-end': 'span 2',
                'align-self': 'center',
            }
            : {
                'grid-row-end': '2',
                'align-self': 'end',
            };

        rootstrap.style({
            id: 'branding--tagline--hide-tagline--title',
            selector: '.app-header__title',
            styles: titleStyles,
            screen: 'mobile'
        });
    });
});


// Tablet Styles

// Font Size
wp.customize( 'branding--tagline--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--font-size',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Line Height
wp.customize( 'branding--tagline--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--line-height',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});

// Gutter
wp.customize( 'branding--tagline--gutter--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--gutter',
            value: to,
            screen: 'tablet-and-up'
        });
    });
});


// Hide tagline
wp.customize( 'branding--tagline--hide-tagline--tablet', function( value ) {
    value.bind( function( to ) {
        var taglineDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--tagline--hide-tagline',
            selector: '.app-header__description',
            styles: {
                'display': taglineDisplay
            },
            screen: 'tablet'
        });

        // title styles - center title
        var titleStyles = ( to )
            ? {
                'grid-row-end': 'span 2',
                'align-self': 'center',
            }
            : {
                'grid-row-end': '2',
                'align-self': 'end',
            };

        rootstrap.style({
            id: 'branding--tagline--hide-tagline--tablet--title',
            selector: '.app-header__title',
            styles: titleStyles,
            screen: 'tablet'
        });
    });
});


// Desktop Styles

// Font Size
wp.customize( 'branding--tagline--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--font-size',
            value: to,
            screen: 'desktop'
        });
    });
});

// Line Height
wp.customize( 'branding--tagline--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--line-height',
            value: to,
            screen: 'desktop'
        });
    });
});

// Gutter
wp.customize( 'branding--tagline--gutter--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'branding--tagline--gutter',
            value: to,
            screen: 'desktop'
        });
    });
});


// Hide tagline
wp.customize( 'branding--tagline--hide-tagline--desktop', function( value ) {
    value.bind( function( to ) {
        var taglineDisplay = (to) ? 'none' : 'inline-block';
        rootstrap.style({
            id: 'branding--tagline--hide-tagline--desktop',
            selector: '.app-header__description',
            styles: {
                'display': taglineDisplay
            },
            screen: 'desktop'
        });

        // title styles - center title
        var titleStyles = ( to )
            ? {
                'grid-row-end': 'span 2',
                'align-self': 'center',
            }
            : {
                'grid-row-end': '2',
                'align-self': 'end',
            };

        rootstrap.style({
            id: 'branding--tagline--hide-tagline--desktop--title',
            selector: '.app-header__title',
            styles: titleStyles,
            screen: 'desktop'
        });
    });
});
