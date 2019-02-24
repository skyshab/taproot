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


// Max Content Width
wp.customize( 'layout--content--max-width', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'layout--content--max-width',
            value: to,
            screen: 'desktop'
        });
    });
});


// Content align
// wp.customize( 'layout--content--align', function( value ) {
//     value.bind( function( to ) {

//         if( 'left' === to ||  'right' === to ) {
//             var settingStyles = {};
//             settingStyles['margin-' + to] = '0px';
//         }
//         else {
//             var settingStyles = { margin: "0 auto" };
//         }

//         rootstrap.style({
//             id: 'layout--content--align',
//             selector: '.app-main',
//             styles: settingStyles,
//             screen: 'desktop',
//         });
//     });
// });
