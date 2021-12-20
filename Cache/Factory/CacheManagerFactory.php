<?php declare(strict_types=1);

namespace Snubes\Cache\Factory;

use Snubes\Cache\Manager\CacheManagerInterface;
use Snubes\Cache\Manager\RedisManager;
use Snubes\Cache\Manager\MemcacheManager;
use Snubes\Cache\Struct\Credentials;
use Snubes\Cache\Exception\ManagerNotFound;

class CacheManagerFactory
{
    /**
     * @param string $system
     * @param Credentials $credentials
     * @return CacheManagerInterface
     */
    public function make(string $system, Credentials $credentials): CacheManagerInterface
    {
        return match ($system) {
            RedisManager::SYSTEM => new RedisManager($credentials),
            MemcacheManager::SYSTEM => new MemcacheManager($credentials),
            default => throw new ManagerNotFound($system)
        };
    }
}