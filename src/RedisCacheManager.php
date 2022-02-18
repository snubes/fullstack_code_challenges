<?php
declare(strict_types=1);

namespace Ilkin\Snubes;

use Redis;

class RedisCacheManager extends AbstractCacheManager
{
    private Redis $redisClient;

    private const CLIENT_NAME = 'redis';

    public function __construct()
    {
        $configData = $this->getConfig(self::CLIENT_NAME);

        $this->redisClient = new Redis();
        $result            = $this->redisClient->connect(
            $configData['host'],
            $configData['port']
        );

        if (!$result) {
            //Spending a bit more time I would add a logger (Monolog) there to log the errors properly
            return false;
        }

        return true;
    }

    public function set(string $key, string $value, string $ttl = null): void
    {
        $this->redisClient->set($key, $value, $ttl);
    }

    public function get(string $key): string
    {
        return $this->redisClient->get($key);
    }

    public function lpush(string $key, string $value): void
    {
        $this->redisClient->lPush($key, $value);
    }
}
