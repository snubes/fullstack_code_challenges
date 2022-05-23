<?php

namespace App;

use App\Exception\InvalidConnectionParameterException;
use Memcache;

class MemcacheAdapter implements CacheInterface
{
    private Memcache $memcache;

    /**
     * @param string|null $host
     * @param string|null $port
     *
     * @throws InvalidConnectionParameterException
     */
    public function __construct(?string $host = null, ?string $port = null)
    {
        $this->memcache = new Memcache();
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
        $ttl          = $options['ttl'] ?? null;
        $isCompressed = $options['is_compressed'];

        return $this->memcache->set($key, $value, $isCompressed, $ttl);
    }

    /**
     * @param string     $key
     * @param mixed|null $default
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $value = $this->memcache->get($key);
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
        $connection = $this->memcache->connect($host, $port);
        if (!$connection) {
            throw new InvalidConnectionParameterException('Invalid host or port');
        }
        return $connection;
    }
}