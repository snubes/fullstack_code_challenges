<?php


namespace CacheManager\Src\CHClass;

class X{
	public $arr;
	public function connect(...$args){
	}
	public function get($key){
		return $this->arr[$key];
	}
	public function set($key , $value , $ttl = null , $x = null){
		$this->arr[$key] = $value;	
	}
	public function lpush(...$args){
		
	}
}	