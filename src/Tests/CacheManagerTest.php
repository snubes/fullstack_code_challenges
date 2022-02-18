<?php
declare(strict_types=1);

namespace Ilkin\Snubes\Tests;

use PHPUnit\Framework\TestCase;

class CacheManagerTest extends TestCase
{
    /*
     * To not spend so much time on it, I will shortly explain the plan for the tests I would go with on the production implementation
     *
     * Create separate test class for Redis and Memcache Cache Managers (or more if we have more).
     * Then the tests which definitely should be written:
     *
     * 1) Test the connection to the cache systems (either Redis or Memcache or any else), using mock clients
     * 2) Test that set() method of both cache managers really sets the key->value, checking it with the get() method after setting
     * 3) Test getConfig method, placed in AbstractCacheManager with not existing client name and expect exception
     * 4) Test lPush method of Redis Cache client, setting something to lPush and then getting the first element get($key), -> as an example
     *
     */
}
