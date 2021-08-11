<?php
require_once  "Redis.php";
require_once  "Memcache.php";
require_once  "CacheManager.php";

$cm=new CacheManager();

$cm->setCache('redis');
$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
echo $cm->get('one');


$cm->setCache('memcache');
$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','2'); // generates exception
echo $cm->get('one');

?>