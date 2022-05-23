<?php
namespace App\Cache\Driver;

interface LeftPushInterface
{
    public function lpush(string $key, string $value): void;
}
