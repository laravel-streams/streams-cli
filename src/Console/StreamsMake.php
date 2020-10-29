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
    protected $signature = 'streams:make {blueprint}';

    public function handle()
    {
        $blueprint = Streams::repository('dev.blueprints')->find($this->argument('blueprint'));
        
        dd($blueprint);
    }
}
