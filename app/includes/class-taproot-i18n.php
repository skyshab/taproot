<?php
/**
 * Define the internationalization functionality.
 *
 * @package taproot
 * @since 0.8.0
 */

/**
 * Loads and defines the internationalization files to make theme ready for translation.
 *
 * @since 0.8.0
 */
class Taproot_i18n
{
	/**
	 * The domain specified for this theme.
	 * 
	 * @since 0.8.0
	 * @var string $domain - The domain identifier for this theme.
	 */
	private $domain;

	/**
	 * Load the theme text domain for translation.
	 *
	 * @since 0.8.0
	 */
	public function load_theme_textdomain()
	{
		load_theme_textdomain(
			$this->domain,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}

	/**
	 * Set the domain equal to that of the specified domain.
	 *
	 * @since 0.8.0
	 * 
	 * @param string $domain - The domain that represents the locale of this theme.
	 */
	public function set_domain( $domain )
	{
		$this->domain = $domain;
	}

} // end class Taproot_i18n
