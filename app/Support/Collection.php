<?php

namespace App\Support;

use JsonSerializable;

class Collection implements JsonSerializable
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function add($items)
    {
        return $this->items = array_merge($this->items, $items);
    }

    public function merge($collection = null)
    {
        return $this->add($collection->items);
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
} 
