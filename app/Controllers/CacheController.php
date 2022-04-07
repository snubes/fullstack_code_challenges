<?php

/**
 * Author: Dilani Maheswaran
 * Date: 07.04.2022
 */

namespace App\Controllers;

use App\Services\CacheInterface;
use BadMethodCallException;

/**
 * Class CacheController
 * A class that accepts cache service as injections. 
 * Calls the methods of the injected cache service. 
 */
class CacheController
{
	private CacheInterface $cache_service;
	
	function __construct(CacheInterface $cache_service)
	{
		$this->cache_service = $cache_service;
	}

	function __call($name, $arguments)
	{
		// If the method does not exist, raise BadMethodCallException exception.
        if(!method_exists($this->cache_service, $name)){
            throw new BadMethodCallException("Invalid method call {$name}.");
        }

        return call_user_func_array([$this->cache_service, $name], $arguments);
	}

	/**
	 * @return bool
	 */
	function connect() : bool
	{
		return $this->cache_service->connect();
	}

	/**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
	function setCacheValue(string $key, string $value, string $is_compressed=null, string $ttl=null)
	{
		$this->cache_service->set($key, $value, $is_compressed, $ttl);
	}

	/**
     * @param string $key
     * @return mixed
     */
	function getCacheValue(string $key)
	{
		$this->cache_service->get($key);	
	}
}