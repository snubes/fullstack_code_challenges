<?php

namespace App\Cache;

interface CacheServiceInterface
{
    public function set(string $key, $value, string $ttl = null): bool;

    public function get(string $key);

    public function lPush(string $key, ...$values): int|false;

    public function lPop(string $key);

    public function flushAll(): bool;
}