<?php

namespace Snudes\Contracts;

interface CacheInterface
{
    public function setCache(string $cachingSystem, CacheItem $cacheItem);
}
