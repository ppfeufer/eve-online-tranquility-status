<?php

namespace WordPress\Plugin\EveOnlineTranquilityStatus\Singletons;

class DefaultSingleton {
	/**
	 * instance
	 *
	 * static variable to keep the current (and only!) instance of this class
	 *
	 * @var Singleton
	 */
	protected static $instances = null;

	 final public static function getInstance() {
		self::$instances = array();

		$calledClass = get_called_class();

		if(!isset(self::$instances[$calledClass])) {
			self::$instances[$calledClass] = new $calledClass();
		}

		return self::$instances[$calledClass];
	}

	/**
	 * clone
	 *
	 * no cloning allowed
	 */
	protected function __clone() {
		;
	}

	/**
	 * constructor
	 *
	 * no external instanciation allowed
	 */
	protected function __construct() {
		;
	}
}
