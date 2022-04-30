<?php

namespace App\Interfaces;

interface lPushSupport
{
    public function lpush(string $key, string $value);
}

