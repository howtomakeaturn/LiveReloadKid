<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../vendor/autoload.php');

//$monitor = new Howtomakeaturn\LiveReloadKid\LiveReloadKid('index.php');
//$monitor = new Howtomakeaturn\LiveReloadKid\LiveReloadKid('folder');
$monitor = new Howtomakeaturn\LiveReloadKid\LiveReloadKid(['folder/js', 'folder/css']);

echo $monitor->monitor();
