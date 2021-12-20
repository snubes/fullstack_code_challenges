<?php declare(strict_types=1);

namespace Snubes\Cache\Manager;

use Snubes\Cache\Exception\MethodNotSupported;
use Snubes\Cache\Struct\Credentials;
use Memcache;

class MemcacheManager implements CacheManagerInterface
{
    /**
     * @var string
     */
    public const SYSTEM = 'memcache';

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
        $this->cache = new Memcache();
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
        $this->cache->set($key, $value, $is_compressed, $ttl);
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
     * @throws MethodNotSupported
     */
    public function lpush(string $key, string $value): void
    {
        throw new MethodNotSupported(self::SYSTEM, __METHOD__);
    }
}