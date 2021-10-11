<?php

namespace Snubes;

/**
 * RedisCache is a wrapper on Redis
 */
class RedisCache implements CachingSystemInterface
{
    private $cache;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $cache = new \Redis();
        $this->cache = $cache->connect($config->host, $config->port);
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
     */
    public function lpush(string $key, string $value)
    {
        $this->cache->lPush($key, $value);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {
        $this->cache->set($key, $value, $is_compressed, $ttl);
    }
}
