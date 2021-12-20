<?php declare(strict_types=1);

namespace Snubes\Cache\Exception;

use RuntimeException;

class ManagerNotFound extends RuntimeException
{
    /**
     * @param string $system
     */
    public function __construct(string $system)
    {
        parent::__construct(sprintf('Cache manager for system "%s" not found', $system));
    }
}