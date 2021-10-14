<?php

namespace Snubes\FullStackCodeChallenges\CacheManagerChallenge\Interfaces;

/**
 * Acts as a manager for different caching implementations.
 *
 * @package Snubes\FullStackCodeChallenges\CacheManagerChallenge\Interfaces
 */
interface CacheManager
{
    public function createRedisInstance(): \Redis;

    public function createMemcachedInstance(): \Memcache;
}
