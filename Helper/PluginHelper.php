<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\Helper;

\defined('ABSPATH') or die();

class PluginHelper extends \WordPress\Plugin\EveOnlineTranquilityStatus\Singletons\AbstractSingleton {
	public function getPluginPath($file = '') {
		return \plugin_dir_path(dirname(__FILE__)) . $file;
	}

	public function getPluginUri($file = '') {
		return \plugins_url($file, dirname(__FILE__));
	} // END public function getThemeCacheUri()
} // END class PluginHelper
