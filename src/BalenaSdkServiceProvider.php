<?php
namespace Mintopia\LaravelBalenaSdk;

use Mintopia\LaravelBalenaSdk\BalenaSdkServiceProvider;
use Illuminate\Support\ServiceProvider;
use Mintopia\BalenaSdk\Manager;

class DbQueryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/config/balena.php' => config_path('balena.php')
        ]);
    }

    public function register()
    {
        $this->app->singleton(Manager::class, function($app) {
            $manager = new Manager;
            $manager->setApiKey(config('balena.apikey'));
            return $manager;
        });
    }
}