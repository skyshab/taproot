/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should
 * be filtered through this file and eventually saved back into the
 * `/dist/js/app.js` file.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


/**
 * Navigation Menu Interactions
 */
class NavMenus {

    /**
     * Initiate class
     */
    constructor() {
        this.html = document.querySelector('html');
        this.body = document.querySelector('body');
        this.app = document.querySelector('.app');
        this.header = document.querySelector('.app-header');
        this.isBoxedLayout = this.header.classList.contains('boxed-layout');
        this.hasAdminBar = this.body.classList.contains('admin-bar') ;
        this.scrollElems = document.querySelectorAll('.menu__item--current > a[href*=\\#]');

        this.slideWidth = 300;
        this.animation = null;
        this.startTime = null;

        this.dropdowns();
        this.toggles();
        this.listeners();
    }


    /**
     * Run event listeners
     */
    listeners() {
        const self = this;

        window.addEventListener('resize', () => {
            self.clear();
        });

        self.scrollElems.forEach( el => {
            el.addEventListener('click', e => {
                const targetId = e.target.href.split('#')[1];
                const target = document.getElementById(targetId);
                if ( ! target ) {
                    return;
                }
                e.preventDefault();

                const nav = e.target.closest('nav');
                const menu = e.target.closest('.menu__items');
                const toggle = nav.querySelector('.menu--toggle');
                const isSlideNav = nav.classList.contains('mobile-type-slide');
                const isOpen = menu.classList.contains('is-open');

                if ( isSlideNav && isOpen ) {
                    const slideSide = ( nav.classList.contains('menu--right') ) ? 'right' : 'left';
                    if ( 'left' === slideSide ) {
                        self.slideClosedLeft(menu, 500, () => {
                            toggle.classList.remove('is-open');
                            self.scrollTo(target);
                        });
                    } else {
                        self.slideClosedRight(menu, 500, () => {
                            toggle.classList.remove('is-open');
                            self.scrollTo(target);
                        });
                    }
                } else {
                    self.scrollTo(target);
                }
            });
        });
    }


    /**
     * Submenu Dropdowns
     */
    dropdowns() {
        const self = this;
        document.querySelectorAll('.dropdown-target').forEach( elem => {
            elem.addEventListener('click', e => {
                e.preventDefault();
                const   theTarget   = e.currentTarget,
                        parentItem  = theTarget.closest('.menu__item.has-children'),
                        subMenu     = parentItem.querySelector('.menu__sub-menu');

                // if we're already animating the submenu, don't run again
                if ( subMenu.classList.contains('is-animating') ) {
                    return;
                }

                parentItem.classList.toggle('is-open');
                theTarget.classList.toggle('is-open');

                if (parentItem.classList.contains('is-open')) {
                    self.slideOpen(subMenu, 500);
                } else {
                    self.slideClosed(subMenu, 500);
                }
            });
        });
    }


    /**
     * Menu Toggles
     */
    toggles() {
        const self = this;
        const togglesArray = document.querySelectorAll('.menu--toggle');
        const animationTime = 500;
        togglesArray.forEach( elem => {
            elem.addEventListener( 'click', e => {
                const toggle = e.currentTarget,
                      menu = toggle.nextElementSibling,
                      nav = toggle.closest('nav');

                // if we're already animating the menu, don't run again
                if ( menu.classList.contains('is-animating') ) {
                    return;
                }

                toggle.classList.toggle('is-open');

                if ( nav.classList.contains('mobile-type-dropdown-slide') ) {
                    if ( toggle.classList.contains('is-open') ) {
                        self.slideOpen( menu, animationTime );
                    } else {
                        self.slideClosed( menu, animationTime );
                    }
                } else if ( nav.classList.contains('mobile-type-dropdown-fade') ) {
                    if ( toggle.classList.contains('is-open') ) {
                        self.fadeIn( menu, animationTime );
                    } else {
                        self.fadeOut( menu, animationTime );
                    }
                } else if ( nav.classList.contains('mobile-type-slide') ) {
                    const slideSide = ( nav.classList.contains('menu--right') ) ? 'right' : 'left';

                    if ( toggle.classList.contains('is-open') ) {
                        if ( 'left' === slideSide ) {
                            self.slideOpenLeft(menu, animationTime);
                        } else {
                            self.slideOpenRight(menu, animationTime);
                        }
                    } else {
                        if ( 'left' === slideSide ) {
                            self.slideClosedLeft(menu, animationTime);
                        } else {
                            self.slideClosedRight(menu, animationTime);
                        }
                    }
                } else if ( nav.classList.contains('mobile-type-fullscreen') ) {
                    if ( toggle.classList.contains('is-open') ) {
                        self.fadeIn( menu, animationTime );
                    } else {
                        self.fadeOut( menu, animationTime );
                    }
                }
            });
        });
    }


    /**
     * Slide element open
     */
    slideOpen( el, duration ) {
        const self = this;
        const height = self.getHeight(el);
        let startTime = null;

        el.style.height = '0px';
        el.classList.add('is-open');
        el.classList.add('is-animating');

        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;

            // add next animation style
            el.style.height = self.ease(timeElapsed, 0, height, duration) + 'px';

            // if we're still in the timeframe of the animation, call it again
            // otherwise, remove animating flag
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else  {
                el.style.height = '';
                el.classList.remove('is-animating');
            }
        };

        self.animation = requestAnimationFrame(slide);
    }


    /**
     * Slide element closed
     */
    slideClosed( el, duration ) {
        const self = this;
        const startHeight = el.scrollHeight;
        let startTime = null;

        el.classList.add('is-animating');

        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;

            // add next animation style
            el.style.height = self.ease(timeElapsed, startHeight, ( -1 * startHeight ), duration) + 'px';

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before leaving
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else {
                el.classList.remove('is-open');
                el.style.height = '';
                el.classList.remove('is-animating');
            }
        };

        self.animation = requestAnimationFrame(slide);
    }


    /**
     * Fade element in
     */
    fadeIn(el, duration) {
        const self = this;
        let startTime = null;

        self.body.classList.add('noscroll');
        el.classList.add('is-animating');
        el.classList.add('is-open');
        el.style.opacity = '0';

        const fade = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;

            // add next animation style
            el.style.opacity = self.ease(timeElapsed, 0, 1, duration);

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before leaving
            if (timeElapsed < duration) {
                requestAnimationFrame(fade);
            } else {
                el.style.opacity = '';
                el.classList.remove('is-animating');
            }
        };

        self.animation = requestAnimationFrame(fade);
    }


    /**
     * Fade element out
     */
    fadeOut(el, duration) {
        const self = this;
        let startTime = null;

        // add animating flag
        el.classList.add('is-animating');

        const fade = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;

            // add the next animation style
            el.style.opacity = self.ease(timeElapsed, 1, -1, duration);

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before leaving
            if (timeElapsed < duration) {
                requestAnimationFrame(fade);
            } else {
                el.classList.remove('is-open');
                el.style.opacity = '';
                self.body.classList.remove('noscroll');
                el.classList.remove('is-animating');
            }
        };

        self.animation = requestAnimationFrame(fade);
    }


    /**
     * Slide open left
     */
    slideOpenLeft(el, duration) {
        const self = this;
        let startTime = null;
        const topSpace = self.app.getBoundingClientRect().top - self.body.getBoundingClientRect().top;
        const maxHeight = self.app.offsetHeight + self.app.getBoundingClientRect().top - self.adminBarOffset();

        self.body.classList.add('noscroll');
        el.classList.add('is-animating');

        if (maxHeight <= window.innerHeight) {
            el.style.maxHeight = maxHeight + 'px';
        } else {
            el.style.maxHeight = window.innerHeight - self.adminBarOffset() + 'px';
        }

        el.style.top = (window.scrollY > topSpace) ? window.scrollY - topSpace + 'px' : '0px';
        self.app.style.transform = 'translateZ(0)';
        el.classList.add('is-open');

        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const currentDistance = self.ease(timeElapsed, 0, self.slideWidth, duration);

            if (currentDistance <= self.slideWidth) {
                el.style.transform = 'translateX(-' + currentDistance + 'px)';
                self.app.style.transform = 'translateX(' + currentDistance + 'px)';
            } else {
                el.style.transform = 'translateX(-' + self.slideWidth + 'px)';
                self.app.style.transform = 'translateX(' + self.slideWidth + 'px)';
            }

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before leaving
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else {
                el.classList.remove('is-animating');
            }
        };

        self.animation = requestAnimationFrame(slide);
    }


    /**
     * Slide closed left
     */
    slideClosedLeft(el, duration, callback = {} ) {
        const self = this;
        let startTime = null;
        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const currentDistance = self.ease(timeElapsed, self.slideWidth, (-1 * self.slideWidth), duration);

            // add animating flag
            el.classList.add('is-animating');

            if ( 0 <= currentDistance ) {
                el.style.transform = 'translateX(-' + currentDistance + 'px)';
                self.app.style.transform = 'translateX(' + currentDistance + 'px)';
            } else {
                el.style.transform = 'translateX(0)';
                self.app.style.transform = 'translateX(0)';
            }

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before leaving
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else {
                el.style.top = '';
                el.style.maxHeight = '';
                self.app.style.transform = '';
                el.classList.remove('is-open');
                self.body.classList.remove('noscroll');
                el.classList.remove('is-animating');

                // Run callback if it is a function
                if ('function' === typeof callback) {
                    callback();
                }
            }
        };

        self.animation = requestAnimationFrame(slide);
    }


    /**
     * Slide open right
     */
    slideOpenRight(el, duration) {
        const self = this;
        let startTime = null;
        const topSpace = self.app.getBoundingClientRect().top - self.body.getBoundingClientRect().top;
        const maxHeight = self.app.offsetHeight + self.app.getBoundingClientRect().top - self.adminBarOffset();

        self.body.classList.add('noscroll');
        el.classList.add('is-animating');

        if (maxHeight <= window.innerHeight) {
            el.style.maxHeight = maxHeight + 'px';
        } else {
            el.style.maxHeight = window.innerHeight - self.adminBarOffset() + 'px';
        }

        el.style.top = (window.scrollY > topSpace) ? window.scrollY - topSpace + 'px' : '0px';
        self.app.style.transform = 'translateZ(0)';
        el.classList.add('is-open');

        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const currentDistance = self.ease(timeElapsed, 0, self.slideWidth, duration);

            if (currentDistance <= self.slideWidth) {
                el.style.transform = 'translateX(' + currentDistance + 'px)';
                self.app.style.transform = 'translateX(-' + currentDistance + 'px)';
            } else {
                el.style.transform = 'translateX(' + self.slideWidth + 'px)';
                self.app.style.transform = 'translateX(-' + self.slideWidth + 'px)';
            }

            // if we're still in the timeframe of the animation, call it again
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else {
                el.classList.remove('is-animating');
            }
        };

        self.animation = requestAnimationFrame(slide);
    }


    /**
     * Slide closed right
     */
    slideClosedRight(el, duration, callback = {} ) {
        const self = this;
        let startTime = null;
        const slide = currentTime => {
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const currentDistance = self.ease(timeElapsed, self.slideWidth, (-1 * self.slideWidth), duration);

            // add animating flag
            el.classList.add('is-animating');

            if ( 0 <= currentDistance ) {
                el.style.transform = 'translateX(' + currentDistance + 'px)';
                self.app.style.transform = 'translateX(-' + currentDistance + 'px)';
            } else {
                el.style.transform = 'translateX(0)';
                self.app.style.transform = 'translateX(0)';
            }

            // if we're still in the timeframe of the animation, call it again
            // otherwise, clean up before leaving
            if (timeElapsed < duration) {
                requestAnimationFrame(slide);
            } else {
                el.style.top = '';
                el.style.maxHeight = '';
                self.app.style.transform = '';
                self.body.classList.remove('noscroll');
                el.classList.remove('is-open');
                el.classList.remove('is-animating');

                // Run callback if is a function
                if ( 'function' === typeof callback ) {
                    callback();
                }
            }
        };

        self.animation = requestAnimationFrame(slide);
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
            if (null === startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            window.scrollTo( 0, self.ease(timeElapsed, startPosition, scrollTarget, 1000) );
            if (1000 > timeElapsed) {
                requestAnimationFrame(scroll);
            }
        };

        self.animation = requestAnimationFrame(scroll);
    }


    /**
     * Calculate scroll offset
     */
    getScrollOffset() {
        const isFixedHeader = this.header.classList.contains('app-header--has-fixed');

        // if admin bar, include admin bar height
        let offset = ( this.hasAdminBar ) ? this.html.offsetTop : 0;

        // if fixed header, include header height
        if ( isFixedHeader && 1025 <= window.innerWidth ) {
            offset = offset + this.header.offsetHeight;
        }

        return offset;
    }


    /**
     * easing function
     * Uses easeInOutCubic
     */
    ease(t, b, c, d) {
        t /= d / 2;
        if (1 > t) {
            return c / 2 * t * t * t + b;
        }
        t -= 2;
        return c / 2 * (t * t * t + 2) + b;
    }


    /**
     * get element height
     */
    getHeight(el) {
        el.style.display = 'flex';
        const height = el.scrollHeight;
        el.style.display = '';
        return height;
    }


    /**
     * Calculate admin bar height
     */
    adminBarOffset() {
        return ( this.hasAdminBar ) ? this.html.offsetTop : 0;
    }


    /**
     * Clear animation styles and classes
     */
    clear() {
        document.querySelectorAll('.is-open').forEach( el => {
            el.classList.remove('is-open');
        });
        document.querySelectorAll('.menu__items').forEach( el => {
            el.style.transform = '';
        });
        this.app.style.transform = '';
        this.body.classList.remove('noscroll');
    }
}


/**
 * Instantiate our class to handle nav menus on document ready
 */
document.addEventListener('DOMContentLoaded', () => {
    const navMenus = new NavMenus();
});
