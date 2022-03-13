<?php

namespace CacheManager\Src\CHClass;

use CacheManager\Src\CHInterface\CacheManagerInterface;

/**
 *  CacheManager is a class thats hide complexity of different cache services
 */
class CacheManager{
    /**
     *  return instance of cache service
     */
	public function getInstance(string $cachingSystem): CacheManagerInterface{
        
        switch ($cachingSystem){

            case "redis":
                return new RedisCacheManager;
            case "memcache":
                return new MemcacheCacheManager;
            default:
                throw new \Exception("Cache Manager Not Found");

        }

	}
	
}