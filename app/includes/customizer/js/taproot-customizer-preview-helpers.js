/** 
 * Utility functions to use in customizer js.
 */

    // build font style from our font style control values
    var taprootFontStyles = function( value ) {
		var font_styles = value.split( '|' ),
			style = '',
            $ = jQuery.noConflict();

		if( $.inArray( 'bold', font_styles ) >= 0 ) {
			style += "font-weight: bold;";
		} else {
			style += "font-weight: inherit;";
		}

		if( $.inArray( 'italic', font_styles ) >= 0 ) {
			style += "font-style: italic;";
		} else {
			style += "font-style: inherit;";
		}

		if( $.inArray( 'uppercase', font_styles ) >= 0 ) {
			style += "text-transform: uppercase;";
		} else if( $.inArray( 'capitalize', font_styles ) >= 0 ) {
			style += "text-transform: capitalize;";
		} else {
			style += "text-transform: inherit;";
		}

		return style;
	};

    // calculate new heading font sizes when base changes. 
    var taprootHeadingStyles = function( base, sidebar = false ) {

        var styles = '';

        if( !sidebar ) {
            styles += 'h1 { font-size: ' + base + 'em; }';
            styles += 'h2 { font-size: ' + (base * .86) + 'em; }';
            styles += 'h3 { font-size: ' + (base * .73) + 'em; }';
            styles += 'h4 { font-size: ' + (base * .60) + 'em; }';
            styles += 'h5 { font-size: ' + (base * .53) + 'em; }';
            styles += 'h6 { font-size: ' + (base * .47) + 'em; }';
        } else {
            styles += '.sidebar + main h1, .sidebar h1 { font-size: ' + base + 'em; }';
            styles += '.sidebar + main h2, .sidebar h2 { font-size: ' + (base * .86) + 'em; }';
            styles += '.sidebar + main h3, .sidebar h3 { font-size: ' + (base * .73) + 'em; }';
            styles += '.sidebar + main h4, .sidebar h4 { font-size: ' + (base * .60) + 'em; }';
            styles += '.sidebar + main h5, .sidebar h5 { font-size: ' + (base * .53) + 'em; }';
            styles += '.sidebar + main h6, .sidebar h6 { font-size: ' + (base * .47) + 'em; }';
        }

        return styles;
    };

    // get screen from 'bp code' and return screen name for either mobile or desktop
    var getScreenFromBp = function( bp = 'bp-t', mobile = true ) {

        bp = bp.replace( '-', '.' );
        var screens = {};

        if( mobile ) {
            screens = {
                "bp.none" : false,
                "bp.m" : "mobile",
                "bp.ml" : "mobile-landscape-and-under",
                "bp.t" : "tablet-and-under",
                "bp.l" : "laptop-and-under",
                "bp.always" : "default"
            };
        } else {
            screens = {
                "bp.none" : "default",
                "bp.m" : "mobile-landscape-and-up",
                "bp.ml" : "tablet-and-up",
                "bp.t" : "laptop-and-up",
                "bp.l" : "desktop",
                "bp.always" : false
            };
        }

        return ( screens[bp] ) ? screens[bp] : false;
    };
