<?php

namespace Streams\Cli\Console;

use Illuminate\Console\Command;
use Streams\Core\Support\Facades\Streams;

class StreamsRun extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'streams:run
        {workflow : The handle/gist of the desired workflow.}
        {options? : Formatted options to send the blueprint.}
        {--json= : JSON input to send the blueprint.}';

    public function handle()
    {
        $blueprint = Streams::repository('dev.blueprints')->find($this->argument('blueprint'));
        
        $options = $this->argument('options');
        $json = json_decode($this->option('json'), true);
        
        dd($options);
    }
}
