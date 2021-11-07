<?php

declare(strict_types=1);

namespace Core\Cache;

use Cache\ManagerInterface;
use Cache\RedisManager;
use PHPUnit\Framework\TestCase;

/**
 *
 * User: dario
 * Date: 2021-11-07
 * Time: 17:30
 */
class RedisManagerTest extends TestCase
{
    var ManagerInterface $sut;

    public function setUp(): void
    {
        $this->sut = new RedisManager();
    }

    public function testSetAndGet(): void
    {
        $this->sut->set('one','first_value');
        self::assertEquals(
            'first_value',
            $this->sut->get('one')
        );
    }

    public function testLpush(): void
    {
        $this->sut->lpush('two', 'second_value');
        self::assertEquals(
            'second_value',
            $this->sut->get('two')
        );
    }
}
