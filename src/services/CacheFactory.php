<?php

namespace App\caches\services;


class CacheFactory
{
    const REDIS = "redis";
    const MEMCACHE = "memcache";

    /**
     * @param string $selectedCache
     * @return AbstractCache
     * @throws \Exception
     */

    public static function create(string $cachingSystem): AbstractCache
    {
        switch ($cachingSystem) {
            case self::REDIS:
                return new RedisCache();
                break;
            case self::MEMCACHE:
                return new MemCache();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");
        }
    }
}