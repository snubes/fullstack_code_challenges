<?php
namespace App\Cache\Driver;

interface CacheDriverInterface
{
    public function connect(string $host, string $port);

    public function set(string $key, string $value, string $ttl = null, string $is_compressed = null): void;

    /**
     * @param  string  $key
     * @return mixed
     */
    public function get(string $key);
}
