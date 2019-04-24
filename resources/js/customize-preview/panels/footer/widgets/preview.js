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
wp.customize( 'footer--widgets--footer-layout', function( value ) {
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
            id: 'footer--widgets--footer-layout',
            selector: '.app-footer__widgets',
            styles: {
                'grid-template-columns': footerStyles
            },
            screen: 'desktop'
        });
    });
});


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


// Link Color
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
