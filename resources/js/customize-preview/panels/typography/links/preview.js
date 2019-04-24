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


// Link Color
wp.customize( 'typography--links--color', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--links--color',
            value: to
        });
    });
});


// Link Color:visited
wp.customize( 'typography--links--color--visited', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--links--color--visited',
            value: to
        });
    });
});


// Link Color:hover
wp.customize( 'typography--links--color--hover', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--links--color--hover',
            value: to
        });
    });
});


// Link Color:active
wp.customize( 'typography--links--color--active', function( value ) {
    value.bind( function( to ) {
        rootstrap.var({
            name: 'typography--links--color--active',
            value: to
        });
    });
});


// Link Underline
wp.customize( 'typography--links--underline', function( value ) {
    value.bind( function( to ) {
        if( 'underline' === to ) {
            rootstrap.style({
                id: 'typography--links--underline',
                selector: 'a:link',
                styles: {
                    'text-decoration': 'underline'
                },
            });
        }
        else if( 'hover' === to ) {
            rootstrap.style({
                id: 'typography--links--underline',
                selector: 'a:link',
                styles: {
                    'text-decoration': 'none'
                },
            });
            rootstrap.style({
                id: 'typography--links--underline--hover',
                selector: 'a:hover, a:active',
                styles: {
                    'text-decoration': 'underline'
                },
            });
        }
        else {
            rootstrap.style({
                id: 'typography--links--underline',
                selector: 'a:link, a:hover',
                styles: {
                    'text-decoration': 'none'
                },
            });
        }
    });
});
