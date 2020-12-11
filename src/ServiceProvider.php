<?php

namespace LaravelOpcacheFacade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\ClearCommand::class,
                Commands\ConfigCommand::class,
                Commands\StatusCommand::class,
            ]);
        }
    }
}
