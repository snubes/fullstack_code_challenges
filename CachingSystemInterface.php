<?php

namespace Snubes;

/**
 * The interface for a CachingSystem
 */
interface CachingSystemInterface
{
    public function get(string $key);

    public function lpush(string $key, string $value);

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null);
}
