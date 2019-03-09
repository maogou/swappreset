<?php

namespace Maogou\Preset\Commands\Presets;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Console\Presets\None as LaravelNone;

class None extends LaravelNone
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
                "cross-env" => "^5.1" ,
                "laravel-mix" => "^4.0.7" ,
                "lodash" => "^4.17.5" ,
                "resolve-url-loader" => "^2.3.1" ,
                "sass" => "^1.15.2" ,
                "sass-loader" => "^7.1.0"
            ] + Arr::except(
                $packages , [
                    '@babel/preset-react' ,
                    'react' ,
                    'react-dom',
                    'vue',
                    'popper.js',
                    'jquery',
                    'bootstrap'
                ]
            );
    }
}
