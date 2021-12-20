<?php declare(strict_types=1);

namespace Snubes;

use Snubes\Cache\Factory\CacheManagerFactory;
use Snubes\Cache\Manager\RedisManager;
use Snubes\Cache\Manager\MemcacheManager;
use Snubes\Cache\Struct\Credentials;
use Exception;

$factory = new CacheManagerFactory();

try {
    $cm = $factory->make(RedisManager::SYSTEM, new Credentials('somehost', '121'));
    $cm->set('one', '1');
    $cm->lpush('two', '1');
    $cm->lpush('two', '2');
    echo $cm->get('one');
} catch (Exception $exception) {
    echo $exception->getMessage();
}

try {
    $cm = $factory->make(MemcacheManager::SYSTEM, new Credentials('somehost', '121'));
    $cm->set('one', '1');
    $cm->lpush('two', '2'); // generates exception
    echo $cm->get('one');
} catch (Exception $exception) {
    echo $exception->getMessage();
}

