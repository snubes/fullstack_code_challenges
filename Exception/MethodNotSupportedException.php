<?php

namespace App\Exception;

class MethodNotSupportedException extends \Exception implements CacheException
{
    public $message = 'Method not supported';
}