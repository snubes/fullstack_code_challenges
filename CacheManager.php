<?php

/**
 * Created by IntelliJ IDEA.
 * User: jmcghee
 * Date: 03.11.21
 * Time: 04:42
 */


interface CacheHandle{
    public function connect(string $host, string $port);
    public function get(string $key);
    public function set(string $key, string $value);
    public function lpush(string $key, string $value);
}

abstract class Cache implements CacheHandle
{
    protected static $instance;
    protected $namedCache;
    protected $sysCache;
    abstract public static function getInstance(string $namedCache, string $host=null, string $port=null);
    abstract public function getCache();
    abstract public function connect(string $host, string $port);
}

class CacheManager extends Cache {

    protected static $instance = null;

    /**
     * @var string
     */
    protected $namedCache = 'undef';
    /**
     * @var mixed|null
     */
    protected $sysCache = null;

    protected $host = null;
    protected $port = null;


    private function __clone(){}
    protected function __construct(){}

    /**
     * Singleton to prevent mem fatigue
     * We only want one handle
     * @throws Exception
     */
    public static function getInstance(string $namedCache, string $host=null, string $port=null){

        if(self::$instance === null )
            self::$instance = new SolidCacheManager();

        if( self::$instance->namedCache != $namedCache ){
            self::$instance->setCache($namedCache);
            self::$instance->connect($host,$port);
        }

        return self::$instance;
    }

    public function getCache():string{
        return $this->namedCache;
    }
    /**
     * @throws Exception
     */
    protected function setCache(string $namedCache){

        if($this->namedCache != $namedCache) {

            $this->namedCache = $namedCache;
            $class = 'Class' . $namedCache;

            try {
                $this->sysCache = new $class();
                if(!$this->sysCache instanceof CacheHandle) {
                    throw new Exception("'$namedCache' must implement 'CacheHandle' interface");
                }
            } catch (Exception $e) {
                throw new Exception("Could not set '$namedCache' as valid cache system");
            }
        }

    }

    /**
     * @throws Exception
     */
    public function connect(string $host, string $port){
        try {
            $this->sysCache->connect( $host, $port);
        } catch (Exception $e) {
            throw new Exception("Could not connect to '$host' on port '$port'");
        }
    }

    public function get(string $key)
    {
        return $this->sysCache->get($key);
    }

    public function set(string $key, string $value, string $is_compressed = null, string $ttl = null)
    {
        return $this->sysCache->set($key,$value,$is_compressed,$ttl);
    }

    public function lpush(string $key, string $value)
    {
        return $this->sysCache->lPush($key,$value);
    }
}

$cm=CacheManager::getInstance('Redis','redHost','121');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
echo $cm->get('one');
$cm=SolidCacheManager::getInstance('MemCache','memHost','121');
$cm->set('one','1');
$cm->lpush('two','2'); // generates exception or notice (whatever will be implemented)
echo $cm->get('one');

