<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

namespace Cache;

interface ManagerPlainInterface
{
    public function set(string $key, string $value, int $ttl = 0);
}
