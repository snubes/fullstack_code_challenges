<?php

declare(strict_types=1);

namespace Core\Cache;

use Cache\ManagerAbstract;
use PHPUnit\Framework\TestCase;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 19:48
 */
class AbstractManagerTest extends TestCase
{
    protected $sut;

    public function testMissingAdapterName(): void
    {
        self::expectExceptionMessage('No cache adapter defined');
        $this->sut = new class extends ManagerAbstract {
            public function connect(): bool
            {
                return true;
            }
            public function get($key)
            {
                return null;
            }
            public function set(string $key, string $value, int $ttl = 0)
            {
                return;
            }
        };
    }

    public function testUnknownAdapterName(): void
    {
        self::expectExceptionMessage('No configuration found for cache adapter not_there');
        $this->sut = new class extends ManagerAbstract {
            protected string $adapterName = 'not_there';
            public function connect(): bool
            {
                return true;
            }
            public function get($key)
            {
                return null;
            }
            public function set(string $key, string $value, int $ttl = 0)
            {
                return;
            }
        };
    }
}