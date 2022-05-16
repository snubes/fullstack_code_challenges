<?php

declare(strict_types = 1);

class RedisCacheConnector implements CacheManagerInterface
{
    private Redis $redis;

    public function __construct ()
    {
        $this->redis = new Redis();
    }

    public function set (string $key, string $value, ?string $is_compressed = null, ?string $ttl = null) : CacheManagerInterface
    {
        $this->redis->setOption($key, $value);

        return $this;
    }

    public function get (string $key) : string
    {
        return $this->redis->getOption($key);
    }

    public function connect (string $host, string $port) : CacheManagerInterface
    {
        $this->redis->connect($host, $port);

        return $this;
    }

    public function lpush (string $key, string $value) : CacheManagerInterface
    {
        $this->redis->lpush($key, $value);

        return $this;
    }
}
