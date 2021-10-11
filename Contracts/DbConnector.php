<?php

namespace Snudes\Contracts;

interface DbConnector
{
    public function connect(string $host, string $port);
}
