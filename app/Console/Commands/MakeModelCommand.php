<?php

namespace DoeSangue\Console\Commands;

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
    protected $description = 'Create a new model class with Models namespace';


    protected function getPath($name)
    {
        $name = str_replace_first($this->rootNamespace(), '', $name);

        return $this->laravel['path'].'/Models/'.str_replace('\\', '/', $name).'.php';
    }
    /**
     * Get the root namespace for the class.
     * @return string
     */
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace() . 'Models';
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
