<?php

namespace app\plugin;

use app\base\CacheInterface;
use app\base\CachePluginInterface;

class RedisCache implements CacheInterface, CachePluginInterface
{

    private \Redis $cache;

    /**
     * connect to given host and port
     *by passing these parameters from array new RedisCache(['host' =>'localhost', 'port' => '1111'])
     * @param array $config
     */
    public function __constructor(array $config = []): void
    {
        if (isset($config['port'])) throw new Exception("please set port number");

        if (isset($config['host'])) throw new Exception("please set host number");

        $this->cache = new \Redis();
        if (!$this->cache->connect($config['host'], $config['port'])) throw new Exception("can not connect to redis server");

    }

    /**
     * @param string $key
     * @param string $value
     * @param array $options for setting ttl you should pass it by $options array
     */
    public function set(string $key, string $value, array $options =[]): void
    {
        $ttl = $options['ttl']??null;
        $this->cache->set($key, $value, $ttl);
    }

    /**
     * for lpush method in redis
     * because this method only used in redis, there is no need to
     * put this method in interface class.
     * and maybe we want to extend our program to use other cache system in future and they may
     * have the same method i chose "append" name for this method.
     * @param string $key
     * @param string $value
     * @return $this|CacheInterface
     */
    public function append(string $key, string $value): CacheInterface
    {
        $this->cache->lpush($key, $value);
        return $this;
    }

    /**
     * for rpush method in redis
     * because this method only used in redis, there is no need to
     * put this method in interface class.
     * and maybe we want to extend our program to use other cache system in future and they may
     * have the same method i chose "append" name for this method.
     * @param string $key
     * @param string $value
     * @return $this|CacheInterface
     */
    public function prepend(string $key, string $value): CacheInterface
    {
        $this->cache->rpush($key, $value);
        return $this;
    }


    /**
     * @param string $key
     * @return string
     */
    public function get(string $key): string
    {
        return $this->cache->get($key);
    }
}