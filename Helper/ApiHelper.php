<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\Helper;

class ApiHelper extends \WordPress\Plugin\EveOnlineTranquilityStatus\Singletons\AbstractSingleton {
	/**
	 * ESI URL
	 *
	 * @var string
	 */
	private $esiUrl = null;

	/**
	 * The Constructor
	 */
	protected function __construct() {
		parent::__construct();

		$this->esiUrl = 'https://esi.evetech.net/latest/';
	} // END protected function __construct()

	/**
	 * Getting data from the ESI
	 *
	 * @param string $route
	 * @return object
	 */
	public function getEsiData($route) {
		$returnValue = null;
		$data = RemoteHelper::getInstance()->getRemoteData($this->esiUrl . $route);

		if(!empty($data)) {
			$returnValue = \json_decode($data);
		} // END if(!empty($data))

		return $returnValue;
	} // END private function getEsiData($route)
} // END class ApiHelper extends \WordPress\Plugin\EveOnlineTranquilityStatus\Singletons\AbstractSingleton
