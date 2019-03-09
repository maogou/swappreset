<?php

namespace Maogou\Preset\Commands\Presets;

use Illuminate\Foundation\Console\Presets\Bootstrap as LaravelBootstrap;

class Bootstrap extends LaravelBootstrap
{

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                "axios" => "^0.18" ,
                "bootstrap" => "^4.0.0" ,
                "cross-env" => "^5.1" ,
                "jquery" => "^3.2" ,
                "laravel-mix" => "^4.0.7" ,
                "lodash" => "^4.17.5" ,
                "popper.js" => "^1.12" ,
                "resolve-url-loader" => "^2.3.1" ,
                "sass" => "^1.15.2" ,
                "sass-loader" => "^7.1.0" ,
                "vue" => "^2.5.17"
            ] + $packages;
    }
}
