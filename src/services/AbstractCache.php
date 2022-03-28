<?php

namespace App\services;

abstract class AbstractCache
{
    protected $cache;

    public function connect(string $host, string $port): void
    {
        try {
            $this->cache->connect($host, $port);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        try {
            return $this->cache->get($key);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    abstract function set(string $key, string $value, string $isCompressed = null, string $ttl = null): void;
}