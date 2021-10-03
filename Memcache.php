<?php
/**
 * User: Essam
 * Date: 03.10.21
 * Time: 1:14
 */
class Memcache implements CacheInterface
{

  private $cache;

  public function __construct()
  {
    $this->cache = new \Memcache();
    
  }
  public function connect(string $host, string $port)
  {
    $this->cache->connect($host, $port);
  }

  public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
  {
    $this->cache->set($key, $value, $is_compressed, $ttl);
  }

  public function get(string $key)
  {
    return $this->cache->get($key);
  }

  public function lpush(string $key, string $value)
  {
    throw new \Exception("method not supported");
  }
}
