<?php

namespace App\caches\services;

use App\caches\services\MemcacheSubSystem;
use App\caches\services\RedisCacheSubSystem;


class CacheFactory
{
    const REDIS = "redis";
    const MEMCACHE = "memcache";

    /**
     * @param string $selectedCache
     * @return AbstractCache
     * @throws \Exception
     */
    public static function create(string $selectedCache): AbstractCache
    {
        switch ($selectedCache) {
            case self::REDIS:
                return new RedisCacheSubSystem();
                break;
            case self::MEMCACHE:
                return new MemcacheSubSystem();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");
        }
    }
}
