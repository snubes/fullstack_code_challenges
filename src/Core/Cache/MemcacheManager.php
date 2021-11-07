<?php

namespace Cache;

use Cache\Adapter\AdapterInterface;
use Cache\Adapter\Memcache;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
final class MemcacheManager extends ManagerAbstract implements ManagerCompressInterface
{
    protected function setAdapter(?AdapterInterface $adapter = null)
    {
        $this->adapter = $adapter ?? new Memcache();
    }

    public function connect(string $host, int $port)
    {
        $this->adapter->connect($host,$port);
    }

    public function setCompress(string $key, string $value, int $ttl = 0): void
    {
        // Here the logic to handle compressed entries
        // ..
        // ..
        $this->adapter->set($key, $value, $ttl);
    }
}
