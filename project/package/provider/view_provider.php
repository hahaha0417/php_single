<?php

namespace hahaha\package;

use Illuminate\Support\ServiceProvider;

class view_provider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadViewsFrom(__DIR__ . "/..", "package");
    }
}
