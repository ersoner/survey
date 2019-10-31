<?php


namespace App\MyCache;


use Illuminate\Support\Facades\Cache;

class UserMyCache implements MyCacheInterface
{
    protected $key;

    public function __construct()
    {
        $this->key = 'user';
    }

    public function get()
    {
        return Cache::get($this->key);
    }

    public function add($item)
    {
        $this->remove();
        Cache::forever($this->key, $item);
    }

    public function remove()
    {
        Cache::forget($this->key);
    }
}
