<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\FileLogger;
use App\TestClass;

$logger = new FileLogger();
$test = new TestClass($logger, 'Женя');

echo $test->getName();
