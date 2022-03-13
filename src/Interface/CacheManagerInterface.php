<?php

namespace CacheManager\Src\CHInterface;
/**
 *  interface CacheManager  as contract for cache implementing
 */
interface CacheManagerInterface{

	/**
 	*  connect to the host cache service
 	*/
	public function connect(): void;

	/**
 	*  get value by its key from cache service
 	*/
	public function get(string $key);

	/**
 	*  set instance of cache service
 	*/
	public function setInstance(): void;

	/**
 	*  set value by its key to cache service
 	*/
	public function set(string $key, string $value,  string $ttl = null): void;
}