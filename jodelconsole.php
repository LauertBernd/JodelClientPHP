#!/usr/bin/env php
<?php
// command.php
require_once __DIR__ . 'vendor/autoload.php';

use Acme\Tool\MyApplication;

$application = new MyApplication();
$application->run();