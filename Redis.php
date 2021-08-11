<?php


class Redis extends  CacheManager
{
    public function connect($host, $port)
    {
       return "SuccessFully Connected";
    }
    public function set($key, $value, $is_compressed = null, $ttl = null)
    {
        return "Seted Key And Value";
    }
    public function lpush($key, $value)
    {
        return "Push Data";
    }
    public function get($key)
    {
        return "key";
    }
}