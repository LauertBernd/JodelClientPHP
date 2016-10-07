#!/usr/bin/env php
<?php
// command.php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use LauertBernd\JodelClientPHP\Commands\CreateUserCommand;

$app = new Application();
$app->add(new CreateUserCommand());
$app->run();