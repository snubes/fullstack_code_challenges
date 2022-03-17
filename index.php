<?php

use app\CacheManager;
use app\plugin\FileCache;
use app\plugin\RedisCache;
use app\plugin\MemCache;

include_once "vendor/autoload.php";

try {
    $cacheManager = new CacheManager(new RedisCache());
    $cacheManager->set('test', 'ddd');
    print($cacheManager->get('test'));
    $cacheManager->append();

}catch (Exception $e){
    echo $e->getMessage();
}

try {
    $cacheManager = new CacheManager(new FileCache());
    $cacheManager->set('test', 'ddd');
    print($cacheManager->get('test'));
    $cacheManager->append();

}catch (Exception $e){
    echo $e->getMessage();
}


try {
    $cacheManager = new CacheManager(new MemCache());
    $cacheManager->set('test', 'ddd');
    print($cacheManager->get('test'));
    $cacheManager->append();

}catch (Exception $e){
    echo $e->getMessage();
}







