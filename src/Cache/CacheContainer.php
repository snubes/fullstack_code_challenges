<?php

namespace App\Cache;

/**
 *  implementation singleton pattern
 */

final class CacheContainer
{
    private static array $instances = [];

    public static function getInstance(string $className, $host, $port)
    {
        if (!isset(self::$instances[$className])) {
            self::$instances[$className] = new $className($host, $port);
        }
        return self::$instances[$className];
    }
}