<?php

declare(strict_types=1);

namespace Core\Cache\Adapter;

use Cache\Adapter\AdapterInterface;
use Cache\Adapter\MyMemoryCache;
use PHPUnit\Framework\TestCase;

/**
 *
 * User: dario
 * Date: 2021-11-04
 * Time: 18:42
 */
class MyMemoryCacheTest extends TestCase
{
    var AdapterInterface $sut;

    public function setUp(): void
    {
        $this->sut = self::getMockForAbstractClass(
            MyMemoryCache::class
        );
    }

    public function testNullWhenEmpty()
    {
        self::assertNull(
            $this->sut->get('not_there_key')
        );
    }

    public function testEntry()
    {
        $this->sut->set('key_one', 'one');
        self::assertEquals(
            'one',
            $this->sut->get('key_one')
        );
    }

    public function testEntryCompress()
    {
        $this->sut->setCompress('key_one', 'one');
        self::assertEquals(
            'one',
            $this->sut->get('key_one')
        );
    }

    public function testOverwrite()
    {
        $this->sut->set('key_one', 'one');
        $this->sut->set('key_one', 'different');
        self::assertEquals(
            'different',
            $this->sut->get('key_one')
        );
    }

    public function testTtlExpire()
    {
        $this->sut->set('key_one', 'one', 1);
        sleep(2);
        self::assertNull(
            $this->sut->get('key_one')
        );
    }

    public function testMultipleEntries()
    {
        $data = [
            'key_00' => '0',
            'key_01' => '1',
            'key_02' => '2',
            'key_03' => '3',
            'key_04' => '4',
            'key_05' => '5',
            'key_06' => '6',
            'key_07' => '7',
            'key_08' => '8',
            'key_09' => '9',
            'key_10' => '10',
            'key_11' => '11',
            'key_12' => '12',
            'key_13' => '13',
            'key_14' => '14',
            'key_15' => '15',
            'key_16' => '16',
            'key_17' => '17',
            'key_18' => '18',
            'key_19' => '19',
        ];

        foreach ($data as $key => $value) {
            $this->sut->set($key, $value);
        }
        foreach (array_reverse($data, true) as $key => $value) {
            self::assertEquals(
                $value,
                $this->sut->get($key)
            );
        }
    }
}
