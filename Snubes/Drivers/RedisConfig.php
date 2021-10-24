<?php

namespace Snubes\Drivers;

use Snubes\Interfaces\CacheConfigInterface;

/**
 * Class RedisConfig
 * @package Snubes\Drivers
 */
class RedisConfig implements CacheConfigInterface
{
    /**
     * @var string $host
     */
    private string $host;

    /**
     * @var string $port
     */
    private string $port;

    /**
     * for now will use default values assigned here, but it can be moved to env file
     * RedisConfig constructor.
     * @param string $host
     * @param string $port
     */
    public function __construct(string $host="localhost", string $port = "8000")
    {
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }
}