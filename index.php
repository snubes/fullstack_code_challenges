<?php

declare(strict_types = 1);

require "./vendor/autoload.php";

use CacheManager\Src\CHClass\CacheManager;

try{

	$redisCacheManager = (new CacheManager())
				->getInstance('redis');
	$redisCacheManager->connect();
	$redisCacheManager->set('one','1');
	$redisCacheManager->lpush('two','1');
	$redisCacheManager->lpush('two','2');
	echo $redisCacheManager->get('one') . "\n";

	$memCacheManager = (new CacheManager())
					->getInstance('memcache');
	$memCacheManager->connect();
	$memCacheManager->set('one','1');
	//we dont have such method in memcacheManager
	$memCacheManager->lpush('two','2'); // generates exception
	echo $memCacheManager->get('one') . "\n";;

}catch(Exception $e){
	echo $e->getMessage() . "\n";;
	exit();
}catch (\Error $e) {
    echo $e->getMessage() . "\n";;
    exit();
}