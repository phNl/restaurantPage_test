<?php

use ComposerTest\Application;
use ComposerTest\Model\Dish;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$application = new Application();

echo $application->run();