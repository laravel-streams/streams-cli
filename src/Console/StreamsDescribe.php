<?php

namespace Streams\Dev\Console;

use Illuminate\Console\Command;
use Streams\Core\Support\Facades\Streams;

class StreamsDescribe extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'streams:describe : Generate a stream describing the target data source.
        {target : The database, table, or model to describe.}
        {input? : Formatted input to send the blueprint.}
        {--input= : JSON input to send the blueprint.}';

    public function handle()
    {
        $blueprint = Streams::repository('dev.blueprints')->find($this->argument('blueprint'));
        
        $input = $this->argument('input');
        $json = json_decode($this->option('input'), true);
        
        dd($input);
    }
}
