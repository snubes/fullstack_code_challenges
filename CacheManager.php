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

$cm->setCache('redis');
$cm->connect('somehost', '121');
$cm->set('one', '1');
$cm->lpush('two', '1');
$cm->lpush('two', '2');
echo $cm->get('one');

$cmMemcache = new Memcache();

$cm->setCache('memcache');
$cm->connect('somehost', '121');
$cm->set('one', '1');
try {
    $cm->lpush('two', '2'); // generates exception
} catch (Exception $e) {
    echo $e->messages;
}

echo $cm->get('one');

