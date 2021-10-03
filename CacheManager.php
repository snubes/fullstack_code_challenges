<?php

/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */


class CacheManager
{
    private $cache;
}

$cmRedis = new Redis();

$cmRedis->connect('somehost', '121');
$cmRedis->set('one', '1');
$cmRedis->lpush('two', '1');
$cmRedis->lpush('two', '2');
echo $cmRedis->get('one');

$cmMemcache = new Memcache();

$cmMemcache->connect('somehost', '121');
$cmMemcache->set('one', '1');
try {
    $cmMemcache->lpush('two', '2'); // generates exception
} catch (Exception $e) {
    echo $e->messages;
}

echo $cmMemcache->get('one');

