<?php
/**
 * User: Mehedi Hassan Durjoi
 * Date: 11.03.22
 */
namespace Snubes\Cache\Service;

use Snubes\Cache\Interface\CacheBaseInterface;
use Snubes\Cache\Interface\CachePushInterface;

/**
 * Redis cache service which implementes CacheBaseInterface and CachePushInterface
 */
class Redis implements CacheBaseInterface, CachePushInterface
{
    public function connect(string $host, string $port) 
    {
        // Connecting
    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null) 
    {
        // Setting value
    }

    public function get(string $key)
    {
        // Getting value
    }

    public function lpush(string $key, string $value) 
    {
        // Updating value
    }
}