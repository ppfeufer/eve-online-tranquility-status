<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\ResourceLoader;

class CssLoader implements \WordPress\Plugin\EveOnlineTranquilityStatus\Interfaces\AssetsInterface {
	public function init() {
		\add_action('wp_enqueue_scripts', array($this, 'enqueue'), 99);
	} // END public function init()

	public function enqueue() {
		if(!\is_admin()) {
			\wp_enqueue_style('eve-online-tranquility-status', \WordPress\Plugin\EveOnlineTranquilityStatus\Helper\PluginHelper::getInstance()->getPluginUri('css/eve-online-tranquility-status.min.css'));
		} // END if(!\is_admin())
	} // END public function enqueue()
} // END class CssLoader implements \WordPress\Plugin\EveOnlineTranquilityStatus\Interfaces\AssetsInterface
