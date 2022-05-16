<?php

declare(strict_types = 1);

interface CacheManagerInterface
{
    public function connect (string $host, string $port) : CacheManagerInterface;

    public function set (string $key, string $value, ?string $is_compressed = null, ?string $ttl = null) : CacheManagerInterface;

    public function get (string $key) : string;

    public function lpush (string $key, string $value) : CacheManagerInterface;
}
