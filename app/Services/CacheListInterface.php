<?php

/**
 * Author: Dilani Maheswaran
 * Date: 07.04.2022
 */

namespace App\Services;

/**
 * Interface CacheListInterface
 * Provides method signatures to perform list operations. 
 */
interface CacheListInterface
{
    /**
     * Append a value to the list
     *
     * @param string $key
     * @param string $value
     */
	public function lpush(string $key, string $value) : void;

}