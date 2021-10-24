<?php

namespace Snubes\Drivers;

use Snubes\Interfaces\CacheDriverInterface;
use Snubes\Interfaces\LeftPusherInterface;

/**
 * Class RedisCacheDriver
 * @package Snubes\Drivers
 */
class RedisCacheDriver implements CacheDriverInterface, LeftPusherInterface
{
    /**
     * @var \Redis $redis
     */
    private \Redis $redis;

    /**
     * RedisCacheDriver constructor.
     * @param \Redis|null $cache
     */
    public function __construct(\Redis $cache = null)
    {
        // I made it simply like this so the code will be unit-testable
        $this->redis = !empty($cache) ? $cache : new \Redis();
    }

    /**
     * @param string $host
     * @param string $port
     * @return mixed|void
     */
    public function connect(string $host, string $port): void
    {
        $this->redis->connect($host, $port);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     * @return mixed|void
     */
    public function set(string $key, string $value, ?string $is_compressed, ?string $ttl): void
    {
        $this->redis->set($key, $value, $ttl);
    }

    /**
     * @param string $key
     * @return false|mixed|string
     */
    public function get(string $key)
    {
        return $this->redis->get($key);
    }

    /**
     * @param string $key
     * @param string $value
     * @return mixed|void
     */
    public function lpush(string $key, string $value)
    {
        $this->redis->lpush('two','1');
    }
}