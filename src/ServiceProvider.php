<?php

namespace Xucaiming\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true; // 延迟注册 不会在框架启动就注册，而是当你调用到它的时候才会注册。

    public function register()
    {
        $this->app->singleton(Weather::class, function(){
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function provides()
    {
        return [Weather::class, 'weather'];
    }
}