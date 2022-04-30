<?php

namespace App\Classes;

class CacheManager {

    private Cache $cache;

    public function __construct(Cache $cache) {
      $this->cache = $cache;
    }
    /**
   * Retrieve cached data by its key
   */
  public function retrieve($key) {
    return $this->catch->get($key);
  }
    /**
   * Store cached data
   */
  function store(...$args){ 
        $params = func_get_args();
        $this->catch->set($params);
  } 
}

