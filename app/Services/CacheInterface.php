<?php

/**
 * Author: Dilani Maheswaran
 * Date: 07.04.2022
 */

namespace App\Services;

/**
 * Interface CacheInterface
 * Provides method signatures to perform basic cache operations. 
 */
interface CacheInterface
{
	/**
     * Connect to redis server
     *
	 * @return bool
	 */
	public function connect() : bool;

    /**
     * Set a value in cache
     *
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
	public function set(string $key, string $value, string $is_compressed=null, string $ttl=null) : void;

	/**
     * Get a value from cache using key
     * 
     * @param string $key
     * @return mixed
     */
	public function get(string $key);

}
?>