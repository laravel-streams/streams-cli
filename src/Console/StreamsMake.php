<?php

namespace Streams\Cli\Console;

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
        {blueprint : The handle/gist of the desired blueprint.}
        {input? : Formatted input to send the blueprint.}
        {--json= : JSON input to send the blueprint.}';

    public function handle()
    {
        $blueprint = Streams::repository('cli.blueprints')->find($this->argument('blueprint'));
        
        if ($input = $string = $this->argument('input')) {
            parse_str($string, $input);
        }
        
        $input = json_decode($this->option('json'), true) ?: $input;
        
        dd($input);
    }
}
