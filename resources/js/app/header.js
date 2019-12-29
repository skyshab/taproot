/**
 * Fixed header script.
 *
 * This file handles the front end fixed header functionality.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * Fixed Header Class
 */
class TaprootHeader {

    /**
     * Initiate class
     */
    constructor() {
        this.html = document.querySelector('html');
        this.body = document.querySelector('body');
        this.app = document.querySelector('.app');
        this.header = document.querySelector('.app-header');
        this.hasAdminBar = this.body.classList.contains('admin-bar');
        this.hasCustomHeader = this.body.classList.contains('custom-header');
        this.windowHeight = window.innerHeight;
        this.scrolledVal = 0;
        this.fixedHeaderType = false;
        this.fixedOffset = 600;

        // set fixed header type
        if ( this.header.classList.contains('fixed-type--fade') ) {
            this.fixedHeaderType = 'fade';
        } else if (this.header.classList.contains('fixed-type--slide') ) {
            this.fixedHeaderType = 'slide';
        } else if (this.header.classList.contains('fixed-type--sticky') ) {
            this.fixedHeaderType = 'sticky';
        }

        // if fixed header is set, add event listeners
        if ( this.fixedHeaderType ) {
            this.listeners();
        }
    }

    /**
     * Add listeners
     */
    listeners() {
        window.addEventListener('scroll', () => {
            this.headerCheck();
        }, { passive: true });

        window.addEventListener('load', () => {
            this.headerCheck();
        });

        window.addEventListener('resize', () => {
            this.windowHeight = window.innerHeight;
            this.headerCheck();
        });
    }


    /**
     *  Run check on header to see if it needs to be fixed/unfixed
     */
    headerCheck() {

        // store the distance scrolled from top
        var scrolled = window.pageYOffset | document.body.scrollTop;

        // if screen is not wide enough, unfix and bail
        if ( 1025 > this.body.offsetWidth ) {
            if ( this.header.classList.contains('app-header--fixed') ) {
                this.unFixTheHeader();
            }
            return;
        }

        // if we're already animating the header, don't run again
        if ( this.header.classList.contains('is-animating') ) {
            return;
        }

        // fix the header if scrolled far enough

        // if page has custom header
        if ( this.hasCustomHeader ) {

            if ( this.header.classList.contains('app-header--static') ) {
                if ( scrolled > window.innerHeight + this.fixedOffset ) {
                    this.fixTheHeader();
                }
            } else if ( this.header.classList.contains('app-header--fixed') ) {
                if ( scrolled <= window.innerHeight + this.fixedOffset ) {
                    this.unFixTheHeader();
                }
            }
        } else if ( this.app.getBoundingClientRect().top < (-1 * (this.header.offsetHeight + this.fixedOffset) ) ) {
            if ( this.header.classList.contains('app-header--static') ) {
                this.fixTheHeader();
            }
        } else if ( this.header.classList.contains('app-header--fixed') ) {
            this.unFixTheHeader();
        }

        // store the value for next run to check direction
        this.scrolledVal = (0 >= scrolled ) ? 0 : scrolled;
    }

    /**
     *  Fix the header
     */
    fixTheHeader() {
        if ( 1025 > this.body.offsetWidth ) {
            return;
        }

        if ( 'slide' === this.fixedHeaderType ) {
            this.slideInDown();
        } else if ( 'fade' === this.fixedHeaderType ) {
            this.fadeIn();
        } else if ( 'sticky' === this.fixedHeaderType ) {
            this.header.classList.add('app-header--fixed');
            this.header.classList.remove('app-header--static');
        }
    }


    /**
     *  Unfix the header
     */
    unFixTheHeader() {
        if ( 'slide' === this.fixedHeaderType ) {
            this.slideUpOut();
        } else if ( 'fade' === this.fixedHeaderType ) {
            this.fadeOut();
        } else {
            this.header.classList.remove('app-header--fixed');
            this.header.classList.add('app-header--static');
        }
    }


    /**
     * Slide Header in from top
     */
    slideInDown() {
        const self = this;
        const duration = 400;
        let startTime = null;

        self.header.classList.add( 'is-animating' );
        self.app.style.paddingTop = self.header.offsetHeight + 'px';

        // add header classes
        self.header.classList.add( 'app-header--fixed' );
        self.header.classList.remove( 'app-header--static' );

        // get the header height
        const distance = self.header.offsetHeight;
        const startPosition = (-1 * distance);

        // setup styles
        self.header.style.transform = 'translateY(' + startPosition + 'px)';
        self.header.style.top = this.adminBarOffset() + 'px';

        // our animation function
        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const currentDistance = self.ease(timeElapsed, startPosition, distance, duration);

            // make sure we don't overshoot our target
            if (0 >= currentDistance) {
                self.header.style.transform = 'translateY(' + currentDistance + 'px)';
            } else {
                self.header.style.transform = 'translateY(0px)';
            }

            // if we're still in the timeframe of the animation, call it again
            // otherwise, remove animating flag
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else {
                self.header.classList.remove( 'is-animating' );
                self.header.style.transform = '';

                // Doublecheck to make sure nothing changed while the animation was running
                // This prevents the header getting stuck as "fixed" if scrolling back up to
                // the top of the screen during the animation.
                self.headerCheck();
            }
        };

        // initiate animation
        self.animation = requestAnimationFrame(slide);
    }


    /**
     * Slide header out
     */
    slideUpOut() {
        const self = this;
        const duration = 300;
        const distance = self.header.offsetHeight + 25; // adding a bit extra here fixes an issue in Safari
        const change = (-1 * distance);
        const appContent = document.querySelector('.app-content');
        let startTime = null;

        // add flag to prevent animation from being retriggered while running
        self.header.classList.add( 'is-animating' );

        // our animation function
        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const currentDistance = self.ease(timeElapsed, 0, change, duration);

            // define actions to perform when clearing animation
            const clear = () => {
                self.header.style.transform = '';
                self.header.style.top = '';
                self.app.style.paddingTop = '';
                self.header.classList.remove( 'app-header--fixed' );
                self.header.classList.add( 'app-header--static' );
                self.header.classList.remove( 'is-animating' );
            };

            // if we've scrolled to where the header should be,
            // clean up and stop the animation
            if ( appContent.getBoundingClientRect().top >= self.adminBarOffset() ) {
                clear();
                cancelAnimationFrame(self.animation);
                return;
            }

            // add the next animation style
            self.header.style.transform = 'translateY(' + currentDistance + 'px)';

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before we leave
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else {
                clear();
            }
        };

        // initiate animation
        self.animation = requestAnimationFrame(slide);
    }


    /**
     * Fade Header in
     */
    fadeIn() {
        const self = this;
        const duration = 400;
        let startTime = null;
        const unfixedHeight = self.header.offsetHeight + 'px';

        // set the padding on the app and handle classes
        self.header.classList.add( 'is-animating' );
        self.header.style.opacity = '0';
        self.header.style.top = this.adminBarOffset() + 'px';
        self.header.classList.remove( 'app-header--static' );
        self.header.classList.add( 'app-header--fixed' );
        self.app.style.paddingTop = unfixedHeight;

        // our animation function
        const fade = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;

            // add the next animation style
            self.header.style.opacity = self.ease(timeElapsed, 0, 1, duration);

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before we leave
            if (timeElapsed <= duration) {
                requestAnimationFrame(fade);
            } else {
                self.header.style.opacity = '';
                self.header.classList.remove( 'is-animating' );

                // Doublecheck to make sure nothing changed while the animation was running
                // This prevents the header getting stuck as 'fixed' if scrolling back up to
                // the top of the screen during the animation.
                self.headerCheck();
            }
        };

        // initiate animation
        self.animation = requestAnimationFrame(fade);
    }


    /**
     * Fade header out
     */
    fadeOut() {
        const self = this;
        const duration = 300;
        const appContent = document.querySelector('.app-content');
        let startTime = null;

        // set animating flag
        self.header.classList.add( 'is-animating' );

        // our animation function
        const fade = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const contentTop = appContent.getBoundingClientRect().top;

            // define actions to perform when clearing animation
            const clear = () => {
                self.app.style.paddingTop = '';
                self.header.classList.add( 'app-header--static' );
                self.header.classList.remove( 'app-header--fixed' );
                self.header.style.top = '';
                self.header.style.opacity = '';
                self.header.classList.remove( 'is-animating' );
            };

            // if we've scrolled to where the header should be,
            // clean up and stop the animation
            if ( contentTop >= self.adminBarOffset() ) {
                clear();
                cancelAnimationFrame(self.animation);
                return;
            }

            // add the next animation style
            self.header.style.opacity = self.ease(timeElapsed, 1, -1, duration);

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before we leave
            if (timeElapsed < duration) {
                requestAnimationFrame(fade);
            } else {
                clear();
            }
        };

        // initiate animation
        self.animation = requestAnimationFrame(fade);
    }


    /**
     * Easing function.
     * "sinusoidal ease in out"
     */
    ease(t, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
    }


    /**
     * Calculate admin bar height if set
     */
    adminBarOffset() {
        return ( this.hasAdminBar ) ? this.html.offsetTop : 0;
    }
}


/**
 *  Instantiate our class on document ready
 */
document.addEventListener('DOMContentLoaded', () => {
    const taprootHeader = new TaprootHeader();
});
