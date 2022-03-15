<?php

interface CacheManagerInterface
{
    public function connect(string $host, string $port);

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null);

    public function get(string $key);

    public function lPush(string $key, string $value);
}