<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\ResourceLoader;

class JavascriptLoader implements \WordPress\Plugin\EveOnlineTranquilityStatus\Interfaces\AssetsInterface {
	public function init() {
		\add_action('wp_enqueue_scripts', array($this, 'enqueue'), 99);
	} // END public function init()

	public function enqueue() {
		if(!\is_admin()) {
			\wp_enqueue_script('reconnecting-websocket-js', \WordPress\Plugin\EveOnlineTranquilityStatus\Helper\PluginHelper::getInstance()->getPluginUri('js/reconnecting-websocket.min.js'), array('jquery'), '', true);
			\wp_enqueue_script('eve-online-tranquility-status-js', \WordPress\Plugin\EveOnlineTranquilityStatus\Helper\PluginHelper::getInstance()->getPluginUri('js/eve-online-tranquility-status.min.js'), array('jquery'), '', true);
			\wp_localize_script('eve-online-tranquility-status-js', 'tqStatusL10n', $this->getJavaScriptTranslations());
		} // END if(!\is_admin())
	} // END public function enqueue()

	/**
	 * Translations for javascript
	 *
	 * @return array
	 */
	public function getJavaScriptTranslations() {
		return [
			'online' => \__('Capsuleers online', 'eve-online-tranquility-status')
		];
	} // END public function getJavaScriptTranslations()
} // END class JavascriptLoader implements \WordPress\Plugin\EveOnlineTranquilityStatus\Interfaces\AssetsInterface
