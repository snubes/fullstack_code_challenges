<?php declare(strict_types=1);

namespace Snubes\Cache\Manager;

use Snubes\Cache\Struct\Credentials;

interface CacheManagerInterface
{
    /**
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials);

    /**
     * @param string $key
     * @param string $value
     * @param string|null $ttl
     * @param string|null $is_compressed
     * @return void
     */
    public function set(string $key, string $value, string $ttl = null, string $is_compressed = null): void;

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function lpush(string $key, string $value): void;
}