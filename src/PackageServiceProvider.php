<?php

use Illuminate\Support\ServiceProvider;

/**
 * Author: Theo Champion
 * Date: 15/02/2023
 * Time: 15:56
 */
class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfiguration();
        }
    }

    private function publishConfiguration()
    {
        $this->publishes([
            __DIR__ . '/../config/' . Constants::CONFIG_FILENAME . '.php' => config_path(Constants::CONFIG_FILENAME) . '.php',
        ], 'config');
    }
}
