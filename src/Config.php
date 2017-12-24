<?php

namespace Ekimik\Config;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Config
 */
class Config {

    protected $params = [];

    /**
     * @param array $params
     * @throws \LogicException
     */
    public function __construct(array $params) {
	foreach ($params as $paramName => $paramValue) {
	    $this->params[$paramName] = $paramValue;
	}
    }

    public function __get($name) {
	if (!key_exists($name, $this->params)) {
	    throw new \LogicException("Param '{$name}' is not defined in config");
	}

	return $this->params[$name];
    }

}
