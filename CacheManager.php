<?php
	abstract class cache{
		
		abstract function set(string $key, string $value, $is_compressed=null, string $ttl=null);
		
		abstract function get(string $key);
		
		abstract function lpush(string $key, string $value);
		
		abstract function connect(string $host, string $port);
	}
	
	Class redis extends cache{
		
		private $cache;
		
		public function __construct()
		{
			$this->cache = new \Redis();
			
			//Do your magic here
		}
		
		function set(string $key, string $value, $is_compressed=null, string $ttl=null)
		{
			// TODO: Implement set() method.
			$this->cache->set($key,$value);
		}
		
		function get(string $key)
		{
			// TODO: Implement get() method.
			
			return $this->cache->get($key);
			
		}
		
		function lpush(string $key, string $value)
		{
			// TODO: Implement lpush() method.
			$this->cache->lPush($key,$value);
		}
		
		function connect(string $host, string $port)
		{
			// TODO: Implement connect() method.
			$this->cache->connect($host,$port);
		}
	}
	
	
	Class memcache extends cache{
		private $cache;
		
		public function __construct()
		{
			$this->cache = new \Memcache();
			
			//Do your magic here
		}
		
		
		function set(string $key, string $value, $is_compressed=null, string $ttl=null)
		{
			$this->cache->set($key,$value,$is_compressed,$ttl);
		}
		
		function get(string $key)
		{
			// TODO: Implement get() method.
			
			return $this->cache->get($key);
			
		}
		
		function lpush(string $key, string $value)
		{
			// TODO: Implement lpush() method.
			throw new \Exception("method not supported");
		}
		
		function connect(string $host, string $port)
		{
			// TODO: Implement connect() method.
			$this->cache->connect($host,$port);
		}
	}
	
	
	Class cacheManager {
		
		private $cache;
		
		public function __construct(cache $cache)
		{
			
			$this->cache = $cache;
			
		}
		
		public function connect (string $host, string $port) {
			$this->cache->connect($host,$port);
		}
		
		public function set(string $key, string $value, $is_compressed, string $ttl){
			$this->cache->set($key, $value, $is_compressed, $ttl);
		}
		
		public function get(string $key){
			return$this->cache->get($key);
		}
		
		public function lpush(string $key, string $value)
		{
			// TODO: Implement lpush() method.
			$this->cache->lPush($key,$value);
		}
	}
	
	$cache = new redis();
	try {
		$cm = new CacheManager($cache);
		$cm->connect('somehost','121');
		$cm->set('one','1', null, null );
		$cm->lpush('two','1');
		$cm->lpush('two','2');
		echo $cm->get('one');
	} catch (Exception $e) {
	}
	
	
	$cache = new memcache();
	try {
		$cm = new CacheManager($cache);
		$cm->connect('somehost','121');
		$cm->set('one','1', '', '');
		$cm->lpush('two','2'); // generates exception
		echo $cm->get('one');
	} catch (Exception $e) {
	}
	
