<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\ResourceLoader;

class JavascriptLoader implements \WordPress\Plugin\EveOnlineTranquilityStatus\Interfaces\AssetsInterface {
	public function init() {
		\add_action('wp_enqueue_scripts', array($this, 'enqueue'), 99);
	}

	public function enqueue() {
		if(!\is_admin()) {
			\wp_enqueue_script('reconnecting-websocket-js', \WordPress\Plugin\EveOnlineTranquilityStatus\Helper\PluginHelper::getPluginUri('js/reconnecting-websocket.min.js'), array('jquery'), '', true);
			\wp_enqueue_script('eve-online-tranquility-status-js', \WordPress\Plugin\EveOnlineTranquilityStatus\Helper\PluginHelper::getPluginUri('js/eve-online-tranquility-status.min.js'), array('jquery'), '', true);
		}
	}
}
