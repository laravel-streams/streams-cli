<?php

namespace Streams\Dev;

use Illuminate\Support\ServiceProvider;

/**
 * Class DevServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DevServiceProvider extends ServiceProvider
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
        //$this->mergeConfigFrom(__DIR__ . '/../resources/config/cp.php', 'streams.cp');

        // Streams::register([
        //     'handle' => 'cp.navigation',
        //     'source' => [
        //         'path' => 'streams/cp/navigation',
        //         'format' => 'json',
        //     ],
        //     'config' => [
        //         'prototype' => 'Streams\\Ui\\ControlPanel\\Component\\Navigation\\NavigationLink',
        //     ],
        //     'fields' => [
        //         'title' => 'string',
        //         'parent' => [
        //             'type' => 'relationship',
        //             'related' => 'cp.navigation',
        //         ],
        //     ],
        // ]);
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        // $this->publishes([
        //     base_path('vendor/streams/ui/resources/public')
        //     => public_path('vendor/streams/ui')
        // ], ['public']);
    }
}
