<?php

declare(strict_types=1);

namespace Services\Cache;

abstract class CacheManagerAbstract
{
    protected $cache;

    public function connect(string $host, string $port): void
    {
        $this->cache->connect($host,$port);
    }
}
