<?php

declare(strict_types = 1);

class CacheConnectionFactory
{
    public const REDIS     = 'redis';
    public const MEMCACHED = 'memcached';

    public static function connect (string $driverName = 'redis') : CacheManagerInterface
    {
        switch (strtolower($driverName))
        {
            case CacheConnectionFactory::REDIS:
                return new RedisCacheConnector();
            case CacheConnectionFactory::MEMCACHED:
                return new MemCacheConnector();
            default:
                throw new Exception('Invalid Driver');
        }
    }
}
