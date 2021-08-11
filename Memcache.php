<?php


class Memcache extends  CacheManager
{
    public function connect($host, $port)
    {
        return "Connect";
    }
    public function set($key, $value, $is_compressed = null, $ttl = null)
    {
        return "seted key value";
    }
    public function get($key)
    {
        return "key";
    }
}