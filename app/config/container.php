<?php

use Cpelu\ConsoleApp\Command\CalculatorCommand;
use Cpelu\ConsoleApp\Service\Calculator;
use Cpelu\ConsoleApp\Service\File\FileDataProcessor;
use Symfony\Component\Console\Application;
use Pimple\Container;

$container = new Container();

// Services
$container['service.file_data_processor'] = function ($container) {
    return new FileDataProcessor(
        $container['service.calculator']
    );
};

$container['service.calculator'] = function ($container) {
    return new Calculator();
};

$container['command.calculator'] = function($container) {
    return new CalculatorCommand(
        $container['service.file_data_processor']
    );
};

$container['commands'] = function($container) {
    return [
        $container['command.calculator']
    ];
};

$container['application'] = function($container) {
    $application = new Application();
    $application->addCommands($container['commands']);
    return $application;
};

return $container;