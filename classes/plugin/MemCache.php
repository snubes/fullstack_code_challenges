<?php

namespace app\plugin;

use app\base\CacheInterface;
use app\base\CachePluginInterface;

class MemCache implements CacheInterface, CachePluginInterface
{

    protected \Memcache $cache;

    /**
     * connect to given host and port
     *by passing these parameters from array new MemCache(['host' =>'localhost', 'port' => '1111'])
     * @param array $config
     */
    public function __constructor(array $config = []): void
    {
        if (isset($config['port'])) throw new Exception("please set port number");

        if (isset($config['host'])) throw new Exception("please set host number");
        $this->cache = new \Memcache();
        if (!$this->cache->connect($config['host'], $config['port'])) throw new Exception("can not connect to redis server");


    }

    /**
     * @param string $key
     * @param string $value
     * @param array $options for setting ttl and is_compressed you should pass them by $options array
     */
    public function set(string $key, string $value, array $options = []): void
    {
        $ttl = $options['ttl'] ?? null;
        $is_compressed = $options['is_compressed'] ?? null;
        $this->cache->set($key, $value, $is_compressed, $ttl);
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