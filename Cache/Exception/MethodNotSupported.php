<?php declare(strict_types=1);

namespace Snubes\Cache\Exception;

use RuntimeException;

class MethodNotSupported extends RuntimeException
{
    /**
     * @param string $system
     * @param string $method
     */
    public function __construct(string $system, string $method)
    {
        parent::__construct(sprintf('Method "%s" is not supported by system "%s"', $method, $system));
    }
}