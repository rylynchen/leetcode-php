<?php

class LRUCache {

    private $capacity;
    private $hash;
    private $used;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
        $this->hash = [];
        $this->used = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (isset($this->hash[$key])) {
            $value = $this->hash[$key];
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->used[] = $key;
        } else {
            $value = -1;
        }
        return $value;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if (isset($this->hash[$key])) {
            $this->hash[$key] = $value;
            $index = array_search($key, $this->used);
            unset($this->used[$index]);
            $this->used[] = $key;
        } else {
            if (count($this->hash) == $this->capacity) {
                $dropKey = reset($this->used);
                array_shift($this->used);
                unset($this->hash[$dropKey]);
            }
            $this->hash[$key] = $value;
            $this->used[] = $key;
        }
    }
}

$capacity = 2;
$cache = new LRUCache($capacity);
$cache->put(1, 1);
$cache->put(2, 2);
var_dump($cache->get(1));
$cache->put(3,3);
var_dump($cache->get(2));
$cache->put(4,4);

var_dump($cache->get(1));
var_dump($cache->get(3));
var_dump($cache->get(4));