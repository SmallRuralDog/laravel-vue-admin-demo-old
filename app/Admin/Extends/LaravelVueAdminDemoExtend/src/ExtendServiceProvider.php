<?php

namespace Smallruraldog\LaravelVueAdminDemoExtend;

use Illuminate\Support\ServiceProvider;
use SmallRuralDog\Admin\Admin;

class ExtendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Admin::script('laravel-vue-admin-demo-extend', __DIR__.'/../dist/js/extend.js');
        Admin::style('laravel-vue-admin-demo-extend', __DIR__.'/../dist/css/extend.css');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
