<?php

use Snudes\Contracts\CacheItem;
use Snudes\Contracts\DbConnector;

class Memcache implements DbConnector, CacheItem
{
    public function connect(string $driver, string $host, string $port)
    {
        $this->connect($driver, $host, $port);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {
        $this->set($key, $value, $is_compressed, $ttl);
    }

    public function get(string $key)
    {
        try {
            if (is_null($key)) {

                return $this->get($key);
            }
        } catch (\Throwable $th) {
            throw new Exception("Key not found");
        }
    }
}
