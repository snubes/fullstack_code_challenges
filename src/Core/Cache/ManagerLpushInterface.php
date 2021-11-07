<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

namespace Cache;

interface ManagerLpushInterface
{
    public function lpush(string $key, string $value): void;
}
