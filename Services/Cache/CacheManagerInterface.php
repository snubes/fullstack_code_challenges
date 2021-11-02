<?php

declare(strict_types=1);

namespace Services\Cache;

interface CacheManagerInterface
{
    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null): void;

    public function get(string $key): string;

    public function lpush(string $key, string $value): void;
}
