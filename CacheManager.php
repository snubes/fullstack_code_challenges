<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */




class CacheManager
{
    private $cache;

    public function setCache($cachingSystem)
    {
        switch ($cachingSystem) {

            case "redis":
                $this->cache = new \Redis();
                break;
            case "memcache":
                $this->cache = new \Memcache();
                break;
            default:
                throw new \Exception("Cache Manager Not Found");
        }
    }

    public function connect($host, $port)
    {
        $this->cache->connect($host, $port);
    }

    public function set($key, $value, $is_compressed = null, $ttl = null)
    {

        if ($this->cache instanceof \Memcache)
            $this->cache->set($key, $value, $is_compressed, $ttl);
        else if ($this->cache instanceof \Redis)
            $this->cache->set($key, $value, $ttl);
    }

    public function get($key)
    {

        return $this->cache->get($key);
    }

    public function lpush($key, $value)
    {

        if ($this->cache instanceof \Memcache)
            throw new \Exception("method not supported");
        else if ($this->cache instanceof \Redis)
            $this->cache->lPush($key, $value);
    }
}


