<?php

use App\CacheFactory;
use App\MemcachedAdapter;
use App\RedisAdapter;
use  PHPUnit\Framework\TestCase;

class TestCache extends TestCase
{
    /**
     * @test
     */
    public function redis_test()
    {
        $cacheManager = CacheFactory::make(RedisAdapter::class);
        $cacheManager->set('one','1');
        $this->assertEquals(1,$cacheManager->get('one'));
    }

    /**
     * @test
     */
    public function memcached_test()
    {
        $cacheManager = CacheFactory::make(MemcachedAdapter::class);
        $cacheManager->set('one','1');
        $this->assertEquals(1,$cacheManager->get('one'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function exception_method_not_supported_test(){
        $this->expectErrorMessage('method not supported');
        $cacheManager = CacheFactory::make(MemcachedAdapter::class);
        $cacheManager->lpush('two','2');
    }

    /**
     * @test
     * @throws Exception
     */
    public function exception_cache_manager_not_found_test(){
        $this->expectErrorMessage('Cache Manager Not Found');
        $cacheManager = CacheFactory::make('FakeString');
    }
}
