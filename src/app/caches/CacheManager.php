<?php

namespace App\caches;

use App\caches\services\AbstractCache;
use App\caches\services\CacheFactory;
use App\caches\services\interfaces\PushCustomInterface;

class CacheManager
{
    /**
     * @var AbstractCache
     */
    private $cache;

    /**
     * @param string $cachingSystem
     * @throws \Exception
     */
    public function setCache(string $cachingSystem): void
    {
        $this->cache = CacheFactory::create($cachingSystem);
    }

    /**
     * @param string $host
     * @param string $port
     */
    public function connect(string $host, string $port): void
    {
        $this->cache->connect($host, $port);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null): void
    {
        $this->cache->set($key, $value, $is_compressed, $ttl);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    /**
     * @param string $key
     * @param string $value
     * @throws \Exception
     */
    public function lpush(string $key, string $value)
    {
        if (!$this->cache instanceof PushCustomInterface) {
            throw new \Exception("method not supported");
        }
        $this->cache->lPush($key, $value);
    }
}
