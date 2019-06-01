/**
 * Scripts for working with customizer preview actions
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


/**
 * Class for adding styles
 */
class Styles {

    constructor( data ) {
        if ( !data.id || !data.selector ) return false;
        this.screen = data.screen;
        this.id = ( this.screen ) ? `${data.id}--${data.screen}` : data.id;
        this.selector = data.selector;
        this.styles = data.styles;
        this.insertStyleblock();
    }

    insertStyleblock() {
        const oldBlock = document.getElementById( this.id );

        if( oldBlock ) {
            oldBlock.innerHTML = this.getStyleBlockContent();
        }
        else {
            document.head.insertBefore( this.getStyleBlock(), this.getHook() );
        }
    }

    openQuery() {
        if( !this.screen ) return '';
        const screens = parent.rootstrapData.screens;
        const screen = screens[this.screen];
        var query = '';

        if( screen.min || screen.max ) {
            query += '@media ';

            if( screen.min ) {
                query += `(min-width: ${screen.min})`;
                if( screen.max ) {
                    query += ' and ';
                }
            }

            if( screen.max ) {
                query += `(max-width: ${screen.max})`;
            }

            query += '{';
        }

        return query;
    }

    getStyles() {
        var styles = this.selector + '{';
        for (const [property, value] of Object.entries(this.styles) ) {
            if( !property || !value ) continue;
            styles += `${property}: ${value};`;
        }
        styles += '}';

        return styles;
    }

    closeQuery() {
        return ( this.screen ) ? '}' : '';
    }

    getStyleBlockContent() {
        return this.openQuery() + this.getStyles() + this.closeQuery();
    }

    getStyleBlock() {
        const styleblock = document.createElement("style");
        styleblock.setAttribute("id", this.id);
        styleblock.textContent = this.getStyleBlockContent();
        return styleblock;
    }

    getHook() {
        var screen = (this.screen) ? this.screen : 'default';
        return document.getElementById( "rootstrap-style-hook--" + screen );
    }
}


/**
 * Class for adding CSS custom properties
 */
class CustomProperty {

    constructor( data ) {
        if ( !data.name ) return false;
        this.screen = data.screen;
        this.name = data.name;
        this.id = ( this.screen ) ? `${data.name}--${data.screen}` : data.name;
        if(data.value && '' !== data.value) {
            this.value = data.value;
            this.insertStyleblock();
        } else {
            this.removeStyleblock();
        }
    }

    insertStyleblock() {
        const oldBlock = document.getElementById( this.id );

        if( oldBlock ) {
            oldBlock.innerHTML = this.getStyleBlockContent();
        }
        else {
            document.head.insertBefore( this.getStyleBlock(), this.getHook() );
        }
    }

    removeStyleblock() {
        const styleBlock = document.getElementById( this.id );

        if( styleBlock ) {
            styleBlock.remove();
        }
    }

    openQuery() {
        if( !this.screen ) return '';
        const screens = parent.rootstrapData.screens;
        const screen = screens[this.screen];
        var query = '';

        if( screen.min || screen.max ) {
            query += '@media ';

            if( screen.min ) {
                query += `(min-width: ${screen.min})`;
                if( screen.max ) {
                    query += ' and ';
                }
            }

            if( screen.max ) {
                query += `(max-width: ${screen.max})`;
            }

            query += '{';
        }

        return query;
    }

    getStyles() {
        if( !this.name || !this.value ) return '';
        var output = ':root {';
        output += `--${this.name}: ${this.value};`;
        output += '}';
        return output;
    }

    closeQuery() {
        return ( this.screen && 'default' !== this.screen ) ? '}' : '';
    }

    getStyleBlockContent() {
        return this.openQuery() + this.getStyles() + this.closeQuery();
    }

    getStyleBlock() {
        const styleblock = document.createElement("style");
        styleblock.setAttribute("id", this.id);
        styleblock.textContent = this.getStyleBlockContent();
        return styleblock;
    }

    getHook() {
        var screen = (this.screen) ? this.screen : 'default';
        return document.getElementById( "rootstrap-style-hook--" + screen );
    }
}


/**
 * Object for interfacing with rootstrap
 */
const rootstrap = {
    screens : () => {
        return Object.entries( parent.rootstrapData.screens );
    },
    style : (data) => {
        const style = new Styles( data );
    },
    var : (data) => {
        const customProperty = new CustomProperty( data );
    }
};
