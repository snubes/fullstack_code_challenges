<?php

namespace Snudes\Contracts;

interface CacheItem
{
    public function get(string $key);
    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null);
}
