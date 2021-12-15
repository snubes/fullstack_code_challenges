<?php

interface CacheInterface
{
    public function setCacheManager(string $cachingSystem);

    public function connect(string $host, string $port);

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null);

    public function get(string $key) : string ;

    public function lpush(string $key, string $value);
}

