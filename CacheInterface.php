<?php
/**
 * User: Essam
 * Date: 03.10.21
 * Time: 1:14
 */
interface CacheInterface
{
  public function set(string $key, string $value, string $is_compressed = null, string $ttl = null);

  public function connect(string $host, string $port);

  public function lpush(string $key, string $value);

  public function get(string $key);
}
