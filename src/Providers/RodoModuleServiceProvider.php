<?php

namespace Selene\Modules\RodoModule\Providers;

use Illuminate\Support\ServiceProvider;
use Selene\Modules\RodoModule\Services\RodoService;

class RodoModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(RodoService::class, function() {
            return new RodoService(
                config('selene.rodo')['url'],
                config('selene.rodo')['username'],
                config('selene.rodo')['password'],
                config('selene.rodo')['source']
            );
        });
    }

    public function boot(){}
}
