<?php

namespace CacheManager\Src\CHClass;

use CacheManager\Src\CHInterface\CacheManagerInterface;

/**
 *  an abstract class that implement the contract and handle the services
 */
abstract class Cache implements CacheManagerInterface{

	protected $cache;
	private $host;
	private $port;

	public function __construct(string $host, string $port){
        
        $this->host = $host;
        $this->port = $port;

	}
    public function connect(): void{
    	$this->setInstance();
        $this->cache->connect($this->host,$this->port);

    }
    public function get(string $key){

        return $this->cache->get($key);

    }
}