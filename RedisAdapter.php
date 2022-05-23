<?php

namespace App;

use App\Exception\InvalidConnectionParameterException;
use Redis;

class RedisAdapter implements CacheInterface, CacheListInterface
{
    private Redis $redis;

    /**
     * @param string|null $host
     * @param string|null $port
     *
     * @throws InvalidConnectionParameterException
     */
    public function __construct(?string $host = null, ?string $port = null)
    {
        $this->redis = new Redis();
        if ($host && $port) {
            $this->connect($host, $port);
        }
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param array  $options
     *
     * @return bool
     */
    public function set(string $key, mixed $value, array $options = []): bool
    {
        $ttl = $options['ttl'] ?? null;

        return $this->redis->set($key, $value, $ttl);
    }

    /**
     * @param string     $key
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $value = $this->redis->get($key);
        if ($value === false) {
            return $default;
        }
        return $value;
    }

    /**
     * @param string $host
     * @param string $port
     *
     * @return bool
     * @throws InvalidConnectionParameterException
     */
    public function connect(string $host, string $port): bool
    {
        $connection = $this->redis->connect($host, $port);
        if (!$connection) {
            throw new InvalidConnectionParameterException('Invalid host or port');
        }
        return $connection;
    }

    /**
     * @param string $key
     * @param mixed  ...$values
     *
     * @return int|bool
     */
    public function lPush(string $key, mixed ...$values): int|bool
    {
        return $this->redis->lPush($key, $values);
    }
}