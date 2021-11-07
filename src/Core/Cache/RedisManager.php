<?php

namespace Cache;

use Cache\Adapter\AdapterInterface;
use Cache\Adapter\Redis;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
final class RedisManager extends ManagerAbstract implements ManagerPlainInterface, ManagerLpushInterface
{
    protected function setAdapter(?AdapterInterface $adapter = null)
    {
        $this->adapter = $adapter ?? new Redis();
    }

    public function connect(string $host, int $port)
    {
        $this->adapter->connect($host,$port);
    }

    public function set(string $key, string $value, int $ttl = 0): void
    {
        $this->adapter->set($key, $value, $ttl);
    }

    public function lpush(string $key, string $value): void
    {
        $this->adapter->lPush($key,$value);
    }
}
