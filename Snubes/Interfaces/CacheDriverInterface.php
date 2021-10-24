<?php

namespace Snubes\Interfaces;

/**
 * Interface CacheDriverInterface
 * @package Snubes\Interfaces
 */
interface CacheDriverInterface
{
    const REDIS = "redis";
    const MEMCACHE = "memcache";

    /**
     * @param string $host
     * @param string $port
     * @return mixed
     */
    public function connect(string $host, string $port): void;

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, ?string $is_compressed, ?string $ttl): void;

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);
}
