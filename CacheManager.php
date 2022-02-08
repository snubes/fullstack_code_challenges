<?php

use RedisClient;
use MemcacheClient;

$cm=new RedisClient(new \Redis());

$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
echo $cm->get('one');

$cm=new MemcacheClient(new \Memcache());
$cm->connect('somehost','121');
$cm->set('one','1');
echo $cm->get('one');


