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
			\add_shortcode($shortcode, array($this, 'shortcode' . \WordPress\Plugin\EveOnlineTranquilityStatus\Helper\StringHelper::getInstance()->camelCase($shortcode, true)));
		} // END foreach($shortcodes as $shortcode)
	} // END public function registerShortcodes()

	public function shortcodeEveTqStatus($atts, $content = null) {
		$serverStatus = \WordPress\Plugin\EveOnlineTranquilityStatus\Helper\ApiHelper::getInstance()->getEsiData('status/');

		return '<span class="tq-status">'. \number_format($serverStatus->players, 0, ',', '.') . ' ' . \__('Capsuleers online', 'eve-online-tranquility-status') . '</span>';
	} // END public function shortcodeEveTqStatus($atts, $content = null)
} // END class Shortcode
