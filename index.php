<?php

namespace Dario\Snubes;

require_once ('vendor/autoload.php');

use Cache\RedisManager;
use Cache\MemcacheManager;

function pout($data)
{
    var_dump($data);
}

define('APP_ROOT', __DIR__);

$cm = new RedisManager();
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
pout($cm->get('one'));
pout($cm->get('two'));

$cm = new MemcacheManager();
$cm->set('one','1');
//$cm->lpush('two','2'); // would generate fatal error
pout($cm->get('one'));
