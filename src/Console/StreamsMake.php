<?php

namespace Streams\Dev\Console;

use Illuminate\Console\Command;
use Streams\Core\Support\Facades\Streams;

class StreamsMake extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'streams:make
        {blueprint : The handle of the desired blueprint.}
        {input? : Formatted input to send the blueprint.}
        {--input= : JSON input to send the blueprint.}';

    public function handle()
    {
        $blueprint = Streams::repository('dev.blueprints')->find($this->argument('blueprint'));
        
        $input = json_decode($this->option('input'), true);
        
        dd($input);
    }
}
