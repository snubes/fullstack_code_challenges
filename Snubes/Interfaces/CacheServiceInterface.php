<?php

namespace Snubes\Interfaces;

/**
 * Interface CacheServiceInterface
 * @package Snubes\Interfaces
 */
interface CacheServiceInterface
{
    /**
     * @param string $host
     * @param string $port
     * @return mixed
     */
    public function connect(string $host, string $port);

    /**
     * @param string $key
     * @param string $value
     * @param string|null $is_compressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, ?string $is_compressed = null, ?string $ttl = null): void;

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);

    /**
     * @param string $key
     * @param string $value
     * @return mixed
     */
    public function lpush(string $key, string $value);
}