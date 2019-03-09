<?php

namespace Maogou\Preset;

use Illuminate\Support\ServiceProvider;

class PresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Maogou\Preset\Commands\PresetCommand::class
            ] );
        }
    }
}
