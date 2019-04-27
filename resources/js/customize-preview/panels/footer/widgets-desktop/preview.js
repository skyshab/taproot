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
wp.customize( 'footer--widgets-desktop--layout', function( value ) {
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
            id: 'footer--widgets-desktop--layout',
            selector: '.app-footer__widgets',
            styles: {
                'grid-template-columns': footerStyles
            },
            screen: 'desktop'
        });
    });
});


// Title Font Size
wp.customize( 'footer--widgets-desktop--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--title--font-size',
            value: to,
            screen: 'desktop',
        });
    });
});


// Title Line Height
wp.customize( 'footer--widgets-desktop--title--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--title--line-height',
            value: to,
            screen: 'desktop',
        });
    });
});


// Text Font Size
wp.customize( 'footer--widgets-desktop--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--font-size',
            value: to,
            screen: 'desktop',
        });
    });
});


// Text Line Height
wp.customize( 'footer--widgets-desktop--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--line-height',
            value: to,
            screen: 'desktop',
        });
    });
});


// Widgets Spacing
wp.customize( 'footer--widgets-desktop--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--gutter',
            value: to,
            screen: 'desktop',
        });
    });
});
