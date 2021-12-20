<?php declare(strict_types=1);

namespace Snubes\Cache\Manager;

use Snubes\Cache\Struct\Credentials;
use Redis;

class RedisManager implements CacheManagerInterface
{
    /**
     * @var string
     */
    public const SYSTEM = 'redis';

    /**
     * @var mixed
     */
    private $cache;

    /**
     * @param Credentials $credentials
     */
    public function __construct(
        private Credentials $credentials
    ) {
        $this->cache = new Redis();
        $this->connect();
    }

    /**
     * @return void
     */
    private function connect(): void
    {
        $this->cache->connect($this->credentials->host, $this->credentials->port);
    }

    /**
     * @param string $key
     * @param string $value
     * @param string|null $ttl
     * @param string|null $is_compressed
     * @return void
     */
    public function set(string $key, string $value, string $ttl = null, string $is_compressed = null): void
    {
        $this->cache->set($key, $value, $ttl);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->cache->get($key);
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     * @throws \Exception
     */
    public function lpush(string $key, string $value): void
    {
        $this->cache->lPush($key, $value);
    }
}