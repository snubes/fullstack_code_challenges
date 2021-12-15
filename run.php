<?php

require_once('CacheManager.php');

$cm = new CacheManager();

try{
    $cm->setCacheManager('redis');
    $cm->connect('127.0.0.1','6379');
    $cm->set('one','1');
    $cm->lpush('two','1');
    $cm->lpush('two','2');
    echo $cm->get('one');
} catch(\Exception $e){
    echo 'Error! ' . $e->getMessage();
    exit();
}

try{
    $cm->setCacheManager('memcache');
    $cm->connect('somehost','121');
    $cm->set('one','1');
    $cm->lpush('two','2'); // generates exception
    echo $cm->get('one');
} catch(\Exception $e){
    echo 'Error! ' . $e->getMessage();
    exit();
}

