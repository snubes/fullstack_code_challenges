<?php

namespace Cache\Adapter;

/**
 * This is just a stub to pretend we actually have a cache system under this.
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 12:19
 */
class MyMemoryCache implements AdapterInterface, AdapterPlainInterface, AdapterCompressInterface, AdapterLpushInterface
{
    private array $cache = [];
    private string $host;
    private string $port;

    public function connect(string $host, int $port): bool {
        $this->host = $host;
        $this->port = $port;
        // We are always successful of course !
        return true;
    }

    public function set(string $key, string $value, int $ttl = 0): void
    {
        $this->cache[$key]['value'] = $value;
        $this->cache[$key]['compress'] = false;
        $this->cache[$key]['ttl'] = time() + $ttl;
        /**
         * Basic garbage collection
         */
        $this->deleteExpired();
    }

    public function setCompress(string $key, string $value, int $ttl = 0): void
    {
        $this->cache[$key]['value'] = gzcompress($value);
        $this->cache[$key]['compress'] = true;
        $this->cache[$key]['ttl'] = time() + $ttl;
        /**
         * Basic garbage collection
         */
        $this->deleteExpired();
    }

    public function lpush(string $key, string $value): void
    {
        $this->set($key, $value);
    }

    public function get(string $key): ?string
    {
        if (isset($this->cache[$key]['value'])) {
            if ($this->isValid($key)) {
                return ($this->cache[$key]['compress']) ? gzuncompress($this->cache[$key]['value']) : $this->cache[$key]['value'];
            } else {
                $this->deleteExpired($key);
            }
        }
        return null;
    }

    private function isValid($key): bool
    {
        return ($this->cache[$key]['ttl'] === 0) || ($this->cache[$key]['ttl'] >= time());
    }

    private function deleteExpired(string $key = null): void
    {
        if (is_null($key)) {
            foreach (array_keys($this->cache) as $key) {
                $this->isValid($key);
            }
        } else {
            $this->isValid($key);
        }
    }
}
