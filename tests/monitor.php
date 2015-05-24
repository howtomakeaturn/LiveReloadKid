<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../vendor/autoload.php');

$monitor = new Howtomakeaturn\LiveReloadKid\LiveReloadKid('index.php');

echo $monitor->monitor();
