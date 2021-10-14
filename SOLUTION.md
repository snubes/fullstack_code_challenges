# A brief explanation of this solution.

The old implementation is a "conditional" & "dynamic" wrapper of each caching system, which is very fragile, is prone to bugs, and is very much not nice to look at.

Writing wrappers of each cache's methods would just be noise, because in the end the same methods will be called.

In order to keep the manager API usage as unchanged as we can(trying to mock a real code base), it would be considerably better to use a simple cache manager,
which returns the respective cache.

- Namespace: ``` Snubes\FullStackCodeChallenges\CacheManagerChallenge\Cache ```, composer autoloaded.

---

Please use the following command to execute the index file

```bash
php -f index.php
```
