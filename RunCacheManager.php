<?php

    
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
try{
    $cm->lpush('two','2');
} catch (Exception $e) {
    echo 'Message: ' .$e->getMessage();
}
 // generates exception
echo $cm->get('one');
