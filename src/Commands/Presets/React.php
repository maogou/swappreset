<?php

namespace Maogou\Preset\Commands\Presets;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Console\Presets\React as LaravelReact;

class React extends LaravelReact
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
                "@babel/preset-react" => "^7.0.0" ,
                "axios" => "^0.18" ,
                "bootstrap" => "^4.0.0" ,
                "cross-env" => "^5.1" ,
                "jquery" => "^3.2" ,
                "laravel-mix" => "^4.0.7" ,
                "lodash" => "^4.17.5" ,
                "popper.js" => "^1.12" ,
                "react" => "^16.2.0" ,
                "react-dom" => "^16.2.0" ,
                "resolve-url-loader" => "^2.3.1" ,
                "sass" => "^1.15.2" ,
                "sass-loader" => "^7.1.0"
            ] + Arr::except($packages, ['vue']);
    }
}
