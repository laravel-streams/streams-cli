<?php

namespace Streams\Cli;

use Illuminate\Support\ServiceProvider;
use Streams\Core\Support\Facades\Streams;

class CliServiceProvider extends ServiceProvider
{

    /**
     * The class aliases.
     *
     * @var array
     */
    public $aliases = [];

    /**
     * The class bindings.
     *
     * @var array
     */
    public $bindings = [];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    public $singletons = [];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__ . '/../resources/config/cp.php', 'streams.cp');

        // $this->publishes([
        //     base_path('vendor/streams/ui/resources/public')
        //     => public_path('vendor/streams/ui')
        // ], ['public']);

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Streams\Cli\Console\StreamsMake::class,
                \Streams\Cli\Console\EntriesCreate::class,
                \Streams\Cli\Console\EntriesUpdate::class,
            ]);
        }
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        Streams::register([
            'handle' => 'cli.blueprints',
            'source' => [
                'path' => 'streams/cli/blueprints',
                'format' => 'json',
            ],
            'config' => [
                'prototype' => 'Streams\\Cli\\Blueprint\\Blueprint',
            ],
            'fields' => [
                'template' => [],
                'parent' => [
                    'type' => 'relationship',
                    'related' => 'cli.blueprints',
                ],
            ],
        ]);
    }
}
