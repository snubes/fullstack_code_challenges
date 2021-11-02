<?php

declare(strict_types=1);

namespace Services\Cache;

use Exception;

class CacheManagerFactory
{
    /**
     * @throws Exception
     */
    public static function make(string $type): CacheManagerInterface
    {
        return match ($type) {
            RedisCacheManager::class => new RedisCacheManager(),
            MemcacheCacheManager::class => new MemcacheCacheManager(),
            default => throw new \Exception("Cache Manager Not Found"),
        };
    }
}
