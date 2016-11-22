<?php
/*
Plugin Name: Logging with Monolog
Plugin URI: http://wordpress.org/tnyholm
Description: Logging stuff with monolog
Author: Tobias Nyholm
Version: 0.1
Author: http://tnyholm.se
*/

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Make sure we use composer autoload
require_once __DIR__.'/../../vendor/autoload.php';

class MyLogger
{
    private $monolog;

    public function __construct()
    {
        // Create the logger
        $this->monolog = new Logger('my_logger');

        // Add some handlers
        $this->monolog->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG));
    }

    public function log($level, $message, array $context = array())
    {
        $this->monolog->log($level, $message, $context);
    }
}

function addLogEntry($level, $message, array $context = array())
{
    global $logger;
    if (!$logger) {
        $logger = new MyLogger();
    }

    $logger->log($level, $message, $context);
}

add_action('aal_insert_log', 'convertAryoActivityLogToMonolog');
function convertAryoActivityLogToMonolog($args)
{
    addLogEntry('info', 'activity_log', $args);
}
