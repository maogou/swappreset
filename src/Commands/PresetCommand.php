<?php

namespace Maogou\Preset\Commands;

use Illuminate\Console\Command;
use InvalidArgumentException;
use Maogou\Preset\Commands\Presets\Element;

class PresetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swap:preset
                            { type : The preset type (none, bootstrap, vue, react,element) }
                            { --option=* : Pass an option to the preset command }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Swap the front-end scaffolding for the application';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), ['none','bootstrap','vue','react','element'])) {
            throw  new InvalidArgumentException('Invalid preset.');
        }

        return $this->{$this->argument('type')}();
    }

    /**
     * Install the "fresh" preset.
     *
     * @return void
     */
    protected function none()
    {
        $this->call('preset',['type'=>'none']);
    }

    /**
     * Install the "bootstrap" preset.
     *
     * @return void
     */
    protected function bootstrap()
    {
        $this->call('preset',['type'=>'bootstrap']);
    }

    /**
     * Install the "vue" preset.
     *
     * @return void
     */
    protected function vue()
    {
        $this->call('preset',['type'=>'vue']);

    }

    /**
     * Install the "react" preset.
     *
     * @return void
     */
    protected function react()
    {
        $this->call('preset',['type'=>'react']);
    }

    /**
     * Install the "element-ui" preset.
     *
     * @return void
     */
    protected function element()
    {
        Element::install();

        $this->info('Element scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
