<?php

namespace Streams\Cli\Console;

use Illuminate\Support\Arr;
use Illuminate\Console\Command;
use Streams\Core\Support\Facades\Streams;

class EntriesCreate extends Command
{

    /**
     * @inheritDoc
     *
     * @var string
     */
    protected $signature = 'entries:create
        {stream : The entry stream.}
        {input? : Formatted entry input.}
        {--json= : JSON entry input.}
        {--ask : Ask for missing input.}';

    public function handle()
    {
        $stream = Streams::make($this->argument('stream'));

        if ($input = $string = $this->argument('input')) {
            parse_str($string, $input);
        }

        $input = (array) (json_decode($this->option('json'), true) ?: $input);

        if (!$input || $this->hasArgument('ask')) {
            $this->askForInput($stream, $input);
        }
        
        if (!$input) {
            return $this->error('Truly, one cannot create something from nothing.');
        }

        $messages = $stream->validator($input)->messages()->all();

        if ($messages) {

            array_walk($messages, function ($message) {
                $this->error($message);
            });

            return 1;
        }

        $entry = $stream->repository()->create($input);

        // If has path in config might be better?
        // if ($stream->source['type'] == 'filebase') {
        //     $this->info('Created: ' . base_path($stream->source['path'] . '/' . $entry->id . '.' . Arr::get($stream->source, 'format', 'md')));
        // }

        $this->info(json_encode([
            'message' => 'Entry created successfully.',
            'data' => $entry,
        ]));
    }

    public function askForInput($stream, &$input)
    {
        foreach ($stream->fields as $field) {
            if (!is_null($value = $this->ask("{$field->name()}: " . ($field->isRequired() ? '(*)' : '')))) {
                $input[$field->handle] = $value;
            }
        }
    }
}
