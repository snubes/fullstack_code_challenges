<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

require_once('CacheInterface.php');

class CacheManager implements CacheInterface
{
    private $cache;

    public function setCacheManager(string $cachingSystem)
    {
        
        switch ($cachingSystem)
        {
            case "redis":
                $this->cache = new \Redis();
                break;
            case "memcache":
                $this->cache = new \Memcache();
                break;
            default:
                throw new \Exception(ucwords($cachingSystem) . " Cache Manager Not Found");
            }
    }

    public function connect(string $host, string $port)
    {
        $this->cache->connect($host,$port);
    }

    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null)
    {
        if($this->cache instanceof \Memcache)
            $this->cache->set($key,$value,$is_compressed,$ttl);
        else if($this->cache instanceof \Redis)
            $this->cache->set($key,$value,$ttl);
    }

    public function get(string $key) : string 
    {
        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value)
    {
        if($this->cache instanceof \Memcache)
            throw new \Exception("method not supported");
        else if($this->cache instanceof \Redis)
            $this->cache->lPush($key,$value);
    }
}


