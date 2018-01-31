<?php

ini_set('memory_limit', '256M');

require_once __DIR__.'/vendor/autoload.php';

\Symfony\Component\Debug\ErrorHandler::register();
\Monolog\ErrorHandler::register(new \Psr\Log\NullLogger());

// Trigger PHP Fatal error: Allowed memory size
$overflow = 'overflow';
while (true) {
    $overflow .= $overflow;
}
