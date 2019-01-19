/**
 * Customize controls preview scripts. 
 *
 * This file binds javascript actions to cutomize controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 */


// Default Color
wp.customize( 'footer--widgets-mobile--layout', function( value ) {
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
            id: 'footer--widgets-mobile--layout',
            selector: '.app-footer__widgets',
            styles:  {
                'grid-template-columns': footerStyles
            },
            screen: 'default'
        });
    });
});


// Title Font Size
wp.customize( 'footer--widgets-mobile--title--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--title--font-size',
            value: to,
            screen: 'default',            
        });
    });
});


// Title Line Height
wp.customize( 'footer--widgets-mobile--title--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--title--line-height',
            value: to,
            screen: 'default',            
        });
    });
});


// Text Font Size
wp.customize( 'footer--widgets-mobile--font-size', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--font-size',
            value: to,
            screen: 'default',            
        });
    });
});


// Text Line Height
wp.customize( 'footer--widgets-mobile--line-height', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--line-height',
            value: to,
            screen: 'default',            
        });
    });
});


// Widgets Spacing
wp.customize( 'footer--widgets-mobile--gutter', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'footer--widgets--gutter',
            value: to,
            screen: 'default',            
        });
    });
});
