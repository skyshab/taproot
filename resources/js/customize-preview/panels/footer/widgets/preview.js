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


// Default Color
wp.customize( 'footer--widgets--default-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--widgets--default-color',
            selector: '.app-footer__widget',
            styles: {
                'color': to
            }
        });
    });
});

// Headings Color
wp.customize( 'footer--widgets--headings-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--widgets--headings-color',
            selector: '.app-footer__widget h1, .app-footer__widget h2, .app-footer__widget h3, .app-footer__widget h4, .app-footer__widget h5, .app-footer__widget h6',
            styles: {
                'color': to
            }
        });
    });
});

// Link Color
wp.customize( 'footer--widgets--link-color', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--widgets--link-color',
            selector: '.app-footer__widget a, .app-footer__widget a:visited',
            styles: {
                'color': to
            }
        });
    });
});

// Link Color Hover
wp.customize( 'footer--widgets--link-color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.style({
            id: 'footer--widgets--link-color--hover',
            selector: '.app-footer__widget a:hover',
            styles: {
                'color': to
            }
        });
    });
});


// Mobile Styles

// Default Color
wp.customize( 'footer--widgets--layout', function( value ) {
    value.bind( function( to ) {
        var footerStyles;
        switch( to ) {

            case 'halves':
                footerStyles = 'repeat(2, 1fr)';
                break;

            case 'full':
                footerStyles = '100%';
                break;

            default:
                footerStyles = false;
        }

        rootstrap.style({
            id: 'footer--widgets--layout',
            selector: '.app-footer__widgets',
            styles: {
                'grid-template-columns': footerStyles
            },
            screen: 'default'
        });
    });
});

// Title Font Size
wp.customize( 'footer--widgets--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--title--font-size',
            value: to,
            screen: 'default',
        });
    });
});

// Title Line Height
wp.customize( 'footer--widgets--title--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--title--line-height',
            value: to,
            screen: 'default',
        });
    });
});

// Text Font Size
wp.customize( 'footer--widgets--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--font-size',
            value: to,
            screen: 'default',
        });
    });
});

// Text Line Height
wp.customize( 'footer--widgets--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--line-height',
            value: to,
            screen: 'default',
        });
    });
});

// Widgets Spacing
wp.customize( 'footer--widgets--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--gutter',
            value: to,
            screen: 'default',
        });
    });
});


// Tablet Styles

// Layout
wp.customize( 'footer--widgets--layout--tablet', function( value ) {
    value.bind( function( to ) {
        var footerStyles;
        switch( to ) {

            case 'quarters':
                footerStyles = 'repeat(4, 1fr)';
                break;

            case 'thirds':
                footerStyles = 'repeat(3, 1fr)';
                break;

            case 'halves':
                footerStyles = 'repeat(2, 1fr)';
                break;

            case 'full':
                footerStyles = '100%';
                break;

            case 'one-third-two-thirds':
                footerStyles = '1fr 2fr';
                break;

            case 'two-thirds-one-third':
                footerStyles = '2fr 1fr';
                break;

            case 'quarter-quarter-half':
                footerStyles = '1fr 1fr 2fr';
                break;

            case 'half-quarter-quarter':
                footerStyles = '2fr 1fr 1fr';
                break;

            default:
                footerStyles = false;
        }

        rootstrap.style({
            id: 'footer--widgets--layout--tablet',
            selector: '.app-footer__widgets',
            styles: {
                'grid-template-columns': footerStyles
            },
            screen: 'tablet-and-up'
        });
    });
});

// Title Font Size
wp.customize( 'footer--widgets--title--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--title--font-size',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});

// Title Line Height
wp.customize( 'footer--widgets--title--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--title--line-height',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});

// Text Font Size
wp.customize( 'footer--widgets--font-size--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--font-size',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});

// Text Line Height
wp.customize( 'footer--widgets--line-height--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--line-height',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});

// Widgets Spacing
wp.customize( 'footer--widgets--gutter--tablet', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--gutter',
            value: to,
            screen: 'tablet-and-up',
        });
    });
});


// Desktop Styles

// Layout
wp.customize( 'footer--widgets--layout--desktop', function( value ) {
    value.bind( function( to ) {
        var footerStyles;
        switch( to ) {

            case 'quarters':
                footerStyles = 'repeat(4, 1fr)';
                break;

            case 'thirds':
                footerStyles = 'repeat(3, 1fr)';
                break;

            case 'halves':
                footerStyles = 'repeat(2, 1fr)';
                break;

            case 'full':
                footerStyles = '100%';
                break;

            case 'one-third-two-thirds':
                footerStyles = '1fr 2fr';
                break;

            case 'two-thirds-one-third':
                footerStyles = '2fr 1fr';
                break;

            case 'quarter-quarter-half':
                footerStyles = '1fr 1fr 2fr';
                break;

            case 'half-quarter-quarter':
                footerStyles = '2fr 1fr 1fr';
                break;

            default:
                footerStyles = false;
        }

        rootstrap.style({
            id: 'footer--widgets--layout--desktop',
            selector: '.app-footer__widgets',
            styles: {
                'grid-template-columns': footerStyles
            },
            screen: 'desktop'
        });
    });
});

// Title Font Size
wp.customize( 'footer--widgets--title--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--title--font-size',
            value: to,
            screen: 'desktop',
        });
    });
});

// Title Line Height
wp.customize( 'footer--widgets--title--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--title--line-height',
            value: to,
            screen: 'desktop',
        });
    });
});

// Text Font Size
wp.customize( 'footer--widgets--font-size--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--font-size',
            value: to,
            screen: 'desktop',
        });
    });
});

// Text Line Height
wp.customize( 'footer--widgets--line-height--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--line-height',
            value: to,
            screen: 'desktop',
        });
    });
});

// Widgets Spacing
wp.customize( 'footer--widgets--gutter--desktop', function( value ) {
    value.bind( function( to ) {
        rootstrap.customProperty({
            name: 'footer--widgets--gutter',
            value: to,
            screen: 'desktop',
        });
    });
});
