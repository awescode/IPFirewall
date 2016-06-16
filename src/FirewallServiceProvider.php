<?php

namespace z7d\ip-firewall;

use \Illuminate\Support\ServiceProvider;
use \Illuminate\Foundation\Http\Kernel;
use Illuminate\Console\Scheduling\Schedule;

class FirewallServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {

        $this->publishes([
            __DIR__.'/config' => config_path()
        ], 'config');

        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ], 'migrations');

        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('firewall:flushtempips')->everyMinute();
        });

        $this->registerHelpers();

        $kernel->prependMiddleware(\z7d\ip-firewall\FirewallMiddleware::class);

        new FirewallMiddleware();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';

        $this->commands(['z7d\ip-firewall\FirewallConsole']);
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {

        if (file_exists($file = __DIR__.'/helpers.php'))
        {
            require $file;
        }
    }

}

