<?php

namespace App;

use Exception;

class CacheFactory
{
    private static array $instances = [];

    /**
     * @throws Exception
     */
    public static function make(string $type): cacheAdapterInterface
    {

        $conf = (include(__DIR__.'/../config.php'))['cache'];

        return match ($type) {
            MemcachedAdapter::class => self::getInstance(MemcachedAdapter::class, $conf['memcached']['host'], $conf['memcached']['port']),
            RedisAdapter::class => self::getInstance(RedisAdapter::class, $conf['redis']['host'], $conf['redis']['port']),
            default => throw new Exception("Cache Manager Not Found"),
        };
    }

    private static function getInstance(string $cacheAdapterClassName, string $host, string $port): cacheAdapterInterface
    {
        if (!isset(self::$instances[$cacheAdapterClassName])) {
            self::$instances[$cacheAdapterClassName] = new $cacheAdapterClassName($host, $port);
        }
        return self::$instances[$cacheAdapterClassName];
    }
}