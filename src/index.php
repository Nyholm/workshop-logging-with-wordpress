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

$handler = new Handler\StreamHandler(__DIR__.'/../logs/app.log', Logger::WARNING);
$log->pushHandler($handler);


// add records to the log
$log->warning('Foo');
$log->error('Bar');
$log->info('Baz');