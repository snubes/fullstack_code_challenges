<?php
/**
 * User: Mehedi Hassan Durjoi
 * Date: 11.03.22
 */
namespace Snubes\Cache\Service;

use Snubes\Cache\Interface\CacheBaseInterface;

/**
 * Memcache service which implementing CacheBaseInterface
 */
class Memcache implements CacheBaseInterface
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
}