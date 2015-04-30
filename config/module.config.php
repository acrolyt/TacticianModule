<?php

use CommandBus\Factory\CommandBusFactory;
use CommandBus\Factory\CommandBusPluginFactory;
use League\Tactician\CommandBus;

return [
    'service_manager' => [
        'factories' => [
           CommandBus::class => CommandBusFactory::class,
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'command' => CommandBusPluginFactory::class,
        ],
    ],

];