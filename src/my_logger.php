<?php

namespace App;

namespace App;

use Monolog\ErrorHandler;
use Monolog\Formatter\JsonFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\PsrLogMessageProcessor;
use Monolog\Processor\WebProcessor;

class Mylogger
{
    public function log()
    {
        $handler = new StreamHandler("logs/errors.log", Logger::ERROR);
        $handler->setFormatter(new JsonFormatter());
        $memoryProcessor = new MemoryUsageProcessor();
        $psrProcessor = new PsrLogMessageProcessor();
        $webProcessor = new WebProcessor();

        $logger = new Logger('my_Logger', [$handler], [
            $memoryProcessor,
            $psrProcessor,
            $webProcessor,
        ]);

        $logger->error('Error!');
        ErrorHandler::register($logger);
    }
}