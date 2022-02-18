<?php
declare(strict_types=1);

namespace Ilkin\Snubes;

use Memcache;

class MemcacheCacheManager extends AbstractCacheManager
{
    private Memcache $memcacheClient;

    private const CLIENT_NAME = 'memcache';

    public function __construct()
    {
        $configData = $this->getConfig(self::CLIENT_NAME);

        $this->memcacheClient = new \Memcache();
        $result               = $this->memcacheClient->connect(
            $configData['host'],
            $configData['port']
        );

        if (!$result) {
            //Spending a bit more time I would add a logger (Monolog) there to log the errors properly
            return false;
        }

        return true;
    }

    public function set(string $key, string $value, bool $is_compressed = null, int $ttl = null): void
    {
        $this->memcacheClient->set($key, $value, (int) $is_compressed, $ttl);
    }

    public function get(string $key): string
    {
        return $this->memcacheClient->get($key);
    }
}
