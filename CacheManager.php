<?php
declare(strict_types=1);

namespace snubes;

class CacheManagerFactory
{
    /**
     * @param  string $cachingSystem
     * @return Memcache|Redis
     * @throws Exception
     */
    public static function create(string $cachingSystem)
    {
        switch ($cachingSystem) {
            case "redis":
                return new \Redis();
                break;
            case "memcache":
                return new \Memcache();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");
        }
    }
}
