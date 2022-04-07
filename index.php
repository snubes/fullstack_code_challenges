<?php

/**
 * Author: Dilani Maheswaran
 * Date: 07.04.2022
 */

require_once('vendor/autoload.php');

use App\Controllers\CacheController;
use App\Caches\MemcacheService;
use App\Caches\RedisService;

// Connect to Redis

try {
	//Inject Redis service to Cache Controller.
	$redis_service 	  = new RedisService();
	$redis_controller = new CacheController($redis_service);

	$redis_connection = $redis_controller->connect();

	if ($redis_connection) {

		$redis_controller->set('one','1');
		$redis_controller->lpush('two','1');
		$redis_controller->lpush('two','2');

		echo "Redis value One: " . $redis_controller->get('one') . "<br>";

	} else {
		echo "Could not connect to Redis Server.";
	}

} catch (BadMethodCallException $bmce) {

	print($bmce->getMessage());

} catch (Exception $redis_ex) {

	echo $redis_ex->getMessage();
}


// Connect to Memcache

try {
	//Inject Memcache service to Cache Controller.
	$memcache_service 	  = new MemcacheService();
	$memcache_controller = new CacheController($memcache_service);

	$memcache_connection = $memcache_controller->connect();

	if($memcache_connection) {

		$memcache_controller->set('one','1');
		$memcache_controller->set('two','2');
		$memcache_controller->lpush('two','2');

		echo "Memcache cache value One: " . $memcache_controller->get('one') . "<br>";
		echo "Memcache cache value Two: " . $memcache_controller->get('two') . "<br>";

	} else {
		echo "Could not connect to Memcache Server.";
	}

} catch (BadMethodCallException $bmce) {

	print($bmce->getMessage()); // Catch lpush exception

} catch (Exception $mem_ex) {

	print($mem_ex->getMessage());
}

?>