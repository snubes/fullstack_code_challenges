<?php

namespace App\Cache\Driver;

abstract class CacheDriver implements CacheDriverInterface
{
    abstract public function getDriver();

    public function connect(string $host, string $port): void
    {
        $this->getDriver()->connect($host, $port);
    }

    public function set(string $key, string $value, string $ttl = null, string $is_compressed = null): void
    {
        $this->getDriver()->set($key, $value, $is_compressed, $ttl);
    }

    public function get(string $key)
    {
        return $this->getDriver()->get($key);
    }
}
