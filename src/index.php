<?php

/*
 * Read more at https://github.com/Seldaek/monolog
 */

require_once __DIR__.'/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler;
use Monolog\Processor;
use Monolog\Formatter;

// create a log channel
$log = new Logger('my_logger');

$handler = new Handler\SocketHandler('udp://temp.happyr.io:4711');
$handler->setFormatter(new Formatter\LogstashFormatter(
    'test', null, null, 'ctxt_', Formatter\LogstashFormatter::V1
));
$log->pushHandler($handler);

// add records to the log
$log->warning('Foo');
$log->error('Bar');
$log->info('Baz');

/*
 * Answers to my presentation questions
 */

/*
$handler->pushProcessor(new Processor\GitProcessor());

$handler->setFormatter(new Formatter\JsonFormatter());

$log->pushHandler(new Handler\BrowserConsoleHandler());

$log->pushHandler(new Handler\NativeMailerHandler('tobias.nyholm@gmail.com', 'Log message!', 'tobias.nyholm@gmail.com'));

$handler->pushProcessor(function($record) {
    $record['extra']['test'] = 'Hello World!';

    return $record;
});

$handler = new Handler\FingersCrossedHandler($handler, new Handler\FingersCrossed\ErrorLevelActivationStrategy(Logger::ALERT));

*/