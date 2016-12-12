#!/usr/bin/env php
<?php
// command.php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use LauertBernd\JodelClientPHP\Commands\CreateUser;
use LauertBernd\JodelClientPHP\Commands\GetPosts;
use LauertBernd\JodelClientPHP\Commands\GetChannels;
$app = new Application();
$app->add(new CreateUser());
$app->add(new GetPosts());
$app->add(new GetChannels());
$app->run();