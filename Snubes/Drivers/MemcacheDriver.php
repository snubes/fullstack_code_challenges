<?php

namespace Snubes\Drivers;

use Snubes\Interfaces\CacheDriverInterface;

/**
 * Class MemcacheDriver
 * @package Snubes\Drivers
 */
class MemcacheDriver implements CacheDriverInterface
{
    private \Memcache $memcache;

    /**
     * MemcacheDriver constructor.
     * @param \Memcache|null $memcache
     */
    public function __construct(\Memcache $memcache = null)
    {
        $this->memcache = !empty($memcache) ? $memcache : new \Memcache();
    }

    /**
     * @param string $host
     * @param string $port
     */
    public function connect(string $host, string $port): void
    {
        $this->memcache->connect($host, $port);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, ?string $is_compressed, ?string $ttl): void
    {
        $this->memcache->set($key, $value, $is_compressed, $ttl);
    }

    /**
     * @param string $key
     * @return mixed|void
     */
    public function get(string $key)
    {
        return $this->memcache->get($key);
    }
}