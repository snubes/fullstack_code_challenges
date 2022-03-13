<?php

namespace App\caches\services\interfaces;

interface PushCustomInterface
{
  /**
   * @param string $key
   * @param string $value
   */
  public function lpush(string $key, string $value): void;
}
