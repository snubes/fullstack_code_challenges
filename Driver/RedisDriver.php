<?php

namespace App\Cache\Driver;

use Redis;

class RedisDriver extends CacheDriver implements LeftPushInterface
{
    private Redis $redis;

    public function __construct()
    {
        $this->redis = new Redis();
    }

    public function set(string $key, string $value, string $ttl = null, string $is_compressed = null): void
    {
        $this->redis->set($key, $value, $ttl);
    }

    public function getDriver(): Redis
    {
        return $this->redis;
    }

    public function lpush(string $key, string $value): void
    {
        $this->redis->lPush($key, $value);
    }
}
