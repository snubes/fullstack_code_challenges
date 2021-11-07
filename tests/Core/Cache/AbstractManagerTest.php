<?php

declare(strict_types=1);

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 19:48
 */
class AbstractManagerTest extends \PHPUnit\Framework\TestCase
{
    var \Cache\ManagerAbstract $sut;

    public function setUp(): void
    {
        $this->sut = self::getMockForAbstractClass(
            Cache\ManagerAbstract::class,
            [
                'somehost',
                'someport',
                new \Cache\Adapter\MyMemoryCache()
            ]
        );
    }


}