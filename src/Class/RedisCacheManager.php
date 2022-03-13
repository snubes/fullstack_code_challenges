<?php

namespace CacheManager\Src\CHClass;

use CacheManager\Src\CHClass\Cache;

/**
 *  redis service
 */
class RedisCacheManager extends Cache{

	/* @var string */
	private $host = 'somehost';
	/* @var string */
	private $port = '121';

	public function __construct(){

		parent::__construct($this->host , $this->port);

	}
	/**
 	*  set instance of the redis class
 	*/
	public function setInstance(): void{

		$this->cache = new \Redis();
	}
	/**
 	*  set instance of cache service
 	*/
	public function set(string $key, string $value, $ttl = null): void{

		$this->cache->set($key,$value,$ttl);
    }
	/**
 	*  implement lpush feacher of redis  
 	*/
    public function lpush(string $key, string $value){

		$this->cache->lPush($key,$value);

    }

}
