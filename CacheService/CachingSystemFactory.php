<?php

namespace Snubes\CodeChallenge\CacheService;

use Snubes\CodeChallenge\CacheService\CachingSystem\MemcacheCachingSystem;
use Snubes\CodeChallenge\CacheService\CachingSystem\RedisCachingSystem;

/**
 * Class CachingSystemFactory
 * @package Snubes\Cache
 */
class CachingSystemFactory
{
    const REDIS="redis";
    const MEMCACHE="memcache";

    /**
     * @param string $cachingSystem
     * @return AbstractCachingSystem
     * @throws \Exception
     */
    public static function build(string $cachingSystem): AbstractCachingSystem
    {
        switch ($cachingSystem){
            case self::REDIS:
                return new RedisCachingSystem();
                break;
            case self::MEMCACHE:
                return new MemcacheCachingSystem();
                break;
            default:
                throw new \Exception("CacheService Manager Not Found");

        }
    }
}