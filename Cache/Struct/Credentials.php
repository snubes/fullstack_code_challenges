<?php declare(strict_types=1);

namespace Snubes\Cache\Struct;

class Credentials
{
    /**
     * @param string $host
     * @param string $port
     */
    public function __construct(
        public string $host,
        public string $port
    ) {
    }
}