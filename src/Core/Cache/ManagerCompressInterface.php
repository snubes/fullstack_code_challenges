<?php
/**
 * Created by PhpStorm.
 * User: isnain
 * Date: 09.08.21
 * Time: 10:14
 */

namespace Cache;

interface ManagerCompressInterface
{
    public function setCompress(string $key, string $value, int $ttl = 0);
}
