<?php

/**
 * PresetCommandTest
 */

namespace Maogou\Tests\Commands;

use InvalidArgumentException;
use Orchestra\Testbench\TestCase;
use Maogou\Preset\PresetServiceProvider;

class PresetCommandTest extends TestCase
{
    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $finder;

    /**
     * @var string
     */
    private $currentPath = __DIR__;

    public function setUp(): void
    {
        parent::setUp();

        $this->app->setBasePath($this->currentPath);

        $this->finder = $this->app['files'];
        $this->finder->copyDirectory(
            $this->currentPath . '/../resources' ,
            $this->currentPath . '/resources'
        );
        $this->finder->copy(
            $this->currentPath . '/resources/package.json' ,
            $this->currentPath . '/package.json'
        );
    }

    public function tearDown(): void
    {
        $this->finder->deleteDirectory($this->currentPath . '/resources');
        $this->finder->delete(
            [
                $this->currentPath . '/package.json' ,
                $this->currentPath . '/webpack.mix.js'
            ]
        );

        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return [
            PresetServiceProvider::class ,
        ];
    }

    /**
     * test_invalid_argument_exception
     *
     * @test
     *
     * @return void
     */
    public function test_invalid_argument_exception()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->artisan('swap:preset' , ['type' => 'maogou'])
            ->assertExitCode(1);
    }

    /**
     * test_swap_preset_none_front_end
     *
     * @test
     *
     * @return void
     */
    public function test_swap_preset_none_front_end()
    {
        $this->artisan('swap:preset' , ['type' => 'none'])
            ->expectsOutput('Frontend scaffolding removed successfully.')
            ->assertExitCode(0);
    }

    /**
     * test_swap_preset_vue_front_end
     *
     * @test
     *
     * @return void
     */
    public function test_swap_preset_vue_front_end()
    {
        $this->artisan('swap:preset' , ['type' => 'vue'])
            ->expectsOutput('Vue scaffolding installed successfully.')
            ->expectsOutput(
                'Please run "npm install && npm run dev" to compile your fresh scaffolding.'
            )
            ->assertExitCode(0);
    }

    /**
     * test_swap_preset_bootstrap_front_end
     *
     * @test
     *
     * @return void
     */
    public function test_swap_preset_bootstrap_front_end()
    {
        $this->artisan('swap:preset' , ['type' => 'bootstrap'])
            ->expectsOutput('Bootstrap scaffolding installed successfully.')
            ->expectsOutput(
                'Please run "npm install && npm run dev" to compile your fresh scaffolding.'
            )
            ->assertExitCode(0);
    }

    /**
     * test_swap_preset_react_front_end
     *
     * @test
     *
     * @return void
     */
    public function test_swap_preset_react_front_end()
    {
        $this->artisan('swap:preset' , ['type' => 'react'])
            ->expectsOutput('React scaffolding installed successfully.')
            ->expectsOutput(
                'Please run "npm install && npm run dev" to compile your fresh scaffolding.'
            )
            ->assertExitCode(0);
    }

    /**
     * test_swap_preset_element-ui_front_end
     *
     * @test
     *
     * @return void
     */
    public function test_swap_preset_element_front_end()
    {
        $this->artisan('swap:preset' , ['type' => 'element'])
            ->expectsOutput('Element scaffolding installed successfully.')
            ->expectsOutput(
                'Please run "npm install && npm run dev" to compile your fresh scaffolding.'
            )
            ->assertExitCode(0);
    }

}