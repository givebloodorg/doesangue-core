<?php

namespace GiveBlood\Console\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand;

class MakeProviderCommand extends ProviderMakeCommand
{

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new custom service provider class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Provider';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/provider.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Modules';
    }
}
