<?php
namespace App\Exception;

use Exception;

class InvalidConnectionParameterException extends Exception implements CacheException
{
    public $message = 'Invalid connection parameters';
}