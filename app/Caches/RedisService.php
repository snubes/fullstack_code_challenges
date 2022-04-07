<?php

/**
 * Author: Dilani Maheswaran
 * Date: 07.04.2022
 */

namespace App\Caches;

use App\Services\CacheInterface;
use App\Services\CacheListInterface;
use Exception;
use Redis;

/**
 * Class RedisService
 * Handles operations related to Memcache.
 */
class RedisService implements CacheInterface, CacheListInterface
{
	private Redis $cache;
	private string $host;
	private string $port;
	
	function __construct()
	{
        // Parse the connection parameters from the config.ini file
		$ini = (parse_ini_file('./config.ini'));

        // Throw exception if connection parameters are not defined
		if(!isset($ini['redis_host'])) throw new Exception("redis_host not defined in config.ini file. ");
		if(!isset($ini['redis_port'])) throw new Exception("redis_port not defined in config.ini file. ");

		$this->cache = new Redis();
		$this->host = $ini['redis_host'];
		$this->port = $ini['redis_port'];
	}

    /**
     * Connect to redis server
     *
     * @return bool
     */
    public function connect() : bool
    {
        try {

            $this->cache->connect($this->host, $this->port);
            return True; 

        } catch (Exception $e) {
            return False;
        }
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
        $this->cache->set($key,$value,$ttl);
    }

    /**
     * Append a value to the list
     * 
     * @param string $key
     * @param string $value
     */
    public function lPush(string $key, string $value) : void
    {
        $this->cache->lPush($key,$value);
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