<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\Helper;

\defined('ABSPATH') or die();

class PluginHelper {
	public static function getPluginPath($file = '') {
		return \trailingslashit(\WP_CONTENT_DIR) . 'plugins/eve-online-tranquility-status/' . $file;
	}

	public static function getPluginUri($file = '') {
		return \trailingslashit(\WP_CONTENT_URL) . 'plugins/eve-online-tranquility-status/' . $file;
	} // END public function getThemeCacheUri()
} // END class PluginHelper
