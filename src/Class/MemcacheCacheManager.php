<?php

namespace CacheManager\Src\CHClass;

use CacheManager\Src\CHClass\Cache;

/**
 *  memcache service
 */
class MemcacheCacheManager extends Cache{

	/* @var null|int|string */
	private $is_compressed = null;
	/* @var string */
	private $host = 'somehost';
	/* @var string */
	private $port = '121';

	public function __construct(){

		parent::__construct($this->host , $this->port);
		
	}
	/**
 	*  set instance of the memcache class
 	*/
	public function setInstance(): void{

		$this->cache = new \Memcache();

	}
	public function setIs_compressed($is_compressed){

		$this->is_compressed = $is_compressed;

	}
	public function set(string $key, string $value, $ttl = null): void{

		$this->cache->set($key, $value, $this->is_compressed, $ttl);

    }

}