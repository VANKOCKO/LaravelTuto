<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends  ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->bind('App\CacheInterface','App\CacheFile');
    }
    public function provides()
    {
         return ['App\CacheInterface'];
    }
}



?>
