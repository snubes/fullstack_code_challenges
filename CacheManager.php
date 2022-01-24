<?php

interface CacheInterface
{
    public function set(string $key, string $value);

    public function get(string $key);
}

interface PushableCacheInterface
{
    public function lpush(string $key, string $value);
}

class Memcache implements CacheInterface
{
    public function set(string $key, string $value)
    {
        // TODO: Implement set() method.
    }

    public function get(string $key)
    {
        // TODO: Implement get() method.
    }

}

class Redis implements CacheInterface, PushableCacheInterface
{
    public function set(string $key, string $value)
    {
        // TODO: Implement set() method.
    }

    public function get(string $key)
    {
        // TODO: Implement get() method.
    }

    public function lpush(string $key, string $value)
    {
        // TODO: Implement lpush() method.
    }

}

class CacheManager
{
    private CacheInterface $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }


    public function connect(string $host, string $port)
    {

        $this->cache->connect($host, $port);

    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {

        if ($this->cache instanceof \Memcache)
            $this->cache->set($key, $value, $is_compressed, $ttl);
        else if ($this->cache instanceof \Redis)
            $this->cache->set($key, $value, $ttl);
    }

    public function get(string $key)
    {

        return $this->cache->get($key);
    }

    public function lpush(string $key, string $value)
    {
        if ($this->cache instanceof PushableCacheInterface) {
            $this->cache->lPush($key, $value);
        } else {
            throw new \Exception("method not supported");
        }
    }

}
