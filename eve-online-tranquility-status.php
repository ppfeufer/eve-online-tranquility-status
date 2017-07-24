<?php

/**
 * Plugin Name: EVE Online Tranquility Status for WordPress
 * Plugin URI: https://github.com/ppfeufer/eve-online-tranquility-status
 * Git URI: https://github.com/ppfeufer/eve-online-tranquility-status
 * Description: Show the EVE Online Tranquility Sever Status with a Shortcode
 * Version: 0.1-r20170723
 * Author: Rounon Dax
 * Author URI: http://yulaifederation.net
 * Text Domain: eve-online-tranquility-status
 * Domain Path: /l10n
 */

namespace WordPress\Plugin\EveOnlineTranquilityStatus;

// Include the autoloader so we can dynamically include the rest of the classes.
require_once(\trailingslashit(\dirname(__FILE__)) . 'inc/autoloader.php');

class EveOnlineTranquilityStatus {
	/**
	 * Plugin constructor
	 *
	 * @param boolean $init
	 */
	public function __construct() {
		;
	} // END public function __construct()

	/**
	 * Initialize the plugin
	 */
	public function init() {
//		// Loading CSS
		$cssLoader = new ResourceLoader\CssLoader();
		$cssLoader->init();

//		// Loading JavaScript
		$javascriptLoader = new ResourceLoader\JavascriptLoader;
		$javascriptLoader->init();

		$this->initShortcodes();
	} // END public function init()

	private function initShortcodes() {
		$shortcode = new Libs\Shortcode;
		$shortcode->init();
	}
}

/**
 * Start the show ....
 */
function initializePlugin() {
	$fittingManager = new EveOnlineTranquilityStatus;

	/**
	 * Initialize the plugin
	 *
	 * @todo https://premium.wpmudev.org/blog/activate-deactivate-uninstall-hooks/
	 */
	$fittingManager->init();
} // END function initializePlugin()

// Hook me up baby!
\add_action('plugins_loaded', 'WordPress\Plugin\EveOnlineTranquilityStatus\initializePlugin');

// Template function
function getTqStatus() {
	$tqStatus = new Libs\Shortcode;
	return $tqStatus->shortcodeEveTqStatus('', '');
}
