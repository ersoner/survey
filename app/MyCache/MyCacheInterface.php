<?php


namespace App\MyCache;


interface MyCacheInterface
{
    public function get();

    public function add($item);

    public function remove();
}
