<?php

use PHPUnit\Framework\TestCase;
use App\caches\CacheManager;


class CacheManagerTest extends TestCase
{

    public function testSetCache(): void
    {
        $cm = new CacheManager;
        $this->assertInstanceOf("App\caches\CacheManager", $cm);
        $property = $this->getPrivateProperty('App\caches\CacheManager', 'cache');
        $cm->setCache('redis');
        $this->assertInstanceOf("App\caches\services\RedisCacheSubSystem", $property->getValue($cm));
    }

    public function testCacheProcess(): void
    {
        $cm = new CacheManager;
        $this->assertInstanceOf("App\caches\CacheManager", $cm);
        $cm->setCache('redis');
        $cm->connect('somehost', 6379);
        $cm->set('one', '1');
        $cm->lpush('two', '1');
        $cm->lpush('two', '2');
        $this->assertEquals($cm->get('one'), 1);
    }


    public function getPrivateProperty($className, $propertyName)
    {
        $reflector = new ReflectionClass($className);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);
        return $property;
    }
}
