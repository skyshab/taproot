<?php
/**
 * WP and PHP compatibility.
 *
 * Functionality for when the environment doesn't meet the minimum required WP or PHP versions.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

/**
 * Switches to the previously active theme after the theme has been activated.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $old Previous theme name/slug.
 * @return void
 */
add_action( 'after_switch_theme', function( $old ) {

    switch_theme( $old ? $old : WP_DEFAULT_THEME );
    unset( $_GET['activated'] );

    add_action( 'admin_notices', function() {
        printf( '<div class="error"><p>%s</p></div>', esc_html( taproot_compatability_message() ) );
    });
});

/**
 * Kills the loading of the customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'load-customize.php', function() {
    wp_die( esc_html( taproot_compatability_message() ), '', ['back_link' => true] );
});

/**
 * Kills the customizer previewer on installs prior to WP 4.7.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'template_redirect',  function() {
    if ( isset( $_GET['preview'] ) ) { // WPCS: CSRF ok.
        wp_die( esc_html( taproot_compatability_message() ) );
    }
});

/**
 * Returns the compatibility message.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function taproot_compatability_message() {

    if ( version_compare( $GLOBALS['wp_version'], '5.4.0', '<' ) ) {

        return sprintf(
            // Translators: 1 is the required WordPress version and 2 is the user's current version.
            __( 'Taproot requires at least WordPress version %1$s. You are running version %2$s. Please upgrade and try again.', 'taproot' ),
            '5.4.0',
            $GLOBALS['wp_version']
        );

    } elseif ( version_compare( PHP_VERSION, '7.0', '<' ) ) {

        return sprintf(
            // Translators: 1 is the required PHP version and 2 is the user's current version.
            __( 'Taproot requires at least PHP version %1$s. You are running version %2$s. Please upgrade and try again.', 'taproot' ),
            '7.0',
            PHP_VERSION
        );
    }

    return '';
}
