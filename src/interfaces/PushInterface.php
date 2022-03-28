<?php

namespace App\interfaces;

interface PushInterface
{
  /**
   * @param string $key
   * @param string $value
   */
  public function lpush(string $key, string $value): void;
}