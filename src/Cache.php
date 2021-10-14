<?php

namespace Snubes\FullStackCodeChallenges\CacheManagerChallenge;

use JetBrains\PhpStorm\Pure;
use Snubes\FullStackCodeChallenges\CacheManagerChallenge\Interfaces\CacheManager;

class Cache implements CacheManager
{
    public function createRedisInstance(): \Redis
    {
        return new \Redis();
    }

    #[Pure]
    public function createMemcachedInstance(): \Memcache
    {
        return new \Memcache();
    }
}
