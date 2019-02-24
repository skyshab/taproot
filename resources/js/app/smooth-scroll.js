/**
 * Smooth Scroll script.
 *
 * This script adds functionality for smooth scrolling to on-page anchor links. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * Class to manage smooth scroll functionality
 */
class TaprootSmoothScroll {

    /**
     * Initiate class
     */
    constructor() {               
        this.scrollElems = document.querySelectorAll('a[href*=\\#]');
        this.duration = 1000;
        this.listeners();
    }


    /**
     * Run event listeners
     */     
    listeners() {
        const self = this;
        self.scrollElems.forEach( el => {   
            el.addEventListener('click', e => {
                const targetId = e.target.href.split('#')[1]; 
                const target = document.getElementById(targetId);
                if(!target) return;
                e.preventDefault();                
                self.scrollTo(target);
            })
        })
    }  


    /**
     * Smooth scroll page to the top of the element
     */  
    scrollTo(target) {
        const self = this;
        const startPosition = window.pageYOffset;
        const scrollTarget = target.getBoundingClientRect().top - self.getScrollOffset();
        let startTime = null;
        const scroll = currentTime => {
            if(startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            window.scrollTo( 0, self.ease(timeElapsed, startPosition, scrollTarget, self.duration) );
            if(timeElapsed < self.duration) requestAnimationFrame(scroll);
        }

        self.animation = requestAnimationFrame(scroll);
    }


    /**
     * Calculate scroll offset
     */
    getScrollOffset() {
        const html = document.querySelector('html');
        const header = document.querySelector('.app-header');
        const isFixedHeader = header.classList.contains('app-header--has-fixed'); 
        const hasAdminBar = document.querySelector('body').classList.contains('admin-bar');                

        // if admin bar, include admin bar height
        let offset = ( hasAdminBar ) ? html.offsetTop : 0; 

        // if fixed header, include header height
        if( isFixedHeader ) {
            offset = offset + header.offsetHeight;
        }

        return offset;
    }  


    /**
     * easing function
     * Uses easeInOutCubic
     */     
    ease(t, b, c, d) {
        t /= d/2;
        if (t < 1) return c/2*t*t*t + b;
        t -= 2;
        return c/2*(t*t*t + 2) + b;
    }


}


/**
 * Instantiate our class on document ready
 */
document.addEventListener("DOMContentLoaded", () => {
    const taprootSmoothScroll = new TaprootSmoothScroll(); 
});
