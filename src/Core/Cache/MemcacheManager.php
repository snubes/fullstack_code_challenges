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
    protected string $adapterName = 'memcache';

    /**
     * @var AdapterInterface (or whatever is the class that does the work)
     */
    protected AdapterInterface $adapter;

    public function connect(): bool
    {
        $this->adapter = new Memcache();
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

    public function setCompress(string $key, string $value, int $ttl = 0): void
    {
        // Here the logic to handle compressed entries
        // ...
        // ... which is likely to call the specific set for this adapter
        $this->adapter->set($key, $value, $ttl);
    }
}
