<?php

interface ManagerInterface {
    /**
     * Connect to instance
     * @return bool connection result
     */
    public function connect(string $host, string $port);

    /**
     * Get key value
     * @param string $key key
     * @return mixed key value
     */
    public function get(string $key);

    /**
     * Set key value
     * @return bool operation result
     */
    public function set(string $key, string $value);


}