<?php

namespace Streams\Cli\Console;

use Illuminate\Support\Arr;
use Illuminate\Console\Command;
use Streams\Core\Support\Facades\Streams;

class EntriesUpdate extends Command
{

    /**
     * @inheritDoc
     *
     * @var string
     */
    protected $signature = 'entries:update
        {stream : The entry stream.}
        {entry : The entry identifier.}
        {input? : Formatted entry input.}
        {--json= : JSON entry input.}';

    public function handle()
    {
        $stream = Streams::make($this->argument('stream'));
        $entry = $stream->repository()->find($this->argument('entry'));

        if ($input = $string = $this->argument('input')) {
            parse_str($string, $input);
        }

        $input = json_decode($this->option('json'), true) ?: $input;

        $entry->loadPrototypeAttributes($input);

        $messages = $entry->validator($input)->messages()->all();

        if ($messages) {

            array_walk($messages, function ($message) {
                $this->error($message);
            });

            return 1;
        }

        $entry->save();

        if ($stream->source['type'] == 'filebase') {
            $this->info('Updated: ' . base_path($stream->source['path'] . '/' . $entry->id . '.' . Arr::get($stream->source, 'format', 'md')));
        }

        $this->info($entry);
    }
}
