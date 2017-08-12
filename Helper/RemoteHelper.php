<?php


namespace WordPress\Plugin\EveOnlineTranquilityStatus\Helper;

class RemoteHelper extends \WordPress\Plugin\EveOnlineTranquilityStatus\Singletons\AbstractSingleton {
	/**
	 * Getting data from a remote source
	 *
	 * @param string $url
	 * @param array $parameter
	 * @return mixed
	 */
	public function getRemoteData($url, array $parameter = array()) {
		$params = '';

		if(\count($parameter) > 0) {
			$params = '?' . \http_build_query($parameter);
		} // END if(\count($parameter > 0))

		$remoteUrl = $url . $params;

		$get = \wp_remote_get($remoteUrl);
		$data = \wp_remote_retrieve_body($get);

		return $data;
	} // END private function getRemoteData($url, array $parameter)
} // END class RemoteHelper extends \WordPress\Plugin\EveOnlineTranquilityStatus\Singletons\AbstractSingleton
