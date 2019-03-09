<?php

namespace Maogou\Preset\Commands\Presets;

use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;

class Element extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateBootstrapping();
        static::updateComponent();
        static::AppComponent();
        static::updateAppBoot();
        static::updateSass();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
                'axios' => '^0.15.3' ,
                'babel-core' => '^6.17.0' ,
                'babel-loader' => '^6.2.5' ,
                'babel-preset-es2015' => '^6.24.1' ,
                'bootstrap-sass' => '^3.3.7' ,
                'cross-env' => '^5.1.4' ,
                'css-loader' => '^0.25.0' ,
                'element-ui' => '^2.0.0' ,
                'jquery' => '^3.1.0' ,
                'laravel-mix' => '0.*' ,
                'lodash' => '^4.16.4' ,
                'style-loader' => '^0.13.1' ,
                'vue' => '^2.5.2' ,
                'vue-loader' => '^13.3.0' ,
            ] + Arr::except(
                $packages , [
                    '@babel/preset-react' ,
                    'react' ,
                    'react-dom' ,
                    'bootstrap' ,
                    'popper.js' ,
                    'sass-loader' ,
                    'sass' ,
                    'resolve-url-loader'
                ]
            );
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/element-stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/components/Example.js')
        );

        copy(
            __DIR__.'/element-stubs/ExampleComponent.vue',
            resource_path('js/components/ExampleComponent.vue')
        );
    }

    /**
     * copy the base App component
     *
     * @return void
     */
    protected static function AppComponent()
    {
        (new Filesystem)->delete(
            resource_path('js/App.vue')
        );

        copy(
            __DIR__.'/element-stubs/App.vue',
            resource_path('js/App.vue')
        );
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/element-stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        copy(__DIR__.'/element-stubs/_variables.scss', resource_path('sass/_variables.scss'));
        copy(__DIR__.'/element-stubs/app.scss', resource_path('sass/app.scss'));
    }

    /**
     * Update the app.js files.
     *
     * @return void
     */
    protected static function updateAppBoot()
    {
        copy(__DIR__.'/element-stubs/app.js', resource_path('js/app.js'));
    }
}
