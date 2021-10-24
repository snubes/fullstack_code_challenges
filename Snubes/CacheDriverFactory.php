<?php

namespace Snubes;

use Snubes\Drivers\MemcacheDriver;
use Snubes\Drivers\RedisCacheDriver;
use Snubes\Exceptions\InvalidCacheDriverNameException;
use Snubes\Interfaces\CacheDriverInterface;

/**
 * Class CacheDriverFactory
 * @package Snubes
 */
class CacheDriverFactory
{
    /**
     * @param string $cacheDriver
     * @return CacheDriverInterface
     * @throws InvalidCacheDriverNameException
     */
    public static function getInstance(string $cacheDriver): CacheDriverInterface
    {
        switch ($cacheDriver) {
            case CacheDriverInterface::REDIS:
                return new RedisCacheDriver();

            case CacheDriverInterface::MEMCACHE:
                return new MemcacheDriver();
            default:
                throw new InvalidCacheDriverNameException();
        }
    }
}