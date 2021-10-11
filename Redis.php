<?php

use Snudes\Contracts\CacheItem;
use Snudes\Contracts\DbConnector;

class Redis implements DbConnector, CacheItem
{
    public function connect(string $host, string $port)
    {
        $this->connect($host, $port);
    }

    public function lpush(string $key, string $value)
    {
        $this->lpush($key, $value);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {
        $this->set($key, $value, $ttl);
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
