<?php

namespace Dario\Snubes;

require_once ('vendor/autoload.php');

use Cache\RedisManager;
use Cache\MemcacheManager;

function pout($data)
{
    var_dump($data);
}

$cm = new RedisManager('somehost','121');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
pout($cm->get('one'));
pout($cm->get('two'));

$cm = new MemcacheManager('somehost','121');
$cm->set('one','1');
//$cm->lpush('two','2'); // generates fatal error
pout($cm->get('one'));
