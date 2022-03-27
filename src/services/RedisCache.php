<?php

namespace App\services;

use App\services\AbstractCache;
use \Redis;
use App\interfaces\PushInterface;

class RedisCache extends AbstractCache implements PushInterface
{
    public function __construct()
    {
        $this->cache = new Redis();
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $isCompressed
     * @param string|null $ttl
     */
    public function set(string $key, string $value, string $isCompressed = null, string $ttl = null): void
    {
        try {
            $this->cache->set($key, $value, $ttl);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function lpush(string $key, string $value): void
    {
        try {
            $this->cache->lPush($key, $value);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}