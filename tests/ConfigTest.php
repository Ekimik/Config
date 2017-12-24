<?php

namespace Ekimik\Config\Tests;

use \Ekimik\Config\Config;

/**
 * @author Jan Jíša <j.jisa@seznam.cz>
 * @package Ekimik\Config
 */
class ConfigTest extends \PHPUnit_Framework_TestCase {

    /**
     * @covers Config
     */
    public function testConfig() {
	$params = [
	    'foo' => 123,
	    'bar' => 'foobar'
	];
	$config = new Config($params);
	$this->assertEquals(123, $config->foo);
	$this->assertEquals('foobar', $config->bar);

	try {
	    $config->foobar;
	    $this->fail('Expected exception');
	} catch (\LogicException $e) {
	    $this->assertEquals('Param \'foobar\' is not defined in config', $e->getMessage());
	}
    }

}
