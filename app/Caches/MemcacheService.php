<?php

/**
 * Author: Dilani Maheswaran
 * Date: 07.04.2022
 */

namespace App\Caches;

use App\Services\CacheInterface;
use Exception;
use Memcache;

/**
 *
 * Class MemcacheService
 * Handles operations related to Memcache.
 * 
 */
class MemcacheService implements CacheInterface
{
	private Memcache $cache;
	private string $host;
	private string $port;
	
	function __construct()
	{
		// Parse the connection parameters from the config.ini file
		$ini = (parse_ini_file('./config.ini'));

		// Throw exception if connection parameters are not defined
		if(!isset($ini['memcache_host'])) throw new Exception("memcache_host not defined in config.ini file. ");
		if(!isset($ini['memcache_port'])) throw new Exception("memcache_port not defined in config.ini file. ");

		$this->cache = new Memcache();
		$this->host = $ini['memcache_host'];
		$this->port = $ini['memcache_port'];
	}

	/**
	 * Connect to memcache server
	 *
	 * @return bool
	 */
    public function connect() : bool
    {
        $connection = $this->cache->connect($this->host, $this->port);
        return $connection;
    }

    /**
     * Set a value in cache
     *
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null) : void
    {
        $this->cache->set($key,$value,$is_compressed,$ttl);
    }

    /**
     * Get a value from cache using key
     * 
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->cache->get($key);
    }
}