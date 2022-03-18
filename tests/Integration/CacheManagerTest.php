<?php

namespace Integration;

use App\Cache\CacheManager;
use App\Cache\CacheServiceInterface;
use PHPUnit\Framework\TestCase;

class CacheManagerTest extends TestCase
{
    private CacheServiceInterface $cacheManager;

    protected function tearDown(): void
    {
        $this->cacheManager->flushAll();
    }

    /**
     * @test
     */
    public function redis_set_and_get()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->cacheManager->set('one', '1');
        $this->assertEquals(1, $this->cacheManager->get('one'));
        $this->assertEquals(1, $this->cacheManager->get('one'), 'double call does not have same result on get method');
    }

    /**
     * @test
     */
    public function redis_get_not_exist_key()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->assertFalse($this->cacheManager->get('one'));
    }

    /**
     * @test
     */
    public function redis_LPop_not_exist_key()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->assertFalse($this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function redis_lPop_not_work_on_not_list_data()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->cacheManager->set('one', '1');
        $this->assertFalse($this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function redis_lPush_not_work_on_not_list_data()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->cacheManager->set('one', '1');
        $this->assertFalse($this->cacheManager->lPush('one'));
    }

    /**
     * @test
     */
    public function redis_lPush_and_lPop()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->cacheManager->lPush('one', '1');
        $this->assertEquals(1, $this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function redis_lPush_append_and_lPop()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->cacheManager->lPush('one', '1');
        $this->cacheManager->lPush('one', '2');
        $this->assertEquals(2, $this->cacheManager->lPop('one'));
        $this->assertEquals(1, $this->cacheManager->lPop('one'));
        $this->assertFalse($this->cacheManager->lPop('one'));
        $this->assertFalse($this->cacheManager->get('one'));
    }

    /**
     * @test
     */
    public function redis_LPush_can_append_multiple_values()
    {
        $this->cacheManager = CacheManager::setCache('redis');
        $this->cacheManager->lPush('one', '1', '2', '3');
        $this->cacheManager->lPush('one', '4', '5', '6');
        $this->assertEquals(6, $this->cacheManager->lPop('one'));
        $this->assertEquals(5, $this->cacheManager->lPop('one'));
        $this->assertEquals(4, $this->cacheManager->lPop('one'));
        $this->assertEquals(3, $this->cacheManager->lPop('one'));
        $this->assertEquals(2, $this->cacheManager->lPop('one'));
        $this->assertEquals(1, $this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function redis_set_over_write()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->cacheManager->set('one', '1');
        $this->cacheManager->set('one', '2');
        $this->assertEquals(2, $this->cacheManager->get('one'));
    }

    /**
     * @test
     */
    public function memcached_set_and_get()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->cacheManager->set('one', '1');
        $this->assertEquals(1, $this->cacheManager->get('one'));
        $this->assertEquals(1, $this->cacheManager->get('one'), 'double call does not have same result on get method');
    }

    /**
     * @test
     */
    public function memcached_get_when_not_exist_key()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->assertFalse($this->cacheManager->get('one'));
    }

    /**
     * @test
     */
    public function memcached_lPop_not_exist_key()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->assertFalse($this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function memcached_lPop_not_work_on_not_list_data()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->cacheManager->set('one', '1');
        $this->assertFalse($this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function memcached_lPush_not_work_on_not_list_data()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->cacheManager->set('one', '1');
        $this->assertFalse($this->cacheManager->lPush('one'));
    }

    /**
     * @test
     */
    public function memcached_lPush_and_lPop()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->cacheManager->lPush('one', '1');
        $this->assertEquals(1, $this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function memcached_lPush_append_and_lPop()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->cacheManager->lPush('one', '1');
        $this->cacheManager->lPush('one', '2');
        $this->assertEquals(2, $this->cacheManager->lPop('one'));
        $this->assertEquals(1, $this->cacheManager->lPop('one'));
        $this->assertFalse($this->cacheManager->lPop('one'));
        $this->assertFalse($this->cacheManager->get('one'));
    }

    /**
     * @test
     */
    public function memcached_LPush_can_append_multiple_values()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->cacheManager->lPush('one', '1', '2', '3');
        $this->cacheManager->lPush('one', '4', '5', '6');
        $this->assertEquals(6, $this->cacheManager->lPop('one'));
        $this->assertEquals(5, $this->cacheManager->lPop('one'));
        $this->assertEquals(4, $this->cacheManager->lPop('one'));
        $this->assertEquals(3, $this->cacheManager->lPop('one'));
        $this->assertEquals(2, $this->cacheManager->lPop('one'));
        $this->assertEquals(1, $this->cacheManager->lPop('one'));
    }

    /**
     * @test
     */
    public function memcached_set_over_write()
    {
        $this->cacheManager = CacheManager::setCache('memcached');
        $this->cacheManager->set('one', '1');
        $this->cacheManager->set('one', '2');
        $this->assertEquals(2, $this->cacheManager->get('one'));
    }

    /**
     * @test
     * @throws \Exception
     */
    public function exception_cache_manager_not_found()
    {
        $this->cacheManager = CacheManager::setCache();
        $this->expectExceptionMessage('Cache Manager Not Found');
        CacheManager::setCache('Random string');
    }
}
