<?php

namespace GiveBlood\Console\Commands;

//use Illuminate\Console\Command;
use Illuminate\Foundation\Console\ModelMakeCommand;

class MakeModelCommand extends ModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //   protected $signature = 'make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model class with Modules namespace';


    protected function getPath($name): string
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);

        return $this->laravel[ 'path' ].'/Modules/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Get the root namespace for the class.
     */
    protected function rootNamespace(): string
    {
        return $this->laravel->getNamespace().'Modules';
    }

    /**
     * Create a new command instance.
     *
     * @return void
     *
    public function __construct()
    {
        parent::__construct();
    }
     */

    /**
     * Execute the console command.
     *
     * @return mixed
     *
    public function handle()
    {
        //
    }
     */
}
