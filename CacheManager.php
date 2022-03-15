<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

include_once 'CacheManagerInterface.php';

abstract class CacheManager implements CacheManagerInterface
{
   
    protected $cache;


    public function connect(string $host, string $port)
    {

        $this->cache->connect($host, $port);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {

        if ($this->cache instanceof Memcache) {
            $this->cache->set($key, $value, $is_compressed, $ttl);
        } else if ($this->cache instanceof Redis) {
            $this->cache->set($key, $value, $ttl);
        }
    }

    public function get(string $key)
    {

        return $this->cache->get($key);
    }

    public function lPush(string $key, string $value)
    {

        if ($this->cache instanceof Memcache) {
            throw new UnexpectedValueException("method not supported");
        } else if ($this->cache instanceof Redis) {
            $this->cache->lPush($key, $value);
        }
    }

}


