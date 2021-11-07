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
    protected string $adapterName = 'redis';

    /**
     * @var AdapterInterface (or whatever is the class that does the work)
     */
    protected AdapterInterface $adapter;

    public function connect(): bool
    {
        $this->adapter = new Redis();
        $result = $this->adapter->connect(
            $this->config['host'],
            $this->config['port']
            // ... and whatever else is needed... /
        );
        if (!$result) {
            // The connection failed
            return false;
        }
        return true;
    }

    public function set(string $key, string $value, int $ttl = 0): void
    {
        $this->adapter->set($key, $value, $ttl);
    }

    public function get(string $key){

        return $this->adapter->get($key);
    }

    public function lpush(string $key, string $value): void
    {
        $this->adapter->lPush($key,$value);
    }
}
