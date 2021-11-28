<?php

namespace App;

interface cacheAdapterInterface
{
    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null);

    public function get(string $key);

    public function lpush(string $key, string $value);
}