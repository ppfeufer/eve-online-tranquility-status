<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\Libs;

class Shortcode {
	/**
	 * Constructor
	 */
	public function __construct() {
		;
	} // END public function __construct()

	public function init() {
		$this->registerShortcodes($this->getShortcodeArray());
	} // END public function __construct()

	/**
	 * getting the supported shortcodes
	 *
	 * @return array Array with all supported shortcodes
	 */
	private function getShortcodeArray() {
		$shortcodes = array(
			'eve-tq-status',
		);

		return $shortcodes;
	} // END private function getShortcodeArray()

	/**
	 * register all shortcodes
	 */
	public function registerShortcodes($shortcodes) {
		foreach($shortcodes as $shortcode) {
			\add_shortcode($shortcode, array($this, 'shortcode' . \WordPress\Plugin\BootstrapShortcodes\Helper\StringHelper::camelCase($shortcode, true)));
		} // END foreach($shortcodes as $shortcode)
	} // END public function registerShortcodes()

	public function shortcodeEveTqStatus($atts, $content = null) {
		return '<span class="tq-status"></span>';
	}
}
