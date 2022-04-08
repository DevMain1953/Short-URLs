<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Url\Adapter\IUrlAdapter;
use App\Services\Url\Adapter\CustomUrlAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Binds adapter class into the container that should only be resolved one time.
        $this->app->singleton(IUrlAdapter::class, function($app) {
            switch ($app->make('config')->get('services.url_adapter')) {
                case 'custom':
                    return new CustomUrlAdapter();
                break;

                default:
                    throw new \Exception("Undefined Adapter!!!");
                break;
            }
        });
    }
}
