<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

namespace Cache;

use Cache\Adapter\AdapterInterface;

interface ManagerInterface
{
    public function get(string $key);
    public function connect(string $host, int $port);
}
