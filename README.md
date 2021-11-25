# PHP Cache Manager

# Cache driver supports
`memcache` and `redis`

# Usages

```php

try {
    $cm = new CacheManager('redis', '127.0.0.1', 6379);
    $cm->set('one','1');
    $cm->lpush('two','1');
    $cm->lpush('two','2');
    echo $cm->get('one');

    $cm = new CacheManager('memcache', '127.0.0.1', 11211);
    $cm->set('one','1');
    $cm->lpush('two','2'); // generates exception
    echo $cm->get('one');
} catch (\Exception $e) {
    echo $e->getMessage();
}
...
